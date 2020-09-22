<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function find(Request $request)
    {   
        $keyword = '%'.$request->input('kw').'%';
        $catagory = $request->input('cat');

        $query = Product::where('name','like',$keyword);
        
        if(!empty($catagory)){
            $query->where('catagory_id','=',$catagory);
        }
        $product = $query->paginate(20);

        foreach ($product as $p){
            echo $p->name." <br>";
            echo $p->description." <br>";
            echo $p->catagory->name." <br>";
            echo $p->company->name." <br>";

            echo "<a href='".url("/product/$p->company_id/$p->slug")."'>tombol</a>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            
       }

    }
    public function detail($companyId,$slug)
    {
        $product = Product::where('slug',$slug)->where('company_id',$companyId)->firstOrFail();

        if(Auth::check()){
            if (!DB::table('media_view')->where('user_id','=',Auth::user()->id)->where('media_id','=',$product->id)->exists()) {
                Product::find($product->id)->increment('view');
                DB::table('media_view')->insert([
                    'user_id' => Auth::user()->id,
                    'product' => $product->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
        echo $product->name." <br>";
        echo $product->description." <br>";
        echo $product->catagory->name." <br>";
        echo $product->company->name." <br>";
    }
}
