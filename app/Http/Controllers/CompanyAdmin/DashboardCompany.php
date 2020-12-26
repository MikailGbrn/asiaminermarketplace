<?php

namespace App\Http\Controllers\CompanyAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Company;
use App\Product;
use App\Quotation;
use Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardCompany extends Controller
{ 
    public function index()
    {
        $company_id = Auth::guard('admin-company')->user()->company_id;
        $company = Company::where('id', $company_id)->firstOrFail();
        return view('CompanyAdmin.dashboard', compact('company'));
    }
    public function showEditCompany()
    {
        $company_id = Auth::guard('admin-company')->user()->company_id;
        $company = Company::where('id', $company_id)->firstOrFail();
        return view('CompanyAdmin.edit-company', compact('company'));
    }
    public function showEditAccount()
    {
        $company_id = Auth::guard('admin-company')->user()->company_id;
        $company = Company::where('id', $company_id)->firstOrFail();
        return view('CompanyAdmin.account-setting',compact('company'));
    }
    public function EditAccount(Request $request)
    {
        $company_id = Auth::guard('admin-company')->user()->company_id;
        $this->validate($request,[
            'company_name' => ['required', 'unique:companies,name,'.$company_id, 'max:255', 'min:10'],
            'pic_name' => 'required',
            'pic_email' => 'required|email',
            'pic_phone' => 'required',
            'pic_phone_code' => 'required',
            'pic_username' => 'required|max:255'
        ]);
        $company = Company::find($company_id);
        $company->name = $request->input('company_name').", ".$request->input('comentity');
        $company->save();
        $company->admin->name = $request->input('pic_name');
        $company->admin->email = $request->input('pic_email');
        $company->admin->phone = '+'.$request->input('pic_phone_code').$request->input('pic_phone');
        $company->admin->username = $request->input('pic_username');
        $company->push();

        return redirect()->back()->with(['success' => 'Your account information has been update']);
    }
    public function changePassword(Request $request)
    {
        $company_id = Auth::guard('admin-company')->user()->company_id;
        $company = Company::find($company_id);
        $this->validate($request,[
            'new_password' => 'required|string|min:8|confirmed',
            'old_password' => 'required|string|min:8|confirmed',
        ]);
        if (Hash::check($request->input('old_password'), $company->admin->password)){
            $company->admin->password = $request->input('new_password');
            $company->push();
            return redirect()->back()->with(['success' => 'Your Password has been changed']);
        }else {
            return redirect()->back()->with(['error' => 'Your old password is wrong']);
        }
    }
    public function editCompany(Request $request)
    {
        $company_id = Auth::guard('admin-company')->user()->company_id;
        $company = Company::find($company_id);

        $path=$company->header;
        if ($request->hasFile('header') && $request->file('header')->isValid()) {
            if ($path !== "public/header/default.jpeg") {
                Storage::delete($path);
            }
            $image = $request->file('header');
            $path = 'public/header/'.(string) Str::uuid().'.'.$image->extension();
            $img = Image::make($image->path());
            $img->fit(1200,400)->save('storage/app/'.$path);
        }

        $path1=$company->logo;
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            if ($path1 !== "public/logo/default.jpg") {
                Storage::delete($path1);
            }
            $image1 = $request->file('logo');
            $path1 = 'public/logo/'.(string) Str::uuid().'.'.$image1->extension();
            $img1 = Image::make($image1->path());
            $img1->save('storage/app/'.$path1,60);
        }

        $company->logo = $path1;
        $company->header = $path;
        $company->description = $request->input('description');
        $company->website = $request->input('website');
        $company->business_hour = $request->input('business_hour');
        $company->email = $request->input('email');
        $company->phone = $request->input('phone');
        $company->save();

        return redirect('company-profile')->with(['success' => 'Edit company profile successfully']);
    }
    public function editAbout(Request $request)
    {
        $company_id = Auth::guard('admin-company')->user()->company_id;
        $company = Company::find($company_id);
        $company->about = $request->input('about');
        $company->save();
        return redirect()->back()->with(['success' => 'Edit about company successfully']);
    }
    public function showStatisticMedia(Request $request)
    {
        $keyword = '%'.$request->input('kw').'%';
        $company_id = Auth::guard('admin-company')->user()->company_id;

        $query = DB::table('media_download')->where('company_id','=',Auth::guard('admin-company')->user()->company_id)
        ->join('media', 'media.id', '=', 'media_download.media_id')
        ->join('users', 'users.id', '=', 'media_download.user_id');

        if(!empty($keyword)){
            $query->where('title','like',$keyword);
        }

        $mediadownload = $query->orderBy('media_download.created_at','DESC')->paginate(20);

        $query1 = DB::table('media_view')
        ->select(DB::raw('count(*) as count, MONTH(media_view.created_at) as bulan'))
        ->where('company_id','=',Auth::guard('admin-company')->user()->company_id)
        ->whereYear('media_view.created_at', date('Y'))
        ->join('media', 'media.id', '=', 'media_view.media_id');

        if(!empty($keyword)){
            $query1->where('title','like',$keyword);
        }

        $grafik = $query1->groupBy(DB::raw('MONTH(media_view.created_at)'))->get();
        $arrayGrafik = [0,0,0,0,0,0,0,0,0,0,0,0];
        foreach($grafik as $g){
            $arrayGrafik[$g->bulan-1]=$g->count;
        }

        return view('CompanyAdmin.media-statistic', compact('mediadownload','arrayGrafik'));
    }
    public function showStatisticProduct()
    {
        $company_id = Auth::guard('admin-company')->user()->company_id;
        $quotation = Quotation::with('user')->where('company_id',$company_id)->paginate(20);
        $product = Product::where('company_id',$company_id)->get();

        $query1 = DB::table('product_view')
        ->select(DB::raw('count(*) as count, MONTH(product_view.created_at) as bulan'))
        ->where('company_id', $company_id)
        ->whereYear('product_view.created_at', date('Y'))
        ->join('products', 'products.id', '=', 'product_view.product_id');

        if(!empty($keyword)){
            $query1->where('title','like',$keyword);
        }

        $grafik = $query1->groupBy(DB::raw('MONTH(product_view.created_at)'))->get();
        $arrayGrafik = [0,0,0,0,0,0,0,0,0,0,0,0];
        foreach($grafik as $g){
            $arrayGrafik[$g->bulan-1]=$g->count;
        }
        return view('CompanyAdmin.product-statistic', compact('quotation','arrayGrafik','product'));
    }
    public function download($id)
    {
        $company_id = Auth::guard('admin-company')->user()->company_id;
        $quotation = Quotation::with('user')
        ->where('company_id',$company_id)
        ->where('id',$id)->firstOrFail();
        $pathToFile = storage_path('app/' . $quotation->file);
        return response()->download($pathToFile);
    }
}
