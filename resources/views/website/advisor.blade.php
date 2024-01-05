@extends('website.master.layout')
@section('title', 'Advisor')
@section('content')

    @if (Session::has('authenticate'))
        <script type="text/javascript">
            swal("Un Authorize!", "{{ Session::get('authenticate') }}", "warning");
        </script>
    @elseif(Session::has('update'))
        <script type="text/javascript">
            swal("Agent Update!", "{{ Session::get('update') }}", "success");
        </script>
    @elseif (Session::has('client'))
        <script type="text/javascript">
            swal("Client!", "{{ Session::get('client') }}", "success");
        </script>
    @elseif (Session::has('advisorcontact'))
        <script type="text/javascript">
            swal("Message!", "{{ Session::get('advisorcontact') }}", "success");
        </script>
    @elseif (Session::has('delete'))
        <script type="text/javascript">
            swal("Message!", "{{ Session::get('delete') }}", "success");
        </script>
        @elseif(Session::has('updated'))
        <script type="text/javascript">
            swal("Agent Updated!", "{{Session::get('updated')}}", "success");
        </script>
    @elseif(Session::has('select'))
    <script type="text/javascript">
     swal("Agent Error!", "{{Session::get('select')}}", "error");
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

        /* #myTable thead {
            background-color: #7979793b;
            border-radius: 15px;
         } */
        .imgSecond {
            margin-top: 41px !important;
        }

        .tableHeading {
            background-color: #7979793b;
            text-align: center;
        }

        .tableHeading th:first-child {
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
        }

        .tableHeading th:last-child {
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        .odd,
        .even {
            text-align: center
        }

        table.dataTable thead .tableHeading .sorting:first-child {
            background-image: unset !important;
        }

        .cstm2-tabel-css .dataTables_filter {
            width: 20%;
            /* border-radius: 20px; */
            margin-left: auto;
        }

        .cstm2-tabel-css .dataTables_filter label {
            border-radius: 30px;
        }

        .tableContainer .tablee {
            height: 100%;
            overflow: hidden;
        }

        table.dataTable.no-footer {
            border-bottom: 1px solid #111;
        }

        .for-top-margin {
            margin-top: 2rem
        }

        .cstm-tab-list-btn {
            background: transparent;
            color: #959796;
            font-weight: 600;
            margin-right: 1rem;
            padding: 6px 4px 6px 4px;
        }

        .cstm-bar-btn {
            background: #fff;
            padding: 10px 36px 0px 16px;
            border-radius: 8px;
        }

        .cstm-tab-list-btn:hover {
            color: #959796;
        }

        .cstm-tab-list-btn.active {
            background: transparent !important;
            border-bottom: 2px solid #808180 !important;
            color: #959796 !important;
            border-radius: 0px !important;
        }

        .for-width-cstm {
            width: 100% !important;
        }

        .for-width-cstm tbody tr td:last-child {
            width: 84px;
        }
        .editdlt .icon1{
            margin-right:46px;
        }

    </style>
    <style>
        #pageloader {
            background: rgb(129 129 129 / 17%);
            display: none;
            height: 100%;
            position: fixed;
            width: 100%;
            z-index: 9999;
            top: 0;
            left: 0;
        }

        #pageloader img {
            left: 50%;
            /* margin-left: -32px;
                         margin-top: -32px; */
            position: absolute;
            top: 50%;
            transform: translate(-50%, -50%);
            filter: grayscale(1);
        }

    </style>
    <div id="pageloader">
        <img src="{{ asset('frontend/images/1x/loader 1.gif') }}" alt="processing..." width="30px" height="30px" />
    </div>

    <!-- header -->
    <header>

        <div class="container">
            <div class="headerSection d-flex justify-content-end">
                {{-- <div class="ballIcon">
                    <img src="{{ asset('frontend/images/1x/notifacitionIcon.png') }}" alt="" width="100%" height="100%">
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
                            {{ Auth::user()->name ?? '' }}

                        </label>
                    </div>
                </div>

                <div class="profileDropdown">
                    <a href="{{ route('Frontend_agent_advisor') }}">
                        <div id="triangle-up"></div>
                        <p>
                            Sign Out
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- refer client section -->
    <section>
        <div class="container">
            <div class="referClientSect">
                <div class="row">
                    <div class="col-lg-6">

                        <div class="myrefClientBox myrefClientBox1">
                            <div class=" myimgesec2">
                                <div class="iimg">
                                    <img src="{{ asset('frontend/images/1x/refClient.png') }}" alt="Image" width="100%"
                                        height="100%">
                                </div>
                            </div>
                            <div class="myreferenceClientText">
                                <h5>
                                    {{ $advisor_client->client_title ?? '' }}
                                </h5>
                                <p>
                                    {!! $advisor_client->client_description ?? '' !!}
                                </p>
                                <a href="{{ route('refer-clients') }}" class="d-flex">
                                    <div class="refcA">
                                        Refer Clients
                                    </div>
                                    <div class="imgg">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="myrefClientBox">
                            <div class="imgesec2">
                                <div class="iimg imgSecond">
                                    <img src="{{ asset('frontend/images/1x/callIcon.png') }}" alt="Image" width="100%"
                                        height="100%">
                                </div>
                            </div>
                            <div class="myreferenceClientText">
                                <h5>
                                    {{ $advisor_client->contact_title ?? '' }}
                                </h5>
                                <p>
                                    {!! $advisor_client->contact_description ?? '' !!}
                                </p>
                                <a href="{{ route('advisor-contact') }}" class="d-flex">
                                    <div class="refcA">
                                        Contact Us
                                    </div>
                                    <div class="imgg">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        <!-- <img src="./assets/images/1x/backIc.png" alt="Back" width="100%" height="100%"> -->
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- table -->
    <section>
        <div class="container">
            <div class="">
                <div class="d-flex for-top-margin cstm-bar-btn">
                    <div class="nav nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active cstm-tab-list-btn" onclick="tab1()" id="v-pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                            aria-selected="true">All Clients</button>
                        <button class="nav-link cstm-tab-list-btn" onclick="tab2()" id="v-pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                            aria-selected="false">Assigned Agents</button>
                    </div>
                </div>
            </div>
            <div class="tableContainer">
                <div class="tablHeading">
                    <h5 id="clients">
                      All Clients
                    </h5>
                </div>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <div class="tablee cstm2-tabel-css">
                            <table id="table2" class="table">
                                <thead>
                                    <input type="hidden" id="client_id">
                                    <tr>
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Phone No.</td>
                                        <td>Agent</td>
                                        <td>Location</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $item)
                                    @if ($item->status == 1 || $item->status == 3)
                                    @continue
                                    @endif
                                        <tr>
                                            <td>
                                                <a href="{{ route('agent-details', ['slug' => $item->slug]) }}">

                                                    {{ $item->name }}
                                                </a>
                                            </td>
                                            <td>
                                                {{ $item->email }}
                                            </td>
                                            <td>
                                                {{ $item->phone_number }}
                                            </td>
                                            <td>
                                                @if($item->status  == 1 || $item->status == null )
                                                {{ $item->get_agent->name ?? 'N/A' }}
                                                @else
                                                {{"N/A"}}
                                                @endif
                                            </td>
                                            <td>
                                                {{$item->getstate->state ?? ''}}, {{ $item->getcity->city ?? ''}}
                                            </td>
                                            @if($item->get_agent == '')
                                            <td>
                                                <button
                                                    onclick="reasign_agent({{ $item->id }},{{ $item->agent_id }})"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal" value="{{$item->getcity->id ?? '' }}" class="locationreassign">
                                                    Assign
                                                </button>
                                            </td>
                                            @elseif($item->status == 2)
                                            <td>
                                                <button
                                                    onclick="reasign_agent({{ $item->id }},{{ $item->agent_id }})"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal" value="{{$item->getcity->id ?? '' }}" class="locationreassign">
                                                   Reassign
                                                </button>
                                            </td>
                                            @elseif($item->status == null)
                                            <td>
                                                <button
                                                    onclick="reasign_agent({{ $item->id }},{{ $item->agent_id }})"
                                                    data-bs-toggle="modal"  value="{{$item->getcity->id ?? '' }}" class="locationreassign">
                                                   Assigned
                                                </button>
                                            </td>
                                            @endif
                                            <td>
                                                <div class="editdlt d-flex">
                                                    <div class="icon1">
                                                        <a href="{{ route('advisor-edit', $item->slug) }}">
                                                            <img src="{{ asset('frontend/images/1x/editIcon.png') }}"
                                                                alt="" width="100%" height="100%">
                                                        </a>
                                                    </div>
                                                    <div class="icon2">
                                                        <a href="{{ route('agent_delete', $item->id) }}">
                                                            <img src="{{ asset('frontend/images/1x/dltIcon.png') }}"
                                                                alt="" width="100%" height="100%">
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">
                                <div class="tablee cstm2-tabel-css">
                                    <table id="table3" class="table for-width-cstm">
                                        <thead>
                                            <input type="hidden" id="client_id">
                                            <tr>
                                                <td>Name</td>
                                                <td>Email</td>
                                                <td>Phone No.</td>
                                                <td>Agent</td>
                                                <td>Location</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($approved as $item)
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('agent-details', ['slug' => $item->slug]) }}">

                                                            {{ $item->name ?? '' }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        {{ $item->email ?? '' }}
                                                    </td>
                                                    <td>
                                                        {{ $item->phone_number ?? '' }}
                                                    </td>

                                                    <td>
                                                        {{ $item->get_agent->name ?? '' }}

                                                    </td>

                                                    <td>
                                                        {{$item->getstate->state ?? ''}},
                                                        {{ $item->getcity->city ?? '' }}

                                                    </td>
                                                    <td>
                                                        <!-- <a href="./advisorDetails.html"> -->
                                                        {{-- <button
                                                            onclick="reasign_agent({{ $item->id }},{{ $item->agent_id }})"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            Reassign
                                                        </button> --}}
                                                        <!-- </a> -->
                                                    </td>
                                                    <td>
                                                        <div class="editdlt d-flex">

                                                            <div class="icon1" id="editval">
                                                                <a href="{{ route('advisor-edit', $item->slug) }}">
                                                                    <img src="{{ asset('frontend/images/1x/editIcon.png') }}"
                                                                        alt="" width="100%" height="100%">
                                                                </a>
                                                            </div>

                                                            <div class="icon2">
                                                                <a href="{{ route('agent_delete', $item->id) }}">
                                                                    <img src="{{ asset('frontend/images/1x/dltIcon.png') }}"
                                                                        alt="" width="100%" height="100%">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- footer -->
    <footer class="">
        <div class="container">
            <div class="footer d-flex justify-content-between">
                <div class="copyWrite">
                    <p>{{ $configuration->copyright ?? '' }} <br> DESIGNED AND DEVELOPED BY <a
                            href="https://designprosusa.com/" target="_blank">DESIGN PROS USA</a></p>
                </div>
                <div class="pricavy">
                    <a href="{{ route('privacy-policy') }}">
                        <p>Privacy Policy</p>
                    </a>
                </div>
            </div>

        </div>
    </footer>
    <!-- </div> -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="{{ route('agent_reasign') }}" method="POST" id="regiterForm">
            @csrf
            <input type="hidden" id="agent_reassign" name="agent_reassign">
            <input type="hidden" id="reasign" name="client_id">
            <input type="hidden" id="agent" name="agent_id">
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
                                        <tr class="tableHeading">
                                            <th></th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Location</th>

                                        </tr>
                                    </thead>
                                    <tbody id="data-load">

                                    </tbody>
                                </table>
                            </form>

                        </section>
                        </div>
                     </div>
                    <div class="modal-footer clibtn2">
                  <button class="" type="submit" class="btn btn-primary">Add</button>
              </div>
            </div>
             </div>
         </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#table2').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#table3').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script>
        function reasign_agent(id, agent_id) {
            //  alert(id);
             $('#reasign').val(id);
            $('#client_id').val(id);
           $('#agent_reassign').val(agent_id);

        }
    </script>
    <script>
        function get_client(client_id) {
            // alert(client_id);
            $('#client_id').val(client_id);
        }
    </script>

    <script>
        $("#regiterForm").submit(function() {
            $("#pageloader").fadeIn();
        });
    </script>

    <script>
        function tab1(){
           $('#clients').text('All Clients');
        }
    </script>
     <script>
        function tab2(){
           $('#clients').text('Assigned Agents');
        }
    </script>

<script>
    $(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
   $('.locationreassign').on('click', function(){
        var id = $(this).val();
        // alert(id);
     $.ajax({
         type: "GET",
         url: '{{route('get_location')}}',
         "dataSrc": "",
         data:  {'id':id},
         success: function(response) {
            console.log(response.clients);
            var tbl =  $('#myTable').DataTable();
            tbl.clear()
            if(response!='') {
                $.each(response.clients, function(value,i) {
                    tbl.row.add(['<input type="radio" id="html"  name="html" value="HTML" class="radioButton">',i.name,i.email,i.getcity.city]).node().id = i.id;
                    tbl.draw();
                });

                }else
                {
                    $('#myTable').html('<h3>No users are available</h3>');
                }
            }
        });

    });

    $('.locationreassign ').on('click', function (id) {
        // $('#reasign').val(id);
           $('#agent_reassign').val();
    });


    $("#data-load").on('click','tr', function (id) {
        var id = ($(this).attr('id'));
        // console.log($("#agent"));
         $("#agent").val(id);
    } );

});


    </script>
@endsection
