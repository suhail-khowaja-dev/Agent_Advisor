@extends('layouts.errors.master')
@section('title', 'Error 404')

@section('css')
@endsection

@section('style')
@endsection


@section('content')
<div class="page-wrapper compact-wrapper" id="pageWrapper">
  <!-- error-404 start-->
  <div class="error-wrapper">
    <div class="container"><img class="img-100" src="{{asset('assets/images/other-images/sad.png')}}" alt="">
      <div class="error-heading">
        <h2 class="headline font-danger">404</h2>
      </div>
      <div class="col-md-8 offset-md-2">
        <p class="sub-content">The page you are attempting to reach is currently not available. This may be because the page does not exist or has been moved.</p>
      </div>
      @if (Auth::check())
      @if(Auth::user()->type  == 3 )
      <div><a class="btn btn-danger-gradien btn-lg" href="{{route('advisor')}}">BACK TO HOME PAGE</a></div>
      @elseif(Auth::user()->type  == 4 )
      <div><a class="btn btn-danger-gradien btn-lg" href="{{route('agent')}}">BACK TO HOME PAGE</a></div>
      @elseif(Auth::user()->type  == 1 )
      <div><a class="btn btn-danger-gradien btn-lg" href="{{route('index')}}">BACK TO DASHBOARD</a></div>
      @endif
      @else<div><a class="btn btn-danger-gradien btn-lg" href="{{route('agent_advisor')}}">BACK TO HOME PAGE</a></div>
      @endif
    </div>
  </div>
  <!-- error-404 end      -->
</div>
@endsection

@section('script')

@endsection
