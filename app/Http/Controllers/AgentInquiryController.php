<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentInquiryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('here');
        $agentinquiry = Inquiry::where('type' , '4')->get();
        return view('agent_inquiry.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('here');
        return view('agent_inquiry.create');
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
            'name' => "required|max:255",
            'message' => "required|max:255",
            'contact' => "required|max:255",
            'email' => "required|email|unique:users",
            'type' => "required",
        ]);

        $cms = new User();
        $cms->name = $request->name;
        $cms->email = $request->email;
        $cms->contact = $request->contact;
        $cms->type = $request->type;
        $cms->message = $request->message;
        $cms->save();
        $notification = array('message' =>'Your data Inserted Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('agent-inquiry')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $detail = Inquiry::where('slug',$slug)->first();
        if(empty($detail)){
            return view('errors.404');
        }else {
            return view('agent_inquiry.detail',get_defined_vars());
        }
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
        return view('agent_inquiry.edit',get_defined_vars());
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
            'message' => "required|max:255",
            'contact' => "required|max:255",
            'email' => "required|email",

        ]);

        $cms = User::findOrFail($id);
        $cms->name = $request->name;
        $cms->email = $request->email;
        $cms->contact = $request->contact;
        $cms->message = $request->message;
        $cms->type = $request->type;
        $cms->save();
        $notification = array('message' =>'Your data updated Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('agent_inquiry')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
       $destroy =  User::where('slug',$slug)->first();
       $destroy->delete();
        return redirect()->route('agent-inquiry');
    }
}
