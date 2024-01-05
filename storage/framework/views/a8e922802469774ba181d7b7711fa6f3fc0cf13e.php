<?php $__env->startSection('title','Forget Password'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .myPasswordBox {
        margin-top: 8.5rem !important;
    }
</style>
<?php if(Session::has('authorize')): ?>
<script type="text/javascript">
    swal("Un Authorize!", "<?php echo e(Session::get('authorize')); ?>", "error");
</script>
<?php elseif(Session::has('token')): ?>
<script type="text/javascript">
    swal("Invalid!", "<?php echo e(Session::get('token')); ?>", "error");
</script>
<?php endif; ?>
<div class="conatiner">
    <div class="mainContianer mymainContainer ">
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
                <div class="inputboxes mypricavypolicyInput myPasswordBox">
                    <!-- <div class="bcAinputBo">
                        <input type="text" placeholder="Name">
                    </div> -->
                    <form method="POST" action="<?php echo e(url('update_password')); ?>">
                        <?php echo csrf_field(); ?>
                    <input type="hidden" name="token" value="<?php echo e($token); ?>">
                    <div class="bcAinputBo">
                        <input type="email" name="email" placeholder="Enter Email"  value="<?php echo e(old('email')); ?>">
                    </div>
                    <div class="bcAinputBo">
                        <input type="password" name="password" placeholder="Enter New Password" name="password" value="<?php echo e(old('password')); ?>">
                    </div>
                    <div class="bcAinputBo">
                        <input type="password" name="password_confirmation" placeholder="Enter Confirm Password" >
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.master.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agent_advisor\resources\views/website/update_password.blade.php ENDPATH**/ ?>