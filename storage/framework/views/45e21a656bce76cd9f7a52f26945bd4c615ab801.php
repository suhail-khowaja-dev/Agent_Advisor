<?php $__env->startSection('title','Contact'); ?>
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
    </header>
    <!-- header end -->

    <!-- contact Us -->
    <section>
        <div class="container">
            <div class="adviserContactUs2 myAdviserContactUs">
                <div class="contactUsHeading">
                    <h5>Contact Us</h5>
                </div>
                <form action="<?php echo e(url('contact_process')); ?>" method="POST" id="regiterForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="slug">
                    <input type="hidden" value="<?php echo e(Auth::user()->type); ?>" name="type">
                <div class="contactUsFrom">
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="text" placeholder="Name" name="name" value="<?php echo e(old('name')); ?>">
                        </div>

                        <div class="col-lg-12">
                            <input type="email" placeholder="Email address" name="email" value="<?php echo e(old('email')); ?>">
                        </div>
                        <div class="col-lg-12">
                            <input id="phone12" type="tel" placeholder="Phone No." name="phone" value="<?php echo e(old('phone')); ?>"  maxlength="14"  pattern="[(][0-9]{3}[)] [0-9]{3}-[0-9]{4}">
                        </div>
                        <div class="col-lg-12">
                            <textarea class="clientInput1" placeholder="Message"  id="" cols="40" name="message"
                                rows="10"><?php echo e(old('message')); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="sendBtn">
                        <button type="submit">
                            Send
                        </button>
                </div>
            </form>
            </div>
        </div>
        <footer class="">
            <div class="container">
                <div class="footer d-flex justify-content-between">
                    <div class="copyWrite">
                        <div class="copyWrite">
                            <p><?php echo e($configuration->copyright ?? ''); ?> <br> DESIGNED AND DEVELOPED BY  <a href="https://designprosusa.com/" target="_blank">DESIGN PROS USA</a></p>
                    </div>
                    </div>
                    <div class="pricavy">
                        <a href="<?php echo e(route('privacy-policy')); ?>">
                            <p>Privacy Policy</p>
                        </a>
                    </div>
                </div>

            </div>
        </footer>
    </section>
    <script type="text/javascript">
        document.getElementById('phone12').addEventListener('input', function(e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        });
    </script>
    <script>

        $("#regiterForm").submit(function() {
            $("#pageloader").fadeIn();
        });
        </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.master.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agent_advisor\resources\views/website/agent_contact.blade.php ENDPATH**/ ?>