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
        $company = '%'.$request->input('comp').'%';
        $resourceType = $request->input('rt');
        $contentType = $request->input('ct');
        $uploadDate = $request->input('dt');
        $view = $request->input('view');
        $download = $request->input('download');

        $query = Media::with('company')->where('status',1);

        if(!empty($keyword)){
            $query->where('title','like',$keyword);
            //->orWhere('keyword','like',$keyword);
        }
        if(!empty($contentCatagory)){
            $query->whereHas('catagory', function ($query) use($contentCatagory) {
                return $query->where('id', $contentCatagory);
            });
        }
        if(!empty($company)){
            $query->whereHas('company', function ($query) use($company) {
                return $query->where('name', 'like', $company);
            });
        }
        if(!empty($resourceType)){
            $query->where('type','=',$resourceType);
        }
        if(!empty($contentType)){
            $query->where('content_type','=',$contentType);
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
        $resource = $query->orderBy('id', 'DESC')->paginate(20);
        return view('resource',compact('resource'));
    }
    public function detail($companyId,$slug)
    {
        $resource = Media::where("company_id","=",$companyId)
        ->where("media.slug","=",$slug)
        ->firstOrFail();

        $resource->increment('view');
        $resource->timestamps = false;
        $resource->save();

        $relatedMedia = Media::where("company_id","=",$companyId)->limit(5)->get();
        if(Auth::check()){
            if (!DB::table('media_view')->where('user_id','=',Auth::user()->id)->where('media_id','=',$resource->id)->exists()) {
                


                DB::table('media_view')->insert([
                    'user_id' => Auth::user()->id,
                    'media_id' => $resource->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
        return view('detail-resource',compact('resource','relatedMedia'));

    }
    public function download($uuid)
    {
        //$uuid = "4bbde04f-2120-36ba-978d-0cb9a8914250";
        $resource = Media::where('uuid', $uuid)->firstOrFail();
        if(Auth::check()){
            if (!DB::table('media_download')->where('user_id','=',Auth::user()->id)->where('media_id','=',$resource->id)->exists()) {
                
                $resource->increment('download');
                $resource->timestamps = false;
                $resource->save();

                DB::table('media_download')->insert([
                    'user_id' => Auth::user()->id,
                    'media_id' => $resource->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
            $pathToFile = storage_path('app/' . $resource->file_name);
            return response()->download($pathToFile);
        }else {
            //return redirect('login')->intended($this->redirectPath());
        }


    }
}
