<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Product;
use App\PCategory;
use App\ProductPicture;
use App\Quotation;
use App\Company;
use App\Mail\MailAddQuotation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function find(Request $request)
    {   
        $keyword = '%'.$request->input('kw').'%';
        $catagory = $request->input('cat');
        $company = '%'.$request->input('comp').'%';
        $resourceType = $request->input('rt');
        $contentType = $request->input('ct');
        $uploadDate = $request->input('dt');
        $view = $request->input('view');

        $query = Product::select("products.*", "companies.subscription")->where('products.name','like',$keyword)->where('products.status',1)->join('companies','company_id','=','companies.id');
        
        if(!empty($company)){
            $query->whereHas('company', function ($query) use($company) {
                return $query->where('name', 'like', $company);
            });
        }
        if(!empty($catagory)){
            $query->whereHas('company', function ($query) use($catagory) {
                return $query->where('catagory_id', '=', $catagory);
            });
        }

        if(!empty($uploadDate)){
            if ($uploadDate==1) {
                $query->where(DB::raw("DATE(products.created_at)"),'=',date("Y-m-d"));    
            }else if($uploadDate==2){
                $query->where(DB::raw("WEEK(products.created_at)"),'=',date("W"));   
            }
            else if($uploadDate==3){
                $query->latest();  
            }
            else if($uploadDate==4){
                $query->oldest();  
            }
        }
        if(!empty($view)){
            if ($view==1) {
                $query->orderBy('view', 'desc');
            }else if($view==2){
                $query->orderBy('view', 'asc');   
            }
        }
   
        $product = $query->orderBy('companies.subscription', 'DESC')->orderBy('products.id', 'DESC')->paginate(20);
        $catagory = \App\CCatagory::all();
       return view('product', compact('product','catagory'));

    }
    public function detail($companyId,$slug)
    {
        $product = Product::where('slug',$slug)->where('company_id',$companyId)->where('status',1)->firstOrFail();
        $relatedProduct = Product::where("company_id","=",$companyId)->limit(5)->get();
        $projectid = DB::table('product_project')->where('product_id',$product->id)->get();
        $picture = ProductPicture::where('product_id', $product->id)->get();

        foreach ($projectid as $pid) {
        $query = \App\Project::where('id',"=",$pid->project_id);
        }

        if (!empty($query)) {
        $relatedProject = $query->get();
        }else {
            $relatedProject = "";
        }

        $product->increment('view');
        $product->timestamps = false;
        $product->save();

        if(Auth::check()){
            if (!DB::table('product_view')->where('user_id','=',Auth::user()->id)->where('product_id','=',$product->id)->exists()) {
                // Product::find($product->id)->increment('view');
                DB::table('product_view')->insert([
                    'user_id' => Auth::user()->id,
                    'product_id' => $product->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

        if (!empty($product->embedvid)) {
        $embed = explode("=", $product->embedvid);
        }else {
        $embed = array('0' => 1, '1' => 1 );
        }

        return view('detail-product', compact('product','relatedProduct','relatedProject', 'embed', 'picture'));
    }
    public function addQuotation(Request $request)
    {
        $this->validate($request, [
            'detail' => 'required|min:10|max:140',
            'company_id' => 'required',
            'file' => 'file|max:3072',
            'additional' => 'required',
        ]);

        $path=null;
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $path = $request->file('file')->store('quotation');
        }

        $quotation =  new Quotation;
        $quotation->user_id = Auth::user()->id;
        $quotation->company_id = $request->input('company_id');
        $quotation->product_id = $request->input('product_id');
        $quotation->description = $request->input('detail');
        $quotation->additional = implode(',', $request->input('additional'));
        $quotation->file = $path;
        $quotation->save();

        $data = [
            "description" =>  $request->input('detail'),
            "additional" => implode(', ', $request->input('additional')),
            "product" => Product::find($request->input('product_id')),          
        ];
        $company = Company::find($request->input('company_id'));
        Mail::to($company->admin->email)->send(new MailAddQuotation($data));

        return redirect()->back()->with(['success' => 'Quote/info sent successfully']);
    }

}
