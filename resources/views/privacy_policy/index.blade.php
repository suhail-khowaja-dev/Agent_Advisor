@extends('layouts.simple.master')
@section('title', 'Project List')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/owlcarousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/rating.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Privacy Policy</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Privacy Policy</li>
    <li class="breadcrumb-item active">list </li>
@endsection

@section('content')
<style>
    .round-cstm-btn-red {
    border-radius: 30px !important;
    padding: 6px 1rem !important;
    font-family: Poppins-Regular;
    background-color: #C1272D !important;
    border: none;
}
.round-cstm-btn-green {
    border-radius: 30px !important;
    padding: 6px 1rem !important;
    font-family: Poppins-Regular;
    background-color: #22B573 !important;
    border: none;
}

.round-cstm-btn-red a,
.round-cstm-btn-green a {
    color: #fff;
    font-size: 14px;
}
.page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper {
    height: 100% !important;
}
</style>
    <div class="container-fluid">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-md-8">
                                <h5>Privacy Policy list</h5>
                            </div>
                            {{-- <div class="col-md-4" align="right">
                                <a class="btn btn-primary" href="{{ route('privacyCreate') }}">
                                     <i data-feather="plus-square"> </i> Create</a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        {{-- <th>Created date</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getCMS as $key => $value)
                                        <tr>
                                            <td>{{ $value->title }}</td>
                                            <td>{!! Str::limit($value->content,30,$end='...' )!!}</td>
                                            {{-- <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td> --}}
                                            <td>
                                                <a href="{{ route('privacyEdit', $value->slug) }}"> <button class="btn btn-success btn-xs round-cstm-btn-green" type="button" data-original-title="btn btn-danger btn-xs" title=""> Edit</button></a>
                                             </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/rating/jquery.barrating.js') }}"></script>
    <script src="{{ asset('assets/js/rating/rating-script.js') }}"></script>
    <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/ecommerce.js') }}"></script>
    <script src="{{ asset('assets/js/product-list-custom.js') }}"></script>
@endsection
