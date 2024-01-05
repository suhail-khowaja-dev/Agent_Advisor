<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\AdminNote;
use App\Models\Category;
use App\Models\City;
use App\Models\Inquiry;
use App\Models\Note;
use App\Models\PageContent;
use App\Models\PrivacyPolicy;
use App\Models\ReferClient;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subcription;
use App\Models\UpdateNote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\State;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Reference;
use phpDocumentor\Reflection\Types\Null_;
use Symfony\Component\HttpFoundation\Session\Session;

use function Ramsey\Uuid\v1;

class FrontendController extends Controller
{
    public function index() {
        if(Auth::check()){
            return back();
        }else {
            return view('website.index');
        }
    }
    public function becomeAgent(Request $request) {
        $states = State::get();
        // return $cities;
        return view('website.become_agent',get_defined_vars());
    }
    public function becomeagentProcess(Request $request){
        $this->validate($request, [
            'password' => "min:6|required_with:confirm_password|same:confirm_password",
            'subject' => "required|max:255",
            'city' => "required|max:255",
            'state' => "required",
            'phone_no' => "required|max:255",
            'email' => "required|email|unique:users",
            'name' => "required|unique:users",

        ]);
        // return $request[0]->getcity->city;
        // return $request->all();
        User::create([
            'status' => $request->status,
            'type' => $request->type,
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'location' => $request->city,
            'state' => $request->state,
            'subject' => $request->subject,
            'password' => Hash::make($request->password),
            'show_password' => $request->password,
            'slug' => Str::slug($request->name,'-'),
        ]);

     $data = [
        'name' => $request->name,
        'email' => $request->email,
        'phone_no' => $request->phone_no,
        // 'location' => $request->getcity->city,
        // 'state' => $request->getstate->state,
     ];
     $emailToSend = $request->email;
     Mail::send('website.agentmail.agent_email', ['data' => $data],
     function ($message) use ($emailToSend)
     {
         $message
         ->to($emailToSend, 'agent')->subject('Agent Request');
        });
        $emailToadmin = 'djoy62471@gmail.com';
     Mail::send('website.agentmail.new_user', ['data' => $data],
     function ($message) use ($emailToadmin)
     {
         $message
         ->to($emailToadmin, 'agent')->subject('Agent Request');
        });

        return back()->with('message','Your request is pending from admin side');
    }
    public function agentadvisorProcess(Request $request){
        // dd(Auth::check());
        $this->validate($request, [
            'password' => "required",
            'email' => "required",

        ]);
        // $credentials = $request->only('email', 'password','status');

        $credentials = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1,
        ]);

        if($credentials){
            if(Auth::check() && Auth::user()->type == 3 ){
                return redirect('advisor');
            }
        }

        if($credentials){
            if(Auth::check() && Auth::user()->type == 4){
                return redirect('agent');
            }
        }else {
            return back()->with('login','Invalid Credentials');
        }

        // if($credentials){
        //     if(Auth::check() && Auth::user()->type == 1){
        //         return redirect('dashboard/index');
        //     }else {
        //         return 'false';
        //     }
        // }else {
        //     $notification = array('message' => 'Invalid Credentials !', 'alert-type' => 'error');
        //     return back()->with($notification);
        // }

    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'password' => "required",
            'email' => "required",

        ]);

        $credentials = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1,
        ]);


        if ($credentials) {
            if (Auth::check() && Auth::user()->type == 1) {
                return redirect('dashboard/index');
            } else {
                return 'false';
            }
        } else {
            $notification = array('message' => 'Invalid Credentials !', 'alert-type' => 'error');
            return back()->with($notification);
        }
    }
    public function Frontendlogout(){
        Auth::logout();
        return redirect()->route('agent_advisor');
    }
    public function logout(){
        Auth::logout();
        return redirect('admin');
    }

    public function advisor(Request $request){
        $configuration = Subcription::first();
        $advisor_contact = PageContent::where('page_id','1')->first();
        $advisor_client = PageContent::Where('page_id','1')->first();
        $agents = User::where('type','4')->where('status','1')->get();
        $approved = ReferClient::where('user_id',Auth::id())->where('status','1')->with('get_agent')->get();
        // return $approved;
        $clients = ReferClient::where('user_id',Auth::id())->with('get_agent')->get();
        // return $clients;
        if(Auth::check() && Auth::user()->type == 3){
             return view('website.advisor',get_defined_vars());
        }else {
             return back()->with('authenticate','You are not allowed to access');
        }
    }
    public function advisordashboard() {
        if(Auth::check()){
            return redirect('advisor');
        }else {
             return back();
        }
    }
    public function referclients(Request $request){
        $location = State::get();
        $category = Category::get();
        $config = Subcription::first();
        $agents = User::where('type','4')->where('status','1')->get();
        if(Auth::check() && Auth::user()->type == 3){
        return view('website.refer_clients',compact('agents','config','category','location'));
        }else {
            return back();
        }
    }
    public function locationclients(Request $request){
        $samelocation = User::where('type','4')->where('status','1')->where('location',$request->id)->with('getcity')->get();
        // return $samelocation;
        if(count($samelocation) > 0)
        {
            return response()->json([
                'status' => 200,
                'clients'=> $samelocation
            ]);
        }else{
            return response()->json([
                'status' => 404,
            ]);
        }

    }
    public function reassign (Request $request){
        $reassign = User::where('type','4')->where('status','1')->where('location',$request->id)->with('getcity')->get();
        return $reassign;
        if(count($reassign) > 0)
        {
            return response()->json([
                'status' => 200,
                'agents'=>$reassign
            ]);
        }else{
            return response()->json([
                'status' => 404,
            ]);
        }
    }
    public function referclientProcess(Request $request){
        $this->validate($request, [
            'note' => "required|max:255",
            'purchase' => "required",
            'category' => "required|",
            'price' => "required|max:255",
            "email" => "required",
            'phone_number' => "required|max:255",
            'city' => "required|max:255",
            'state' => "required",
            'name' => "required|max:255",
        ]);
        $data = new ReferClient();
        $data->user_id = $request->user_id;
        $data->agent_id= $request->agent_id;
        $data->status = $request->status;
        $data->name = $request->name;
        $data->slug = Str::slug($request->name,'-');
        $data->location = $request->city;
        $data->state = $request->state;
        $data->phone_number = $request->phone_number;
        $data->email = $request->email;
        $data->price = $request->price;
        $data->category = $request->category;
        $data->note = $request->note;
        $data->purchase = $request->purchase;
        $data->save();
        if($request->agent_id != null){
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'price' => $request->price
            ];
                $agent = User::where('id',$request->agent_id)->first();
                // return $agent;
                $client =  $agent['email'] ?? '';
                // return $client;
                Mail::send('website.assign_agent_email.asign_agent', ['data' => $data],
                function ($message) use ($client)
                {
                    $message
                        ->to($client, 'agent')->subject('Agent Request');
                });
        }
          return redirect()->route('advisor')->with('client','Client Refered');

    }
    public function advisorcontact(){
        $configuration = Subcription::first();
        if(Auth::check() && Auth::user()->type == 3){
        return view('website.advisor_contact',compact('configuration'));
        }else {
            return back();
        }
    }
    public function agent(Request $request){
        $configuration = Subcription::first();
        $Contact_page = PageContent::where('page_id','2')->first();
        $Refer_page = PageContent::Where('page_id','2')->first();
        $profile = PageContent::Where('page_id','2')->first();
        $agent = ReferClient::where('agent_id' , Auth::id())->get();
        if(Auth::check() && Auth::user()->type == 4){
             return view('website.agent',get_defined_vars());
            }else {
                return back()->with('authenticate','You are not allowed to access');
        }
    }
    public function agentclients(){
        $configuration = Subcription::first();
        return view('website.agent_clients',compact('configuration'));
    }
    public function agentcontact(){
        $configuration = Subcription::first();
        if(Auth::check() && Auth::user()->type == 4){
        return view('website.agent_contact',get_defined_vars());
        }else {
            return back();
        }
    }
    public function contactprocess(Request $request){
        $this->validate($request, [
            'message' => "required|max:255",
            'phone' => "required|",
            'email' => "required|max:255",
            'name' => "required|max:255",
        ]);
          $data = $request->all();
          $random = Str::random(2);
          $data['slug'] = Str::slug($request->name.''.'-'.$random);
        Mail::send('website.contactmail.contact', ['data' => $data],
        function ($message) use ($data)
        {
            $emailfrom = Auth::user()->type;
            if($emailfrom == 4){
               $name = "Email from Agent";
            }
            $message
                ->to('djoy62471@gmail.com', 'admin')->subject($name);
        });
        $email_to = $request->email;
        Mail::send('website.contactmail.user_contact', ['data' => $data],
        function ($message) use ($email_to)
        {

            $message
                ->to($email_to)->subject('Contact');
        });
          Inquiry::create($data);
          return redirect()->route('agent')->with('contact','we have received your message');
        }
    public function contactprocessAdvisor(Request $request){
        $this->validate($request, [
            'message' => "required|max:255",
            'phone' => "required",
            'email' => "required|max:255",
            'name' => "required|max:255",
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($request->name.''.'-'.Str::random(2));
        Mail::send('website.contactmail.contact', ['data' => $data],
        function ($message) use ($data)
        {
            $emailfrom = Auth::user()->type;
            if($emailfrom == 3){
               $name = "Email from Advisor";
            }
            $message
                ->to('fredaston49@gmail.com', 'admin')->subject($name);
        });
        Inquiry::create($data);
        return redirect()->route('advisor')->with('advisorcontact','we have received your message');
  }
    public function agentprofile(){
        $configuration = Subcription::first();
        if(Auth::check()  && Auth::user()->type == 4){
            return view('website.agent_profile',compact('configuration'));
            }else {
            return back();
        }
    }
    public function forgetpassword(){
        return view('website.forget_password');
    }
    public function privacypolicy(){
        $configuration = Subcription::first();
        $privacy = PrivacyPolicy::first();
        return view('website.privacy_policy',get_defined_vars());
    }

    public function advisordetails(Request $request,$id){
        $getslug = ReferClient::where('slug',$id)->first();
        if(empty($getslug)){
            return view('errors.404');
        }
        $id = $getslug->id;
        // return $id;
        $admin_note = AdminNote::where('page_id','2')->first();
        $configuration = Subcription::first();
        $status = Note::where('client_id',$id)->first();
        $advisordetails = ReferClient::where('id',$id)->first();
        if(Auth::check()  && Auth::user()->type == 4){
        return view('website.advisor_details',get_defined_vars());
        }else {
            return back();
        }
    }

    public function get_client(Request $request){

        $client = UpdateNote::where('client_id',$request->client_id)->where('status_id',$request->status_id)->first();
        return response()->json([
            'client_detail' => $client != '' ? $client : '',
        ]);
    }

    public function updateStatus(Request $request,$id)
    {

        $agent = ReferClient::find($id);

        // return $actual;
        // $actual->save();
        // $agent->get_agent->name;
        if($agent->terms == 1){
            $agent->status = "1";
        }
        $refer = $agent->price*0.25;
        $actual = $agent->price-$refer;
        $agent->after_refer_price = round($actual);
        $data =  $agent;
        // $data->get_agent->name;
        Mail::send('website.declinemail.accept_agent', ['data' => $data],
        function ($message) use ($data)
        {
            $emailfrom = Auth::user()->email;
            $emailto = $data->getemail->email;
            if($emailfrom == 3){
               $name = "Email from Agent";
            }
            $message
                ->to($emailto, 'advisor')->subject('Job Accepted');
        });
        $agent->update();
        return back()->with('status','Status Updated Successfully');

    }

        public function termscondition($id){
            $accept = ReferClient::find($id);
            $accept->terms = 1;
            $accept->save();
            return response()->json([
                'status' => 200,
                'accept' => $accept,
            ]);

        }
        public function termsconditionget($id){
            $accept = ReferClient::find($id);
            return response()->json([
                'status' => 200,
                'accept' => $accept->terms,
            ]);

        }
    public function declinetatus(Request $request, $id)
    {
        $agent = ReferClient::find($id);
        $agent->status = '2';
        $data =  $agent;
        // $agentdetail = $data->getagentdetail;
        // return $agentname;
        Mail::send('website.declinemail.decline_agent', ['data' => $data],
        function ($message) use ($data)
        {
            $emailfrom = Auth::user()->email;
            $emailto = $data->getemail->email;
            if($emailfrom == 3){
               $name = "Email from Agent";
            }
            $message
                ->to($emailto, 'advisor')->subject('Job Declined');
        });
        $agent->update();
        return back()->with('status','Status Updated Successfully');
    }


    public function agentdetails(Request $request,$slug){
        $configuration = Subcription::first();
        $admin_note = AdminNote::where('page_id','1')->first();
        $details = ReferClient::where('slug',$slug)->with('get_notes')->first();
        if(empty($details)){
            return view('errors.404');
        }
        // return $details->get_notes[0]->meeting;
        return view('website.agent_details',compact('details','admin_note','configuration'));

    }

    public function editadvisor(Request $request,$id){;
        $category = Category::get();
        $location = State::get();
        $user = ReferClient::where('slug',$request->slug)->first();
        if(empty($user)){
            return view('errors.404');
        }
        // return $user;
        $agents = User::where('type','4')->where('status','1')->get();
        $config = Subcription::first();
        $advisor = ReferClient::where('slug',$request->slug)->first();
        // return $advisor;
        // return $user->location;
        if(Auth::check()  && Auth::user()->type == 3){
        return view('website.edit_advisor',get_defined_vars());
        }else {
            return back();
        }
    }
    public function advisorupdate(Request $request,$id){
        $this->validate($request, [
            'note' => "required|max:255",
            'purchase' => "required",
            'category' => "required|",
            'price' => "required|max:255",
            "email" => "required",
            'phone_number' => "required|max:255",
            'city' => "required|max:255",
            'state' => "required",
            'name' => "required|max:255",
        ]);
        $advisor =  ReferClient::findOrFail($id);
        // return $advisor;
        // $advisor->agent_id = $request->agent_id;
        $advisor->name = $request->name;
        if($advisor->status == 2){
        $advisor->status ==  NULL;
        }else {
            $advisor->status == '1';
        }
        $advisor->location = $request->city;
        $advisor->state = $request->state;
        $advisor->phone_number = $request->phone_number;
        $advisor->email = $request->email;
        $advisor->slug = Str::slug($request->name,'-');
        $advisor->price = $request->price;
        $advisor->note = $request->note;
        $advisor->purchase = $request->purchase;
        $advisor->category = $request->category;
        $advisor->save();
        return redirect()->route('advisor')->with('updated','Agent Assign Updated Successfully');

    }
    public function agentreasign(Request $request){
        $client = ReferClient::find($request->client_id);
        // return $request->all();
        $client->agent_id = $request->agent_id;
        $client->status = NULL;
        if( $request->agent_id == NULL) {
            $notification = array('message' =>'Please Select an Agent' , 'alert-type'=>'error' );
            return back()->with($notification);
        }else {
         $client->save();
        $data = [
            'name' =>  $client->name,
            'email' => $client->email,
            'price' => $client->price
         ];
            $agent = User::where('id',$request->agent_id)->first();
            //  return  $agent;
                 $client =  $agent['email'];
            Mail::send('website.assign_agent_email.asign_agent', ['data' => $data,],
            function ($message) use ($client)
            {
                $message
                    ->to($client, 'agent')->subject('Agent Request');

            });
        }
        return back()->with('update','Agent Updated Successfully',compact('client'));
    }

    public function agentdelete($id){
        $agent = ReferClient::find($id);
        $agent->delete();
        return redirect()->route('advisor')->with('delete','Client Deleted Successfully');
    }

    //profile Edit
    public function editAgentprofile(Request $request, $slug){
        $configuration = Subcription::first();
        $state = State::get();
        $profile = User::where('slug',$slug)->first();
        if(empty($profile)){
            return view('errors.404');
        }else {
            return view('website.agent_profile',compact('profile','configuration','state'));
        }
    }
    public function profileUpdate(Request $request, $id){
        $this->validate($request, [
            'brokerage' => "required|max:255",
            'experience' => "required|max:255",
            'bio' => "required|max:255",
            'state' => "required",
            'city' => "required",
            'last_name' => "required|max:50",
            'first_name' => "required|max:50",
        ]);
        $profile = User::findOrfail($id);
        $profile->name = $request['first_name'].' '. $request['last_name'];
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->location = $request->city;
        $profile->state = $request->state;
        $profile->bio = $request->bio;
        $profile->experience = $request->experience;
        $profile->brokerage = $request->brokerage;
        $profile->slug = Str::slug($request['first_name'].' '. $request['last_name'],'-');
        $profile->save();
        return redirect()->route('agent')->with('profile','Profile Updated Successfully');
    }
    //forget password
    public function forgetpasswordProces(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $user_check = User::where('email', $request->email)->first();
        // return $user_check->name;
        if ($user_check->status == 0) {
            return back()->with('status', 'Your account is not activated.');
        }else {
            $token = Str::random(64);
            DB::table('password_resets')->insert(
                ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
            );
            // $email = Auth::check();
            // return $email;
            $data = [
                'name' => $user_check->name,
                'email' => $request->email
            ];
            // return $data;
            $emailToSend = $request->email;
            Mail::send('website.forgetemail.reset', ['token' => $token,'data' => $data],
            function ($message) use ($emailToSend)
            {
                $message
                    ->to($emailToSend)->subject('Reset Password');
                $message->from('fredaston49@gmail.com','Agent Advisor');
            });
            return redirect()->route('forget_password')->with('forget','We have emailed you password reset link');
        }
    }
    public function getPassword($token){
        return view('website.update_password',['token' => $token]);
    }
    public function updatepassword(Request $request){
        $request->validate([
            'password_confirmation' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'email' => 'required|email|exists:users',
        ]);

        $updatePassword = DB::table('password_resets')
        ->where(['email' => $request->email, 'token' => $request->token])
        ->first();

        if(!$updatePassword)
        // return redirect()->back()->with('unauthorize','You are not allowed to update');
        return back()->with('token', 'Invalid token!');

        $user = User::where('email', $request->email)
        ->update(['password' => Hash::make($request->password),'show_password' => $request->password]);
        DB::table('password_resets')->where(['email'=> $request->email])->delete();
        return redirect()->route('agent_advisor')->with('passwordchange','Password Updated Successfully');

    }

    public function statusupdate(Request $request ,$id){
        $this->validate($request, [
            'contact_established' => "required",
            'meeting' => "required",
            'contract' => "required",
            'address' => "required",
            'sale_price' => "required",
            'closed' => "required",

        ]);
        $status = $request->all();
        // $status['slug'] = Str::slug($request->name,'-');
        $status_update = Note::where('client_id',$request->client_id)->first();
        if($status_update){
            $status_update  = Note::where('client_id',$request->client_id)->update([
            'contact_established'=>$request->contact_established,
            'meeting'=>$request->meeting,
            'contract'=>$request->contract,
            'address'=>$request->address,
            'sale_price'=>$request->sale_price,
            'closed'=>$request->closed,
            // 'slug'=>$request->slug,
           ]);
        }else {
            Note::create($status);
        }
        return redirect()->back()->with('status','Status Updated Successfully');
    }
    public function notes(Request $request,$id = null){
        $this->validate($request, [
            'notes' => "required",

        ]);
        $note = UpdateNote::where('client_id',$request->client_id)->where('status_id',$request->status_id)->first();
        if($note){
            $note = UpdateNote::where('client_id',$request->client_id)->where('status_id',$request->status_id)->update(['notes' => $request->notes]);
        }else {
                $client = $request->all();
                UpdateNote::create($client);
                return response()->json([
                    'status' => 200,
                    'text'=> 'Note Added Successfully'
                ]);
        }
         return redirect()->back()->with('note','Note  Added Successfully');
    }

    //state dependent drop down functions
    public function statelocation(Request $request){
        $statelocation = City::where('state_id',$request->id)->get();
        if(count($statelocation) > 0)
        {
            return response()->json([
                'status' => 200,
                'clients'=> $statelocation
            ]);
        }else{
            return response()->json([
                'status' => 404,
            ]);
        }
    }

}
