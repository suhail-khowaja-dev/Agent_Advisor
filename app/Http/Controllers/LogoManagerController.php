<?php

namespace App\Http\Controllers;

use App\Models\LogoManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogoManagerController extends Controller
{
    public function logo_Index(){

        // dd('hee');
        $getCMS = LogoManager::all();
        // dd( $getCMS);
        return view('logomanager.index',get_defined_vars());

    }
    public function logo_create(){

        // dd('here');
        return view('logomanager.create');

    }
    public function logo_add(Request $request){

        // dd('here');
        // dd($request->all());
        $this->validate($request, [
            'title' => "required|max:255",
            'image' => "required|max:255",
            // 'email' => "required|email|unique:users",
        ]);

        $cms = new LogoManager();
        $cms->title = $request->title;
        // $cms->content = $request->content;
        if($image = $request->file("image")) {
            $imageName = date("Y-m-d") . '__' . time() . "__" . $image->getClientOriginalName();
            // $image->storeAs("public/uploads/cms", $imageName);
            $image->move(public_path('storage/uploads/logo/'), $imageName);
            $cms->image = $imageName;
        }
        $cms->save();
        $notification = array('message' =>'Your data Inserted Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('logo')->with($notification);
        // return redirect()->route("projects")->with("message", "Your data has been saved!");
    }
    public function logo_edit($id){

        // dd($id);
        $edit_data = LogoManager::find($id);
        return view('logomanager.edit',get_defined_vars());

    }

    public function logo_update(Request $request, $id){

        // dd($request->all());
        $cms = LogoManager::findOrFail($id);
        $cms->title = $request->title;
        // $cms->content = $request->content;
        if($image = $request->file("image")) {
            $imageName = date("Y-m-d") . '__' . time() . "__" . $image->getClientOriginalName();
            $image->move(public_path('storage/uploads/logo/'), $imageName);
            $cms->image = $imageName;
        }
        $cms->save();
        $notification = array('message' =>'Your data Updated Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('logo')->with($notification);
        // return redirect()->route("projects")->with("message", "Your data has been Updated!");

    }

    public function logo_destroy($id)
    {
        // dd($id);
        //$request->all();
        $cms = LogoManager::find($id);
        Storage::delete('public/uploads/logo/'.$cms->image);
        $cms->delete();
        // $notification = array('message' =>'Your data has been Deleted' , 'alert-type'=>'error' );
        return redirect()->route('logo');

    }


}
