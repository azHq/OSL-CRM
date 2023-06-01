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


    public function pendingDocuments()
    {
        if (\request()->ajax()) {
            $students = Student::where('documents_pending', true)->orderBy('created_at', 'desc');
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
        $document = [];
        $document['student_id'] = $studentId;
        Document::create($document);
        return Reply::success('Done', ['lead' => 'Amit']);
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
        $lead = Document::where('student_id', $studentId)->get()[0];
        $path = "";
        switch ($request->name) {
            case 'passport':
                $path = $lead->passport;
                break;
            case 'academics':
                $path = $lead->academics;
                break;
            case 'cv':
                $path = $lead->cv;
                break;
            case 'moi':
                $path = $lead->moi;
                break;
            case 'recommendation':
                $path = $lead->recommendation;
                break;
            case 'job_experience':
                $path = $lead->job_experience;
                break;
            case 'sop':
                $path = $lead->sop;
                break;
            case 'others':
                $path = $lead->recommendation_1;
                break;
        }
        NewLog::create('Document Downloaded', 'A Document ' . $request->name . ' has been downloaded of student "' . $lead->name . '".');
        return Storage::download($path);
    }
}
