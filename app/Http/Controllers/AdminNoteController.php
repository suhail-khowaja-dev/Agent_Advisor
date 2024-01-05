<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\AdminNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function note_Index()
    {
        // dd('here');
        $page = Page::first();
        $getCMS = AdminNote::with('getNotName')->get();
        return view('note.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function note_create()
    {
        // dd('here');
        $page = Page::get();
        return view('note.create',compact('page'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function note_add(Request $request)
    {
        // return $request->all();

        // dd('here');
        // dd($request->all());
        // $this->validate($request, [
        //     'title' => "required|max:255",
        //     // 'description' => "required",
        // ]);

        $cms = new AdminNote();
        $cms->page_id = $request->page_id;
        $cms->note_description = $request->note_description;
        $cms->save();
        $notification = array('message' =>'Your data Inserted Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('note')->with($notification);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function note_edit($slug)
    {
         // dd($id);
         $page = Page::get();
         $edit_data = AdminNote::where('slug',$slug)->first();
         if(empty($edit_data)){
            return view('errors.404');
         }else {
            return view('note.edit',get_defined_vars());
         }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function note_update(Request $request, $id)
    {
        $this->validate($request, [
            'note_description' => "required|",
             ]);
        $cms = AdminNote::findOrFail($id);
        // $cms->page_id = $request->page_id;
        $cms->	note_description = $request->note_description;
        $cms->save();
        $notification = array('message' =>'Your data Updated Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('note')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function note_destroy($id)
    {
        $cms = AdminNote::find($id);
        $cms->delete();
        return redirect()->route('note');
    }

}
