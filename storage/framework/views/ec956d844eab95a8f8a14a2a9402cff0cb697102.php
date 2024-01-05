<?php $__env->startSection('title', 'Project List'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/owlcarousel.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/rating.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/style/style.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>Clients</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item">Clients </li>
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
            background-color: #00a808 !important;
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
</style>
    <div class="container-fluid">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-md-8">
                                <h5>Clients list</h5>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>
                                    
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <td><?php echo e($details->name); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?php echo e($details->email); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td><?php echo e($details->phone_number); ?></td>
                                    </tr> <tr>
                                        <th>Location</th>
                                        <td><?php echo e($details->location); ?></td>
                                    </tr>
                                     <tr>
                                        <th>Price</th>
                                        <td><?php echo e($details->price); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Buyer/Seller</th>
                                        <td><?php echo e($details->purchase); ?></td>
                                    </tr>
                                    <tr>

                                        <th>Description</th>
                                        <td><?php echo e($details->note); ?></td>
                                    </tr>
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
        </div>
    </div>
    <div class="container">
        <div class="">
    <div class="myStatus">
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
                <div class="statusDropDown mystatusDropdown">
                    <?php if(($details->get_notes[0]->contact_established ?? '') == 1): ?>
                    <input type="text"   placeholder="not started" readonly>
                    <?php elseif(($details->get_notes[0]->contact_established  ?? '') == 2): ?>
                    <input type="text"  placeholder="in progree" readonly>
                    <?php elseif(($details->get_notes[0]->contact_established  ?? '') == 3): ?>
                    <input type="text"  placeholder="completed" readonly>
                    <?php else: ?>
                    <input type="text"  placeholder="" readonly>
                    <?php endif; ?>
                </div>
            </div>

            <div class="statusNote statusNoteForhide">
                <div class="clibtn2 d-flex" data-bs-toggle="modal" data-bs-target="#addNoteexampleModal">
                    <a href="" data-bs-toggle="modal" data-bs-target="#addNoteexampleModal">
                        <i class="fa-solid fa-plus"></i>
                        Add Note
                    </a>
                </div>
            </div>
        </div>
        <div class="statusOneB d-flex justify-content-between">
            <div class="statusName d-flex align-items-center ">
                <label for="">
                    Meeting Successful
                </label>
                <div class="statusDropDown mystatusDropdown">
                    <?php if(($details->get_notes[0]->meeting ?? '') == 1): ?>
                    <input type="text"  placeholder="not started" readonly>
                    <?php elseif(($details->get_notes[0]->meeting ?? '') == 2): ?>
                    <input type="text"  placeholder="in progree" readonly>
                    <?php elseif(($details->get_notes[0]->meeting?? '') == 3): ?>
                    <input type="text"  placeholder="completed" readonly>
                    <?php else: ?>
                    <input type="text"  placeholder="" readonly>
                    <?php endif; ?>

                </div>
            </div>

            <div class="statusNote statusNoteForhide">
                <div class="clibtn2 d-flex">
                    <a href="" data-bs-toggle="modal" data-bs-target="#addNoteexampleModal">
                        <i class="fa-solid fa-plus"></i>
                        Add Note
                    </a>
                </div>
            </div>
        </div>
        <div class="statusOneB d-flex justify-content-between flex-column ">
            <div class="mystatusOneB  d-flex justify-content-between align-items-center"
                style="width: 100%;">
                <div class="statusName d-flex align-items-center ">
                    <label for="">
                        Currently under contract
                    </label>
                    <div class="statusDropDown mystatusDropdown">
                    <?php if(($details->get_notes[0]->contract ?? '') == 1): ?>
                    <input type="text"  placeholder="not started" readonly>
                    <?php elseif(($details->get_notes[0]->contract ?? '') == 2): ?>
                    <input type="text"  placeholder="in progree" readonly>
                    <?php elseif(($details->get_notes[0]->contract ?? '') == 3): ?>
                    <input type="text"  placeholder="completed" readonly>
                    <?php else: ?>
                    <input type="text"  placeholder="" readonly>
                    <?php endif; ?>

                    </div>
                </div>
                <div class="statusNote statusNoteForhide">
                    <div class="clibtn2 d-flex">
                        <a href="" data-bs-toggle="modal" data-bs-target="#addNoteexampleModal">
                            <i class="fa-solid fa-plus"></i>
                            Add Note
                        </a>
                    </div>
                </div>
            </div>
            <div class="agentAdress d-flex">
                <div class="adresB">
                    <label for="">
                        Address of the home
                    </label>
                    <input type="text" value="<?php echo e($details->get_notes[0]->address ?? ''); ?>" placeholder="">
                </div>
                <div class="adresB">
                    <label for="">
                        Sale price
                    </label>
                    <input type="text" value="<?php echo e($details->get_notes[0]->sale_price ?? ''); ?>" placeholder="$50555">
                </div>
            </div>
        </div>
        <div class="statusOneB d-flex justify-content-between flex-column ">
            <div class=" mystatusOneB d-flex justify-content-between align-items-center"
                style="width: 100%;">
                <div class="statusName d-flex align-items-center ">
                    <label for="">
                        Closed
                    </label>
                    <div class="statusDropDown mystatusDropdown">
                    <?php if(($details->get_notes[0]->closed ?? '') == 1): ?>
                    <input type="text"  placeholder="not started" readonly>
                    <?php elseif(($details->get_notes[0]->closed ?? '') == 2): ?>
                    <input type="text"  placeholder="in progree" readonly>
                    <?php elseif(($details->get_notes[0]->closed ?? '') == 3): ?>
                    <input type="text"  placeholder="completed" readonly>
                    <?php else: ?>
                    <input type="text"  placeholder="" readonly>
                    <?php endif; ?>

                    </div>
                </div>
                <div class="statusNote statusNoteForhide">
                    <div class="clibtn2 d-flex" data-bs-toggle="modal"
                        data-bs-target="#addNoteexampleModal">
                        <a href="" data-bs-toggle="modal" data-bs-target="#addNoteexampleModal">
                            <i class="fa-solid fa-plus"></i>
                            Add Note
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agent_advisor\resources\views/client/show.blade.php ENDPATH**/ ?>