<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('here');
        $getCMS = Config::all();
        // dd( $getCMS);
        return view('configration.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('here');
        return view('configration.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'email_one' => "required|email|unique:Configs",
            // 'email_two' => "required|email|unique:Configs",
            // 'email_three' => "required|email|unique:Configs",
            'email_type' => "required|max:255",
            // 'contact' => "required|max:255",
        ]);

        $cms = new Config();
        $cms->email_type = $request->email_type;
        $cms->email_one = $request->email_one;
        // $cms->email_two = $request->email_two;
        // $cms->email_three = $request->email_three;
        // $cms->copyright = $request->copyright;
        // $cms->contact = $request->contact;
        $cms->save();
        $notification = array('message' =>'Your data Inserted Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('congfigration')->with($notification);
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
    public function edit($id)
    {
        // dd($id);
        $edit_data = Config::find($id);
        return view('configration.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'email_type' => "required|max:255",
            'email_one' => "required|email|unique:Configs",
            // 'email_two' => "required|email|unique:Configs",
            // 'email_three' => "required|email|unique:Configs",
            // 'copyright' => "required|max:255",
            // 'contact' => "required|max:255",
            // 'email' => "required|email|unique:users",
        ]);

        $cms = Config::findOrFail($id);
        $cms->email_type = $request->email_type;
        $cms->email_one = $request->email_one;
        // $cms->email_two = $request->email_two;
        // $cms->email_three = $request->email_three;
        // $cms->copyright = $request->copyright;
        // $cms->contact = $request->contact;
        $cms->save();
        $notification = array('message' =>'Your data updateed Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('congfigration')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Config::find($id)->delete();
        return redirect()->route('congfigration');
    }
}
