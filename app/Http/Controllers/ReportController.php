<?php

namespace App\Http\Controllers;

use App\Helper\ColorGenerator;
use App\Models\Application;
use App\Models\Lead;
use App\Models\Student;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        $leads = Lead::query();
        $students = Student::query();
        $applications = Application::query();

        $potential_leads = Lead::query();
        $potential_leads->where('status', 'Potential');
        $not_potential_leads = Lead::query();
        $not_potential_leads->where('status', '!=', 'Potential');
        $converted_leads = Student::query();

        $applied_applications = Application::query();
        $applied_applications->where('status', 'Applied');
        $offer_applications = Application::query();
        $offer_applications->where('status', 'Offer Received');
        $paid_applications = Application::query();
        $paid_applications->where('status', 'Paid');
        $visa_applications = Application::query();
        $visa_applications->where('status', 'Visa');

        if ($request->user_id && $request->user_id != '') {
            $leads->where('owner_id', $request->user_id);
            $students->where('owner_id', $request->user_id);
            $applications->whereHas('student', function ($query) use ($request) {
                return $query->where('owner_id', $request->user_id);
            });

            $potential_leads->where('owner_id', $request->user_id);
            $not_potential_leads->where('owner_id', $request->user_id);
            $converted_leads->where('owner_id', $request->user_id);

            $applied_applications->whereHas('student', function ($query) use ($request) {
                return $query->where('owner_id', $request->user_id);
            });
            $offer_applications->whereHas('student', function ($query) use ($request) {
                return $query->where('owner_id', $request->user_id);
            });
            $paid_applications->whereHas('student', function ($query) use ($request) {
                return $query->where('owner_id', $request->user_id);
            });
            $visa_applications->whereHas('student', function ($query) use ($request) {
                return $query->where('owner_id', $request->user_id);
            });
        }

        if ($request->from_date && $request->from_date != '') {
            $leads->whereDate('created_at', '>=', $request->from_date);
            $students->whereDate('created_at', '>=', $request->from_date);
            $applications->whereDate('created_at', '>=', $request->from_date);

            $potential_leads->whereDate('created_at', '>=', $request->from_date);
            $not_potential_leads->whereDate('created_at', '>=', $request->from_date);
            $converted_leads->whereDate('created_at', '>=', $request->from_date);

            $applied_applications->whereDate('created_at', '>=', $request->from_date);
            $offer_applications->whereDate('created_at', '>=', $request->from_date);
            $paid_applications->whereDate('created_at', '>=', $request->from_date);
            $visa_applications->whereDate('created_at', '>=', $request->from_date);
        }

        if ($request->to_date && $request->to_date != '') {
            $leads->whereDate('created_at', '<=', $request->to_date);
            $students->whereDate('created_at', '<=', $request->to_date);
            $applications->whereDate('created_at', '<=', $request->to_date);

            $potential_leads->whereDate('created_at', '<=', $request->to_date);
            $not_potential_leads->whereDate('created_at', '<=', $request->to_date);
            $converted_leads->whereDate('created_at', '<=', $request->to_date);

            $applied_applications->whereDate('created_at', '<=', $request->to_date);
            $offer_applications->whereDate('created_at', '<=', $request->to_date);
            $paid_applications->whereDate('created_at', '<=', $request->to_date);
            $visa_applications->whereDate('created_at', '<=', $request->to_date);
        }

        $db_universities = University::all();
        $universities = [];
        $uni_applications = [];
        $uni_colors = [];
        foreach ($db_universities as $university) {
            $universities[] = $university->name;
            $uni_applications[] = $university->applications()->count();
            $uni_colors[] = '#'.ColorGenerator::randomColor();
        }

        return [
            'leads' => $leads->count(),
            'students' => $students->count(),
            'applications' => $applications->count(),
            'potential_leads' => $potential_leads->count(),
            'not_potential_leads' => $not_potential_leads->count(),
            'converted_leads' => $converted_leads->count(),
            'applied_applications' => $applied_applications->count(),
            'offer_applications' => $offer_applications->count(),
            'paid_applications' => $paid_applications->count(),
            'visa_applications' => $visa_applications->count(),
            'universities' => $universities,
            'uni_applications' => $uni_applications,
            'uni_colors' => $uni_colors
        ];
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
}
