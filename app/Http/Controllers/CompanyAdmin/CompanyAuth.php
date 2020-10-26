<?php

namespace App\Http\Controllers\CompanyAdmin;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class CompanyAuth extends Controller
{
    use AuthenticatesUsers;
    protected $maxAttempts = 3;
    protected $decayMinutes = 2;

    protected $redirectTo = '/customer/home';

    public function __construct()
    {
        $this->middleware('guest:admin-company')->except('Logout');
    }

    public function showLogin()
    {
        return view('CompanyAdmin.signin');
    }

    public function showRegister()
    {
        return view('auth.rregister');
    }

    public function Login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        if (auth()->guard('admin-company')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            $this->clearLoginAttempts($request);
            return redirect("company-profile");
        } else {
            $this->incrementLoginAttempts($request);

            return redirect()
                ->back()
                ->withInput()->withErrors(['msg']);
        }
    }

    public function Register(Request $request)
    {
        $request->validate([
            'username'      => 'required|string|unique:admin_companies',
            'email'         => 'required|string|email|unique:admin_companies',
            'password'      => 'required|string|min:6|confirmed'
        ]);
        \App\AdminCompany::create($request->all());
        return redirect()->route('company.login')->with('success', 'Successfully register!');
    }
    
    public function Logout()
    {
        auth()->guard('admin-company')->logout();
        session()->flush();

        return redirect()->route('company.login');
    }
    protected function redirectTo($request)
    {
        return route('company/login');
    }
}
