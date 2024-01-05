@extends('website.master.layout')
@section('title','Forget Password')

@section('content')
<style>
    .myPasswordBox {
        margin-top: 8.5rem !important;
    }
</style>
@if (Session::has('authorize'))
<script type="text/javascript">
    swal("Un Authorize!", "{{ Session::get('authorize') }}", "error");
</script>
@elseif (Session::has('token'))
<script type="text/javascript">
    swal("Invalid!", "{{ Session::get('token') }}", "error");
</script>
@endif
<div class="conatiner">
    <div class="mainContianer mymainContainer ">
        <div class="paddingContainer">

            <div class=" myinfocontianer">
                <div class="infoheading d-flex">
                    <div class="backIcon">
                        <a href="{{route('agent_advisor')}}">
                            <img src="{{asset('frontend/images/1x/backIc.png')}}" alt="Back" width="100%" height="100%">
                        </a>
                    </div>
                    <p>
                        Forgot Password
                    </p>
                </div>
                <div class="profileImage">
                    <!-- <img src="./assets/images/1x/profileimage.png" alt="profileImage" width="150px" height="100%"> -->
                </div>
                <div class="inputboxes mypricavypolicyInput myPasswordBox">
                    <!-- <div class="bcAinputBo">
                        <input type="text" placeholder="Name">
                    </div> -->
                    <form method="POST" action="{{url('update_password')}}">
                        @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="bcAinputBo">
                        <input type="email" name="email" placeholder="Enter Email"  value="{{old('email')}}">
                    </div>
                    <div class="bcAinputBo">
                        <input type="password" name="password" placeholder="Enter New Password" name="password" value="{{old('password')}}">
                    </div>
                    <div class="bcAinputBo">
                        <input type="password" name="password_confirmation" placeholder="Enter Confirm Password" >
                    </div>
                    <div class="signinbtn">
                            <button type="submit">
                                Send
                            </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
