<?php

namespace App\Http\Controllers;

use App\Helper\NewLog;
use App\Helper\Reply;
use App\Models\Document;
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


    public function pendingDocuments()
    {
        if (\request()->ajax()) {
            $students = Student::where('documents_pending', true)->orderBy('created_at', 'desc');
            if (\request('filter_search') != '') {
                $students->where('name', 'like', '%' . \request('filter_search') . '%')
                    ->orWhere('email', 'like', '%' . \request('filter_search') . '%')
                    ->orWhere('mobile', 'like', '%' . \request('filter_search') . '%');
            }
            if (\request('filter_status') != '' || \request('filter_status') != null) {
                $students->where('status', \request('filter_status'));
            }
            if (\request('startDate') != '' && \request('endDate') != '') {
                $startDate = Carbon::parse(\request('startDate'))->format('Y-m-d');
                $endDate = Carbon::parse(\request('endDate'))->format('Y-m-d');
                $students->whereDate('created_at', '>=', $startDate)->whereDate('created_at', '<=', $endDate);
            }
            if (\request('filter_owner') != '') {
                $students->where('owner_id', request()->filter_owner);
            }
            $students = $students->get();

            return datatables()->of($students)
                ->addColumn('name', function ($row) {
                    $data = '<a href="' . route('students.view', $row->id) . '">
                                <span class="person-circle-a person-circle">' . substr($row->name, 0, 1) . '</span>
                            </a>
                            <a href="' . route('students.view', $row->id) . '">' . $row->name . '</a>';
                    return $data;
                })
                ->editColumn('mobile', function ($row) {
                    return $row->mobile;
                })
                ->editColumn('email', function ($row) {
                    return $row->email;
                })
                ->editColumn('owner', function ($row) {
                    return $row->lead->owner ? $row->lead->owner->name : 'Unassigned';
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
        Document::create(['student_id' => $studentId]);
        return Reply::success('Done', ['student' => 'Amit']);
    }

    public function uploadDocument($studentId, Request $request)
    {
        try {
            $path = $request->file('file')->storeAs('students/' . $studentId, $request->name . '.' . $request->file('file')->extension());
            $document = Document::where('student_id', $studentId)->first();
            $document->update([$request->name => $path]);
            return Redirect::back()->with('success', 'File Uploaded Successfully.');
        } catch (\Exception $e) {
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
}
