<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title','Details'); ?>
 <!-- header -->
 <header>

    <div class="container">
        <div class="myhhedaer d-flex justify-content-between align-items-center">
            <!-- backArrow -->

            <div class="backIcon mybackIcon">
                <a href="<?php echo e(route('advisor')); ?>">
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

</header>
<!-- header end -->

<!-- table -->
<section>
    <div class="container">
        <div class="tableContainer">
            <div class="tablHeading agentClientheading">
                <h5>
                    Details
                </h5>
            </div>
            <div class="tablee agentClientTable myagentClientTable">
                <div class="row">
                    <div class="col-lg-3">
                        <label for="">
                            Name
                        </label>
                    </div>
                    <div class="col-lg-9">
                        <p><?php echo e($details->name); ?></p>
                    </div>
                    <div class="col-lg-3">
                        <label for="">
                            Email
                        </label>
                    </div>
                    <div class="col-lg-9">
                        <p><?php echo e($details->email); ?></p>
                    </div>
                    <div class="col-lg-3">
                        <label for="">
                            Phone No.
                        </label>
                    </div>
                    <div class="col-lg-9">
                        <p><?php echo e($details->phone_number); ?></p>
                    </div>
                    <div class="col-lg-3">
                        <label for="">
                            Description
                        </label>
                    </div>
                    <div class="col-lg-9">
                        <p>
                           <?php echo e($details->note); ?>

                        </p>
                    </div>
                    <div class="col-lg-3">
                        <label for="">
                            Price range
                        </label>
                    </div>
                    <div class="col-lg-9">
                        <p>$<?php echo e($details->price); ?></p>
                    </div>
                    <div class="col-lg-3">
                        <label for="">
                            Buyer/Seller
                        </label>
                    </div>
                    <div class="col-lg-9">
                        <p><?php echo e($details->purchase); ?></p>
                    </div>
                    <div class="col-lg-3">
                        <label for="">
                            Location
                        </label>
                    </div>
                    <div class="col-lg-9">
                        <p><?php echo e($details->getstate->state ?? ''); ?>,<?php echo e($details->getcity->city ?? ''); ?></p>
                    </div>

                </div>
            </div>

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
                            <?php if(($details->get_notes[0]->contact_established ?? '') == NULL): ?>
                            <input type="text"   placeholder="not started" readonly>
                            <?php elseif(($details->get_notes[0]->contact_established ?? '') == 1): ?>
                            <input type="text"   placeholder="not started" readonly>
                            <?php elseif(($details->get_notes[0]->contact_established  ?? '') == 2): ?>
                            <input type="text"  placeholder="in progress" readonly>
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
                            <?php if(($details->get_notes[0]->meeting ?? '') == NULL): ?>
                            <input type="text"  placeholder="not started" readonly>
                            <?php elseif(($details->get_notes[0]->meeting ?? '') == 1): ?>
                            <input type="text"  placeholder="not started" readonly>
                            <?php elseif(($details->get_notes[0]->meeting ?? '') == 2): ?>
                            <input type="text"  placeholder="in progress" readonly>
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
                            <?php if(($details->get_notes[0]->contract ?? '') == NULL): ?>
                            <input type="text"  placeholder="not started" readonly>
                            <?php elseif(($details->get_notes[0]->contract ?? '') == 1): ?>
                            <input type="text"  placeholder="not started" readonly>
                            <?php elseif(($details->get_notes[0]->contract ?? '') == 2): ?>
                            <input type="text"  placeholder="in progress" readonly>
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
                            <input type="text" value="<?php echo e($details->get_notes[0]->address ?? ''); ?>" placeholder="" readonly>
                        </div>
                        <div class="adresB">
                            <label for="">
                                Sale price
                            </label>
                            <input type="text" value="$<?php echo e($details->get_notes[0]->sale_price ?? ''); ?>" placeholder="$50555" readonly>
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
                            <?php if(($details->get_notes[0]->closed ?? '') == NULL): ?>
                            <input type="text"  placeholder="not started" readonly>
                            <?php elseif(($details->get_notes[0]->closed ?? '') == 1): ?>
                            <input type="text"  placeholder="not started" readonly>
                            <?php elseif(($details->get_notes[0]->closed ?? '') == 2): ?>
                            <input type="text"  placeholder="in progress" readonly>
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
                    <div class="agentNote d-flex flex-column">
                        <div class="noteHeading">
                            <h4>
                                Note
                            </h4>
                        </div>
                        <p>
                           <?php echo $admin_note->note_description ?? ''; ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- footer -->
<footer class="">
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
<!-- </div> -->

<!-- Modal -->
<div class="modal fade" id="addNoteexampleModal" tabindex="-1" aria-labelledby="addNoteexampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNoteexampleModalLabel">Add Note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <textarea name=""
                    placeholder="Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci "
                    id="" cols="30" rows="10"></textarea>
                <!-- <input type="text" placeholder=""> -->
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="button" class="">Add</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.master.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agent_advisor\resources\views/website/agent_details.blade.php ENDPATH**/ ?>