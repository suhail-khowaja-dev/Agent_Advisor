@extends('website.master.layout')
@section('title','Clients')
@section('content')
@if (Session::has('contactadvisor'))
<script type="text/javascript">
    swal("Thank you!", "{{Session::get('contactadvisor')}}", "success");
</script>
@endif
<style>
    .ddtable {
        position: relative;
    }

    .searchIcon {
        position: absolute;
        top: 12px;
        right: 13px;
    }

    .dataTables_length {
        display: none;
    }

    .dataTables_wrapper .dataTables_filter {
        color: #666666d9;
    }

    .dataTables_wrapper .dataTables_filter {
        float: none;
        text-align: unset;
    }

    .dataTables_filter label {
        border: 1px solid #66666654;
        border-radius: 10px;
        padding: 11px 10px;
        margin: 9px 0px 32px;
        font-family: 'Poppins-Regular';
        height: 48px;
        width: 100%;
        display: flex;
        align-content: center;
    }

    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #aaa;
        border-radius: 3px;
        padding: 5px;
        background-color: transparent;
        margin-left: 3px;
        background-color: transparent;
        border: none;
        outline: none;
        width: 100%;
        font-family: 'Poppins-Regular';
        height: 24px;
    }

    table.dataTable.display tbody tr.odd>.sorting_1,
    table.dataTable.order-column.stripe tbody tr.odd>.sorting_1 {
        background-color: #ffffff;
    }

    table.dataTable thead th,
    table.dataTable thead td {
        padding: 10px 18px;
        border-bottom: none;
    }

    .dataTables_info {
        display: none;
    }

    .dataTables_paginate .paging_simple_numbers {
        display: none;
    }

    #myTable_paginate {
        display: none;
    }

    table.dataTable.no-footer {
        border-bottom: transparent;
    }

    table.dataTable.row-border tbody tr:first-child th,
    table.dataTable.row-border tbody tr:first-child td,
    table.dataTable.display tbody tr:first-child th,
    table.dataTable.display tbody tr:first-child td {
        border-top: none;
        background: none;
        background-color: #fff;
    }

    table.dataTable.display tbody tr.even>.sorting_1,
    table.dataTable.order-column.stripe tbody tr.even>.sorting_1 {
        background-color: #ffffff;
    }

    table.dataTable.row-border tbody th,
    table.dataTable.row-border tbody td,
    table.dataTable.display tbody th,
    table.dataTable.display tbody td {
        border-top: 1px solid #ddd;
        background-color: #fff;
    }

    #myTable thead {
        background-color: #7979793b;
        border-radius: 15px;
    }
</style>

<div class="mySection">
    <!-- header -->
    <header>

        <div class="container">
            <div class="myhhedaer d-flex justify-content-between align-items-center">
                <!-- backArrow -->

                <div class="backIcon mybackIcon">
                    <a href="{{route('agent')}}">
                        <img src="{{asset('frontend/images/1x/backIc.png')}}" alt="Back" width="100%" height="100%">
                    </a>
                </div>

                <div class="headerSection d-flex justify-content-end">
                    <div class="ballIcon">
                        <img src="{{asset('frontend/images/1x/notifacitionIcon.png')}}" alt="" width="100%" height="100%">
                    </div>
                    <div class="profileInfo d-flex align-items-center">
                        <div class="userImage">
                            <img src="{{asset('frontend/images/1x/userImagee.png')}}" alt="UserImage" width="100%" height="100%">
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
    <!-- table -->
    <section>
        <div class="container">
            <div class="tableContainer">
                <div class="tablHeading">
                    <h5>
                        Clients Details
                    </h5>
                </div>
                <div class="clientform">
                    <div class="row">
                        <div class="col-lg-6">
                            <input class="clientInput" type="text" placeholder="Client Name">
                        </div>
                        <div class="col-lg-6">
                            <input class="clientInput" type="text" placeholder="Location">
                        </div>
                        <div class="col-lg-6">
                            <input id="phone" class="clientInput" type="text" placeholder="Phone Number">
                        </div>
                        <div class="col-lg-6">
                            <input class="clientInput" type="text" placeholder="Email address">
                        </div>
                        <div class="col-lg-6">
                            <input class="clientInput" type="text" placeholder="Approximate Price Range">
                        </div>
                        <div class="col-lg-6">
                            <div class="clientInputmain">

                                <select id="state" class="dropdown" name="user_state">
                                    <option value="" disabled="disabled" selected="selected">Category</option>
                                    <optgroup label="Categories">
                                        <option value="AL">Category 1</option>
                                        <option value="AK">Category 2</option>
                                        <option value="AZ">Category 3</option>
                                        <option value="AR">Category 4</option>
                                        <option value="CA">Category 5</option>
                                        <!-- <option value="" disabled="disabled">--</option> -->

                                    </optgroup>
                                </select>
                                <img src="{{asset('frontend/images/1x/arrowpng.png')}}" alt="">

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <textarea class="clientInput1" placeholder="Notes about client" name="" id="" cols="40"
                                rows="10"></textarea>
                        </div>
                    </div>
                    <div class="clientformbtns d-flex justify-content-between">
                        <div class="clibtn1">
                            <a href="">
                                <button>
                                    Send Referral
                                </button>
                            </a>
                        </div>
                        <div class="clibtn2 d-flex">
                            <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Add Agent
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- footer -->
    <footer class="myfooter">
        <div class="container">
            <div class="footer d-flex justify-content-between">
                <div class="copyWrite">
                    <a href="https://designprosusa.com/" target="_blank">
                        <p>{{$configuration->copyright}},{{$configuration->configuration}}</p>
                    </a>
                </div>
                <div class="pricavy">
                    <a href="{{route('privacy-policy')}}">
                        <p>Privacy Policy</p>
                    </a>
                </div>
            </div>

        </div>
    </footer>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <section class="ddtable">

                        <table id="myTable" class="display">
                            <div class="searchIcon">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>

                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Bio</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        John Smith
                                    </td>
                                    <td>
                                        john12@gmail.com
                                    </td>
                                    <td>
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        John Smith
                                    </td>
                                    <td>
                                        john12@gmail.com
                                    </td>
                                    <td>
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        John Smith
                                    </td>
                                    <td>
                                        john12@gmail.com
                                    </td>
                                    <td>
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        John Smith
                                    </td>
                                    <td>
                                        john12@gmail.com
                                    </td>
                                    <td>
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        John Smith
                                    </td>
                                    <td>
                                        john12@gmail.com
                                    </td>
                                    <td>
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        John Smith
                                    </td>
                                    <td>
                                        john12@gmail.com
                                    </td>
                                    <td>
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </section>
                </div>
            </div>
            <div class="modal-footer clibtn2">
                <button class="" type="button" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>
@endsection
