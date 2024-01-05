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
    <h3>Clients</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Clients </li>
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
        .createButton {
    display: flex;
    gap: 10px;
    align-items: center;
    font-size: 15px !important;

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
                                <h5>Advisors list</h5>
                            </div>
                            {{-- <div class="col-md-2 offset-lg-2" align="right">
                                <a class="btn btn-primary createButton" href="{{ route('advisor_create') }}">
                                     <i data-feather="plus-square"> </i> Create</a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Description</th>
                                        <th>Price Range</th>
                                        <th>Buyer/Seller</th>
                                        <th>Location</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getCMS as $key => $value)
                                        <tr>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->phone_number }}</td>
                                           <td> {{Str::limit($value->note, 5)}}</td>
                                            <td>{{ $value->price }}</td>
                                            <td>{{ $value->purchase  }}</td>
                                            <td>{{ $value->location }}</td>
                                            <td>
                                                {{-- <button class="btn btn-danger btn-xs round-cstm-btn-red" type="button" data-original-title="btn btn-danger btn-xs" title=""><a  href="{{ route('advisor_destroy', $value->id) }}" id="delete">Delete</a></button> --}}
                                                <button class="btn btn-success btn-xs round-cstm-btn-green" type="button" data-original-title="btn btn-danger btn-xs" title=""> <a href="{{ route('client_show', $value->id) }}">View</a></button>
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
