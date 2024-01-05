<?php $__env->startSection('title', 'Project List'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/owlcarousel.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/rating.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>Agents</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item">Agents </li>
    <li class="breadcrumb-item active">list </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .round-cstm-btn-red {
            border-radius: 30px !important;
            padding: 6px 1rem !important;
            font-family: Poppins-Regular;
            background-color: #C1272D !important;
            border: none;
        }
        .round-cstm-btn-green {
            border-radius: 30px !important;
            padding: 6px 1rem !important;
            font-family: Poppins-Regular;
            background-color: #22B573 !important;
            border: none;
        }

        .round-cstm-btn-red a,
        .round-cstm-btn-green a {
            color: #fff;
            font-size: 14px;
        }
        .createButton {
    display: flex;
    gap: 10px;
    align-items: center;
    font-size: 15px !important;

}
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
            .page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper {
            height: 100% !important;
            }
    </style>

      <div id="pageloader">
        <img src="<?php echo e(asset('frontend/images/1x/loader 1.gif')); ?>" alt="processing..." width="30px" height="30px" />
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-md-8">
                                <h5>Agents list</h5>
                            </div>
                            <div class="col-md-2 offset-lg-2" align="right">
                                <a class="btn btn-primary createButton" href="<?php echo e(route('user-create')); ?>">
                                    <i data-feather="plus-square"> </i> Create</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $getCMS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($value->name); ?></td>
                                            <td><?php echo e($value->email); ?></td>
                                            <td><?php echo e($value->phone_no); ?></td>
                                            
                                            <td>
                                                <a href="<?php echo e(route('agent_status', ['id' => $value->id])); ?>">
                                                    <?php if($value->status == 1): ?>
                                                        <button class="btn btn-info btn-sm" id="status"><i class="fa fa-thumbs-up"></i></button>
                                                    <?php else: ?>
                                                        <button class="btn btn-danger btn-sm" id="status"><i class="fa fa-thumbs-down"></i></button>
                                                    <?php endif; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a
                                                href="<?php echo e(route('user-destroy', $value->slug)); ?>"
                                                id="delete"> <button class="btn btn-danger btn-xs round-cstm-btn-red" type="button"
                                                    data-original-title="btn btn-danger btn-xs" title="">Delete</button></a>
                                                    <a
                                                    href="<?php echo e(route('user-edit', $value->slug)); ?>"><button class="btn btn-success btn-xs round-cstm-btn-green" type="button"
                                                    data-original-title="btn btn-danger btn-xs" title=""> Edit</button></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/rating/jquery.barrating.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/rating/rating-script.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/owlcarousel/owl.carousel.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/ecommerce.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/product-list-custom.js')); ?>"></script>

    <script>

$(document).on('click','#status',function(){
    $("#pageloader").fadeIn();
     })
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agent_advisor\resources\views/users/index.blade.php ENDPATH**/ ?>