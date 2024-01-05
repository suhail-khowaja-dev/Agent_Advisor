@extends('layouts.simple.master')
@section('title', 'Project List')
@section('title', 'Base Inputs')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dropzone.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Subcription</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Subcription </li>
<li class="breadcrumb-item active">links</li>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Create</h5>
            </div>
            {{-- <form class="form theme-form"> --}}
                <form class="form theme-form"id="" action="{{ route("Subcription_store") }}" enctype="multipart/form-data" method="post">
                    @csrf
                <div class="card-body">

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Email.*</label>
                                <input id="mail-email" name="email" class="form-control btn-square" id="exampleFormControlInput10" type="email" placeholder="email">
                                <img id="load-image" src="http://www.dabur.com/daburhonitus/images/preloader.gif" width="31" height="31" alt="Loading image" />
                                @error('email')
                                    <p class="help-block" style="color: red">
                                        {{ $errors->first('email') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>


                </div>
                <div class="card-footer">
                    <button id="mail-submit" class="btn btn-primary" type="submit">Submit</button>
                    {{-- <input class="btn btn-light" type="reset" value="Cancel"> --}}
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection




@section('script')

<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
<script src="{{asset('assets/js/dropzone/dropzone.js')}}"></script>
<script src="{{asset('assets/js/dropzone/dropzone-script.js')}}"></script>
<script src="{{asset('assets/js/typeahead/handlebars.js')}}"></script>
<script src="{{asset('assets/js/typeahead/typeahead.bundle.js')}}"></script>
<script src="{{asset('assets/js/typeahead/typeahead.custom.js')}}"></script>
<script src="{{asset('assets/js/typeahead-search/handlebars.js')}}"></script>
<script src="{{asset('assets/js/typeahead-search/typeahead-custom.js')}}"></script>

<script>
    $(document).ready(function(){
	$('#load-image').hide()
    $("form").submit(function(event){
        event.preventDefault();
		$('#load-image').show();
        var email =$("#mail-email").val();
        var submit =$("#mail-submit").val();
        $(".form-message").load("heads/contact.php",{
            email: email,
            submit: submit
        },function(){
			$('#load-image').hide();
			});
    });
});
</script>
@endsection
