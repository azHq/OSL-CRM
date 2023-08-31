<?php

namespace App\Http\Controllers;

use App\Events\LeadAssignedEvent;
use App\Exports\LeadsExport;
use App\Helper\NewLog;
use App\Imports\LeadsImport;
use App\Models\Application;
use App\Models\Category;
use App\Models\Country;
use App\Models\Remarks;
use App\Models\Lead;
use App\Models\Report;
use App\Models\Student;
use App\Models\Subcategory;
use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;

use App\Services\FacebookGraphService;
use Maatwebsite\Excel\HeadingRowImport;
use Symfony\Component\Console\Input\Input;

class LeadController extends Controller
{
    public function index(Request $request)
    {
        if (\request()->ajax()) {

            return view('leads.index');
        }
        return view('layout.mainlayout');
    }

    public function englishLeadIndex(Request $request)
    {
        if (\request()->ajax()) {

            return view('leads.english-lead');
        }
        return view('layout.mainlayout');
    }

    public function indexByStatus($status, Request $request)
    {
        if (\request()->ajax()) {
            return view('leads.status.index', ['status' => $status]);
        }
        return view('layout.mainlayout');
    }

    /**
     * Encode array from latin1 to utf8 recursively
     * @param $dat
     * @return array|string
     */
    public static function convert_from_latin1_to_utf8_recursively($dat)
    {
        if (is_string($dat)) {
            return mb_convert_encoding($dat, 'ISO-8859-1', 'UTF-8');
        } elseif (is_array($dat)) {
            $ret = [];
            foreach ($dat as $i => $d) $ret[$i] = self::convert_from_latin1_to_utf8_recursively($d);
            return $ret;
        } elseif (is_object($dat)) {
            foreach ($dat as $i => $d) $dat->$i = self::convert_from_latin1_to_utf8_recursively($d);
            return $dat;
        } else {
            return $dat;
        }
    }
    public function list(Request $request)
    {
        if (\request()->ajax()) {
            $data = [];
            if (Auth::user()->hasRole('student')) {
                $data = Lead::where('email', '=', Auth::user()->email)->get();
                // $applications = Application::orderBy('created_at', 'desc')->where('lead_id', $leadId);
                // $data = $applications->get();
            } else {
                $leads = Lead::orderBy('created_at', 'desc');
                if ($request['startDate']) {
                    $leads->whereDate('created_at', '>=', $request['startDate']);
                }
                if ($request['endDate']) {
                    $leads->whereDate('created_at', '<=', $request['endDate']);
                }
                if ($request['filterOnlyFor']) {
                    $category = Category::where("name", "Admitted")->first();
                    $leads->where('category_id', $category->id);
                }
                $data = $leads->get();
            }

            return datatables()->of($data)
                ->addColumn('name', function ($row) {
                    // $row->name = $this->convert_from_latin1_to_utf8_recursively($row->name);
                    $data = [
                        "name" => $row->name,
                        "id" => $row->id,
                        "route" => 'gotoRoute(\'' . route('leads.view', $row->id) . '\');',

                    ];
                    return json_encode($data);
                })
                ->editColumn('mobile', function ($row) {
                    return $row->mobile;
                })
                ->editColumn('purpose', function ($row) {
                    $value = $row->status;
                    if ($value == 'Potential' || $value == 'Not Potential') {
                        return '';
                    } else {
                        return '<label class="badge badge-success text-center">' . $row->status . '</label>';
                    }
                })
                ->editColumn('source', function ($row) {
                    $value = $row->insert_type;
                    if ($value == 'Meta') {
                        return '<label class="badge badge-info text-center">META</label>';
                    } else if ($value == 'Website') {
                        return '<label class="badge badge-info text-center">Website</label>';
                    } else {
                        return '<label class="badge badge-success text-center">' . $value . '</label>';
                    }
                })
                ->editColumn('passport', function ($row) {
                    $value = 'No';
                    if ($row->passport == 1) {
                        $value = 'Yes';
                        return '<label class="badge badge-success text-center">' . $value . '</label>';
                    }
                    return '<label class="badge badge-info text-center">' . $value . '</label>';
                })
                ->editColumn('destination', function ($row) {
                    return '<label class="badge badge-danger text-center">' . $row->destination . '</label>';
                })

                ->editColumn('email', function ($row) {
                    return $row->email;
                })
                ->editColumn('owner', function ($row) {
                    return $row->owner ? $row->owner->name : 'Unassigned';
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at;
                })
                ->editColumn('created_by', function ($row) {
                    return $row->creator ? $row->creator->name : 'NA';
                })
                ->editColumn('status', function ($row) {
                    if ($row->category_id) {
                        $category = Category::find($row->category_id);
                        if ($category->name == 'Admitted') {
                            return '<label class="badge badge-info text-center">' . ucfirst('Admitted') . '</label>';
                        }
                    }
                    return '<label class="badge badge-info text-center">' . ucfirst($row->subcategory->name) . '</label>';
                })
                ->addColumn('action', function ($row) {
                    $action = '';
                    $action .= '<a href="javascript:;" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#add_remarks" class="add_remarks lkb-table-action-btn url badge-info btn-edit"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>';
                    $action .= '<a href="javascript:;" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#edit_lead" class="edit-lead lkb-table-action-btn url badge-info btn-edit"><i class="feather-edit"></i></a>';
                    $action .= '<a href="javascript:;" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#mail_lead" class="mail-lead lkb-table-action-btn url badge-success btn-edit"><i class="feather-mail"></i></a>';
                    $action .= '<a href="' . route('leads.view', $row->id) . '" class="lkb-table-action-btn badge-primary btn-view"><i class="feather-info"></i></a>';
                    if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('main-super-admin'))
                        $action .= '<a href="javascript:;" onclick="leadDelete(' . $row->id . ');" class="lkb-table-action-btn badge-danger btn-delete"><i class="feather-trash-2"></i></a>';
                    return $action;
                })
                ->addIndexColumn()
                ->rawColumns(['name', 'email', 'mobile', 'purpose', 'status', 'owner', 'source', 'passport', 'destination', 'created_at', 'created_by', 'action'])
                ->make(true);
        }
    }

    public function lisByStatus(Request $request)
    {
        if (\request()->ajax()) {
            $leads = Lead::orderBy('created_at', 'desc');

            $leads->whereHas('subcategory', function ($query) {
                $status = \request('status');
                if ($status == 'student') {
                    $query->where('slug', 'appointment-book')
                        ->orWhere('slug', 'waiting-for-documents');
                } else if ($status == 'admission') {
                    $query->where('slug', 'partial-documents')
                        ->orWhere('slug', 'document-received')
                        ->orWhere('slug', 'applied')
                        ->orWhere('slug', 'waiting-for-conditional-offer-issued')
                        ->orWhere('slug', 'waiting-for-unconditional-offer-issued')
                        ->orWhere('slug', 'paid')
                        ->orWhere('slug', 'payment-expected');
                } else {
                    $query->where('slug', $status);
                }
            });
            if ($request['startDate']) {
                $leads->whereDate('created_at', '>=', $request['startDate']);
            }
            if ($request['endDate']) {
                $leads->whereDate('created_at', '<=', $request['endDate']);
            }
            $leads = $leads->get();
            return datatables()->of($leads)
                ->addColumn('name', function ($row) {
                    // $row->name = $this->convert_from_latin1_to_utf8_recursively($row->name);
                    $data = [
                        "name" => $row->name,
                        "id" => $row->id,
                        "route" => 'gotoRoute(\'' . route('leads.view', $row->id) . '\');',

                    ];
                    return json_encode($data);
                })
                ->editColumn('mobile', function ($row) {
                    return $row->mobile;
                })
                ->editColumn('purpose', function ($row) {
                    $value = $row->status;
                    if ($value == 'Potential' || $value == 'Not Potential') {
                        return '';
                    } else {
                        return '<label class="badge badge-success text-center">' . $row->status . '</label>';
                    }
                })
                ->editColumn('source', function ($row) {
                    $value = $row->insert_type;
                    if ($value == 'Meta') {
                        return '<label class="badge badge-info text-center">META</label>';
                    } else if ($value == 'Website') {
                        return '<label class="badge badge-info text-center">Website</label>';
                    } else {
                        return '<label class="badge badge-success text-center">' . $value . '</label>';
                    }
                })
                ->editColumn('passport', function ($row) {
                    $value = 'No';
                    if ($row->passport == 1) {
                        $value = 'Yes';
                        return '<label class="badge badge-success text-center">' . $value . '</label>';
                    }
                    return '<label class="badge badge-info text-center">' . $value . '</label>';
                })
                ->editColumn('destination', function ($row) {
                    return '<label class="badge badge-danger text-center">' . $row->destination . '</label>';
                })
                ->editColumn('email', function ($row) {
                    return $row->email;
                })
                ->editColumn('owner', function ($row) {
                    return $row->owner ? $row->owner->name : 'Unassigned';
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at;
                })
                ->editColumn('created_by', function ($row) {
                    return $row->creator ? $row->creator->name : 'NA';
                })

                ->editColumn('status', function ($row) {
                    if ($row->category_id) {
                        $category = Category::find($row->category_id);
                        if ($category->name == 'Admitted') {
                            return '<label class="badge badge-info text-center">' . ucfirst('Admitted') . '</label>';
                        }
                    }
                    return '<label class="badge badge-info text-center">' . ucfirst($row->subcategory->name) . '</label>';
                })
                ->addColumn('action', function ($row) {
                    $action = '';
                    if (!$row->student) {
                        $action .= '<a href="javascript:;" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#add_remarks" class="add_remarks lkb-table-action-btn url badge-info btn-edit"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>';
                    }
                    if (!$row->student)
                        $action .= '<a href="javascript:;" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#edit_lead" class="edit-lead lkb-table-action-btn url badge-info btn-edit"><i class="feather-edit"></i></a>';
                    $action .= '<a href="javascript:;" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#mail_lead" class="mail-lead lkb-table-action-btn url badge-warning btn-edit"><i class="feather-mail"></i></a>';
                    if (!$row->student)
                        $action .= '<a href="javascript:;" onclick="leadConvert(' . $row->id . ');" class="lkb-table-action-btn badge-success btn-convert"><i class="feather-navigation"></i></a>';
                    if (!$row->student && (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('main-super-admin')))
                        $action .= '<a href="javascript:;" onclick="leadDelete(' . $row->id . ');" class="lkb-table-action-btn badge-danger btn-delete"><i class="feather-trash-2"></i></a>';
                    if ($row->student)
                        $action .= '<a href="' . route('students.view', $row->student->id) . '" class="lkb-table-action-btn badge-primary btn-view"><i class="feather-info"></i></a>';

                    return $action;
                })
                ->addIndexColumn()
                ->rawColumns(['name', 'email', 'mobile', 'purpose', 'status', 'owner', 'source', 'passport', 'destination', 'created_at', 'created_by', 'action'])
                ->make(true);
        }
    }

    public function view($id, Request $request)
    {
        if (\request()->ajax()) {
            $lead = Lead::find($id);
            $subCategory = Subcategory::find($lead->subcategory_id);
            $category = Category::find($subCategory->category_id);
            $lead->subCategory = $subCategory->name;
            $lead->category = $category->name;
            $lead->load('applications');
            $lead->load('report');
            $lead->load("report.user");
            $lead->load("remark");
            $lead->id = $id;
            return view('leads.view', compact('lead'));
        }

        return view('layout.mainlayout');
    }

    public function create()
    {
        $users = User::admins()->select('id', 'name', 'email')->get();
        $cros = User::cros()->select('id', 'name', 'email')->get();
        $subcategories = Subcategory::select('id', 'name', 'slug', 'category_id')->get();
        $all_users = User::select('id', 'name')->get();
        $universities = University::select('id', 'name')->get();
        $me_and_sa = User::superAdmins()->orWhere('id', Auth::user()->id)->select('id', 'name')->get();
        return response()->json([
            'users' => $users,
            'cros' => $cros,
            'all_users' => $all_users,
            'universities' => $universities,
            'me_and_sa' => $me_and_sa,
            'subcategories' => $subcategories,
        ]);
    }

    public function subcategoriesList($category_id)
    {
        $subcategories = Subcategory::where('category_id', $category_id)->get();
        if (Auth::user()->hasRole('cro')) {
            $filteredSubcategories = [];
            foreach ($subcategories as $subCategory) {
                if (($subCategory->name == 'Appointment Book') || ($subCategory->name == 'Waiting for CAS') || ($subCategory->name == 'CAS or Final Confirmation Letter Issued')
                    || ($subCategory->name == 'Enrolled')
                ) {

                    array_push($filteredSubcategories, $subCategory);
                }
            }
            return response()->json($filteredSubcategories);
        }
        return response()->json($subcategories);
    }

    public function store(Request $request)
    {
        $request['creator_id'] = Auth::id();
        try {
            $isLeadExist = Lead::where('mobile', $request['mobile'])->orWhere('email', $request['email'])->get();
            if (count($isLeadExist) == 0) {
                Lead::create($request->except('_token'));
                return Redirect::back()->with('success', 'Lead created successfully.');
            } else {
                return Redirect::back()->with('error', 'Lead Already Exist with mobile or email.');
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return Redirect::back()->with('error', $e->getMessage());
        }
    }


    public function edit($id)
    {
        // dd($id);
        if (\request()->ajax()) {
            $lead = Lead::find($id);
            $categories = [];
            $subcategories = [];
            if (Auth::user()->hasRole('cro')) {
                $categories = [];
                if ($lead->status && $lead->status == 'English Teaching') {
                    $categories = Category::where('name', '!=', 'Admission')->where('name', '!=', 'Visa Compliance')->get();
                } else {
                    $categories = Category::where('name', '!=', 'Admission')->where('name', '!=', 'Admitted')->get();
                }
                $subcategories = Subcategory::where('category_id', $lead->subcategory->category_id)->get();
                $filteredSubcategories = [];
                foreach ($subcategories as $subCategory) {
                    if (($subCategory->name == 'Appointment Book') || ($subCategory->name == 'Waiting for CAS') || ($subCategory->name == 'CAS or Final Confirmation Letter Issued')
                        || ($subCategory->name == 'Enrolled')
                    ) {

                        array_push($filteredSubcategories, $subCategory);
                    }
                }
                $subcategories =   $filteredSubcategories;
            } else {
                $categories = [];
                if ($lead->status && $lead->status == 'English Teaching') {
                    $categories = Category::where('name', '!=', 'Admission')->where('name', '!=', 'Visa Compliance')->get();
                } else {
                    $categories = Category::where('name', '!=', 'Admitted')->get();
                }
                $subcategories = Subcategory::where('category_id', $lead->subcategory->category_id)->get();
            }
            return response()->json([
                'lead' => $lead,
                'subcategories' => $subcategories,
                'categories' => $categories,
                'category_id' => $lead->subcategory->category_id,
                'subcategory_id' => $lead->subcategory_id
            ]);
        }

        try {
            $lead = Lead::find($id);
            abort_if((!Auth::user()->hasRole('main-super-admin') && !Auth::user()->hasRole('super-admin') && $lead->owner_id != Auth::user()->id), 403);
            $users = User::admins()->select('id', 'name')->get();
            return view('leads.edit', compact('lead', 'users'));
        } catch (\Exception $e) {
            return Redirect::back()->with('info', $e->getMessage());
        }
    }

    public function mail($id)
    {
        if (\request()->ajax()) {
            $lead = Lead::find($id);
            $categories = Category::all();
            $subcategories = Subcategory::where('category_id', $lead->subcategory->category_id)->get();
            return response()->json([
                'lead' => $lead,
                'subcategories' => $subcategories,
                'categories' => $categories,
                'category_id' => $lead->subcategory->category_id,
                'subcategory_id' => $lead->subcategory_id
            ]);
        }

        try {
            $lead = Lead::find($id);
            abort_if((!Auth::user()->hasRole('main-super-admin') && !Auth::user()->hasRole('super-admin') && $lead->owner_id != Auth::user()->id), 403);
            $users = User::admins()->select('id', 'name')->get();
            return view('leads.mail', compact('lead', 'users'));
        } catch (\Exception $e) {
            return Redirect::back()->with('info', $e->getMessage());
        }
    }
    public function addRemarks(Request $request)
    {
        try {
            Remarks::create($request->except('_token', '_method'));
            return Redirect::back()->with('success', 'Remarks Added Successfully.');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function getRemarksById($id)
    {
        try {
            $remarks  = Remarks::find($id);
            return response()->json($remarks);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function updateRemarks(Request $request)
    {
        try {
            Remarks::find($request['remarks_id'])->update($request->except('_token', '_method', 'remarks_id'));
            return Redirect::back()->with('success', 'Remarks Updated Successfully.');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        try {
            $lead = Lead::find($id);
            $leadCounsellorIdOld = $lead->owner_id;
            abort_if((!Auth::user()->hasRole('main-super-admin') && !Auth::user()->hasRole('super-admin') && $lead->owner_id != Auth::user()->id), 403);
            if ($request['remarks']) {
                $comment = [];
                $comment['value'] = $request->remarks;
                $comment['lead_id'] = $id;
                Remarks::create($comment);
            }
            if (is_numeric($request['subcategory_id']) && number_format($request['subcategory_id']) > 7) {
                $foundStudent = Student::where('email', $request['email'])->orWhere('mobile', $request['mobile'])->first();
                if (!$foundStudent) {
                    $data = $request;
                    $data['lead_id'] = $lead->id;
                    Student::create($data->except('_token', '_method', 'category_id', 'subcategory_id', 'remarks'));
                    $student = [];
                    $student['email'] = $data->email;
                    $student['mobile'] = $data->mobile;
                    $student['password'] = $data->mobile;
                    $student['name'] = $data->name;
                    $student['status'] = 'Pending';
                    $roleId = Role::where('name', 'student')->first()->id;
                    $student['role_id'] = $roleId;
                    $user = User::create($student);
                    $email_body = clone $request;
                    $email_body['name'] = $data->name;
                    $email_body['subject'] = 'Pass Reset Request for OSL_CRM';
                    $email_body['email'] = $student['email'];
                    $email_body['email_body'] = "
                    Please View the link & Reset
                   https://oslcrm.com/reset-password/$user->id
                    ";
                    $this->sendMail($email_body);
                    $role = Role::findByName('student');
                    $user->assignRole($role);
                }
            }
            if ($lead->owner_id) {
                $student = Student::where('lead_id', $lead->id)->update($request->except('_token', '_method', 'category_id', 'subcategory_id', 'remarks'));
            }

            $lead->update($request->except('_token', '_method', 'remarks', 'remarks_id', 'lead_id'));
            $lead = Lead::find($id);
            if ($leadCounsellorIdOld != $lead->owner_id && $lead->owner_id) {
                LeadAssignedEvent::dispatch($lead);
                NewLog::create('Lead Assigned', 'Lead "' . $lead->name . '" has been assigned to ' . $lead->owner->name . '.');
            }
            return Redirect::back()->with('success', 'Lead updated successfully.');
        } catch (\Exception $e) {
            dd($e);
            Log::info($e->getMessage());
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function convert($id, Request $request)
    {
        try {
            $lead = Lead::find($id);
            abort_if((!Auth::user()->hasRole('main-super-admin') && !Auth::user()->hasRole('super-admin') && $lead->owner_id != Auth::user()->id), 403);
            $data = $lead->toArray();
            unset($data['id']);
            unset($data['created_at']);
            unset($data['updated_at']);
            unset($data['creator_id']);
            unset($data['subcategory_id']);
            unset($data['temp_remarks_id']);
            $data['lead_id'] = $lead->id;
            $foundStudent = Student::where('lead_id', $lead->id)->first();
            if (!$foundStudent->id) {
                $student = Student::create($data);
                $student['email'] = $data->email;
                $student['mobile'] = $data->mobile;
                $student['password'] = $data->mobile;
                $student['name'] = $data->name;
                $student['status'] = 'Pending';
                $roleId = Role::where('name', 'student')->first()->id;
                $student['role_id'] = $roleId;
                $user = User::create($student);
                $request['name'] = $data->name;
                $request['subject'] = 'Pass Reset Request for OSL_CRM';
                $request['email'] = $student['email'];
                $request['email_body'] = "
                Please View the link & Reset
               https://oslcrm.com/reset-password/$user->id
                ";
                $this->sendMail($request);
                $role = Role::findByName('student');
                $user->assignRole($role);
                $subcat = Subcategory::where('name', 'Appointment Book')->first();
                $comment['value'] = 'Lead Converted to Student';
                $comment['lead_id'] =  $lead->id;
                Remarks::create($comment);
            }


            NewLog::create('Lead Converted To Student', 'Lead "' . $lead->name . '" has been converted to student.');
            Session::flash('success', 'Lead converted successfully.');
            // return response('Lead converted successfully.');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return response($e->getMessage());
        }
    }

    public function delete($id, Request $request)
    {
        try {
            $lead = Lead::find($id);
            $reports = Report::where('leads_id', $id)->get();
            $remarks = Remarks::where('lead_id', $id)->get();
            foreach ($reports as $report) {
                $report->delete();
            }
            foreach ($remarks as $remark) {
                $remark->delete();
            }
            abort_if((!Auth::user()->hasRole('main-super-admin') && !Auth::user()->hasRole('super-admin')), 403);
            $lead->delete();
            Session::flash('success', 'Lead deleted successfully.');
            return response('Lead deleted successfully.');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return response($e->getMessage());
        }
    }

    public function data_stringify($data)
    {
        switch (gettype($data)) {
            case 'string':
                return '\'' . addcslashes($data, "'\\") . '\'';
            case 'boolean':
                return $data ? 'true' : 'false';
            case 'NULL':
                return 'null';
            case 'object':
            case 'array':
                $expressions = [];
                foreach ($data as $c_key => $c_value) {
                    $expressions[] = $this->data_stringify($c_value);
                }
                return gettype($data) === 'object' ?
                    '(object)[' . implode(', ', $expressions) . ']' :
                    implode(',', $expressions);
            default:
                return (string)$data;
        }
    }

    public function import(Request $request)
    {

        // Excel::import(new LeadsImport, $request->file('file'));
        $headings = [];
        $duplicateCount = 0;
        $imported = 0;
        $file = fopen($request->file('file'), mode: 'r');
        while ($row = fgetcsv($file)) {
            if ($row[1] == 'phone_number') {
                $headings = $row;
                continue;
            }
            $findExistingLead = Lead::where('email', $row[2])->orWhere('mobile', $row[1])->first();
            if ($findExistingLead) {
                $duplicateCount++;
                continue;
            }
            $country = Country::where('name', $row[11])->first();
            $owner = User::where('email', $row[10])->first();
            $passport = 0;
            if ($row[13] == 'yes' || $row[13] == 'Yes') {
                $passport = 1;
            }
            $ownerId = null;
            $countryId = null;
            if ($owner) {
                $ownerId = $owner->id;
            }
            if ($country) {
                $countryId = $country->id;
            }
            $temp_remarks_id = [];
            if (count($row) > 15) {
                foreach ($row as $index => $item) {
                    if ($index > 14 && $headings[$index] != '') {
                        $data = [
                            'value' => "'" . $headings[$index] . "'  '" .  $item . "'",
                            'commented_by' => Auth::id()
                        ];
                        $remarks = Remarks::create($data);
                        array_push($temp_remarks_id, $remarks->id);
                    }
                }
            }
            // if ((strlen($row[1]) < 3) || (!filter_var($row[2], FILTER_VALIDATE_EMAIL)) || (strlen($row[3]) < 7)) return null;
            Lead::create([
                'name' => $row[0],
                'email' => $row[2],
                'mobile' => $row[1],
                'insert_type' => $row[3],
                'status' => $row[4],
                'last_education' => $row[5],
                'completion_date' => $row[6],
                'english' => $row[7],
                'country' => $countryId,
                'owner_id' => $ownerId,
                'passport' => $passport,
                'address' => $row[12],
                'desired_course' => $row[14],
                'temp_remarks_id' => $this->data_stringify($temp_remarks_id),
                'creator_id' => Auth::id()
            ]);
            $imported++;
        }
        $tempRemarks = Lead::where('temp_remarks_id', '!=', null)->get();
        foreach ($tempRemarks as $tempRemark) {
            $temp_remarks_ids = explode(',', $tempRemark->temp_remarks_id);
            foreach ($temp_remarks_ids as $id) {
                Remarks::find($id)->update(
                    [
                        'lead_id' => $tempRemark->id
                    ]
                );
            }
            Lead::find($tempRemark->id)->update(
                [
                    'temp_remarks_id' => null
                ]
            );
        }
        if ($imported > 0) {
            NewLog::create('Leads Imported', '' . $imported . ' leads have been imported.');
            Session::flash('success', 'Leads imported successfully.');
        }
        if ($duplicateCount > 0) {
            NewLog::create('Duplicate Leads', '"' . $duplicateCount . '" leads duplicate');
            Session::flash('error', '' . $duplicateCount . ' duplicate Leads found .');
        }
        return Redirect::back();
    }

    public function export()
    {
        NewLog::create('Leads Downloaded', 'Leads have been downloaded.');
        return Excel::download(new LeadsExport, 'leads.csv');
    }

    public function convertMultipleLeads(Request $request)
    {

        $request->validate([
            'lead_ids' => 'required|array|min:1'
        ]);
        try {
            $leads = Lead::find($request->lead_ids);
            foreach ($leads as $lead) {
                $data = $lead->toArray();
                unset($data['id']);
                unset($data['created_at']);
                unset($data['updated_at']);
                unset($data['creator_id']);
                unset($data['subcategory_id']);
                unset($data['temp_remarks_id']);
                $data['lead_id'] = $lead->id;
                $foundStudent = Student::where('lead_id', $lead->id)->first();
                if (!$foundStudent) {
                    $student = Student::create($data);
                    $userData['email'] = $student->email;
                    $userData['mobile'] = $student->mobile;
                    $userData['password'] = $student->mobile;
                    $userData['name'] = $student->name;
                    $userData['status'] = 'Pending';
                    $roleId = Role::where('name', 'student')->first()->id;
                    $userData['role_id'] = $roleId;
                    $user = User::create($userData);
                    $request['name'] = $student->name;
                    $request['subject'] = 'Pass Reset Request for OSL_CRM';
                    $request['email'] = $userData['email'];
                    $request['email_body'] = "
                    Please View the link & Reset
                   https://oslcrm.com/reset-password/$user->id
                    ";
                    $this->sendMail($request);
                    $role = Role::findByName('student');
                    $user->assignRole($role);
                    $subcat = Subcategory::where('name', 'Appointment Book')->first();
                    $comment['value'] = 'Lead Converted to Student';
                    $comment['lead_id'] = $lead->id;
                    Remarks::create($comment);
                }

                NewLog::create('Lead Converted To Student', 'Lead "' . $student->name . '" has been converted to student.');
            }
            NewLog::create('Multiple Leads Converted', 'Multiple Leads have been converted to students.');
            Session::flash('success', 'All Leads converted successfully.');
            // return response('All Leads converted successfully.');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return response($e->getMessage());
        }
    }
    public function deleteMultipleLeads(Request $request)
    {
        $request->validate([
            'lead_ids' => 'required|array|min:1'
        ]);
        try {
            $leads = Lead::find($request->lead_ids);
            foreach ($leads as $lead) {
                $data = $lead->toArray();
                $data['lead_id'] = $lead->id;
                Remarks::where('lead_id', $lead->id)->delete();
                Report::where('leads_id', $lead->id)->delete();
                Lead::find($lead->id)->delete();
                NewLog::create('Lead Deleted', 'Lead "' . $lead->name . '" has been deleted.');
            }
            NewLog::create('Multiple Leads Converted', 'Multiple Leads have been converted to students.');
            Session::flash('success', 'All Leads deleted successfully.');
            // return response('All Leads converted successfully.');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return response($e->getMessage());
        }
    }
    public function assignMultipleLeads(Request $request)
    {
        $request->validate([
            'lead_ids' => 'required|array|min:1',
            'counsellor_id' => 'required'
        ]);
        try {
            $leads = Lead::find($request->lead_ids);
            foreach ($leads as $lead) {
                $comment['value'] = 'Lead Owner Changed';
                $comment['lead_id'] = $lead->id;
                Remarks::create($comment);
                $lead->update([
                    'owner_id' => $request->counsellor_id
                ]);
                $lead = Lead::find($lead->id);
                LeadAssignedEvent::dispatch($lead);
                NewLog::create('Lead Assigned', 'Lead "' . $lead->name . '" has been assigned to ' . $lead->owner->name . '.');
            }
            NewLog::create('Multiple Leads Assigned', 'Multiple Leads has been assigned to ' . $lead->owner->name . '.');
            Session::flash('success', 'All Leads assigned successfully.');
            return response('All Leads assigned successfully.');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return response($e->getMessage());
        }
    }

    public function sendMail(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required',
                'subject' => 'required',
                'email_body' => 'required',
                'name' => 'required',
            ]);
            $info = [
                'to' => $request->input('email'),
                'subject' => $request->input('subject'),
                'text_message' => $request->input('email_body'),
                'name' => $request->input('name'),
            ];
            Mail::send('mail', $info, function ($messages) use ($info) {
                $messages->from('rahatsaqib78@gmail.com', 'OSL_CRM');
                $messages->to($info['to'], $info['name']);
                $messages->subject($info['subject']);
            });
            return Redirect::back()->with('success', 'Email sent successfully.');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return response($e->getMessage());
        }
    }


    public function studentProfile()
    {
        if (\request()->ajax()) {
            abort_if((Auth::user()->hasRole('main-super-admin') || Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin') || Auth::user()->hasRole('cro')), 403);
            $email = Auth::user()->email;
            $lead = Lead::where('email', '=', $email)->get()[0];
            $subCategory = Subcategory::find($lead->subcategory_id);
            $category = Category::find($subCategory->category_id);
            $lead->subCategory = $subCategory->name;
            $lead->category = $category->name;
            // $lead->load('applications');
            // $lead->load('report');
            // $lead->load("report.user");
            return view('profile.student', compact('lead'));
        }
        return view('layout.mainlayout');
    }
    public function getCategories($status)
    {
        $categories = [];
        if (Auth::user()->hasRole('cro')) {
            $categories = [];
            if ($status && $status == 'English Teaching') {
                $categories = Category::where('name', '!=', 'Admission')->where('name', '!=', 'Visa Compliance')->get();
            } else {
                $categories = Category::where('name', '!=', 'Admission')->where('name', '!=', 'Admitted')->get();
            }
        } else {
            $categories = [];
            if ($status && $status == 'English Teaching') {
                $categories = Category::where('name', '!=', 'Admission')->where('name', '!=', 'Visa Compliance')->get();
            } else {
                $categories = Category::where('name', '!=', 'Admitted')->get();
            }
        }
        return response()->json([
            'categories' => $categories
        ]);
    }

    public function getStudentsByLeadId($id)
    {
        try {
            $student = Student::where('lead_id', $id)->first();
            return '<div class="d-flex justify-content-center">
            <a href="javascript:;" onclick="gotoRoute(\'' . route('students.view', $student->id) . '\');" class="add btn mt-4 btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" id="documents-initialize">
                <i class="fa fa-upload" aria-hidden="true"></i>
                Upload Documents
            </a>
        </div>';
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
    public function getSubcategoriesList()
    {
        if (\request()->ajax()) {
            $data = [];
            $categories = Category::all();
            foreach ($categories as $category) {
                $subcategories = Subcategory::where('category_id', $category->id)->get();
                $data[$category->name] = $subcategories;
            }
            return response()->json($data);
        }
    }

    public function checkDuplicate(Request $request)
    {
        try {
            $lead = Lead::where('email', $request['email'])->orWhere('mobile', $request['mobile'])->first();
            return response()->json($lead);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
