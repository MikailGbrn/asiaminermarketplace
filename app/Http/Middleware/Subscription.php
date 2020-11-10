<?php

namespace App\Http\Middleware;
use App\Company;
use Illuminate\Support\Facades\Auth; 

use Closure;

class Subscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $company = Company::find(Auth::guard('admin-company')->user()->company_id);
        $name = "Dashboard";
        $object = 0;
        $max =[1,1,1];
        if ($company->status == 0) {
            if ($request->segment(3)=="add") {
                return redirect()->back();
            }
            session()->now("activate", '<strong>the account has not been activated</strong>, please contact the admin');
            return $next($request);
        }
        if($request->segment(2)=="media"){
            $name = "Media/Resource";
            $object = $company->media()->count();
            $max = [5,10,999999];
        }elseif ($request->segment(2)=="product") {
            $name = "Product";
            $object = $company->product()->count();
            $max = [10,15,999999];
        }
        elseif ($request->segment(2)=="news") {
            $name = "News";
            $object = $company->news()->count();
            $max = [10,15,999999];
        }
        elseif ($request->segment(2)=="project") {
            $name = "Project";
            $object = $company->project()->count();
            $max = [10,15,999999];
        }
        $subscription = $company->subscription;
        switch ($subscription) {
            case 0:
                if($object >= $max[0]){
                    if ($request->segment(3)=="add") {
                        return redirect()->back();
                    }
                    session()->now($name, '<strong>'.$name.'</strong> limit has exceeded');
                    return $next($request);
                }
                return $next($request);
                break;
            case 1 :
                if($object >= $max[1]){
                    if ($request->segment(3)=="add") {
                        return redirect()->back();
                    }
                    session()->now($name, '<strong>'.$name.'</strong> limit has exceeded');
                    return $next($request);
                }
                return $next($request);
                break;
            case 2 :
                if($object >= $max[2]){
                    if ($request->segment(3)=="add") {
                        return redirect()->back();
                    }
                    session()->now($name, '<strong>'.$name.'</strong> limit has exceeded');
                    return $next($request);
                }
                return $next($request);
                break;
            
            default:
                return $next($request);
                break;
        }
    }
}
