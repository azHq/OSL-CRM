<?php

namespace App\Http\Controllers\Auth;

use App\Helper\ColorGenerator;
use App\Helper\NewLog;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Lead;
use App\Models\Student;
use App\Models\Subcategory;
use App\Models\Task;
use App\Models\University;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function studentLogin()
    {
        return view('studentlogin');
    }

    public function registration()
    {
        return view('register');
    }

    public function studentPostLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin') || Auth::user()->hasRole('cro')) {
                Session::flush();
                Auth::logout();
                return redirect("student-login")->withSuccess('Oppes! You have entered invalid credentials');
            } else {
                NewLog::create('Login', 'User logged-in successfully.');
                return redirect()->intended('/student-profile')
                    ->withSuccess('You have Successfully loggedin');
            }
        }
        return redirect("student-login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->hasRole('student')) {
                Session::flush();
                Auth::logout();
                return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
            } else {
                NewLog::create('Login', 'User logged-in successfully.');
                return redirect()->intended('/')
                    ->withSuccess('You have Successfully loggedin');
            }
        }
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect("login")->withSuccess('Opps! You do not have access');
        }
        if (Auth::user()->hasRole('student')) {
            return redirect("student-profile");
        }

        if (!\request()->ajax()) {
            return view('layout.mainlayout');
        }

        $leads = Lead::whereHas('subcategory', function ($query) {
            $query->where('category_id', 1);
        })->count();

        $pendings = Lead::whereHas('subcategory', function ($query) {
            $query->where('category_id', 2);
        })->count();

        $admissions = Lead::whereHas('subcategory', function ($query) {
            $query->where('category_id', 3);
        })->count();

        $visa_compliances = Lead::whereHas('subcategory', function ($query) {
            $query->where('category_id', 4);
        })->count();


        $list = Task::count();

        $data['leads'] = $leads;
        $data['pendings'] = $pendings;
        $data['admissions'] = $admissions;
        $data['visa_compliances'] = $visa_compliances;
        $data['list'] = $list;

        $tasks = Task::paginate(15);
        return view('index', compact('data', 'tasks'));
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function logout()
    {
        NewLog::create('Logout', 'User logged-out successfully.');
        Session::flush();
        if (Auth::user()->hasRole('student')) {
            Auth::logout();
            return Redirect('student-login');
        }
        Auth::logout();
        return Redirect('login');
    }

    public function profile()
    {
        if (\request()->ajax()) {
            return view('profile.index');
        }
        return view('layout.mainlayout');
    }

    public function resetPasswordIndex($id)
    {
        $student = User::find($id);
        if ($student && $student->status == 'Pending') {
            return view('reset', compact('id'));
        } else {
            return Redirect('student-login');
        }
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'confirm-password' => 'required',
            'password' => 'required',
        ]);
        try {
            if ($request['confirm-password'] == $request['password']) {
                $student = User::find($request['id'])->update([
                    'password' => Hash::make($request['password']),
                    'status' => 'Active'
                ]);
                return Redirect('student-login');
            } else {
                return Redirect::back()->with('error', 'Password Mismatch');
            }
        } catch (Exception $e) {
            Redirect::back()->with('error', $e->getMessage());
        }
    }
}
