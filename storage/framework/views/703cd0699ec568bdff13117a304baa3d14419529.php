<?php $__env->startSection('title','Signin'); ?>
<?php $__env->startSection('content'); ?>

<?php if(Session::has('login')): ?>
<script type="text/javascript">
    swal("Invalid!", "<?php echo e(Session::get('login')); ?>", "error");
</script>
<?php elseif(Session::has('password')): ?>
<script type="text/javascript">
    swal("Invalid!", "<?php echo e(Session::get('password')); ?>", "success");
</script>
<?php elseif(Session::has('passwordchange')): ?>
<script type="text/javascript">
    swal("Password Updated!", "<?php echo e(Session::get('passwordchange')); ?>", "success");
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
    .signinbtn.for-top-pixel{
        margin-top: 66px
    }
    .mainContianer .paddingContainer .infocontianer::after {
    height: 70%;
}
@media  only screen and (max-width: 1366px) {
    .mainContianer .paddingContainer .infocontianer::after {
    height: 75%;
}

.mainContianer .paddingContainer .infocontianer::after {
    content: "";
    top: 6%;
}
}

    </style>
      <div id="pageloader">
        <img src="<?php echo e(asset('frontend/images/1x/loader 1.gif')); ?>" alt="processing..." width="30px" height="30px" />
    </div>
<div class="conatiner">
    <div class="mainContianer">
        <div class="paddingContainer">
            <div class="infocontianer">
                <div class="profileImage">
                    <img src="<?php echo e(asset('frontend/images/1x/profileimage.png')); ?>" alt="profileImage" width="150px" height="100%">
                </div>
                <form method="POST" action="<?php echo e(url('agent_advisor_process')); ?>" id="regiterForm">
                    <?php echo csrf_field(); ?>
                <div class="inputboxes">
                    <div class="emailinfo d-flex align-items-center">
                        <div class="emailIcon">
                            <img src="<?php echo e(asset('frontend/images/1x/emailIcon.png')); ?>" width="100%" height="100%" alt="Email Icon">
                        </div>
                        <input type="email"  name="email" placeholder="Enter Email">
                    </div>
                    <div class="passwordInfo d-flex align-items-center">
                        <div class="passIcon">
                            <img src="<?php echo e(asset('frontend/images/1x/passwordIcon.png')); ?>" width="100%" height="100%"
                                alt="Email Icon">
                        </div>
                        <input type="password" name="password" placeholder="Enter Password">
                    </div>
                    <div class="remberbox d-flex justify-content-between">
                        
                        <a href="<?php echo e(route('forget_password')); ?>">
                            <label for="">
                                Forgot Password?
                            </label>
                        </a>
                    </div>
                    <div class="signinbtn for-top-pixel">
                            <button type="submit">
                                Sign In
                            </button>
                    </div>
                </div>
                </form>
                <div class="bcAgent">
                    <a href="<?php echo e(route('become_agent')); ?>">
                        <p>
                            Become an agent
                        </p>
                    </a>
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

<?php echo $__env->make('website.master/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agent_advisor\resources\views/website/index.blade.php ENDPATH**/ ?>