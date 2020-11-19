<?php

namespace App\Http\Controllers\CompanyAdmin;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use App\Company;
use Illuminate\Support\Facades\Mail;
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
        return view('CompanyAdmin.signup');
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
            'email'         => 'required|string|email|unique:admin_companies|confirmed',
            'password'      => 'required|string|min:6|confirmed',
            'name'          => 'required|string|unique:companies|min:6',
            'company_email' => 'required',
            'company_website' => 'required',
            'company_business_hour_start' => 'required',
            'company_business_hour_until' => 'required',
            'company_phone' => 'required',
            'company_description' => 'required',
        ]);
        if($request->input('company_phone'))
        
        $company = new Company;
        $company->name = $request->input('name');
        $company->subscription = 1;
        $company->status = 0;
        $company->about = null;
        $company->logo = "public/logo/default.jpg";
        $company->header = "public/header/default.jpeg";
        $company->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->input('name'))));
        $company->catagory_id = null;
        $company->email = $request->input('company_email');
        $company->website = $request->input('company_website');
        $company->business_hour = $request->input('company_business_hour_start')." - ".$request->input('company_business_hour_until');
        $company->phone = "+".$request->input('company_phone_code').$request->input('company_phone');
        $company->description = $request->input('company_description');
        $company->save();

        \App\AdminCompany::create([
            'name' => $request->input('name_user'),
            'username' => "Administrator",
            'password' => $request->input('password'),
            'email' => $request->input('email'),
            'company_id' => $company->id
        ]);
        \App\CAddress::create([
            'company_id' => $company->id,
            'address' => $request->input('company_address'),
            'province' => $request->input('company_province'),
            'city' => $request->input('company_city')
        ]);
        $data = [
            'companyName' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        try {
            Mail::to($request->input('email'))->send(new \App\Mail\MailRegistcompany($data));
        } catch (\Throwable $th) {

        }
        
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
