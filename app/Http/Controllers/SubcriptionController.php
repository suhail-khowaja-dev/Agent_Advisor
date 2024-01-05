<?php

namespace App\Http\Controllers;

use App\Models\Subcription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SubcriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('here');
        $getCMS = Subcription::all();
        // dd( $getCMS);
        return view('Subcription.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('here');
        return view('Subcription.create');
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
        // session()->put('email', $request->email);

        $this->validate($request, [
            'copyright' => "required|",
        ]);

        $cms = new Subcription();
        $cms->copyright = $request->copyright;
        $cms->save();
        $token = sha1(uniqid(time(), true));
        // $emailToSend = $request->email;
        // Mail::send('Mail.subscription_mail', ['data' => route('Subcription', ['token' => $token])], function ($messages) use ($emailToSend) {
        //     $messages->to($emailToSend);
        //     $messages->subject('Subscription');
        // });
        $notification = array('message' =>'Your data Inserted Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('Configuration')->with($notification);

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
    public function edit($slug)
    {
        // dd($id);
        $edit_data = Subcription::where('slug',$slug)->first();
        if(empty($edit_data)){
            return view('errors.404');
        }else {
            return view('Subcription.edit',get_defined_vars());
        }
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
            'copyright' => "required|max:255",
        ]);
        $cms = Subcription::findOrFail($id);
        $cms->copyright = $request->copyright;
        $cms->slug = Str::slug($request->copyright,'-');
        $cms->save();
        $notification = array('message' =>'Your data updateed Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('Configuration')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        Subcription::find($id)->delete();
        return redirect()->route('Configuration');

    }


}
