<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/agentlogo.jpg')); ?>" type="image/x-icon">
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

     <title> <?php echo $__env->yieldContent('title'); ?></title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">


    <?php echo $__env->make('layouts.authentication.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        toastr.options = {
            "positionClass": "toast-top-right",
            "showDuration": "9000",
            "hideDuration": "9000",
            "timeOut": "9000",
            "extendedTimeOut": "9000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    </script>
    <?php echo $__env->yieldContent('style'); ?>
  </head>
  <body>
    <!-- login page start-->
    <?php echo $__env->yieldContent('content'); ?>
    <!-- latest jquery-->
    <?php echo $__env->make('layouts.authentication.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        <?php if(Session::has('message')): ?>
        var type = "<?php echo e(Session::get('alert-type','info')); ?>"
        switch(type){
           case 'success':
           toastr.success(" <?php echo e(Session::get('message')); ?> ");
           break;
           case 'warning':
           toastr.warning(" <?php echo e(Session::get('message')); ?> ");
           break;
           case 'error':
           toastr.error(" <?php echo e(Session::get('message')); ?> ");
           break;
        }
        <?php endif; ?>
        </script>

        <?php if($errors->any()): ?>

    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script>
        toastr.error('<?php echo e($error); ?>');
    </script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\agent_advisor\resources\views/layouts/authentication/master.blade.php ENDPATH**/ ?>