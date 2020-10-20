<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Quotation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function find(Request $request)
    {   
        $keyword = '%'.$request->input('kw').'%';
        $catagory = $request->input('cat');
        $company = $request->input('comp');
        $resourceType = $request->input('rt');
        $contentType = $request->input('ct');
        $uploadDate = $request->input('dt');
        $view = $request->input('view');
        $download = $request->input('download');

        $query = Product::where('name','like',$keyword);
        
        if(!empty($company)){
            $query->whereHas('company', function ($query) use($company) {
                return $query->where('name', 'like', $company);
            });
        }
        if(!empty($catagory)){
            $query->where('catagory_id','=',$catagory);
        }
        if(!empty($uploadDate)){
            if ($uploadDate==1) {
                $query->where(DB::raw("DATE(media.created_at)"),'=',date("Y-m-d"));    
            }else if($uploadDate==2){
                $query->where(DB::raw("WEEK(media.created_at)"),'=',date("W"));   
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
        if(!empty($download)){
            if ($download==1) {
                $query->orderBy('download', 'desc');    
            }else if($download==2){
                $query->orderBy('download', 'asc');  
            }
        }
        $product = $query->paginate(20);
       return view('product', compact('product'));

    }
    public function detail($companyId,$slug)
    {
        $product = Product::where('slug',$slug)->where('company_id',$companyId)->firstOrFail();
        $relatedProduct = Product::where("company_id","=",$companyId)->limit(5)->get();

        if(Auth::check()){
            if (!DB::table('product_view')->where('user_id','=',Auth::user()->id)->where('product_id','=',$product->id)->exists()) {
                Product::find($product->id)->increment('view');
                DB::table('product_view')->insert([
                    'user_id' => Auth::user()->id,
                    'product_id' => $product->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
        return view('detail-product', compact('product','relatedProduct'));
    }
    public function addQuotation(Request $request)
    {
        $this->validate($request, [
            'detail' => 'required|min:10',
            'company_id' => 'required',
            'file' => 'file|max:3072',
        ]);

        $path=null;
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $path = $request->file('file')->store('quotation');
        }

        $quotation =  new Quotation;
        $quotation->user_id = Auth::user()->id;
        $quotation->company_id = $request->input('company_id');
        $quotation->description = $request->input('detail');
        $quotation->additional = implode(',', $request->input('additional'));
        $quotation->file = $path;
        $quotation->save();

        return redirect()->back()->with(['success' => 'Quote/info sent successfully']);;
    }

}
