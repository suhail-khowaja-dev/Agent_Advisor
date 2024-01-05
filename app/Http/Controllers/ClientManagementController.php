<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Models\ReferClient;

class ClientManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  dd('here');
         $getCMS = ReferClient::get();
        //  return   $getCMS;
         return view('client.index',get_defined_vars());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('here');
        return view('client.create');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('here');
        // dd($request->all());
        $this->validate($request, [
            'name' => "required|max:255",
            'email' => "required|email|unique:users",
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',

        ]);
        // dd('here');
        $cms = new User();
        $cms->name = $request->name;
        $cms->email = $request->email;
        $cms->type = $request->type;
        $cms->password = Hash::make($request->password);
        $cms->save();
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $emailToSend = $request->email;
        Mail::send('website.advisormail.credentials', ['data' => $data],
        function ($message) use ($emailToSend)
        {
            $message
                ->to($emailToSend, 'elbiheiry')->subject('Credentials');
        });
        $notification = array('message' =>'Your data Inserted Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('advisor_management')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $details = ReferClient::where('id',$id)->with('get_notes')->first();
        return view('client.show',get_defined_vars());

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
         $edit_data = User::find($id);
         return view('advisor.edit',get_defined_vars());
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
            'name' => "required|max:255",
            // 'image' => "required|",
            'email' => "required",
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',

        ]);

        $cms = User::findOrFail($id);
        $cms->phone_no = $request->phone_no;
        $cms->location = $request->location;
        $cms->subject = $request->subject;
        $cms->name = $request->name;
        $cms->email = $request->email;
        $cms->type = $request->type;
        $cms->password = Hash::make($request->password);
        $cms->save();
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $emailToSend = $request->email;
        Mail::send('website.advisormail.credentials', ['data' => $data],
        function ($message) use ($emailToSend)
        {
            $message
                ->to($emailToSend, 'elbiheiry')->subject('Credentials');
        });
        $notification = array('message' =>'Your data Inserted Successfully' , 'alert-type'=>'success' );
        return redirect()->route('advisor_management')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cms = User::find($id);
        Storage::delete('public/uploads/cms/'.$cms->image);
        $cms->delete();
        return redirect()->route('advisor_management');
    }

}
