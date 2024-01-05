<?php $__env->startSection('title','Forget Password'); ?>
<?php $__env->startSection('content'); ?>

<?php if(Session::has('forget')): ?>
<script type="text/javascript">
    swal("Email Sent!", "<?php echo e(Session::get('forget')); ?>", "success");
</script>
<?php elseif(Session::has('status')): ?>
<script type="text/javascript">
    swal("Un Authorize!", "<?php echo e(Session::get('status')); ?>", "error");
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
<div class="conatiner">
    <div class="mainContianer mymainContainer">
        <div class="paddingContainer">

            <div class=" myinfocontianer">
                <div class="infoheading d-flex">
                    <div class="backIcon">
                        <a href="<?php echo e(route('agent_advisor')); ?>">
                            <img src="<?php echo e(asset('frontend/images/1x/backIc.png')); ?>" alt="Back" width="100%" height="100%">
                        </a>
                    </div>
                    <p>
                        Forgot Password
                    </p>
                </div>
                <div class="profileImage">
                    <!-- <img src="./assets/images/1x/profileimage.png" alt="profileImage" width="150px" height="100%"> -->
                </div>
                <div class="inputboxes mypricavypolicyInput">
                    <form method="POST" action="<?php echo e(url('forget_email')); ?>" id="regiterForm">
                        <?php echo csrf_field(); ?>
                    <div class="bcAinputBo">
                        <input type="text" placeholder="Email" name="email">
                    </div>

                    <div class="signinbtn">
                            <button type="submit">
                                Send
                            </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $("#regiterForm").submit(function() {
        $("#pageloader").fadeIn();
    });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.master.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agent_advisor\resources\views/website/forget_password.blade.php ENDPATH**/ ?>