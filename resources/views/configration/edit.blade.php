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
<h3>Configuration</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Configuration </li>
<li class="breadcrumb-item active">links</li>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit</h5>
            </div>
            {{-- <form class="form theme-form"> --}}
                <form class="form theme-form" id="" action="{{ route("congfigrationUpdate",$edit_data->id ) }}" enctype="multipart/form-data" method="post">
                    @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Email Type.*</label>
                                <input name="email_type" class="form-control btn-square" value="{{ $edit_data->email_type }}"id="exampleFormControlInput10" type="text" placeholder="email type">
                                @error('email_type')
                                    <p class="help-block" style="color: red">
                                        {{ $errors->first('email_type') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Email one.*</label>
                                <input name="email_one" class="form-control btn-square" value="{{ $edit_data->email_one }}"id="exampleFormControlInput10" type="email" placeholder="email one">
                                @error('email_one')
                                    <p class="help-block" style="color: red">
                                        {{ $errors->first('email_one') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Email two.*</label>
                                <input name="email_two" class="form-control btn-square" value="{{ $edit_data->email_two }}"id="exampleFormControlInput10" type="email" placeholder="email two">
                                @error('email_two')
                                    <p class="help-block" style="color: red">
                                        {{ $errors->first('email_two') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Email three.*</label>
                                <input name="email_three" class="form-control btn-square" value="{{ $edit_data->email_three }}"id="exampleFormControlInput10" type="email" placeholder="email three">
                                @error('email_three')
                                    <p class="help-block" style="color: red">
                                        {{ $errors->first('email_three') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Contact.*</label>
                                <input name="contact" class="form-control btn-square" value="{{ $edit_data->contact }}" id="exampleFormControlInput10" type="number" placeholder="contact">
                                @error('contact')
                                    <p class="help-block" style="color: red">
                                        {{ $errors->first('contact') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Copyright.*</label>
                                <input name="copyright" class="form-control btn-square" value="{{ $edit_data->copyright }} "id="exampleFormControlInput10" type="text" placeholder="copyright">
                                @error('copyright')
                                    <p class="help-block" style="color: red">
                                        {{ $errors->first('copyright') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div> --}}


                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Update</button>
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
@endsection
