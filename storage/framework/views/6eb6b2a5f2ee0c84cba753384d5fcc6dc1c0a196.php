<?php $__env->startSection('title', 'Project List'); ?>
<?php $__env->startSection('title', 'Base Inputs'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/date-picker.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/dropzone.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Advisors</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Advisors </li>
<li class="breadcrumb-item active">list</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    .page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper {
    height: 100% !important;
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
    <img src="<?php echo e(asset('frontend/images/1x/loader 1.gif')); ?>" alt="processing..." width="30px" height="30px" />
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit</h5>
            </div>
            
                <form class="form theme-form" id="regiterForm" action="<?php echo e(route("advisor_update",$edit_data->id )); ?>" enctype="multipart/form-data" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" value="3" name="type">
                    <input type="hidden" name="prevpassword" value="<?php echo e($edit_data->password); ?>">
                    <input type="hidden" name="show_password" value="<?php echo e($edit_data->show_password); ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Name.*</label>
                                <input name="name" class="form-control btn-square" id="exampleFormControlInput10" type="text" value="<?php echo e($edit_data->name); ?>" placeholder="Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Email.*</label>
                                <input name="email" class="form-control btn-square"  value="<?php echo e($edit_data->email); ?>" id="exampleFormControlInput10" type="text" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Phone.*</label>
                                <input name="phone_no" class="form-control btn-square" id="phone12"  value="<?php echo e($edit_data->phone_no); ?>" id="exampleFormControlInput10"  type="tel"  pattern="[(][0-9]{3}[)] [0-9]{3}-[0-9]{4}" placeholder="Phone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">State.*</label>
                                <select name="state" id="state" class="form-select" size="1">
                                    
                                    <?php $__currentLoopData = $location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option  value="<?php echo e($item->id); ?>" <?php echo e($item->id == $edit_data->state ? 'selected' : ''); ?>  ><?php echo e($item->state); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                 </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">City.*</label>
                                <select name="city" class="form-select" id="city" size="1">
                                    <option  value=""></option>
                                 </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Subject.*</label>
                                <input name="subject" class="form-control btn-square"  value="<?php echo e($edit_data->subject); ?>" id="exampleFormControlInput10" type="text" placeholder="Subject">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Password.*</label>
                                <input name="password" class="form-control btn-square" id="exampleFormControlInput10" type="password" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput10">Confirm Password.*</label>
                                <input name="confirm_password" class="form-control btn-square" id="exampleFormControlInput10" type="password" placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Submit</button>
                    
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.en.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/dropzone/dropzone.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/dropzone/dropzone-script.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/handlebars.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/typeahead.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/typeahead.custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead-search/handlebars.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead-search/typeahead-custom.js')); ?>"></script>
<script>

    $("#state").on('change',function() {
            $("#pageloader").fadeIn();
        });

         ($('select[name="state"]').val());
        $("#pageloader").fadeIn();

    $("#regiterForm").submit(function() {
        $("#pageloader").fadeIn();
    });

    var id = ($('select[name="state"]').val());
        $.ajax({
        type: "GET",
        url: '<?php echo e(route('get_state_location')); ?>',
        data:  {'id':id},
        success: function(response) {
            // console.log(response.clients);
            $("#pageloader").hide();
            $('#city').html('');
            var city = '<?php echo e($edit_data->location); ?>';
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
        url: '<?php echo e(route('get_state_location')); ?>',
        data:  {'id':id},
        success: function(response) {
            // console.log(response.clients);
            $("#pageloader").hide();
            $('#city').html('');
            if(response!='') {
                $.each(response.clients, function(value,i) {
                    $('#city').append(`<option  value ="${i.id}" >${i.city}</option>`);
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

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agent_advisor\resources\views/advisor/edit.blade.php ENDPATH**/ ?>