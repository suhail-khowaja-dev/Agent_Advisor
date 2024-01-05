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
<h3>Page Content</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Page Content  </li>
<li class="breadcrumb-item active">list</li>
@endsection

@section('content')
<style>
    .page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper {
    height: 100% !important;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit</h5>

            </div>
            {{-- <form class="form theme-form"> --}}
                <form class="form theme-form"id="" action="{{ route("contentUpdate",$edit_data->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                {{-- <div class="mb-3">
                                    <label for="exampleFormControlInput10">Page Name.*</label>
                                    <div class="statusDropDown">
                                        <select name="page_id" id="page_id" class="form-control btn-square">
                                            @foreach($page as $item)
                                            <option value="{{$item->id}}"  {{$item->id == $edit_data->id ? 'selected' : '' }} >{{$item->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                     @error('name')
                                        <p class="help-block" style="color: red">
                                            {{ $errors->first('name') }}
                                        </p>
                                    @enderror
                                </div> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput10">Contact Title.*</label>
                                    <input name="contact_title" value="{{$edit_data->contact_title}}" class="form-control btn-square"  id="exampleFormControlInput10" type="text" placeholder="Title">
                                    @error('title')
                                        <p class="help-block" style="color: red">
                                            {{ $errors->first('title') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput10">Refer Client Title.*</label>
                                    <input name="client_title"  value="{{$edit_data->client_title}}" class="form-control btn-square"  id="exampleFormControlInput10" type="text" placeholder="Title">
                                    @error('title')
                                        <p class="help-block" style="color: red">
                                            {{ $errors->first('title') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @if($edit_data->id =='2')
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput10">Profile Title.*</label>
                                    <input name="profile_title" value="{{$edit_data->profile_title}}"  class="form-control btn-square"  id="exampleFormControlInput10" type="text" placeholder="Title">
                                    @error('title')
                                        <p class="help-block" style="color: red">
                                            {{ $errors->first('title') }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @endif
                        {{-- <div class="row">
                            <div class="col">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Upload File.*</label>
                                    <div class="col-sm-9">
                                        <input name="image" class="form-control" type="file">
                                        @error('image')
                                        <p class="help-block" style="color: red">
                                            {{ $errors->first('image') }}
                                        </p>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col">
                                <div class="mb-3 mb-0">
                                    {{-- ckeditor --}}
                                    <label for="exampleFormControlTextarea14">Contact Description</label>
                                    <textarea  class="ckeditor form-control btn-square" name="contact_description" id="exampleFormControlTextarea14" rows="3">{{$edit_data->contact_description}}</textarea>

                                    @error('description')
                                        <p class="help-block" style="color: red">
                                            {{ $errors->first('description') }}
                                        </p>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3 mb-0">
                                    {{-- ckeditor --}}
                                    <label for="exampleFormControlTextarea14">Refer Client Description</label>
                                    <textarea  class="ckeditor form-control btn-square" name="client_description" id="exampleFormControlTextarea14" rows="3">{{$edit_data->client_description}}</textarea>

                                    @error('description')
                                        <p class="help-block" style="color: red">
                                            {{ $errors->first('description') }}
                                        </p>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3 mb-0">
                                    @if($edit_data->id != 4 ?? '')
                                    {{-- ckeditor --}}
                                    <label for="exampleFormControlTextarea14">Profile Description</label>
                                    <textarea  class="ckeditor form-control btn-square" name="profile_description" id="exampleFormControlTextarea14" rows="3">{{$edit_data->profile_description}}</textarea>

                                    @error('description')
                                        <p class="help-block" style="color: red">
                                            {{ $errors->first('description') }}
                                        </p>
                                    @enderror
                                        @endif
                                </div>
                            </div>
                        </div>
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

<script type="text/javascript">
    $(document).ready(function(){
      $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
          $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
      });
    });
  </script>

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
