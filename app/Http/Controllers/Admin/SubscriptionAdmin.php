<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\company;

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
        $company->subscription = $request->input('subscription');
        $company->save();

        return redirect('administrator/subscription');
    }
}
