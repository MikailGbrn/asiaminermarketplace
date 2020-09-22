<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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

        $query = Media::join('companies', 'company_id', '=', 'companies.id')
        ->select('media.*', 'companies.name as company');

        if(!empty($keyword)){
            $query->where('title','like',$keyword);
        }
        if(!empty($contentCatagory)){
            $query->whereHas('catagory', function ($query) use($contentCatagory) {
                return $query->where('id', $contentCatagory);
            });
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
            echo $r->slug."<br>";
            echo "<a href='".url("/resource/$r->company_id/$r->slug")."'>tombol</a>";
            echo "<br>";
        }
        //return view('shop',compact('products'));
    }
    public function detail($companyId,$slug)
    {
        $resource = Media::join('companies', 'company_id', '=', 'companies.id')
        ->select('media.*', 'companies.name as company')
        ->where("company_id","=",$companyId)
        ->where("media.slug","=",$slug)
        ->firstOrFail();

        if(Auth::check()){
            if (!DB::table('media_view')->where('user_id','=',Auth::user()->id)->where('media_id','=',$resource->id)->exists()) {
                Media::find($resource->id)->increment('view');
                DB::table('media_view')->insert([
                    'user_id' => Auth::user()->id,
                    'media_id' => $resource->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
        print_r($resource);
        echo "<br>";
        echo "<a href='".url("/download-resource/$resource->uuid")."'>tombol</a>";

    }
    public function download($uuid)
    {
        //$uuid = "4bbde04f-2120-36ba-978d-0cb9a8914250";
        $resource = Media::where('uuid', $uuid)->firstOrFail();
        if(Auth::check()){
            if (!DB::table('media_download')->where('user_id','=',Auth::user()->id)->where('media_id','=',$resource->id)->exists()) {
                Media::find($resource->id)->increment('download');
                DB::table('media_view')->insert([
                    'user_id' => Auth::user()->id,
                    'media_id' => $resource->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
            $pathToFile = storage_path('app/resource/' . $resource->file_name);
            return response()->download($pathToFile);
        }else {
            return redirect('login')->intended($this->redirectPath());
        }


    }
}
