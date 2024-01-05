@extends('website.master.layout')
@section('title','Clients')
@section('content')

@if (Session::has('id'))
<script type="text/javascript">
    swal("Thank you!", "{{Session::get('id')}}", "error");
</script>
@elseif(Session::has('updated'))
<script type="text/javascript">
    swal("Agent Updated!", "{{Session::get('updated')}}", "success");
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
    .tableHeading {
            background-color: #7979793b;
            text-align: center;
        }

        .tableHeading th:first-child {
    border-top-left-radius: 8px ;
    border-bottom-left-radius: 8px ;
}
.tableHeading th:last-child {
    border-top-right-radius: 8px ;
    border-bottom-right-radius: 8px ;
}

.odd,
.even {
    text-align: center
}
table.dataTable thead .tableHeading .sorting:first-child {
    background-image: unset !important;
}
#pageloader {
        background:rgb(129 129 129 / 17%);
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
    <img src="{{asset('frontend/images/1x/loader 1.gif') }}" alt="processing..." width="30px" height="30px" />
</div>

<div class="mySection">
    <!-- header -->
    <header>
        <div class="container">
            <div class="myhhedaer d-flex justify-content-between align-items-center">
                <!-- backArrow -->

                <div class="backIcon mybackIcon">
                    <a href="{{route('advisor')}}">
                        <img src="{{asset('frontend/images/1x/backIc.png')}}" alt="Back" width="100%" height="100%">
                    </a>
                </div>

                <div class="headerSection d-flex justify-content-end">
                    {{-- <div class="ballIcon">
                        <img src="{{asset('frontend/images/1x/notifacitionIcon.png')}}" alt="" width="100%" height="100%">
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
                        Client Details
                    </h5>
                </div>
                <form method="POST" action="{{ route("advisorupdate",$advisor->id) }}" id="regiterForm">
                    @csrf
                    <input type="hidden" value="" id="agent" name="agent_id" />
                    <input type="hidden" value="" id="status" name="status" />
                <div class="clientform">
                    <div class="row">
                        <div class="col-lg-6">
                            <input class="clientInput" type="text" name="name" value="{{$advisor->name ?? ''}}" placeholder="Client Name">
                        </div>
                        <div class="col-lg-6">
                                <div class="clientInputmain">
                                    <select id="state" class="dropdown" name="state">
                                        <optgroup label="Location" >
                                            @foreach ($location as $item )
                                            <option id="state" value="{{ $item->id }}" {{$item->id == $advisor->state ? 'selected' : '' }}>{{$item->state}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                    <img src="{{asset('frontend/images/1x/arrowpng.png')}}" alt="">
                                </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="clientInputmain">
                                <select id="city" class="dropdown" name="city">
                                    <optgroup label="Location">
                                        <option id="city" value="">City</option>
                                    </optgroup>
                                </select>
                                <img src="{{asset('frontend/images/1x/arrowpng.png')}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <input class="clientInput" name="phone_number" id="phone12" type="tel" value="{{$advisor->phone_number ?? ''}}" placeholder="Phone Number"  maxlength="14"  pattern="[(][0-9]{3}[)] [0-9]{3}-[0-9]{4}">
                        </div>
                        <div class="col-lg-6">
                            <input class="clientInput" type="email" name="email"  value="{{$advisor->email ?? ''}}" placeholder="Email address">
                        </div>
                        <div class="col-lg-6">
                            <input class="clientInput" type="text" name="price"  value="{{$advisor->price ?? ''}}" placeholder="Approximate Price Range">
                        </div>
                        <div class="col-lg-6">
                            <div class="clientInputmain">

                                <select id="state" class="dropdown" name="category">
                                    <optgroup label="Categories">
                                        {{-- {{$category->id}} --}}
                                        @foreach($category as $item)
                                        <option value="{{$item->id}}"  {{$item->id == $advisor->category ? 'selected' : '' }} >{{$item->category_name ?? ''}} </option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                <img src="{{asset('frontend/images/1x/arrowpng.png')}}" alt="">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="clientInputmain">

                                <select id="state" class="dropdown" name="purchase">
                                    <optgroup label="Buyer/Seller">
                                        <option value="Buyer" {{($advisor->purchase == 'Buyer' ? 'selected' : '') ?? ''}} >Buyer</option>
                                        <option value="Seller" {{($advisor->purchase == 'Seller' ? 'selected' : '') ?? ''}} >Seller</option>
                                    </optgroup>
                                </select>
                                <img src="{{asset('frontend/images/1x/arrowpng.png')}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <textarea class="clientInput1" placeholder="Notes about client" name="note" id="" cols="40"
                                rows="10"> {{$advisor->note}}</textarea>
                        </div>
                    </div>
                    <div class="clientformbtns d-flex justify-content-between">
                        <div class="clibtn1">
                            <a href="">
                                <button type="submit">
                                    Update
                                </button>
                            </a>
                        </div>
                        {{-- @if($advisor->status != 1 ?? '')
                        <div class="clibtn2 d-flex">
                            <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Add Agent
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </div>
                        @endif --}}
                    </div>
                </div>
                </form>

            </div>
        </div>
    </section>

    <!-- footer -->
    <footer class="myfooter">
        <div class="container">
            <div class="footer d-flex justify-content-between">
                <div class="copyWrite">
                    <p>{{$config->copyright ?? ''}} <br> DESIGNED AND DEVELOPED BY  <a href="https://designprosusa.com/" target="_blank">DESIGN PROS USA</a></p>
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
                    <!-- <div class="searhpen d-flex">
                        <input type="text" placeholder="Search">
                        <div class="searchIcon">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div> -->
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
                                    <th>Bio</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agents as $item )
                                <tr onclick="return get_agent('{{ $item->id }}')">
                                    <td>
                                        <input type="radio" id="html" name="fav_language" value="HTML" class="radioButton">
                                          <label for="html"></label>
                                    </td>
                                    <td>
                                       {{$item->name}}
                                    </td>
                                    <td>
                                      {{$item->email}}
                                    </td>
                                    <td>
                                       {{$item->location}}
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </section>
                </div>
            </div>
            <div class="modal-footer clibtn2">
                <button class="" type="submit" onclick="edit_agent()" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    document.getElementById('phone12').addEventListener('input', function(e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
    });
</script>
<script>
  $("#state").on('change',function() {
         $("#pageloader").fadeIn();
    });

    ($('select[name="state"]').val());
        $("#pageloader").fadeIn();

    function get_agent(id){
    //  alert(id);
    $('#agent').val(id);
    // $('#exampleModal').modal('hide');
    }
    function edit_agent(){
        $('#exampleModal').modal('hide')
    }
</script>
<script>

    $("#regiterForm").submit(function() {
        $("#pageloader").fadeIn();
    });

        var id = ($('select[name="state"]').val());
        $.ajax({
        type: "GET",
        url: '{{route('get_state_location')}}',
        data:  {'id':id},
        success: function(response) {
            $("#pageloader").hide();
            // console.log(response.clients);
            $('#city').html('');
            var city = '{{$user->location}}';
            if(response!='') {
                $.each(response.clients, function(value,i) {
                    var select = (i.id == city ? 'selected="selected"' : '');
                    // console.log(test);
                     $('#city').append(`<option  value ="${i.id}" ${select}>${i.city}</option>`);

                });
                }else
                {
                    $('#city').append('<h3>No City Found</h3>');
                }
            }
        });

    $('#state').on('change', function(){
            var id = $(this).val();
            $.ajax({
        type: "GET",
        url: '{{route('get_state_location')}}',
        data:  {'id':id},
        success: function(response) {
            // console.log(response.clients);
            $("#pageloader").hide();
            $('#city').html('');
            if(response!='') {
                $.each(response.clients, function(value,i) {
                $('#city').append('<option select value ="'+i.id+'">'+i.city+'</option>');
                });
                }else
                {
                    $('#city').append('<h3>No City Found</h3>');
                }
            }
        });
    });


</script>
@endsection

