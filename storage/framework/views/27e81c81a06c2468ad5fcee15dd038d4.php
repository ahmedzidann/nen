		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<a href="<?php echo e(route('admin.dashboard')); ?>">
						<img src="<?php echo e(asset('admin/assets/images/logo-icon.png')); ?>" class="logo-icon" style="width: 59%;" alt="logo icon">
					</a>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
				</div>
			 </div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="<?php echo e(route('admin.dashboard')); ?>">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				<li>
					<a href="<?php echo e(url('translations')); ?>" target="_blank">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Translations</div>
					</a>
				</li>
				
				<li class="menu-label">Items</li>
				
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-user-circle"></i>
						</div>
						<div class="menu-title">About</div>
					</a>
					<ul>
					<?php
					$route = Request::segment(3) ;
					$route_two = Request::segment(4) ;
					?>
					
						<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Identity</a>
							<ul>
								<li class="<?php echo e($route=='about' && $route_two=='identity' && Request()->item=='section-one' ?'mm-active':''); ?>"><a href="<?php echo e(route('admin.about.identity.index',['category=about','subcategory=identity','item=section-one'])); ?>" ><i class='bx bx-radio-circle'></i>Section one</a></li>
								<li class="<?php echo e($route=='about' && $route_two=='identity' && Request()->item=='section-two' ?'mm-active':''); ?>"><a href="<?php echo e(route('admin.about.identity.index',['category=about','subcategory=identity','item=section-two'])); ?>" ><i class='bx bx-radio-circle'></i>Section two</a></li>
								<li class="<?php echo e($route=='about' && $route_two=='identity' && Request()->item=='section-three' ?'mm-active':''); ?>"><a href="<?php echo e(route('admin.about.identity.index',['category=about','subcategory=identity','item=section-three'])); ?>" ><i class='bx bx-radio-circle'></i>Section three</a></li>
							</ul>
						</li>
						<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Investors</a>
							<ul>
								<li class="<?php echo e($route=='about' && $route_two=='investors' && Request()->item=='section-one' ?'mm-active':''); ?>"><a href="<?php echo e(route('admin.about.investors.index',['category=about','subcategory=investors','item=section-one'])); ?>" ><i class='bx bx-radio-circle'></i>Section one</a></li>
								<li class="<?php echo e($route=='about' && $route_two=='investors' && Request()->item=='section-two' ?'mm-active':''); ?>"><a href="<?php echo e(route('admin.about.investors.index',['category=about','subcategory=investors','item=section-two'])); ?>" ><i class='bx bx-radio-circle'></i>Section two</a></li>
								<li class="<?php echo e($route=='about' && $route_two=='investors' && Request()->item=='section-three' ?'mm-active':''); ?>"><a href="<?php echo e(route('admin.about.investors.index',['category=about','subcategory=investors','item=section-three'])); ?>" ><i class='bx bx-radio-circle'></i>Section three</a></li>
								<li class="<?php echo e($route=='about' && $route_two=='investors' && Request()->item=='section-foure' ?'mm-active':''); ?>"><a href="<?php echo e(route('admin.about.investors.index',['category=about','subcategory=investors','item=section-foure'])); ?>" ><i class='bx bx-radio-circle'></i>Section foure</a></li>
								
							</ul>
						</li>
						<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Achievements</a>
							<ul>
								<li class="<?php echo e($route=='about' && $route_two=='achievements' && Request()->item=='section-one' ?'mm-active':''); ?>"><a href="<?php echo e(route('admin.about.achievements.index',['category=about','subcategory=achievements','item=section-one'])); ?>" ><i class='bx bx-radio-circle'></i>Section one</a></li>
								<li class="<?php echo e($route=='about' && $route_two=='achievements' && Request()->item=='section-two' ?'mm-active':''); ?>"><a href="<?php echo e(route('admin.about.achievements.index',['category=about','subcategory=achievements','item=section-two'])); ?>" ><i class='bx bx-radio-circle'></i>Section two</a></li>
							</ul>
						</li>
						<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Awards</a>
							<ul>

								<li class="<?php echo e($route=='about' && $route_two=='awards' && Request()->item=='section-one' ?'mm-active':''); ?>"><a href="<?php echo e(route('admin.about.awards.index',['category=about','subcategory=awards','item=section-one'])); ?>" ><i class='bx bx-radio-circle'></i>Section one</a></li>
                                <?php $__currentLoopData = App\Models\Page::where('slug','awards')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $awards): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php $__currentLoopData = $awards->childe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li class="<?php echo e($route=='about' && $route_two=='awards' && Request()->item=='section-one' ?'mm-active':''); ?>"><a href="<?php echo e(route('admin.about.awards.index',['category=about','subcategory=awards','item='.$item->slug.''])); ?>" ><i class='bx bx-radio-circle'></i><?php echo e($item->name); ?></a></li>

									
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								
							</ul>
						</li>
						
                        <li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Certificates</a>
							<ul>
								<?php $__currentLoopData = App\Models\Page::where('id',15)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php $__currentLoopData = $partner->childe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

								<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i><?php echo e($item->name); ?></a>
									<ul>
										<li class="<?php echo e($route=='about' && $route_two=='certificates'  && Request()->subsubcategory==$item->slug && Request()->item=='section-one' ?'mm-active':''); ?>"><a href="<?php echo e(route('admin.about.certificates.index',['category=about','subcategory=certificates','subsubcategory='.$item->slug.'','item=section-one'])); ?>" ><i class='bx bx-radio-circle'></i>Section one</a></li>
										<li class="<?php echo e($route=='about' && $route_two=='certificates'  && Request()->subsubcategory==$item->slug && Request()->item=='section-two' ?'mm-active':''); ?>"><a href="<?php echo e(route('admin.about.certificates.index',['category=about','subcategory=certificates','subsubcategory='.$item->slug.'','item=section-two'])); ?>" ><i class='bx bx-radio-circle'></i>Section two</a></li>
									</ul>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</li>

						<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Partners</a>
							<ul>
								<?php $__currentLoopData = App\Models\Page::where('id',16)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php $__currentLoopData = $partner->childe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

								<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i><?php echo e($item->name); ?></a>
									<ul>
										<li class="<?php echo e($route=='about' && $route_two=='partners' && Request()->item=='section-one' ?'mm-active':''); ?>"><a href="<?php echo e(route('admin.about.partners.index',['category=about','subcategory=partners','subsubcategory='.$item->slug.'','item=section-one'])); ?>" ><i class='bx bx-radio-circle'></i>Section one</a></li>
										<li class="<?php echo e($route=='about' && $route_two=='partners' && Request()->item=='section-two' ?'mm-active':''); ?>"><a href="<?php echo e(route('admin.about.partners.index',['category=about','subcategory=partners','subsubcategory='.$item->slug.'','item=section-two'])); ?>" ><i class='bx bx-radio-circle'></i>Section two</a></li>
									</ul>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</li>
						<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Clients</a>
							<ul>
								<?php $__currentLoopData = App\Models\Page::where('slug','clients')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li class="<?php echo e($route=='about' && $route_two=='clients' && Request()->item=='section-one' ?'mm-active':''); ?>"><a href="<?php echo e(route('admin.about.clients.index',['category=about','subcategory=clients','item=section-one'])); ?>" ><i class='bx bx-radio-circle'></i>Section one</a></li>

								<?php $__currentLoopData = $partner->childe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li class="<?php echo e($route=='about' && $route_two=='clients' && Request()->item=='section-one' ?'mm-active':''); ?>"><a href="<?php echo e(route('admin.about.clients.index',['category=about','subcategory=clients','item='.$item->slug.''])); ?>" ><i class='bx bx-radio-circle'></i><?php echo e($item->name); ?></a></li>

								
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</li>
						<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Our Team</a>
							<ul>
								<li class="<?php echo e($route=='about' && $route_two=='our-team' && Request()->item=='section-one' ?'mm-active':''); ?>"><a href="<?php echo e(route('admin.about.our-team.index',['category=about','subcategory=our-team','item=section-one'])); ?>" ><i class='bx bx-radio-circle'></i>Section one</a></li>
								<li class="<?php echo e($route=='about' && $route_two=='our-team' && Request()->item=='member-board' ?'mm-active':''); ?>"><a href="<?php echo e(route('admin.about.our-team.index',['category=about','subcategory=our-team','item=member-board'])); ?>" ><i class='bx bx-radio-circle'></i>Members </a></li>
								
							</ul>
						</li>
						<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Careers</a>
							<ul>
								<li class="<?php echo e($route=='about' && $route_two=='careers' && Request()->item=='section-one' ?'mm-active':''); ?>"><a href="<?php echo e(route('admin.about.careers.index',['category=about','subcategory=careers','item=section-one'])); ?>" ><i class='bx bx-radio-circle'></i>Section one</a></li>
								<li class="<?php echo e($route=='about' && $route_two=='careers' && Request()->item=='section-two' ?'mm-active':''); ?>"><a href="<?php echo e(route('admin.about.careers.index',['category=about','subcategory=careers','item=section-two'])); ?>" ><i class='bx bx-radio-circle'></i>Section two</a></li>
							</ul>
						</li>
					</ul>
				</li>
				
				
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-user-circle"></i>
						</div>
						<div class="menu-title"><?php echo e(App\Models\Page::find(3)->name); ?></div>
					</a>
					<ul>
						<li class=""><a href="<?php echo e(route('admin.project.index',['category='.App\Models\Page::find(3)->slug])); ?>" ><i class='bx bx-radio-circle'></i>Section</a></li>
					</ul>
				</li>
				
					
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-user-circle"></i>
						</div>
						<div class="menu-title">Settings</div>
					</a>
					<ul>
						<li class=""><a href="<?php echo e(route('admin.slider.index')); ?>" ><i class='bx bx-radio-circle'></i>Slider</a></li>
					</ul>
				</li>
				
				
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-user-circle"></i>
						</div>
						<div class="menu-title"><?php echo e(App\Models\Page::find(6)->name); ?></div>
					</a>
					<ul>
						<li class=""><a href="<?php echo e(route('admin.solution.index',['category='.App\Models\Page::find(6)->slug])); ?>" ><i class='bx bx-radio-circle'></i>Section</a></li>
					</ul>
				</li>
				

                
				<?php
                        $education = App\Models\Page::find(4);
                ?>
                <li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-user-circle"></i>
						</div>
						<div class="menu-title"><?php echo e($education->name); ?></div>
					</a>
					<ul>
                        <?php $__currentLoopData = $education->childe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						
                        

                                <li class="">

                                    <a href="<?php echo e(route('admin.education.index',['category='.$education->slug
                                        ,"subcategory=".$ch->slug])); ?>" >
                                    <i class='bx bx-radio-circle'></i><?php echo e($ch->name); ?></a>
                                </li>


                                
                            
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					</ul>
				</li>
				
                <?php
                        $testing = App\Models\Page::find(5);
                ?>
                
                <li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-user-circle"></i>
						</div>
						<div class="menu-title"><?php echo e($testing->name); ?></div>
					</a>
					<ul>
                        <?php $__currentLoopData = $testing->childe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						
                        

                                <li class="">

                                    <a href="<?php echo e(route('admin.testing.index',['category='.$testing->slug
                                        ,"subcategory=".$ch->slug])); ?>" >
                                    <i class='bx bx-radio-circle'></i><?php echo e($ch->name); ?></a>
                                </li>


                                
                            
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					</ul>
				</li>
                
				
				<li class="menu-label">Forms & Tables</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-message-square-edit'></i>
						</div>
						<div class="menu-title">Forms</div>
					</a>
					<ul>
						<li> <a href="form-elements.html"><i class='bx bx-radio-circle'></i>Form Elements</a>
						</li>
						<li> <a href="form-input-group.html"><i class='bx bx-radio-circle'></i>Input Groups</a>
						</li>
						<li> <a href="form-radios-and-checkboxes.html"><i class='bx bx-radio-circle'></i>Radios & Checkboxes</a>
						</li>
						<li> <a href="form-layouts.html"><i class='bx bx-radio-circle'></i>Forms Layouts</a>
						</li>
						<li> <a href="form-validations.html"><i class='bx bx-radio-circle'></i>Form Validation</a>
						</li>
						<li> <a href="form-wizard.html"><i class='bx bx-radio-circle'></i>Form Wizard</a>
						</li>
						<li> <a href="form-text-editor.html"><i class='bx bx-radio-circle'></i>Text Editor</a>
						</li>
						<li> <a href="form-file-upload.html"><i class='bx bx-radio-circle'></i>File Upload</a>
						</li>
						<li> <a href="form-date-time-pickes.html"><i class='bx bx-radio-circle'></i>Date Pickers</a>
						</li>
						<li> <a href="form-select2.html"><i class='bx bx-radio-circle'></i>Select2</a>
						</li>
						<li> <a href="form-repeater.html"><i class='bx bx-radio-circle'></i>Form Repeater</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-grid-alt"></i>
						</div>
						<div class="menu-title">Tables</div>
					</a>
					<ul>
						<li> <a href="table-basic-table.html"><i class='bx bx-radio-circle'></i>Basic Table</a>
						</li>
						<li> <a href="table-datatable.html"><i class='bx bx-radio-circle'></i>Data Table</a>
						</li>
					</ul>
				</li>
				<li class="menu-label">Pages</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-user-circle"></i>
						</div>
						<div class="menu-title">HR</div>
					</a>
					<ul>
						<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Admins</a>
							<ul>
								<li><a href="<?php echo e(route('admin.admins.index')); ?>" ><i class='bx bx-radio-circle'></i>View</a></li>
								<li><a href="<?php echo e(route('admin.admins.create')); ?>" ><i class='bx bx-radio-circle'></i>Create</a></li>
							</ul>
						</li>

						<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Users</a>
							<ul>
								<li><a href="<?php echo e(route('admin.users.index')); ?>" ><i class='bx bx-radio-circle'></i>View</a></li>
								<li><a href="<?php echo e(route('admin.users.create')); ?>" ><i class='bx bx-radio-circle'></i>Create</a></li>
							</ul>
						</li>
						<li><a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Roles</a>
							<ul>
								<li><a href="<?php echo e(route('admin.roles.index')); ?>" ><i class='bx bx-radio-circle'></i>View</a></li>
								<li><a href="<?php echo e(route('admin.roles.create')); ?>" ><i class='bx bx-radio-circle'></i>Create</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-error"></i>
						</div>
						<div class="menu-title">Pages</div>
					</a>
					<ul>
						<li> <a href="<?php echo e(route('admin.pages.index')); ?>" ><i class='bx bx-radio-circle'></i>View</a>
						</li>
						<li> <a href="<?php echo e(route('admin.pages.create')); ?>" ><i class='bx bx-radio-circle'></i>Create</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="faq.html">
						<div class="parent-icon"><i class="bx bx-help-circle"></i>
						</div>
						<div class="menu-title">FAQ</div>
					</a>
				</li>
				<li>
					<a href="pricing-table.html">
						<div class="parent-icon"><i class="bx bx-diamond"></i>
						</div>
						<div class="menu-title">Pricing</div>
					</a>
				</li>
				<li class="menu-label">Charts & Maps</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-line-chart"></i>
						</div>
						<div class="menu-title">Charts</div>
					</a>
					<ul>
						<li> <a href="charts-apex-chart.html"><i class='bx bx-radio-circle'></i>Apex</a>
						</li>
						<li> <a href="charts-chartjs.html"><i class='bx bx-radio-circle'></i>Chartjs</a>
						</li>
						<li> <a href="charts-highcharts.html"><i class='bx bx-radio-circle'></i>Highcharts</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-map-alt"></i>
						</div>
						<div class="menu-title">Maps</div>
					</a>
					<ul>
						<li> <a href="map-google-maps.html"><i class='bx bx-radio-circle'></i>Google Maps</a>
						</li>
						<li> <a href="map-vector-maps.html"><i class='bx bx-radio-circle'></i>Vector Maps</a>
						</li>
					</ul>
				</li>
				<li class="menu-label">Others</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-menu"></i>
						</div>
						<div class="menu-title">Menu Levels</div>
					</a>
					<ul>
						<li> <a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Level One</a>
							<ul>
								<li> <a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Level Two</a>
									<ul>
										<li> <a href="javascript:;"><i class='bx bx-radio-circle'></i>Level Three</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
						<div class="parent-icon"><i class="bx bx-folder"></i>
						</div>
						<div class="menu-title">Documentation</div>
					</a>
				</li>
				<li>
					<a href="https://themeforest.net/user/codervent" target="_blank">
						<div class="parent-icon"><i class="bx bx-support"></i>
						</div>
						<div class="menu-title">Support</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>
<?php /**PATH D:\xampp8.2\htdocs\nen\resources\views/admin/layouts/sidebar/sidebar.blade.php ENDPATH**/ ?>