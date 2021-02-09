<?php

namespace App\Http\Controllers\CompanyAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Project;
use App\ProjectPicture;
use App\Company;
use Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectCompany extends Controller
{
    public function showProject(Request $request)
    {
        $keyword = '%'.$request->input('kw').'%';
        $company_id = Auth::guard('admin-company')->user()->company_id;

        $query = Project::where('company_id',$company_id);
        
        if(!empty($keyword)){
            $query->where('title','like',$keyword);
            //->orWhere('keyword','like',$keyword);
        }

        $project = $query->paginate(5);
        return view('CompanyAdmin.project', compact('project'));
    }
    public function showAddProject()
    {
        $company_id = Auth::guard('admin-company')->user()->company_id;
        $product = \App\Product::where('company_id',$company_id)->get();
        return view('CompanyAdmin.add-project',compact('product'));
    }
    public function showEditProject($id)
    {
        $project = Project::where('id', $id)->firstOrFail();
        $company_id = Auth::guard('admin-company')->user()->company_id;
        $product = \App\Product::where('company_id',$company_id)->get();
        $picture = ProjectPicture::where('project_id', $project->id)->get();
        $location = \App\ProjectLocation::where("project_id","=",$id)->firstOrFail();

        $embed = explode("=", $project->embedvid);

        if ($project->company_id !== $company_id) {
            return redirect()->back();
        }
        return view('CompanyAdmin.edit-project',compact('project', 'product', 'location','embed', 'picture'));
    }
    public function addProject(Request $request)
    {
        $this->validate($request,[
            'title' => ['required', 'unique:projects', 'max:255', 'min:10'],
            'description' => 'required',
            'author' => 'required',
            'proj_city' => 'required',
            'photo.*' => 'image|max:3072'
        ]);

        $project = new Project;
        $project->title = $request->input('title');
        $project->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->input('title'))));
        $project->company_id = Auth::guard('admin-company')->user()->company_id;
        $project->photo = "public/project/defaultProduct.jpg";
        $project->author = $request->input('author');
        $project->topic = "";
        $project->product_id = "00";
        $project->location = "";
        $project->embedvid = $request->input('video');
        $project->description = $request->input('description');
        $project->save();

        \App\ProjectLocation::create([
            'project_id' => $project->id,
            'province' => $request->input('proj_province'),
            'city' => $request->input('proj_city'),
        ]);

        $i=0;
        if ($request->hasFile('photo') ) {
            foreach ($request->file('photo') as $file) {
                if ($file->isValid()) {
                    $image = $file;
                    $path = 'public/project/'.(string) Str::uuid().'.'.$image->extension();
                    $img = Image::make($image->path());
                    $img->fit(1000,700)->save('storage/app/'.$path);
                    $project->picture()->create([
                        'photo' => $path
                    ]);
                    if ($i == 0) {
                        $project->photo = $path;
                        $project->save(); 
                    }
                    $i++;
                }
            }  
        }

        $project->product()->sync($request->input('product'));

        return redirect('company-profile/project');
    }
    public function editProject(Request $request)
    {
        $this->validate($request,[
            'title' => ['required', 'unique:projects,title,'.$request->input('id'), 'max:255', 'min:10'],
            'description' => 'required',
            'author' => 'required',
            'proj_city' => 'required',
            'photo.*' => 'image|max:3072'
        ]);
        $project = Project::find($request->input('id'));

        $project->title = $request->input('title');
        $project->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->input('title'))));
        $project->company_id = Auth::guard('admin-company')->user()->company_id;
        $project->author = $request->input('author');
        $project->topic = "";
        $project->embedvid = $request->input('video');
        $project->product_id = "00";
        $project->location = "";
        $project->description = $request->input('description');
        $project->save();

        $location = \App\ProjectLocation::where("project_id","=",$request->input('id'));
        $location->update(array(
            "city" => $request->input('proj_city'), 
            "province" => $request->input('proj_province')
        ));

        $i=0;
        if ($request->hasFile('photo') ) {
            foreach ($request->file('photo') as $file) {
                if ($file->isValid()) {
                    $image = $file;
                    $path = 'public/project/'.(string) Str::uuid().'.'.$image->extension();
                    $img = Image::make($image->path());
                    $img->fit(1000)->save('storage/app/'.$path);
                    $project->picture()->create([
                        'photo' => $path
                    ]);
                    if ($i == 0) {
                        $project->photo = $path;
                        $project->save(); 
                    }
                    $i++;
                }
            }  
        }

        $project->product()->sync($request->input('product'));

        return redirect('company-profile/project');
    }
    public function deleteProject(Request $request)
    {
        $project = Project::find($request->input('id'));

        $company_id = Auth::guard('admin-company')->user()->company_id;
        if ($project->company_id !== $company_id) {
            return redirect('company-profile/project');
        }
        
        if ($project->photo !== "public/project/defaultProduct.jpg") {
            Storage::delete($project->photo);
        }

        $picture = ProjectPicture::select('photo')->where('project_id',$request->input('id'))->get();
        foreach($picture as $p){
            Storage::delete($p->photo);
        }
        $deletepic = ProjectPicture::where('project_id', $request->input('id'))->get();
        foreach ($deletepic as $del) {
            $del->delete();
        }
        $project->delete();
    }
        public function deletePicture(Request $request)
    {
        $picture = ProjectPicture::where('id', $request->input('id'));
        $picture->delete();
        return redirect()->back()->with(['success' => 'Your account information has been update']);

    }
        public function addPicture(Request $request)
    {
        $project = Project::find($request->input('id'));

        if ($request->hasFile('photo') ) {
            foreach ($request->file('photo') as $file) {
                if ($file->isValid()) {
                    $image = $file;
                    $imgpath = 'public/project/'.(string) Str::uuid().'.'.$image->extension();
                    $img = Image::make($image->path());
                    $img->save('storage/app/'.$imgpath);
                    $project->picture()->create([
                        'photo' => $imgpath
                    ]);
                }
            }  
        }

        return redirect()->back()->with(['success' => 'Your account information has been update']);

    }
}
