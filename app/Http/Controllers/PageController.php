<?php

namespace App\Http\Controllers;

use App\Models\page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function page_Index(){

        // dd('hee');
        $getCMS = Page::all();
        // dd( $getCMS);
        return view('page_name.index',get_defined_vars());

    }
    public function page_create(){

        // dd('here');
        return view('page_name.create');

    }
    public function page_add(Request $request){

        // dd('here');
        // dd($request->all());
        $this->validate($request, [
            'title' => "required|max:255",
            // 'email' => "required|email|unique:users",
        ]);

        $cms = new Page();
        $cms->title = $request->title;
        $cms->save();
        $notification = array('message' =>'Your data Inserted Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('page')->with($notification);
        // return redirect()->route("projects")->with("message", "Your data has been saved!");
    }
    public function page_edit($id){

        // dd($id);
        $edit_data = Page::find($id);
        return view('page_name.edit',get_defined_vars());

    }

    public function page_update(Request $request, $id){

        // dd($request->all());
        $cms = Page::findOrFail($id);
        $cms->title = $request->title;
        $cms->save();
        $notification = array('message' =>'Your data Updated Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('page')->with($notification);
        // return redirect()->route("projects")->with("message", "Your data has been Updated!");

    }

    public function page_destroy($id)
    {
        // dd($id);
        //$request->all();
        $cms = Page::find($id);
        $cms->delete();
        // $notification = array('message' =>'Your data has been Deleted' , 'alert-type'=>'error' );
        return redirect()->route('page');

    }


}
