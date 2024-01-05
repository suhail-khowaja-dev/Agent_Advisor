<?php

$logo_add = App\Models\LogoManager::where('title','Header')->first();

// dd($logo_add);
?>
<div class="sidebar-wrapper">
	<div>
		
		<div class="logo-icon-wrapper"><a href="<?php echo e(route('/')); ?>"><img class="img-fluid" src="<?php echo e(asset('assets/images/logo/logo-icon.png')); ?>" alt=""></a></div>
		<nav class="sidebar-main">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
			<div id="sidebar-menu">
				<ul class="sidebar-links" id="simple-bar">

					<li class="back-btn">
						<a href="<?php echo e(route('/')); ?>"><img class="img-fluid" src="<?php echo e(asset('assets/images/logo/logo-icon.png')); ?>" alt=""></a>
						<div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
					</li>
					<li class="sidebar-main-title">
						<div>
                            <a href="<?php echo e(route('index')); ?>">
							<h6 class="lan-3"><?php echo e(trans('lang.Dashboards')); ?> </h6>
                     		<p class="lan-2"><?php echo e(trans('lang.Dashboards,widgets & layout.')); ?></p>
                        </a>
						</div>
					</li>

                     

					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/project' ? 'active' : ''); ?>" href="#">
							<i data-feather="layout"></i><span><?php echo e(trans('CMS')); ?></span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/project' ? 'down' : 'right'); ?>"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/project'  ? 'block;' : 'none;'); ?>">
                            <li><a href="<?php echo e(route('content')); ?>" class="<?php echo e(Route::currentRouteName()=='content' ? 'active' : ''); ?>" ><?php echo e(trans('Page Content')); ?></a></li>
                            <li ><a href="<?php echo e(route('note')); ?>" class="<?php echo e(Route::currentRouteName()=='note' ? 'active' : ''); ?>"><?php echo e(trans('Page Note')); ?></a></li>
                            <li><a href="<?php echo e(route('privacy')); ?>" class="<?php echo e(Route::currentRouteName()=='privacy' ? 'active' : ''); ?>"><?php echo e(trans('Privacy Policy')); ?></a></li>

		                </ul>
					</li>


                    

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/category_management' ? 'active' : ''); ?>" href="#">
                            <i data-feather="users"></i><span> <?php echo e(trans('category Management')); ?> </span>
                            <div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/category_management' ? 'down' : 'right'); ?>"></i></div>
                        </a>

                        <ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/category-management' ? 'block;' : 'none;'); ?>">
                            <li><a href="<?php echo e(route('category-management')); ?>" class="<?php echo e(Route::currentRouteName()=='category-management' ? 'active' : ''); ?>"><?php echo e(trans('Category List')); ?></a></li>
                        </ul>
                    </li>

                    

                    





                    
                    
                    

                    



                    

                    


					</li>
                    

                    <li class="sidebar-list">
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/Inquiry' ? 'active' : ''); ?>" href="#"><i data-feather="phone-forwarded"></i><span><?php echo e(trans('Advisor Inquiry')); ?></span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/Inquiry' ? 'down' : 'right'); ?>"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/Inquiry' ? 'block' : 'none;'); ?>;">
							<li><a href="<?php echo e(route('Inquiry')); ?>" class="<?php echo e(Route::currentRouteName()=='Inquiry' ? 'active' : ''); ?>">Advisor Inquiry</a></li>

						</ul>

					</li>
                    <li class="sidebar-list">
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/agent-inquiry' ? 'active' : ''); ?>" href="#"><i data-feather="phone-forwarded"></i><span><?php echo e(trans('Agent Inquiry')); ?></span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/agent_inquiry' ? 'down' : 'right'); ?>"></i></div>
						</a>
                        <ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/agent-inquiry' ? 'block' : 'none;'); ?>;">
							<li><a href="<?php echo e(route('agent-inquiry')); ?>" class="<?php echo e(Route::currentRouteName()=='agent-inquiry' ? 'active' : ''); ?>">Agent Inquiry</a></li>

						</ul>
					</li>

                      

                      <li class="sidebar-list">
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/user' ? 'active' : ''); ?>" href="#">
							<i data-feather="users"></i><span> <?php echo e(trans('Agents Management')); ?> </span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/user' ? 'down' : 'right'); ?>"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/user' ? 'block;' : 'none;'); ?>">
		                    <li><a href="<?php echo e(route('user')); ?>" class="<?php echo e(Route::currentRouteName()=='user' ? 'active' : ''); ?>"><?php echo e(trans('Agents List')); ?></a></li>
		                </ul>

					</li>

                        

                    <li class="sidebar-list">
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/advisor-management' ? 'active' : ''); ?>" href="#">
							<i data-feather="users"></i><span> <?php echo e(trans('Advisors Management')); ?> </span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/advisor-management' ? 'down' : 'right'); ?>"></i></div>
						</a>

                        <ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/advisor-management' ? 'block;' : 'none;'); ?>">
		                    <li><a href="<?php echo e(route('advisor-management')); ?>" class="<?php echo e(Route::currentRouteName()=='advisor-management' ? 'active' : ''); ?>"><?php echo e(trans('Advisors List')); ?></a></li>
		                </ul>
					</li>


                    

                    
                 

                    <li class="sidebar-list">
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/Configuration' ? 'active' : ''); ?>" href="#">
							<i data-feather="plus-square"></i> <span><?php echo e(trans('Configuration')); ?> </span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/Configuration' ? 'down' : 'right'); ?>"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/Configuration' ? 'block;' : 'none;'); ?>">
		                    <li><a href="<?php echo e(route('Configuration')); ?>" class="<?php echo e(Route::currentRouteName()=='Configuration' ? 'active' : ''); ?>"><?php echo e(trans('Configuration List')); ?></a></li>
		                </ul>
					</li>

					

					
					

					

					
					
					
					

					
					
                    

					
					
					
					

				

					


					

					 


                   
					
				</ul>
			</div>
			<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
		</nav>
	</div>
</div>
<?php /**PATH C:\xampp\htdocs\agent_advisor\resources\views/layouts/simple/sidebar.blade.php ENDPATH**/ ?>