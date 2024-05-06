<?php $__env->startSection('titleadmin'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('cssadmin'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentadmin'); ?>
<br><br>

<div class="content-body ">
    <div class="container">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                        <?php echo Form::model($role, ['method' => 'PATCH','route' => ['admin.roles.update', $role->id]]); ?>

                        <!-- row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mg-b-20">
                                    <div class="card-body">
                                        <div class="main-content-label mg-b-5">
                                            <div class="form-group">
                                                <p> <?php echo e(TranslationHelper::translate('name Roles')); ?>:</p>
                                                <?php echo Form::text('name', null, array('placeholder' => 'Name','class' =>
                                                'form-control')); ?>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <!-- col -->
                                            
                                            <div class="col-12">
                                                <ul id="treeview1">
                                                    <li><a>Dashboard</a>
                                                        <ul>
                                                    </li>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'dashboard_view',
                                                                in_array('dashboard_view', $permission),array('class'
                                                                =>'name'))); ?>

                                                                Dashboard View
                                                            </label>
                                                        </div>
                                                    </div>
                                                    

                                                    </li>

                                                </ul>
                                                </li>
                                                </ul>
                                            </div>
                                            
                                            <!-- /col -->
                                            <!-- col -->
                                            
                                            <div class="col-12">
                                                <ul id="treeview1">
                                                    <li><a>Home Controller</a>
                                                        <ul>
                                                    </li>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]',
                                                                'home_controller_view', in_array('home_controller_view',
                                                                $permission),array('class' =>'name'))); ?>

                                                                Home Controller View
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]',
                                                                'contact_us_homePage_view',
                                                                in_array('contact_us_homePage_view',
                                                                $permission),array('class' =>'name'))); ?>

                                                                ContactUs HomePage View
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]',
                                                                'contact_us_homePage_update',
                                                                in_array('contact_us_homePage_update',
                                                                $permission),array('class' =>'name'))); ?>

                                                                ContactUs HomePage Update
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]',
                                                                'contact_us_homePage_delete',
                                                                in_array('contact_us_homePage_delete',
                                                                $permission),array('class' =>'name'))); ?>

                                                                ContactUs HomePage Delete
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'apply_for_job_view',
                                                                in_array('apply_for_job_view',
                                                                $permission),array('class' =>'name'))); ?>

                                                                Apply For Job View
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]',
                                                                'apply_for_job_update', in_array('apply_for_job_update',
                                                                $permission),array('class' =>'name'))); ?>

                                                                Apply For Job Update
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]',
                                                                'apply_for_job_delete', in_array('apply_for_job_delete',
                                                                $permission),array('class' =>'name'))); ?>

                                                                Apply For Job Delete
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]',
                                                                'apply_for_job_download',
                                                                in_array('apply_for_job_download',
                                                                $permission),array('class' =>'name'))); ?>

                                                                Apply For Job Download
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'item_view',
                                                                in_array('item_view', $permission),array('class'
                                                                =>'name'))); ?>

                                                                Item View
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'item_update',
                                                                in_array('item_update', $permission),array('class'
                                                                =>'name'))); ?>

                                                                Item Update
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'item_delete',
                                                                in_array('item_delete', $permission),array('class'
                                                                =>'name'))); ?>

                                                                Item Delete
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    </li>

                                                </ul>
                                                </li>
                                                </ul>
                                            </div>
                                            
                                            <!-- col -->
                                            
                                            <div class="col-12">
                                                <ul id="treeview1">
                                                    <li><a>Orchidia Controller</a>
                                                        <ul>
                                                    </li>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]',
                                                                'orchidia_controller_view',
                                                                in_array('orchidia_controller_view',
                                                                $permission),array('class' =>'name'))); ?>

                                                                Orchidia Controller View
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    </li>

                                                </ul>
                                                </li>
                                                </ul>
                                            </div>
                                            
                                            
                                            <div class="col-12">
                                                <ul id="treeview1">
                                                    <li><a>Product Controller</a>
                                                        <ul>
                                                    </li>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]',
                                                                'product_controller_view',
                                                                in_array('product_controller_view',
                                                                $permission),array('class' =>'name'))); ?>

                                                                Product Controller View
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]',
                                                                'contact_us_product_view',
                                                                in_array('contact_us_product_view',
                                                                $permission),array('class' =>'name'))); ?>

                                                                Contactus Product View
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]',
                                                                'contact_us_product_update',
                                                                in_array('contact_us_product_update',
                                                                $permission),array('class' =>'name'))); ?>

                                                                Contactus Product Update
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]',
                                                                'contact_us_product_delete',
                                                                in_array('contact_us_product_delete',
                                                                $permission),array('class' =>'name'))); ?>

                                                                Contactus Product Delete
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'product_view',
                                                                in_array('product_view', $permission),array('class'
                                                                =>'name'))); ?>

                                                                Product View
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'product_create',
                                                                in_array('product_create', $permission),array('class'
                                                                =>'name'))); ?>

                                                                Product Create
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'product_update',
                                                                in_array('product_update', $permission),array('class'
                                                                =>'name'))); ?>

                                                                Product Update
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'product_delete',
                                                                in_array('product_delete', $permission),array('class'
                                                                =>'name'))); ?>

                                                                Product Delete
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    </li>

                                                </ul>
                                                </li>
                                                </ul>
                                            </div>
                                            
                                            
                                            <div class="col-12">
                                                <ul id="treeview1">
                                                    <li><a>Cme Controller</a>
                                                        <ul>
                                                    </li>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'cme_controller_view',
                                                                in_array('cme_controller_view',
                                                                $permission),array('class' =>'name'))); ?>

                                                                Cme Controller View
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    </li>

                                                </ul>
                                                </li>
                                                </ul>
                                            </div>
                                            
                                            
                                            <div class="col-12">
                                                <ul id="treeview1">
                                                    <li><a>Investors Controller</a>
                                                        <ul>
                                                    </li>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]',
                                                                'investors_controller_view',
                                                                in_array('investors_controller_view',
                                                                $permission),array('class' =>'name'))); ?>

                                                                Investors Controller View
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    </li>

                                                </ul>
                                                </li>
                                                </ul>
                                            </div>
                                            
                                            
                                            <div class="col-12">
                                                <ul id="treeview1">
                                                    <li><a>Careers Controller</a>
                                                        <ul>
                                                    </li>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]',
                                                                'careers_controller_view',
                                                                in_array('careers_controller_view',
                                                                $permission),array('class' =>'name'))); ?>

                                                                Careers Controller View
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    </li>

                                                </ul>
                                                </li>
                                                </ul>
                                            </div>
                                            
                                            
                                            <div class="col-12">
                                                <ul id="treeview1">
                                                    <li><a>Contactus Controller</a>
                                                        <ul>
                                                    </li>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]',
                                                                'contact_us_controller_view',
                                                                in_array('contact_us_controller_view',
                                                                $permission),array('class' =>'name'))); ?>

                                                                Contactus Controller View
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    </li>

                                                </ul>
                                                </li>
                                                </ul>
                                            </div>
                                            
                                            
                                            <div class="col-12">
                                                <ul id="treeview1">
                                                    <li><a>Country</a>
                                                        <ul>
                                                    </li>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'country_view',
                                                                in_array('country_view', $permission),array('class'
                                                                =>'name'))); ?>

                                                                Country View
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'country_create',
                                                                in_array('country_create', $permission),array('class'
                                                                =>'name'))); ?>

                                                                Country Create
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'country_update',
                                                                in_array('country_update', $permission),array('class'
                                                                =>'name'))); ?>

                                                                Country Update
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'country_delete',
                                                                in_array('country_delete', $permission),array('class'
                                                                =>'name'))); ?>

                                                                Country Delete
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    </li>

                                                </ul>
                                                </li>
                                                </ul>
                                            </div>
                                            
                                            
                                            <div class="col-12">
                                                <ul id="treeview1">
                                                    <li><a>Hr</a>
                                                        <ul>
                                                    </li>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'hr_view',
                                                                in_array('hr_view', $permission),array('class'
                                                                =>'name'))); ?>

                                                                Hr View
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'admin_view',
                                                                in_array('admin_view', $permission),array('class'
                                                                =>'name'))); ?>

                                                                Admin View
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'admin_create',
                                                                in_array('admin_create', $permission),array('class'
                                                                =>'name'))); ?>

                                                                Admin Create
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'admin_update',
                                                                in_array('admin_update', $permission),array('class'
                                                                =>'name'))); ?>

                                                                Admin Update
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'admin_delete',
                                                                in_array('admin_delete', $permission),array('class'
                                                                =>'name'))); ?>

                                                                Admin Delete
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'roles_view',
                                                                in_array('roles_view', $permission),array('class'
                                                                =>'name'))); ?>

                                                                Roles View
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'roles_create',
                                                                in_array('roles_create', $permission),array('class'
                                                                =>'name'))); ?>

                                                                Roles Create
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'roles_update',
                                                                in_array('roles_update', $permission),array('class'
                                                                =>'name'))); ?>

                                                                Roles Update
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'roles_delete',
                                                                in_array('roles_delete', $permission),array('class'
                                                                =>'name'))); ?>

                                                                Roles Delete
                                                            </label>
                                                        </div>
                                                    </div>
                                                    


                                                    </li>

                                                </ul>
                                                </li>
                                                </ul>
                                            </div>
                                            

                                            
                                            <div class="col-12">
                                                <ul id="treeview1">
                                                    <li><a>Opening Hours</a>
                                                        <ul>
                                                    </li>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'openinghours_view',
                                                                in_array('openinghours_view', $permission),array('class'
                                                                =>'name'))); ?>

                                                                Opening Hours View
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'openinghours_create',
                                                                in_array('openinghours_create',
                                                                $permission),array('class' =>'name'))); ?>

                                                                Opening Hours Create
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'openinghours_update',
                                                                in_array('openinghours_update',
                                                                $permission),array('class' =>'name'))); ?>

                                                                Opening Hours Update
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'openinghours_delete',
                                                                in_array('openinghours_delete',
                                                                $permission),array('class' =>'name'))); ?>

                                                                Opening Hours Delete
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    </li>

                                                </ul>
                                                </li>
                                                </ul>
                                            </div>
                                            
                                            
                                            <div class="col-12">
                                                <ul id="treeview1">
                                                    <li><a>Settings</a>
                                                        <ul>
                                                    </li>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'settings_view',
                                                                in_array('settings_view', $permission),array('class'
                                                                =>'name'))); ?>

                                                                Settings View
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'settings_update',
                                                                in_array('settings_update', $permission),array('class'
                                                                =>'name'))); ?>

                                                                Settings Update
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <?php echo e(Form::checkbox('permission[]', 'settings_delete',
                                                                in_array('settings_delete', $permission),array('class'
                                                                =>'name'))); ?>

                                                                Settings Delete
                                                            </label>
                                                        </div>
                                                    </div>
                                                    
                                                    </li>

                                                </ul>
                                                </li>
                                                </ul>
                                            </div>
                                            

                                            <!-- /col -->
                                        </div>
                                        <?php if (isset($component)) { $__componentOriginal6b10ec1e08d4fadc40f7f5dc9075934c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b10ec1e08d4fadc40f7f5dc9075934c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.submit','data' => ['type' => 'submit','route' => route('admin.roles.index')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.submit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.roles.index'))]); ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6b10ec1e08d4fadc40f7f5dc9075934c)): ?>
<?php $attributes = $__attributesOriginal6b10ec1e08d4fadc40f7f5dc9075934c; ?>
<?php unset($__attributesOriginal6b10ec1e08d4fadc40f7f5dc9075934c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6b10ec1e08d4fadc40f7f5dc9075934c)): ?>
<?php $component = $__componentOriginal6b10ec1e08d4fadc40f7f5dc9075934c; ?>
<?php unset($__componentOriginal6b10ec1e08d4fadc40f7f5dc9075934c); ?>
<?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- row closed -->
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('jsadmin'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hatem/Desktop/nen/resources/views/admin/roles/edit.blade.php ENDPATH**/ ?>