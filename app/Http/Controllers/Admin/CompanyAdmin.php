<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailActivationCompany;
use App\Company;
use App\AdminCompanies;

class CompanyAdmin extends Controller
{
    public function showCompany()
    {
        $company = Company::all()->sortBy('status');
        return view('admin.list-company', compact('company'));
    }
    public function activate(Request $request )
    {
        $company = Company::find($request->input('id'));
        if ($company->status == 1) {
            $company->status = 0;
            $company->save();
            return redirect('administrator/company'); 
        }else{
            $company->status = 1;
            $company->save();
            return $this->sendMail($request->input('id'));
            // $emailAdminCompany = \App\AdminCompany::where('company_id', $company->id)->first()->emal;
            // try {
                
            // } catch (\Throwable $th) {

            // }
        }
    }
    public function sendMail($id)
    {   
        $admincompany = AdminCompanies::where('company_id', $id)->get();
        // return $admincompany[0]["email"];
        Mail::to($admincompany[0]["email"])->send(new MailActivationCompany());
        if (Mail::failures()) {
           // do nothing
        }else {
        return redirect('administrator/company');   

        }

    }
}
