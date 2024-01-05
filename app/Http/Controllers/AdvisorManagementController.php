<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdvisorManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  dd('here');
         $getCMS = User::where('type', '3')->get();
         return view('advisor.index',get_defined_vars());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('here');
        $location = State::get();
        return view('advisor.create',get_defined_vars());

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
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'subject' => "required",
            'city' => "required",
            'state' => "required",
            'phone_no' => "required",
            'email' => "required|email|unique:users",
            'name' => "required|unique:users",

        ]);
        // dd('here');
        $cms = new User();
        $cms->name = $request->name;
        $cms->slug = Str::slug($request->name,'-');
        $cms->email = $request->email;
        $cms->type = $request->type;
        $cms->phone_no = $request->phone_no;
        $cms->location = $request->city;
        $cms->state = $request->state;
        $cms->subject = $request->subject;
        $cms->status = $request->status;
        $cms->show_password = $request->password;
        $cms->password = Hash::make($request->password);
        $cms->save();
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ];
        $emailToSend = $request->email;
        Mail::send('website.advisormail.credentials', ['data' => $data],
        function ($message) use ($emailToSend)
        {
            $message
                ->to($emailToSend,)->subject('Credentials');
        });
        $notification = array('message' =>'Your data Inserted Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('advisor-management')->with($notification);

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
         $location = State::get();
         $edit_data = User::where('slug',$slug)->first();
         if(empty($edit_data)){
            return view('errors.404');
         }else {
            return view('advisor.edit',get_defined_vars());
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
            'password' => 'same:confirm_password',
            'subject' => "required",
            'city' => "required",
            'state' => "required",
            'phone_no' => "required",
            'email' => "required",
            'name' => "required|max:255",

        ]);
        // return $request->all();
        $cms = User::findOrFail($id);
        $cms->phone_no = $request->phone_no;
        $cms->location = $request->city;
        $cms->state = $request->state;
        $cms->subject = $request->subject;
        $cms->name = $request->name;
        $cms->slug = Str::slug($request->name,'-');
        $cms->email = $request->email;
        $cms->type = $request->type;
        if($request->password == ''){
            $cms->show_password = $request->show_password;
        }else {
            $cms->show_password = $request->password;
            $cms->password = Hash::make($request->password);
        }
        $cms->save();
        // $cms->show_password = $request->password;
        // if($request->password == ''){
        //     $cms->password = $request->prevpassword;
        //     }else {
        //     $cms->password = Hash::make($request->password);
        // }

        // if($request->password){
        //     $data = [
        //         'email' => $request->email,
        //         'password' => $request->password
        //     ];
        // }else {
        //     $data = [
        //         'email' => $request->email,
        //         'password' => $request->show_password
        //     ];
        // }

        // $emailToSend = $request->email;
        // Mail::send('website.advisormail.credentials', ['data' => $data],
        // function ($message) use ($emailToSend)
        // {
        //     $message
        //         ->to($emailToSend)->subject('Credentials');
        // });
        $notification = array('message' =>'Your data Updated Successfully' , 'alert-type'=>'success' );
        return redirect()->route('advisor-management')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $cms = User::where('slug',$slug)->first();
        Storage::delete('public/uploads/cms/'.$cms->image);
        $cms->delete();
        return redirect()->route('advisor-management');
    }
    public function advisor_status(Request $request,$id)
    {
        // return "status";
        $agent_status = User::find($id);
        $newStatus = ($agent_status->status == 0) ? 1 : 0;
        $agent_status->update([
            'status' => $newStatus
        ]);
        if($newStatus == 1){
            $user = User::where('id',$id)->first();
            $data = [
                'name' => $request->name,
                'email' => $user->email,
                'password' => $user->show_password
            ];
            $emailToSend = $user->email;
            Mail::send('website.advisormail.credentials', ['data' => $data],
            function ($message) use ($emailToSend)
            {
                $message
                    ->to($emailToSend)->subject('Credentials');
            });
        }
        // return $schedule_status;
        $notification = array('message' =>'Advisor Status Changed Successfully' , 'alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }
}
