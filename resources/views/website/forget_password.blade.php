@extends('website.master.layout')
@section('title','Forget Password')
@section('content')

@if(Session::has('forget'))
<script type="text/javascript">
    swal("Email Sent!", "{{Session::get('forget')}}", "success");
</script>
@elseif(Session::has('status'))
<script type="text/javascript">
    swal("Un Authorize!", "{{Session::get('status')}}", "error");
</script>
@endif
<style>
    #pageloader {
        background:rgb(129 129 129 / 17%);
        display: none;
        height: 100%;
        position: fixed;
        width: 100%;
        z-index: 9999;
        top: 0;
        left: 0;
    }

    #pageloader img {
        left: 50%;
        /* margin-left: -32px;
                margin-top: -32px; */
        position: absolute;
        top: 50%;
        transform: translate(-50%, -50%);
        filter: grayscale(1);
    }

    </style>
      <div id="pageloader">
        <img src="{{asset('frontend/images/1x/loader 1.gif') }}" alt="processing..." width="30px" height="30px" />
    </div>
<div class="conatiner">
    <div class="mainContianer mymainContainer">
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
                <div class="inputboxes mypricavypolicyInput">
                    <form method="POST" action="{{url('forget_email')}}" id="regiterForm">
                        @csrf
                    <div class="bcAinputBo">
                        <input type="text" placeholder="Email" name="email">
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

<script>

    $("#regiterForm").submit(function() {
        $("#pageloader").fadeIn();
    });
    </script>
@endsection
