<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class adminLogin extends Controller
{
        
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'usern' => 'required|numeric',
            'passwd' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        if ($request->input('usern')==2020 && $request->input('passwd')=='ritelmart') {
            session(['admin' => 'benar']);
            return redirect('administrator/dashboard');
        }else {
            return redirect('admin-456');
        }
    }
    public function logout()
    {
        session()->flush();
        return redirect('/');

    }
}
