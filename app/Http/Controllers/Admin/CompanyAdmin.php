<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Company;

class CompanyAdmin extends Controller
{
    public function showCompany()
    {
        $company = Company::all()->sortByDesc('id');
        return view('admin.list-company', compact('company'));
    }
    public function activate(Request $request )
    {
        $company = Company::find($request->input('id'));
        if ($company->status == 1) {
            $company->status = 0;
        }else{
            $company->status = 1;
            // $emailAdminCompany = \App\AdminCompany::where('company_id', $company->id)->first()->emal;
            Mail::to("m.arkanmufadho@gmail.com")->send(new \App\Mail\MailActivationCompany());
            try {
                
            } catch (\Throwable $th) {

            }
        }
        $company->save();

        return redirect('administrator/company');
    }
}
