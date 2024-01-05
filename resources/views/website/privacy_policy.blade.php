@extends('website.master.layout')
@section('title','Privacy Policy')
@section('content')

    <!-- <div class="mySection"> -->
    <!-- header -->
    <header>
        <div class="container">
            <div class="myhhedaer d-flex justify-content-between align-items-center">
                <!-- backArrow -->

                <div class="backIcon mybackIcon">
                    @if((Auth::user()->type == 3))
                        <a href="{{route('advisor')}}">
                    @elseif ((Auth::user()->type == 4))
                        <a href="{{route('agent')}}">
                    @endif
                        <img src="{{asset('frontend/images/1x/backIc.png')}}" alt="Back" width="100%" height="100%">
                    </a>
                </div>

                <div class="headerSection d-flex justify-content-end">
                    {{-- <div class="ballIcon">
                        <img src="{{asset('frontend/images/1x/notifacitionIcon.png')}}" alt="" width="100%" height="100%">
                    </div> --}}
                    <div class="profileInfo d-flex align-items-center">
                        <div class="userImage">
                            <img src="{{asset('frontend/images/1x/profileimage.png')}}" alt="profileImage" width="100%" height="100%">
                        </div>
                        <div class="userName">
                            <span>
                                Hi,
                            </span>
                            <label for="">
                                {{Auth::user()->name}}
                            </label>
                        </div>
                    </div>
                    <div class="profileDropdown">
                        <a href="{{route('Frontend_agent_advisor')}}">
                            <div id="triangle-up"></div>
                            <p>
                                Sign Out
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- privacy policy -->
    <section>
        <div class="container">
            <div class="privacyC">
                <div class="priheading">
                    <h5>
                       {{$privacy->title}}
                    </h5>
                </div>
                <div class="privacyPara">
                    <p>
                      {!!$privacy->content!!}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer class="">
        <div class="container">
            <div class="footer d-flex justify-content-between">
                <div class="copyWrite">
                    <p>{{$configuration->copyright ?? ''}} <br> DESIGNED AND DEVELOPED BY  <a href="https://designprosusa.com/" target="_blank">DESIGN PROS USA</a></p>
                </div>
                <div class="pricavy">
                    <a href="{{route('privacy-policy')}}">
                        <p>Privacy Policy</p>
                    </a>
                </div>
            </div>

        </div>
    </footer>
    <!-- </div> -->
@endsection
