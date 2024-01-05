<link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<?php $__env->startSection('title','Clients'); ?>

<?php $__env->startSection('content'); ?>

<?php if(Session::has('client')): ?>
<script type="text/javascript">
    swal("Thank you!", "<?php echo e(Session::get('client')); ?>", "success");
</script>
<?php elseif(Session::has('id')): ?>
<script type="text/javascript">
    swal("Agent!", "<?php echo e(Session::get('id')); ?>", "error");
</script>
<?php endif; ?>
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

    .tableHeading {
            background-color: #7979793b;
            text-align: center
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

* {
  box-sizing: border-box;
}

#searchText {
  background-image: url('https://www.w3schools.com/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#searchTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#searchTable th, #searchTable td {
  text-align: left;
  padding: 12px;
}

#searchTable tr {
  border-bottom: 1px solid #ddd;
}

#searchTable tr.header, #searchTable tr:hover {
  background-color: #f1f1f1;
}
</style>

<style>
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
        <img src="<?php echo e(asset('frontend/images/1x/loader 1.gif')); ?>" alt="processing..." width="30px" height="30px" />
    </div>

<div class="mySection">
    <!-- header -->
    <header>
        <div class="container">
            <div class="myhhedaer d-flex justify-content-between align-items-center">
                <!-- backArrow -->

                <div class="backIcon mybackIcon">
                    <a href="<?php echo e(route('advisor')); ?>">
                        <img src="<?php echo e(asset('frontend/images/1x/backIc.png')); ?>" alt="Back" width="100%" height="100%">
                    </a>
                </div>

                <div class="headerSection d-flex justify-content-end">
                    
                    <div class="profileInfo d-flex align-items-center">
                        <div class="userImage">
                            <img src="<?php echo e(asset('frontend/images/1x/profileimage.png')); ?>" alt="profileImage" width="100%" height="100%">
                        </div>
                        <div class="userName">
                            <span>
                                Hi,
                            </span>
                            <label for="">
                                <?php echo e(Auth::user()->name); ?>

                            </label>
                        </div>
                    </div>
                    <div class="profileDropdown">
                        <a href="<?php echo e(route('Frontend_agent_advisor')); ?>">
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
                <form method="POST" action="<?php echo e(url('refer_client_process')); ?>" id="regiterForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" value="" id="agent" name="agent_id" />
                    <input type="hidden" value="<?php echo e(Auth::id()); ?>" id="agent" name="user_id" />
                    <input type="hidden" value="" id="location" name="location" />
                <div class="clientform">
                    <div class="row">
                        <div class="col-lg-6">
                            <input class="clientInput" type="text" name="name" value="<?php echo e(old('name')); ?>" placeholder="Client Name">
                        </div>
                        <div class="col-lg-6">
                            
                            <div class="clientInputmain">

                                <select id="state" class="dropdown" name="state">
                                    
                                        <option value="">Please Select State</option>
                                        <?php $__currentLoopData = $location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option id="state" value="<?php echo e($item->id); ?>"><?php echo e($item->state); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </optgroup>
                                </select>
                                <img src="<?php echo e(asset('frontend/images/1x/arrowpng.png')); ?>" alt="">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            
                            <div class="clientInputmain">

                                <select id="city" class="dropdown" name="city" >
                                    
                                        
                                        
                                    
                                </select>
                                <img src="<?php echo e(asset('frontend/images/1x/arrowpng.png')); ?>" alt="">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <input id="phone12" type="tel" class="clientInput" name="phone_number" value="<?php echo e(old('phone_number')); ?>" type="text" placeholder="Phone Number" maxlength="14" pattern="[(][0-9]{3}[)] [0-9]{3}-[0-9]{4}">
                        </div>
                        <div class="col-lg-6">
                            <input class="clientInput" type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email address">
                        </div>
                        <div class="col-lg-6">
                            <input class="clientInput" type="text" name="price" value="<?php echo e(old('price')); ?>" placeholder="Approximate Price Range">
                        </div>
                        <div class="col-lg-6">
                            <div class="clientInputmain">

                                <select  class="dropdown" name="category" >
                                    <optgroup label="Categories" >
                                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id ?? ''); ?>"><?php echo e($item->category_name ?? ''); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </optgroup>
                                </select>
                                <img src="<?php echo e(asset('frontend/images/1x/arrowpng.png')); ?>" alt="">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="clientInputmain">

                                <select id="state" class="dropdown" name="purchase" >
                                    <optgroup label="Buyer/Seller" >
                                        <option value="Buyer">Buyer</option>
                                        <option value="Seller">Seller</option>
                                    </optgroup>
                                </select>
                                <img src="<?php echo e(asset('frontend/images/1x/arrowpng.png')); ?>" alt="">
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <textarea class="clientInput1" placeholder="Notes about client" name="note" id="" cols="40"
                                rows="10"><?php echo e(old('note')); ?></textarea>
                        </div>
                    </div>
                    <div class="clientformbtns d-flex justify-content-between">
                        <div class="clibtn1">
                            <a href="">
                                <button type="submit">
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
                </form>

            </div>
        </div>
    </section>

    <!-- footer -->
    <footer class="myfooter">
        <div class="container">
            <div class="footer d-flex justify-content-between">
                <div class="copyWrite">
                    <p><?php echo e($config->copyright ?? ''); ?> <br> DESIGNED AND DEVELOPED BY  <a href="https://designprosusa.com/" target="_blank">DESIGN PROS USA</a></p>
                </div>
                <div class="pricavy">
                    <a href="<?php echo e(route('privacy-policy')); ?>">
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

                     </section>
                </div>
             </div>
            <div class="modal-footer clibtn2">
                <button class="" type="submit" onclick="add_client()" id="add_client" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>
<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
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

    function get_agent(id){
    //  alert(id);
    $('#agent').val(id);
    // $('#exampleModal').modal('hide');
    }

    function add_client(){
        $('#exampleModal').modal('hide');
    }
</script>
<script>


    $("#regiterForm").submit(function() {
        $("#pageloader").fadeIn();
    });
    </script>

    <script>
    $(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    // get agent from selected city
   $('#city').on('change', function(){
        var id = $(this).val();
        $.ajax({
         type: "GET",
         url: '<?php echo e(route('get_location')); ?>',
         "dataSrc": "",
         data:  {'id':id},
        // dataType: 'json',
        //  cache: false,
         success: function(response) {
            // console.log(response.clients);
            var tbl =  $('#myTable').DataTable();
            tbl.clear()
            if(response!='') {
                $.each(response.clients, function(value,i) {

                    tbl.row.add(['<input type="radio" id="html" name="fav_language" value="HTML" class="radioButton">',i.name,i.email,i.getcity.city]).node().id = i.id;
                    tbl.draw();
                });

                }else
                {
                    $('#myTable').html('<h3>No users are available</h3>');
                }
        }
    });
  });

  //for state dependent dropdown
  var id = ($('select[name="state"]').val());
  $.ajax({
    type: "GET",
    url: '<?php echo e(route('get_state_location')); ?>',
    "dataSrc": "",
    data:  {'id':id},
    success: function(response) {
        console.log(response.clients);
        $('#city').html('');
        if(response!='') {
            $("#city").append(`<optgroup label="Please Select City"></optgroup>`);
            $.each(response.clients, function(value,i) {
                $('#city').append(`<option  value ="${i.id}" >${i.city}</option></optgroup>`);
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
    url: '<?php echo e(route('get_state_location')); ?>',
    "dataSrc": "",
    data:  {'id':id},
    // dataType: 'json',
    //  cache: false,
    success: function(response) {
        // console.log(response.clients);
        $("#pageloader").hide();
        $('#city').html('');
        $("#city").append(`<optgroup label="Please Select City">`);
        if(response!='') {
            $.each(response.clients, function(value,i) {
                $('#city').append(`<option  value ="${i.id}" >${i.city}</option></optgroup>`);
            });
            }else
            {
                $('#city').append('<h3>No City Found</h3>');
            }
         }
    });
});


    $("#data-load").on('click','tr', function (id) {
        var id = ($(this).attr('id'));
         $("#agent").val(id);
    } );

});

</script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('website.master.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agent_advisor\resources\views/website/refer_clients.blade.php ENDPATH**/ ?>