<?php $__env->startSection('title','Details'); ?>
<?php $__env->startSection('content'); ?>
<?php if(Session::has('note')): ?>
<script type="text/javascript">
    swal("Notes!", "<?php echo e(Session::get('note')); ?>", "success");
</script>
<?php elseif(Session::has('status')): ?>
<script type="text/javascript">
    swal("Status!", "<?php echo e(Session::get('status')); ?>", "success");
</script>
<?php endif; ?>
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
<!-- <div class="mySection"> -->
        <!-- header -->
        <header>
            <div class="container">

                <div class="myhhedaer d-flex justify-content-between align-items-center">
                    <!-- backArrow -->

                    <div class="backIcon mybackIcon">
                        <a href="<?php echo e(route('agent')); ?>">
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
                    <div class="tablHeading agentClientheading">
                        <h5>
                            Details
                        </h5>
                    </div>
                    <div class="tablee agentClientTable myagentClientTable">
                        <div class="row">
                            <div class="col-lg-3">
                                <label for="">
                                    Name
                                </label>
                            </div>
                            <div class="col-lg-9">
                                <p><?php echo e($advisordetails->name); ?></p>
                            </div>
                            <div class="col-lg-3">
                                <label for="">
                                    Email
                                </label>
                            </div>
                            <div class="col-lg-9">
                                <p><?php echo e($advisordetails->email); ?></p>
                            </div>
                            <div class="col-lg-3">
                                <label for="">
                                    Phone No.
                                </label>
                            </div>
                            <div class="col-lg-9">
                                <p><?php echo e($advisordetails->phone_number); ?></p>
                            </div>
                            <div class="col-lg-3">
                                <label for="">
                                    Description
                                </label>
                            </div>
                            <div class="col-lg-9">
                                <p>
                                    <?php echo e($advisordetails->note); ?>

                                </p>
                            </div>
                            <div class="col-lg-3">
                                <label for="">
                                    Price range
                                </label>
                            </div>
                            <div class="col-lg-9">
                                <p>$<?php echo e($advisordetails->price); ?></p>
                            </div>
                            <div class="col-lg-3">
                                <label for="">
                                    Buyer/Seller
                                </label>
                            </div>
                            <div class="col-lg-9">
                                <p><?php echo e($advisordetails->purchase); ?></p>
                            </div>
                            <div class="col-lg-3">
                                <label for="">
                                    Location
                                </label>
                            </div>
                            <div class="col-lg-9">
                                <p><?php echo e($advisordetails->getstate->state ?? ''); ?>,<?php echo e($advisordetails->getcity->city ?? ''); ?></p>
                            </div>

                        </div>
                    </div>

                    <div class="myStatus">
                        <form action="<?php echo e(url('status_update',$advisordetails->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <!--<input type="hidden" value="<?php echo e($advisordetails->slug); ?>" name="slug">-->
                            <input type="hidden" name="client_id" value="<?php echo e($advisordetails->id); ?>">
                            <input type="hidden" name="agent_id" value="<?php echo e(Auth::id()); ?>" >
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
                                <div class="statusDropDown">
                                    <!-- <div class="clientInputmain"> -->
                                        
                                    <input type="hidden"  name="status_id_1" value="1">
                                    <select name="contact_established" id="">
                                        <option value="1" <?php echo e(($status->contact_established ?? '') == '1' ? 'selected':''); ?>>not started</option>
                                        <option value="2" <?php echo e(($status->contact_established ?? '') == '2' ? 'selected':''); ?>>in progress</option>
                                        <option value="3" <?php echo e(($status->contact_established ?? '') == '3' ? 'selected':''); ?>>completed</option>
                                    </select>
                                    <!-- </div> -->
                                    <img src="<?php echo e(asset('frontend/images/1x/arrowpng.png')); ?>" alt="">

                                </div>
                            </div>

                            <div class="statusNote">
                                <div class="clibtn2 d-flex" data-bs-toggle="modal"
                                    data-bs-target="#addNoteFourModal">
                                    <a href="" data-bs-toggle="modal" onclick="get_ids(<?php echo e($advisordetails->id); ?>,1)"  notes-id=<?php echo e(Auth::id()); ?> data-bs-target="#addNoteexampleModal" id="first_modal">
                                        <i class="fa-solid fa-plus" id="addnotes"></i>
                                        Add/View Note
                                    </a>
                                </div>
                            </div>
                        </div>

                        
                        <div class="statusOneB d-flex justify-content-between">
                            <div class="statusName d-flex align-items-center ">
                                <label for="">
                                    Meeting Successful
                                </label>
                                <div class="statusDropDown">
                                    <input type="hidden"  name="status_id_2" value="2">
                                    <select name="meeting" id="">
                                        <option value="1" <?php echo e(($status->meeting ?? '') == '1' ? 'selected':''); ?>>not started</option>
                                        <option value="2" <?php echo e(($status->meeting ?? '') == '2' ? 'selected':''); ?>>in progress</option>
                                        <option value="3" <?php echo e(($status->meeting ?? '') == '3' ? 'selected':''); ?>>completed</option>
                                    </select>
                                    <img src="<?php echo e(asset('frontend/images/1x/arrowpng.png')); ?>" alt="">

                                </div>
                            </div>

                            <div class="statusNote">
                                <div class="clibtn2 d-flex" data-bs-toggle="modal"
                                    data-bs-target="#addNoteFourModal">
                                    <a href="" data-bs-toggle="modal" onclick="get_ids(<?php echo e($advisordetails->id); ?>,2)" notes-id=<?php echo e(Auth::id()); ?> data-bs-target="#addNoteexampleModal" id="second_modal">
                                        <i class="fa-solid fa-plus" id="addnotes"></i>
                                        Add/View Note
                                    </a>
                                </div>
                            </div>
                        </div>

                        
                        <div class="statusOneB d-flex justify-content-between flex-column ">
                            <div class="mystatusOneB  d-flex justify-content-between align-items-center" style="width: 100%;">
                                <div class="statusName d-flex align-items-center ">
                                    <label for="">
                                        Currently under contract
                                    </label>
                                    <div class="statusDropDown">
                                        <input type="hidden"  name="status_id_3" value="3">
                                        <!-- <div class="clientInputmain"> -->
                                        <select name="contract" id="">
                                            <option value="1" <?php echo e(($status->contract ?? '')  == '1' ? 'selected':''); ?>>not started</option>
                                            <option value="2" <?php echo e(($status->contract ?? '')  == '2' ? 'selected':''); ?>>in progress</option>
                                            <option value="3" <?php echo e(($status->contract ?? '')  == '3' ? 'selected':''); ?>>completed</option>
                                        </select>
                                        <!-- </div> -->
                                    <img src="<?php echo e(asset('frontend/images/1x/arrowpng.png')); ?>" alt="">

                                    </div>
                                </div>
                                <div class="statusNote">
                                    <div class="clibtn2 d-flex" data-bs-toggle="modal"
                                        data-bs-target="#addNoteFourModal">
                                        <a href="" data-bs-toggle="modal" onclick="get_ids(<?php echo e($advisordetails->id); ?>,3)" notes-id=<?php echo e(Auth::id()); ?> data-bs-target="#addNoteexampleModal" id="third_modal">
                                            <i class="fa-solid fa-plus" id="addnotes"></i>
                                            Add/View Note
                                        </a>

                                    </div>
                                </div>
                            </div>

                            
                            <div class="agentAdress d-flex">
                                <div class="adresB">
                                    <label for="">
                                        Address of the home
                                    </label>
                                    <input type="text" value="<?php echo e($status->address??''); ?>" placeholder="XYZ Street" name="address">
                                </div>
                                <div class="adresB">
                                    <label for="">
                                        Sale price
                                    </label>
                                    <input type="number" value="<?php echo e($status->sale_price??''); ?>" placeholder="$50555" name="sale_price">
                                </div>
                            </div>
                        </div>
                        <div class="statusOneB d-flex justify-content-between flex-column ">
                            <div class=" mystatusOneB d-flex justify-content-between align-items-center" style="width: 100%;">
                                <div class="statusName d-flex align-items-center ">
                                    <label for="">
                                        Closed
                                    </label>
                                    <div class="statusDropDown">
                                        <input type="hidden"  name="status_id_4" value="4">
                                        <select name="closed" id="">
                                            <option value="1" <?php echo e(($status->closed ?? '') == '1' ? 'selected':''); ?>>not started</option>
                                            <option value="2" <?php echo e(($status->closed ?? '') == '2' ? 'selected':''); ?>>in progress</option>
                                            <option value="3" <?php echo e(($status->closed ?? '') == '3' ? 'selected':''); ?>>completed</option>
                                        </select>
                                    <img src="<?php echo e(asset('frontend/images/1x/arrowpng.png')); ?>" alt="">

                                    </div>
                                </div>
                                <div class="statusNote">
                                    <div class="clibtn2 d-flex" data-bs-toggle="modal"
                                        data-bs-target="#addNoteFourModal">
                                        <a href="" data-bs-toggle="modal" onclick="get_ids(<?php echo e($advisordetails->id); ?>,4)" notes-id=<?php echo e(Auth::id()); ?> data-bs-target="#addNoteexampleModal" id="fourth_modal">
                                            <i class="fa-solid fa-plus" id="addnotes"></i>
                                            Add /View Note
                                        </a>
                                    </div>
                                </div>
                            </div>
                                    

                                
                            <div class="agentNote d-flex flex-column">
                                <div class="noteHeading">
                                    <h4>
                                        Note
                                    </h4>
                                </div>
                                <p>
                                    <?php echo $admin_note->note_description ?? ''; ?>

                                </p>
                            </div>
                            <div class="modal-footer clibtn2">
                                <button class="" type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
 <!-- Modal -->
 <div class="modal fade" id="addNoteexampleModal" tabindex="-1" aria-labelledby="addNoteexampleModalLabe"
 aria-hidden="true">
 <div class="modal-dialog modal-lg">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="addNoteFourModal">Add Note</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form  method="POST" id="regiterForm">
             <?php echo csrf_field(); ?>
             <input type="hidden" id="client_id" name="client_id">
             <input type="hidden" id="status_id" name="status_id" >
             <input type="hidden" name="agent_id" value="<?php echo e(Auth::id()); ?>" >
         <div class="modal-body">
             <input type="hidden" id="modal_id" value="">
             <textarea name="notes" id="notes"
                 placeholder="Add Note Here"
                 id="" cols="30" rows="10" ></textarea>
             <!-- <input type="text" placeholder=""> -->
         </div>
         <div class="modal-footer">
             <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
             <button type="submit" class="submit" onclick="add_client()">Add</button>

         </div>
         </form>
     </div>
 </div>
</div>
        <!-- footer -->
        <footer class="">
            <div class="container">
                <div class="footer d-flex justify-content-between">
                    <div class="copyWrite">
                        <div class="copyWrite">
                            <p><?php echo e($configuration->copyright ?? ''); ?> <br> DESIGNED AND DEVELOPED BY  <a href="https://designprosusa.com/" target="_blank">DESIGN PROS USA</a></p>
                    </div>
                    </div>
                    <div class="pricavy">
                        <a href="<?php echo e(route('privacy-policy')); ?>">
                            <p>Privacy Policy</p>
                        </a>
                    </div>
                </div>

            </div>
        </footer>
    <!-- </div> -->

<script>

    $("#addnotes").on('click',function() {
        // alert('clicked');
            $("#pageloader").fadeIn();
    });

    function add_client(){
        // alert('test');
        $('#addNoteexampleModal').modal('hide');
    }

$("#regiterForm").submit(function() {
        $("#pageloader").fadeIn();
    });
  function get_ids(client_id,status_id){
    $("#client_id").val(client_id);
    $("#status_id").val(status_id);
    var TOKEN =  $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": TOKEN
        }
    });
    var url =  "<?php echo e(route('get_client')); ?>";
    $.ajax({
        type: "GET",
        url: url,
        dataType: "json",
        data: {
            client_id:client_id,status_id:status_id
        },
        success: function(response) {
        $("#pageloader").hide();
    // console.log(response.client_detail);
        if(response == ''){
            $("#notes").val('');
        }
            $("#notes").val(response.client_detail.notes);

        }
     });

  }
    </script>
    <script type="text/javascript">
        $('.submit').click(function(event){
                event.preventDefault();
                    var client_id = $("#client_id").val();
                    var status_id = $("#status_id").val();
                    var agent_id = <?php echo e(Auth::id()); ?>;
                    var notes = $("#notes").val();
            $.ajax({
                type:"POST",
                url:"<?php echo e(route('add_notes')); ?>",
                data:{
                    'client_id':client_id,
                        'status_id':status_id,
                        'agent_id':agent_id,
                        'notes':notes
                        },
                    success: function(data){
                        // alert("Data Save:");
                        swal({
                        icon: 'success',
                        title: "Note",
                        text: "Note Added Successfully",
                        type: "success",
                        showCancelButton: true,
                        confirmButtonText: "Confirmer",
                        cancelButtonText: "Annuler",
                    })
                }

            });
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('website.master.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agent_advisor\resources\views/website/advisor_details.blade.php ENDPATH**/ ?>