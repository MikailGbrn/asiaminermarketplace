<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function show()
    {
        echo "test";
    }
    public function find(Request $request)
    {
        $keyword = '%'.$request->input('kw').'%';
        $contentCatagory = $request->input('cat');
        $company = $request->input('comp');
        $resourceType = $request->input('rt');
        $contentType = $request->input('ct');

        $query = Media::join('media_catagory', 'media_catagory_id', '=', 'media_catagory.id')
        ->join('companies', 'company_id', '=', 'companies.id')
        ->select('media.*', 'media_catagory.name as catagory', 'companies.name as company');

        if(!empty($keyword)){
            $query->where('title','like',$keyword);
        }
        if(!empty($contentCatagory)){
            $query->where('catagory','>=',$contentCatagory);
        }
        if(!empty($company)){
            $query->where('company','like',$company);
        }
        if(!empty($resourceType)){
            $query->where('type','=',$resourceType);
        }
        if(!empty($contentType)){
            $query->where('content_type','=',$contentType);
        }

        $resource = $query->paginate(20);
        
        foreach ($resource as $r) {
            echo $r->title."<br>";
            echo $r->author."<br>";
            echo $r->company."<br>";
            echo "<br>";
        }
        //return view('shop',compact('products'));
    }
}
