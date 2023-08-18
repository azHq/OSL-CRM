<?php

namespace App\Http\Controllers;

use App\Helper\NewLog;
use App\Helper\Reply;
use App\Models\Document;
use App\Models\Lead;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        if (\request()->ajax()) {
            return view('documents.index');
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
    public function pendingDocuments()
    {
        if (\request()->ajax()) {
            $students = Student::where('documents_pending', true)->orderBy('created_at', 'desc');
            $students = $students->get();
            $filteredStudents = [];
            foreach ($students as $student) {
                if (
                    $student->lead->subcategory->name == 'Waiting for Documents' ||
                    $student->lead->subcategory->name == 'Partial Documnets' ||
                    $student->lead->subcategory->name == 'Document Received'
                ) {
                    array_push($filteredStudents, $student);
                }
            }

            return datatables()->of($filteredStudents)
                ->addColumn('name', function ($row) {
                    // $row->name = $this->convert_from_latin1_to_utf8_recursively($row->name);
                    $data = [
                        "name" => $row->name,
                        "id" => $row->id,
                        "route" => 'gotoRoute(\'' . route('students.view', $row->id) . '\');',

                    ];
                    return json_encode($data);
                })
                ->editColumn('mobile', function ($row) {
                    return $row->mobile;
                })
                ->editColumn('email', function ($row) {
                    return $row->email;
                })
                ->editColumn('owner', function ($row) {
                    return $row->lead && $row->lead->owner ? $row->lead->owner->name : 'Unassigned';
                })
                ->editColumn('progress', function ($row) {
                    return '<span>' . $row->uploaded_documents_no . ' / 11 </span>
                            <div class="progress">
                                <div class="progress-bar bg-gradient-success" role="progressbar" style="width: ' . ceil($row->uploaded_documents_no * 100 / 11) . '%" aria-valuenow="' . ceil($row->uploaded_documents_no * 100 / 11) . '" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>';
                })
                ->editColumn('document_status', function ($row) {
                    if (!$row->documents_pending) {
                        return '<label class="badge badge-success text-center">Completed</label>';
                    } else {
                        return '<label class="badge badge-danger text-center">Pending</label>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $action = '';
                    $action .= '<a href="javascript:;" onclick="gotoRoute(\'' . route('students.view', $row->id) . '\');" class="lkb-table-action-btn badge-primary btn-view"><i class="feather-info"></i></a>';
                    return $action;
                })
                ->addIndexColumn()
                ->rawColumns(['name', 'email', 'mobile', 'document_status', 'owner', 'progress', 'action'])
                ->make(true);
        }
        return view('documents.index');
    }

    public function initializeDocument($studentId, Request $request)
    {
        $document = [];
        $hasDocument = Document::where('student_id', $studentId)->first();
        if (!$hasDocument) {
            $document['student_id'] = $studentId;
            Document::create($document);
        }
        return Reply::success('Done', ['document' => $studentId]);
    }

    public function uploadDocument($studentId, Request $request)
    {
        try {

            $path = $request->file('file')->storeAs('students/' . $studentId, $request->name . '.' . $request->file('file')->extension());
            $document = Document::where('student_id', $studentId)->first();
            $document->update([$request->name => $path]);
            return Redirect::back()->with('success', 'File Uploaded Successfully.');
        } catch (\Exception $e) {
            dd($e);
            return Redirect::back()->with('error', $e->getMessage());
        }
    }
    public function downloadDocument($studentId, Request $request)
    {
        $student = Student::find($studentId);
        $path = "";
        switch ($request->name) {
            case 'masters':
                $path = $student->document->masters;
                break;
            case 'bachelors':
                $path = $student->document->bachelors;
                break;
            case 'hsc':
                $path = $student->document->hsc;
                break;
            case 'ssc':
                $path = $student->document->ssc;
                break;
            case 'cv':
                $path = $student->document->cv;
                break;
            case 'passport':
                $path = $student->document->passport;
                break;
            case 'sop':
                $path = $student->document->sop;
                break;
            case 'job_experience':
                $path = $student->document->job_experience;
                break;
            case 'recommendation_1':
                $path = $student->document->recommendation_1;
                break;
            case 'recommendation_2':
                $path = $student->document->recommendation_2;
                break;
            case 'visa_refused':
                $path = $student->document->visa_refused;
                break;
        }
        NewLog::create('Document Downloaded', 'A Document ' . $request->name . ' has been downloaded of student "' . $student->name . '".');
        return Storage::download($path);
    }
    // public function downloadDocument($studentId, Request $request)
    // {
    //     $lead = Document::where('student_id', $studentId)->first();
    //     dd($request->name);
    //     $path = "";
    //     switch ($request->name) {
    //         case 'passport':
    //             $path = $lead->passport;
    //             break;
    //         case 'academics':
    //             $path = $lead->academics;
    //             break;
    //         case 'cv':
    //             $path = $lead->cv;
    //             break;
    //         case 'moi':
    //             $path = $lead->moi;
    //             break;
    //         case 'recommendation_1':
    //             $path = $lead->recommendation_1;
    //             break;
    //         case 'recommendation_2':
    //             $path = $lead->recommendation_2;
    //             break;
    //         case 'job_experience':
    //             $path = $lead->job_experience;
    //             break;
    //         case 'sop':
    //             $path = $lead->sop;
    //             break;
    //         case 'others':
    //             $path = $lead->recommendation_1;
    //             break;
    //     }
    //     NewLog::create('Document Downloaded', 'A Document ' . $request->name . ' has been downloaded of student "' . $lead->name . '".');
    //     return Storage::download($path);
    // }
}
