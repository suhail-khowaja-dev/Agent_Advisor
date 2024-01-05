<?php $__env->startSection('title','Profile'); ?>
<?php $__env->startSection('content'); ?>
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
    <!-- section -->
    <div class="mySection">

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
         </div>
    </header>
        <!-- header end -->

        <!-- table -->
        <section>
            <div class="container">
                <div class="tableContainer">
                    <div class="tablHeading">
                        <h5>
                            Edit Profile
                        </h5>
                    </div>
                    <div class="clientform">
                        <form method="POST" action="<?php echo e(route("profile_update",$profile->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="slug">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="clientInput" type="text" name="first_name" value="<?php echo e(old('first_name',$profile->first_name ?? $profile->name )); ?>" placeholder="First Name">
                            </div>
                            <div class="col-lg-6">
                                <input class="clientInput" type="text" name="last_name"  value="<?php echo e(old('last_name',$profile->last_name)); ?>" placeholder="Last Name" >
                            </div>
                            <div class="col-lg-6">
                                <div class="clientInputmain">
                                    <select id="state" class="dropdown" name="state">
                                        <optgroup label="Location" >
                                            <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option id="state" value="<?php echo e($item->id); ?>" <?php echo e($item->id == $profile->state ? 'selected' : ''); ?>><?php echo e($item->state); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </optgroup>
                                    </select>
                                    <img src="<?php echo e(asset('frontend/images/1x/arrowpng.png')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="clientInputmain">
                                    <select id="city" class="dropdown" name="city" >
                                        <optgroup label="Location" >
                                            <option  value="" >City</option>
                                        </optgroup>
                                    </select>
                                    <img src="<?php echo e(asset('frontend/images/1x/arrowpng.png')); ?>" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <input class="clientInput" type="text" name="bio"  value="<?php echo e(old('bio',$profile->bio)); ?>" placeholder="Bio">
                            </div>
                            <div class="col-lg-6">
                                <input class="clientInput" type="text" name="experience"  value="<?php echo e(old('experience',$profile->experience)); ?>" placeholder="Year of experience" >
                            </div>

                            <div class="col-lg-6">
                                <input class="clientInput" type="text" name="brokerage"  value="<?php echo e(old('brokerage',$profile->brokerage)); ?>" placeholder="Brokerage">
                            </div>

                        </div>
                        <div class="clientformbtns d-flex justify-content-between">
                            <div class="clibtn1 clibtn3">
                                    <button type="submit">
                                        Save
                                    </button>
                            </div>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>

        <!-- footer -->
        <footer class="myfooter">
            <div class="container">
                <div class="footer d-flex justify-content-between">
                    <div class="copyWrite">
                        <p><?php echo e($configuration->copyright ?? ''); ?> <br> DESIGNED AND DEVELOPED BY  <a href="https://designprosusa.com/" target="_blank">DESIGN PROS USA</a></p>

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
    <script>

    $("#state").on('change',function() {
         $("#pageloader").fadeIn();
    });

    ($('select[name="state"]').val());
    $("#pageloader").fadeIn();

 var id = ($('select[name="state"]').val());
  $.ajax({
    type: "GET",
    url: '<?php echo e(route('get_state_location')); ?>',
    "dataSrc": "",
    data:  {'id':id},
    success: function(response) {
        $("#pageloader").hide();
        // console.log(response.clients);
        $('#city').html('');
        var city = '<?php echo e($profile->location); ?>';
        if(response!='') {
            $("#city").append(`<optgroup label="Please Select City"></optgroup>`);
            $.each(response.clients, function(value,i) {
                var select = (i.id == city ? 'selected="selected"' : '');
                $('#city').append(`<option  value ="${i.id}" ${select}>${i.city}</option></optgroup>`);
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
                $('#city').append(`<option  value ="${i.id}"  >${i.city}</option></optgroup>`);
            });
            }else
            {
                $('#city').append('<h3>No City Found</h3>');
            }
         }
    });
});
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.master.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agent_advisor\resources\views/website/agent_profile.blade.php ENDPATH**/ ?>