<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function content_Index()
    {
        // dd('here');
      $getCMS = PageContent::with('getPageName')->get();
        return view('page_content.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function content_create()
    {
        // dd('here');
        $page = Page::get();
        return view('page_content.create',compact('page'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function content_add(Request $request)
    {
        // return $request->all();

        // dd('here');
        // dd($request->all());
        // $this->validate($request, [
        //     'title' => "required|max:255",
        //     // 'description' => "required",
        // ]);

        $cms = new PageContent();
        // $cms->page_id = $request->page_id;
        $cms->contact_title = $request->contact_title;
        $cms->client_title = $request->client_title;
        $cms->profile_title = $request->profile_title;
        $cms->contact_description = $request->contact_description;
        $cms->client_description = $request->client_description;
        $cms->profile_description = $request->profile_description;
        if($image = $request->file("image")) {
            $imageName = date("Y-m-d") . '__' . time() . "__" . $image->getClientOriginalName();
            $image->move(public_path('storage/uploads/cms/'), $imageName);
            $cms->image = $imageName;
        }
        $cms->save();
        $notification = array('message' =>'Your data Inserted Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('content')->with($notification);
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
    public function content_edit($slug)
    {
         // dd($id);
         $page = Page::get();
         $edit_data = PageContent::where('slug',$slug)->first();
         if(empty($edit_data)){
            return view('errors.404');
         }else {
            return view('page_content.edit',get_defined_vars());
         }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function content_update(Request $request, $id)
    {
        $this->validate($request, [
            'client_title' => "required|",
            'contact_title' => "required|",
            'contact_description' => "required",
             'client_description' => "required",
            ]);
        $cms = PageContent::findOrFail($id);
        // $cms->page_id = $request->page_id;
        $cms->contact_title = $request->contact_title;
        $cms->client_title = $request->client_title;
        $cms->profile_title = $request->profile_title;
        $cms->contact_description = $request->contact_description;
        $cms->client_description = $request->client_description;
        $cms->profile_description = $request->profile_description;
        if($image = $request->file("image")) {
            $imageName = date("Y-m-d") . '__' . time() . "__" . $image->getClientOriginalName();
            $image->move(public_path('storage/uploads/cms/'), $imageName);
            $cms->image = $imageName;
        }

        $cms->save();
        $notification = array('message' =>'Your data Updated Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('content')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function content_destroy($id)
    {
        $cms = PageContent::find($id);
        Storage::delete('public/uploads/cms/'.$cms->image);
        $cms->delete();
        return redirect()->route('content');
    }


}
