@extends('layouts.simple.master')
@section('title', 'Project List')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/owlcarousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/rating.css') }}">
    <link rel="stylesheet" href="{{asset('frontend/style/style.css')}}">
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
            background-color: #00a808 !important;
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
                                <h5>Clients list</h5>
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
                                    {{-- <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Description</th>
                                        <th>Price Range</th>
                                        <th>Buyer/Seller</th>
                                        <th>Location</th>
                                    </tr> --}}
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $details->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $details->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{ $details->phone_number }}</td>
                                    </tr> <tr>
                                        <th>Location</th>
                                        <td>{{ $details->location }}</td>
                                    </tr>
                                     <tr>
                                        <th>Price</th>
                                        <td>{{ $details->price }}</td>
                                    </tr>
                                    <tr>
                                        <th>Buyer/Seller</th>
                                        <td>{{ $details->purchase }}</td>
                                    </tr>
                                    <tr>

                                        <th>Description</th>
                                        <td>{{ $details->note }}</td>
                                    </tr>
                                        {{-- <tr>
                                            <td>{{ $details->name }}</td>
                                            <td>{{ $details->email }}</td>
                                            <td>{{ $details->phone_number }}</td>
                                            <td>{{ $details->note }}</td>
                                            <td>{{ $details->price }}</td>
                                            <td>{{ $details->purchase  }}</td>
                                            <td>{{ $details->location }}</td>
                                            <td>

                                            </td>
                                        </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
        </div>
    </div>
    <div class="container">
        <div class="">
    <div class="myStatus">
        <div class="statusHeading">
            <h5>
                Status
            </h5>
        </div>
        <div class="statusOneB d-flex justify-content-between">
            <div class="statusName d-flex align-items-center ">
                <label for="">
                    Contact established
                </label>
                <div class="statusDropDown mystatusDropdown">
                    @if(($details->get_notes[0]->contact_established ?? '') == 1)
                    <input type="text"   placeholder="not started" readonly>
                    @elseif (($details->get_notes[0]->contact_established  ?? '') == 2)
                    <input type="text"  placeholder="in progree" readonly>
                    @elseif (($details->get_notes[0]->contact_established  ?? '') == 3)
                    <input type="text"  placeholder="completed" readonly>
                    @else
                    <input type="text"  placeholder="" readonly>
                    @endif
                </div>
            </div>

            <div class="statusNote statusNoteForhide">
                <div class="clibtn2 d-flex" data-bs-toggle="modal" data-bs-target="#addNoteexampleModal">
                    <a href="" data-bs-toggle="modal" data-bs-target="#addNoteexampleModal">
                        <i class="fa-solid fa-plus"></i>
                        Add Note
                    </a>
                </div>
            </div>
        </div>
        <div class="statusOneB d-flex justify-content-between">
            <div class="statusName d-flex align-items-center ">
                <label for="">
                    Meeting Successful
                </label>
                <div class="statusDropDown mystatusDropdown">
                    @if(($details->get_notes[0]->meeting ?? '') == 1)
                    <input type="text"  placeholder="not started" readonly>
                    @elseif (($details->get_notes[0]->meeting ?? '') == 2)
                    <input type="text"  placeholder="in progree" readonly>
                    @elseif (($details->get_notes[0]->meeting?? '') == 3)
                    <input type="text"  placeholder="completed" readonly>
                    @else
                    <input type="text"  placeholder="" readonly>
                    @endif

                </div>
            </div>

            <div class="statusNote statusNoteForhide">
                <div class="clibtn2 d-flex">
                    <a href="" data-bs-toggle="modal" data-bs-target="#addNoteexampleModal">
                        <i class="fa-solid fa-plus"></i>
                        Add Note
                    </a>
                </div>
            </div>
        </div>
        <div class="statusOneB d-flex justify-content-between flex-column ">
            <div class="mystatusOneB  d-flex justify-content-between align-items-center"
                style="width: 100%;">
                <div class="statusName d-flex align-items-center ">
                    <label for="">
                        Currently under contract
                    </label>
                    <div class="statusDropDown mystatusDropdown">
                    @if(($details->get_notes[0]->contract ?? '') == 1)
                    <input type="text"  placeholder="not started" readonly>
                    @elseif (($details->get_notes[0]->contract ?? '') == 2)
                    <input type="text"  placeholder="in progree" readonly>
                    @elseif (($details->get_notes[0]->contract ?? '') == 3)
                    <input type="text"  placeholder="completed" readonly>
                    @else
                    <input type="text"  placeholder="" readonly>
                    @endif

                    </div>
                </div>
                <div class="statusNote statusNoteForhide">
                    <div class="clibtn2 d-flex">
                        <a href="" data-bs-toggle="modal" data-bs-target="#addNoteexampleModal">
                            <i class="fa-solid fa-plus"></i>
                            Add Note
                        </a>
                    </div>
                </div>
            </div>
            <div class="agentAdress d-flex">
                <div class="adresB">
                    <label for="">
                        Address of the home
                    </label>
                    <input type="text" value="{{$details->get_notes[0]->address ?? ''}}" placeholder="">
                </div>
                <div class="adresB">
                    <label for="">
                        Sale price
                    </label>
                    <input type="text" value="{{$details->get_notes[0]->sale_price ?? ''}}" placeholder="$50555">
                </div>
            </div>
        </div>
        <div class="statusOneB d-flex justify-content-between flex-column ">
            <div class=" mystatusOneB d-flex justify-content-between align-items-center"
                style="width: 100%;">
                <div class="statusName d-flex align-items-center ">
                    <label for="">
                        Closed
                    </label>
                    <div class="statusDropDown mystatusDropdown">
                    @if(($details->get_notes[0]->closed ?? '') == 1)
                    <input type="text"  placeholder="not started" readonly>
                    @elseif (($details->get_notes[0]->closed ?? '') == 2)
                    <input type="text"  placeholder="in progree" readonly>
                    @elseif (($details->get_notes[0]->closed ?? '') == 3)
                    <input type="text"  placeholder="completed" readonly>
                    @else
                    <input type="text"  placeholder="" readonly>
                    @endif

                    </div>
                </div>
                <div class="statusNote statusNoteForhide">
                    <div class="clibtn2 d-flex" data-bs-toggle="modal"
                        data-bs-target="#addNoteexampleModal">
                        <a href="" data-bs-toggle="modal" data-bs-target="#addNoteexampleModal">
                            <i class="fa-solid fa-plus"></i>
                            Add Note
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
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
