<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailSubscriptionUpdate;

use App\Company;
use Carbon\Carbon;

class SubscriptionAdmin extends Controller
{
    public function showSubscription()
    {
        $company = Company::all()->sortByDesc('id');
        return view('admin.list-subscription', compact('company'));
    }
    public function updateSubscription(Request $request)
    {
        $company = Company::find($request->input('id'));
        if($request->input('subscription')==0){
            $company->subscription = $request->input('subscription');
            $company->subscription_start = null;
            $company->subscription_end = null;
        }elseif ($request->input('subscription')==1){
            if ($company->subscription == 1) {
                $end = new Carbon($company->subscription_end);
                $company->subscription_end = $end->addMonths($request->input('month'));
            }else {
                $company->subscription = $request->input('subscription');
                $company->subscription_start = Carbon::now();
                $company->subscription_end = Carbon::now()->addMonths($request->input('month'));
            }
        }elseif ($request->input('subscription')==2){
            if ($company->subscription == 2) {
                $end = new Carbon($company->subscription_end);
                $company->subscription_end = $end->addMonths($request->input('month'));
            }else {
                $company->subscription = $request->input('subscription');
                $company->subscription_start = Carbon::now();
                $company->subscription_end = Carbon::now()->addMonths($request->input('month'));
            }
        }
        $company->save();
        $data = [
            "subscription" =>  $company->subscription,
            "start" => substr($company->subscription_start,0,10),
            "end" => substr($company->subscription_end,0,10),
            
        ];
        $emailAdminCompany = \App\AdminCompany::where('company_id', $company->id)->first()->email;
        try {
            Mail::to($emailAdminCompany)->send(new MailSubscriptionUpdate($data));
        } catch (\Throwable $th) {

        }

        return redirect('administrator/subscription');
    }
}
