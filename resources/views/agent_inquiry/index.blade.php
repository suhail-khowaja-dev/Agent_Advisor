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
    <h3>Agent Inquiry</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Agent Inquiry</li>
    <li class="breadcrumb-item active"> Management</li>
@endsection

@section('content')
<style>
    .round-cstm-btn{
        border-radius: 30px !important;
        padding: 6px 1rem !important;
        font-family: Poppins-Regular;
        background-color: #C1272D !important;
    }
    .round-cstm-btn a{
       color: #fff;
       font-size: 14px;
    }
    .round-cstm-btn-green {
            border-radius: 30px !important;
            padding: 7px 15px !important;
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

                        {{-- <div class="row">
                            <div class="col-md-8">
                                <h5>Inquiry Management</h5>
                            </div>
                            <div class="col-md-4" align="right">
                                <a class="btn btn-primary" href="{{ route('InquiryCreate') }}"> <i
                                        data-feather="plus-square"> </i> Create</a>
                            </div>
                        </div> --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agentinquiry as $key => $value)
                                        <tr>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->phone }}</td>
                                            <td>{{Str::limit($value->message, 5)}}</td>
                                            <td>
                                                <a  href="{{ route('Inquirydestroy', $value->slug) }}" id="delete"><button class="btn btn-danger btn-xs round-cstm-btn" type="button" data-original-title="btn btn-danger btn-xs" title="">Delete</button></a>
                                                <a  href="{{ route('Agentldetail', $value->slug) }}" id="view"><button class="deteleButton round-cstm-btn-green" type="button" data-original-title="btn btn-danger btn-xs" title="">View</button></a>
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
