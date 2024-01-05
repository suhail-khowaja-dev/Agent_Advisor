<?php

namespace App\Http\Controllers;

use App\Models\cms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CmsController extends Controller
{
    public function projects_Index(){

        $getCMS = cms::all();
        // dd( $getCMS);
        return view('project.projects',get_defined_vars());

    }
    public function project_create(){

        // dd('here');
        return view('project.projectcreate');

    }
    public function project_add(Request $request){

        // dd('here');
        // dd($request->all());
        $this->validate($request, [
            'title' => "required|max:255",
            'image' => "required|max:255",
            'content' => "required",
        ]);

        $cms = new cms();
        $cms->title = $request->title;
        $cms->content = $request->content;
        if($image = $request->file("image")) {
            $imageName = date("Y-m-d") . '__' . time() . "__" . $image->getClientOriginalName();
            $image->move(public_path('storage/uploads/cms/'), $imageName);
            $cms->image = $imageName;
        }
        $cms->save();
        $notification = array('message' =>'Your data Inserted Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('projects')->with($notification);
    }
    public function project_edit($id){

        // dd($id);
        $edit_data = cms::find($id);
        return view('project.projectedit',get_defined_vars());

    }

    public function project_update(Request $request, $id){

        // dd($request->all());

        $cms = cms::findOrFail($id);
        $cms->title = $request->title;
        $cms->content = $request->content;
        // $cms->content_two = $request->content_two;

        if($image = $request->file("image")) {
            $imageName = date("Y-m-d") . '__' . time() . "__" . $image->getClientOriginalName();
            // $image->storeAs("public/uploads/cms", $imageName);
            $image->move(public_path('storage/uploads/cms/'), $imageName);
            $cms->image = $imageName;
        }

        $cms->save();
        $notification = array('message' =>'Your data Updated Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('projects')->with($notification);
        // return redirect()->route("projects")->with("message", "Your data has been Updated!");

    }

    public function project_destroy($id)
    {

        // dd($id);
        //$request->all();
        $cms = cms::find($id);
        Storage::delete('public/uploads/cms/'.$cms->image);
        $cms->delete();
        // $notification = array('message' =>'Your data has been Deleted' , 'alert-type'=>'error' );
        return redirect()->route('projects');

    }
}
