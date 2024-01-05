<?php $__env->startSection('title', 'Account'); ?>
<?php $__env->startSection('content'); ?>

    <?php if(Session::has('message')): ?>
        <script type="text/javascript">
            swal("Dear customer!", "<?php echo e(Session::get('message')); ?>", "success");
        </script>
    <?php endif; ?>
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

        .inputboxes.myInputbox {
            margin-top: 1rem !important;
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

        .bcAinputBo select {
            background-color: transparent;
            color: #fff;
            width: 100%;
            border: none;
            border-bottom: 1px solid #fff;
            outline: none;
            padding-bottom: 5px;
            padding-left: 5px;
            font-family: Poppins-Regular;
        }

        .infoheading.for-remove-padding {
            padding-top: 18px;
        }

        .bcAinputBo select option {
            color: #000 !important;
        }

        .bcAinputBo.cstm--select-arrow select {
            appearance: auto;
            padding-left: 0px;
        }

        @media  only screen and (max-width: 2560px) {
            .for-mainContianer-cstm-height {
                height: 100%;
            }

            .inputboxes .signinbtn {
                top: -40px;
            }
        }

        @media  only screen and (max-width: 1920px) {}

        @media  only screen and (max-width: 1600px) {}

        @media  only screen and (max-width: 1366px) {
            .inputboxes .signinbtn {
                top: -30px;
            }
        }

        @media  only screen and (max-width: 1024px) {
            .mainContianer.for-cstm-100-height .infocontianer .myInputbox {
                margin-top: 5rem !important;
            }

            .for-mainContianer-cstm-height {
                height: 100% !important;
            }

            .inputboxes .signinbtn {
                top: -30px;
            }
        }
    </style>
    <div id="pageloader">
        <img src="<?php echo e(asset('frontend/images/1x/loader 1.gif')); ?>" alt="processing..." width="30px" height="30px" />
    </div>

    <div class="conatiner">
        <div class="mainContianer for-mainContianer-cstm-height for-cstm-100-height">
            <div class="paddingContainer">

                <div class="infocontianer">
                    <div class="infoheading d-flex for-remove-padding">
                        <div class="backIcon">
                            <a href="<?php echo e(route('agent_advisor')); ?>">
                                <img src="<?php echo e(asset('frontend/images/1x/backIc.png')); ?>" alt="Back" width="100%"
                                    height="100%">
                            </a>
                        </div>
                        <p>
                            Request for an Account
                        </p>
                    </div>

                    <div class="profileImage">
                        <!-- <img src="./assets/images/1x/profileimage.png" alt="profileImage" width="150px" height="100%"> -->
                    </div>
                    <form method="POST" action="<?php echo e(url('become_agent_process')); ?>" id="regiterForm">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" id="type" name="type" value="4">
                        <input type="hidden" id="status" name="status" value="0">
                        <div class="inputboxes myInputbox">
                            <div class="bcAinputBo">
                                <input type="text" placeholder="Name" value="<?php echo e(old('name')); ?>" name="name">
                            </div>

                            <div class="bcAinputBo">
                                <input type="email" placeholder="Email" value="<?php echo e(old('email')); ?>" name="email">
                            </div>

                            <div class="bcAinputBo">
                                <input id="phone12" type="tel" placeholder="Phone No." value="<?php echo e(old('phone_no')); ?>"
                                    name="phone_no" maxlength="14" pattern="[(][0-9]{3}[)] [0-9]{3}-[0-9]{4}">
                            </div>

                            <div class="bcAinputBo cstm--select-arrow">
                                <select name="state" id="selectstate">
                                    <option value="">State</option>
                                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->state); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="bcAinputBo cstm--select-arrow">
                                <select id="city" name="city">
                                    <option value="">City</option>
                                    
                                </select>
                            </div>

                            <div class="bcAinputBo">
                                <input type="text" placeholder="Subject" value="<?php echo e(old('subject')); ?>" name="subject">
                            </div>
                            <div class="bcAinputBo">
                                <input type="password" placeholder="Password" value="<?php echo e(old('password')); ?>"
                                    name="password">
                            </div>
                            <div class="bcAinputBo">
                                <input type="password" placeholder="Confirm Password"
                                    value="<?php echo e(old('confirm_password')); ?>" name="confirm_password">
                            </div>
                            <div class="signinbtn">
                                <button type="submit">
                                    Send
                                </button>
                            </div>
                        </div>
                    </form>

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

        $("#selectstate").on('change',function() {
             $("#pageloader").fadeIn();
        });

        $("#regiterForm").submit(function() {
            $("#pageloader").fadeIn();
        });
    </script>

    <script>
        $('#selectstate').on('change', function() {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: '<?php echo e(route('get_state_location')); ?>',
                "dataSrc": "",
                data: {
                    'id': id
                },
                // dataType: 'json',
                //  cache: false,
                success: function(response) {
                    console.log(response.clients);
                    $("#pageloader").hide()
                    $('#city').html('');
                    if (response != '') {
                        $.each(response.clients, function(value, i) {
                            $('#city').append('<option value ="' + i.id + '">' + i.city +
                                '</option>');
                        });
                    } else {
                        $('#city').append('<h3>No City Found</h3>');
                    }
                }
            });
        });

        // for city dependent
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.master.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agent_advisor\resources\views/website/become_agent.blade.php ENDPATH**/ ?>