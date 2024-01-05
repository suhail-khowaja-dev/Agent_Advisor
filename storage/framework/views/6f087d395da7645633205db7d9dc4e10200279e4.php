<?php $__env->startSection('title', 'Agent'); ?>
<?php $__env->startSection('content'); ?>

    <?php if(Session::has('status')): ?>
        <script type="text/javascript">
            swal("Thank You!", "<?php echo e(Session::get('status')); ?>", "success");
        </script>
    <?php elseif(Session::has('authenticate')): ?>
        <script type="text/javascript">
            swal("Un Authorize!", "<?php echo e(Session::get('authenticate')); ?>", "warning");
        </script>
    <?php elseif(Session::has('contact')): ?>
        <script type="text/javascript">
            swal("Thank you!", "<?php echo e(Session::get('contact')); ?>", "success");
        </script>
    <?php elseif(Session::has('profile')): ?>
        <script type="text/javascript">
            swal("Profile!", "<?php echo e(Session::get('profile')); ?>", "success");
        </script>
    <?php elseif(Session::has('status')): ?>
        <script type="text/javascript">
            swal("Status!", "<?php echo e(Session::get('status')); ?>", "success");
        </script>
    <?php endif; ?>
    <style>
        .imgesec3 .iimg,
        .imgesec4 .iimg,
        .imgesec2 .iimg {
            margin-top: 36px;
        }

        .cstm-tabel-css .dataTables_filter {
            margin-bottom: 2rem;
        }

        .cstm-tabel-css .dataTables_wrapper .dataTables_filter input {
            border-radius: 33px;
        }

        .tableContainer .tablee {
            height: 100%;
            overflow: hidden;
        }
        .tablee.cstm-tabel-css{
            overflow: auto;
        }
        .tablee.cstm-tabel-css thead td{
            width: 400px  !important;
            min-width: 100%  !important;
            width: 100%  !important;
        }
        .clientBox {
            height: 125px;
        }

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

        .check-box-div {
            display: flex;
            align-items: baseline;
            background: #e3e3e3;
            color: #4D4D4D;
            font-family: Poppins-Regular;
            border-radius: 10px;
            padding: 1rem 10px;
            box-shadow: 0px 0px 5px 2px #00000042;
            margin-bottom: 1rem;
        }

        .check-box-div input {
            margin-right: 10px;
        }
    </style>
    <div id="pageloader">
        <img src="<?php echo e(asset('frontend/images/1x/loader 1.gif')); ?>" alt="processing..." width="30px" height="30px" />
    </div>
    <header>
        <div class="container">
            <div class="headerSection d-flex justify-content-end">
                
                <div class="profileInfo d-flex align-items-center">
                    <div class="userImage">
                        <img src="<?php echo e(asset('frontend/images/1x/profileimage.png')); ?>" alt="profileImage" width="100%"
                            height="100%">
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
    </header>
    <!-- header end -->

    <!-- refer client section -->
    <section>
        <div class="container">
            <div class="referClientSect myreff">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="referclientbox d-flex clientBox">
                            <div class="imgesec3">
                                <div class="iimg">
                                    <img src="<?php echo e(asset('frontend/images/1x/callIcon.png')); ?>" alt="Image" width="100%"
                                        height="100%">
                                </div>
                            </div>
                            
                            <div class="referenceClientText">
                                <h5>
                                    <?php echo e($Contact_page->contact_title ?? ''); ?>

                                </h5>
                                <p>
                                    <?php echo $Contact_page->contact_description ?? ''; ?>

                                </p>
                                <a class="d-flex" href="<?php echo e(route('agent-contact')); ?>">
                                    <div class="refcA">
                                        Contact Now
                                    </div>
                                    <div class="imgg">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                            

                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="referclientbox d-flex clientBox">
                            <div class="imgesec4">
                                <div class="iimg">
                                    <img src="<?php echo e(asset('frontend/images/1x/agentRefIcon.png')); ?>" alt="Image"
                                        width="100%" height="100%">
                                </div>
                            </div>
                            <div class="referenceClientText">
                                <h5>
                                    <?php echo e($Refer_page->client_title ?? ''); ?>

                                </h5>
                                <p>
                                    <?php echo $Refer_page->client_description ?? ''; ?>

                                </p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="referclientbox d-flex clientBox">
                            <div class="imgesec2">
                                <div class="iimg">
                                    <img src="<?php echo e(asset('frontend/images/1x/agentEditIc.png')); ?>" alt="Image"
                                        width="100%" height="100%">
                                </div>
                            </div>

                            <div class="referenceClientText">
                                <h5>
                                    <?php echo e($profile->profile_title ?? ''); ?>

                                </h5>
                                <p>
                                    <?php echo $profile->profile_description ?? ''; ?>

                                </p>
                                <a href="<?php echo e(route('agent-profile', Auth::user()->slug)); ?>" class="d-flex">
                                    <div class="refcA">
                                        Edit Profile
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
            <div class="tableContainer">
                <div class="tablHeading">
                    <h5>
                        All Clients
                    </h5>
                </div>
                <div class="tablee cstm-tabel-css">
                    <table id="table1" class="table">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Phone.</td>
                                
                                <td>Price</td>
                                <td>Refer</td>
                                <td>Buyer/Seller</td>
                                <td>Location</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $agent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(isset($item)): ?>
                                    <?php if($item->status == 0): ?>
                                        <tr>
                                            <td><?php echo e(Str::limit($item->name, 5, $end = '***')); ?></td>
                                            <td><?php echo e(Str::limit($item->email, 3, $end = '***')); ?></td>
                                            <td><?php echo e(Str::limit($item->phone_number, 2, $end = '***')); ?></td>
                                            <td><?php echo e("$" . $item->price); ?></td>
                                            <td><?php echo e('N/A'); ?></td>
                                            <td><?php echo e($item->purchase); ?></td>
                                            <td><?php echo e($item->getstate->state ?? ''); ?>,<?php echo e($item->getcity->city ?? ''); ?></td>
                                            <td>
                                                <div class="myNewBtn  d-flex align-items-center ">
                                                    <a href="<?php echo e(url('status', $item->id)); ?>"
                                                        onclick="status(<?php echo e($item->id); ?>)"
                                                        <?php if($item->terms == 0 ): ?>
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#addNoteexampleModal"
                                                        <?php endif; ?>

                                                        class="modal-remove<?php echo e($item->id); ?>">
                                                        <button class="accept" id="acceptjob">
                                                            Accept
                                                        </button>
                                                    </a>

                                                    <a href="<?php echo e(url('decline', $item->id)); ?>" class="dclinejob">
                                                        <button class="myDeclient" id="declinejob" >
                                                            Decline
                                                        </button>
                                                    </a>
                                            </td>
                                                </div>
            <?php elseif($item->status == 1): ?>
                <td><a href="<?php echo e(route('client-details', $item->slug)); ?>" style="color: #22B573"><?php echo e($item->name); ?></a>
                </td>
                <input type="hidden" name="client_id" value="<?php echo e($item->id); ?>">
                <td style="color: #22B573"><?php echo e($item->email); ?></td>
                <td style="color: #22B573"><?php echo e($item->phone_number); ?></td>
                <td style="color: #22B573"><?php echo e("$" . $item->price); ?></td>
                <td><?php echo e("$" . $item->after_refer_price ?? 'N/A'); ?></td>
                <td style="color: #22B573"><?php echo e($item->purchase); ?></td>
                <td style="color: #22B573"><?php echo e($item->getstate->state ?? ''); ?>,<?php echo e($item->getcity->city ?? ''); ?></td>
                <td>
                    <div class="myNewBtn  d-flex justify-content-between">
                        <button class="accepted" id="regiterForm">
                            Accepted
                        </button>
                    </div>
                </td>
            <?php else: ?>
                <td><?php echo e(Str::limit($item->name, 5, $end = '***')); ?></td>
                <td><?php echo e(Str::limit($item->email, 3, $end = '***')); ?></td>
                <td><?php echo e(Str::limit($item->phone_number, 2, $end = '***')); ?></td>
                <td><?php echo e("$" . $item->price); ?></td>
                <td><?php echo e('N/A'); ?></td>
                <td><?php echo e($item->purchase); ?></td>
                <td><?php echo e($item->getstate->state ?? ''); ?>,<?php echo e($item->getcity->city ?? ''); ?></td>
                <td>
                    <div class="myNewBtn  d-flex align-items-center justify-content-between">
                        <button class="declined">
                            Declined
                        </button>
                    </div>
                </td>
                <?php endif; ?>
                </tr>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                </table>
            </div>
        </div>
        </div>
    </section>

    <div class="modal fade" id="addNoteexampleModal" tabindex="-1" aria-labelledby="addNoteexampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNoteexampleModalLabel">Agreement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <?php echo csrf_field(); ?>
                        <div class="check-box-div">
                            <?php $accept=''; ?>
                            <input type="checkbox" name="terms" id="terms" class="terms" >
                            <p>The agent/broker agree to pay a 25% referral fee to Realty One Group
                                Generations within 30 days of closing.</p>
                        </div>
                    </form>
                    

                </div>
                <div class="modal-footer">

                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <input type="hidden" id="agreement" name="agreement" value>
                    

                    <a id="terms">
                        <button type="button" class="continue" id="continue_accept"  onclick="continue_accept()">Continue</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    

    <!-- footer -->
    <footer class="">
        <div class="container">
            <div class="footer d-flex justify-content-between">
                <div class="copyWrite">
                    <p><?php echo e($configuration->copyright ?? ''); ?> <br> DESIGNED AND DEVELOPED BY <a
                            href="https://designprosusa.com/" target="_blank">DESIGN PROS USA</a></p>
                </div>
                <div class="pricavy">
                    <a href="<?php echo e(route('privacy-policy')); ?>">
                        <p>Privacy Policy</p>
                    </a>
                </div>
            </div>

        </div>
    </footer>

    <script>
        function status(id) {
            $("#terms").attr("href", `<?php echo e(env('APP_URL')); ?>/terms/${id}`);
                $("#terms").val(id);
                    $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                    type: "GET",
                    url :  `<?php echo e(env('APP_URL')); ?>/terms-get/${id}`,
                    data:   { "_token": "<?php echo e(csrf_token()); ?>", id: id,},

                    success: function(response) {

                        // $("#terms").html(response);
                        // console.log(re)
                        console.log(response.accept);
                        if(response.accept == 1){
                                    $("#pageloader").fadeIn();
                            $("#terms").attr("checked",true);

                        }else {
                            $("#terms").attr("checked",false);
                        }

                    }
                });
        }
    </script>
    <script>
        $(document).on("click", "#cust_btn", function() {

            $("#myModal").modal("toggle");

        })
    </script>
    <script>
        $(document).ready(function() {
            $('#table1').DataTable();
        });

    </script>
    <script>
     $(document).ready(function(){
       $('.terms').on('change', function(e){
            e.preventDefault();
            var id  = $("#terms").val();
         $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
             type: "POST",
             url :  `<?php echo e(env('APP_URL')); ?>/terms/${id}`,
             data:   { "_token": "<?php echo e(csrf_token()); ?>", id: id,},
             success: function(response) {
                // $("#terms").html(response);
                // console.log(response.accept.terms);
                if(response.status == 200){
                    $('.modal-remove'+id).removeAttr("data-bs-target");
                    $('.modal-remove'+id).removeAttr("data-bs-toggle");
                    toastr.success('Terms and Conditions Accepted Successfully');
                    // $("#pageloader").fadeIn();
                }
            }
            });

        });
    });


    </script>
    <script>
        function continue_accept(){
            $('#addNoteexampleModal').modal('hide');
        }
    </script>
    <script>
        $('.dclinejob').on('click', function() {
           $("#pageloader").fadeIn();
       });


    </script>

    <script>
    // $(document).ready(function() {
    //     $('.accept').on('click', function() {
    //         $("#pageloader").fadeIn();
    //     });
    // });
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('website.master.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agent_advisor\resources\views/website/agent.blade.php ENDPATH**/ ?>