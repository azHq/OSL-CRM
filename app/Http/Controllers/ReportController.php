<?php

namespace App\Http\Controllers;

use App\Helper\ColorGenerator;
use App\Models\Application;
use App\Models\Lead;
use App\Models\Report;
use App\Models\Student;
use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use function Ramsey\Uuid\v1;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        if (\request()->ajax()) {
            return view('reports.index');
        }
        return view('layout.mainlayout');
    }

    public function list(Request $request)
    {
        if (\request()->ajax())
        {
            try{
                $reports = Report::orderBy('created_at', 'desc')->where('mechanism','manual')->get();
            }catch (\Exception $e){
                dd($e->getMessage());
            }
        return datatables()->of($reports)
            ->addColumn('counselor', function ($row) {
                return $row->user->name;
            })
            ->editColumn('lead', function ($row) {
                return $row->lead->name;
            })
            ->editColumn('description', function ($row) {
                return $row->description;
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->editColumn('type', function ($row) {
                return $row->type;
            })
            ->editColumn('title', function ($row) {
                return $row->title;
            })
            ->addIndexColumn()
            ->rawColumns(['counselor', 'lead', 'description', 'created_at', 'type', 'title'])
            ->make(true);
        }
    }

    public function leadsStatistics(Request $request)
    {
        // January
        $leads[0] = Lead::whereYear('created_at', date('Y'))->whereMonth('created_at', '01')->count();
        $students[0] = Student::whereYear('created_at', date('Y'))->whereMonth('created_at', '01')->count();
        $applications[0] = Application::whereYear('created_at', date('Y'))->whereMonth('created_at', '01')->count();

        // Febraury
        $leads[1] = Lead::whereYear('created_at', date('Y'))->whereMonth('created_at', '02')->count();
        $students[1] = Student::whereYear('created_at', date('Y'))->whereMonth('created_at', '02')->count();
        $applications[1] = Application::whereYear('created_at', date('Y'))->whereMonth('created_at', '02')->count();

        // March
        $leads[2] = Lead::whereYear('created_at', date('Y'))->whereMonth('created_at', '03')->count();
        $students[2] = Student::whereYear('created_at', date('Y'))->whereMonth('created_at', '03')->count();
        $applications[2] = Application::whereYear('created_at', date('Y'))->whereMonth('created_at', '03')->count();

        // April
        $leads[3] = Lead::whereYear('created_at', date('Y'))->whereMonth('created_at', '04')->count();
        $students[3] = Student::whereYear('created_at', date('Y'))->whereMonth('created_at', '04')->count();
        $applications[3] = Application::whereYear('created_at', date('Y'))->whereMonth('created_at', '04')->count();

        // May
        $leads[4] = Lead::whereYear('created_at', date('Y'))->whereMonth('created_at', '05')->count();
        $students[4] = Student::whereYear('created_at', date('Y'))->whereMonth('created_at', '05')->count();
        $applications[4] = Application::whereYear('created_at', date('Y'))->whereMonth('created_at', '05')->count();

        // June
        $leads[5] = Lead::whereYear('created_at', date('Y'))->whereMonth('created_at', '06')->count();
        $students[5] = Student::whereYear('created_at', date('Y'))->whereMonth('created_at', '06')->count();
        $applications[5] = Application::whereYear('created_at', date('Y'))->whereMonth('created_at', '06')->count();

        // July
        $leads[6] = Lead::whereYear('created_at', date('Y'))->whereMonth('created_at', '07')->count();
        $students[6] = Student::whereYear('created_at', date('Y'))->whereMonth('created_at', '07')->count();
        $applications[6] = Application::whereYear('created_at', date('Y'))->whereMonth('created_at', '07')->count();

        // August
        $leads[7] = Lead::whereYear('created_at', date('Y'))->whereMonth('created_at', '08')->count();
        $students[7] = Student::whereYear('created_at', date('Y'))->whereMonth('created_at', '08')->count();
        $applications[7] = Application::whereYear('created_at', date('Y'))->whereMonth('created_at', '08')->count();

        // September
        $leads[8] = Lead::whereYear('created_at', date('Y'))->whereMonth('created_at', '09')->count();
        $students[8] = Student::whereYear('created_at', date('Y'))->whereMonth('created_at', '09')->count();
        $applications[8] = Application::whereYear('created_at', date('Y'))->whereMonth('created_at', '09')->count();

        // October
        $leads[9] = Lead::whereYear('created_at', date('Y'))->whereMonth('created_at', '10')->count();
        $students[9] = Student::whereYear('created_at', date('Y'))->whereMonth('created_at', '10')->count();
        $applications[9] = Application::whereYear('created_at', date('Y'))->whereMonth('created_at', '10')->count();

        // November
        $leads[10] = Lead::whereYear('created_at', date('Y'))->whereMonth('created_at', '11')->count();
        $students[10] = Student::whereYear('created_at', date('Y'))->whereMonth('created_at', '11')->count();
        $applications[10] = Application::whereYear('created_at', date('Y'))->whereMonth('created_at', '11')->count();

        // December
        $leads[11] = Lead::whereYear('created_at', date('Y'))->whereMonth('created_at', '12')->count();
        $students[11] = Student::whereYear('created_at', date('Y'))->whereMonth('created_at', '12')->count();
        $applications[11] = Application::whereYear('created_at', date('Y'))->whereMonth('created_at', '12')->count();

        return [
            'leads' => $leads,
            'students' => $students,
            'applications' => $applications
        ];
    }

    public function store(Request $request)
    {
        try {
            $request['mechanism'] = 'manual';
            Report::create($request->except('_token'));
            return Redirect::back()->with('success', 'Report created successfully.');
        } catch (\Exception $e) {
            Report::info($e->getMessage());
            return Redirect::back()->with('error', $e->getMessage());
        }
    }
}
