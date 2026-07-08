<?php if (isset($component)) { $__componentOriginal8001c520f4b7dcb40a16cd3b411856d1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.layouts.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> Create Customer <?php $__env->endSlot(); ?>

    <div class="flex flex-col gap-4">
        <!-- Header -->
        <div class="flex items-center justify-between rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">
            <div class="flex flex-col gap-2">
                <div class="flex gap-x-1 text-xs text-gray-600 dark:text-gray-300">
                    <a href="<?php echo e(route('admin.dashboard.index')); ?>" class="hover:underline">Dashboard</a>
                    <span>/</span>
                    <a href="<?php echo e(route('admin.customers.index')); ?>" class="hover:underline">Customers</a>
                    <span>/</span>
                    <span class="text-gray-800 dark:text-white font-medium">Create</span>
                </div>
                <div class="text-xl font-bold dark:text-white">Create Customer</div>
            </div>
            <div class="flex items-center gap-x-2.5">
                <a href="<?php echo e(route('admin.customers.index')); ?>"
                   class="rounded-md border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                    ← Back
                </a>
                <button type="submit" form="customer-form" class="primary-button">Save Customer</button>
            </div>
        </div>

        <?php if($errors->any()): ?>
            <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 dark:border-red-800 dark:bg-red-900/20">
                <ul class="list-inside list-disc text-sm text-red-600 dark:text-red-400 space-y-1">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($e); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form id="customer-form" action="<?php echo e(route('admin.customers.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="flex gap-4 max-xl:flex-wrap">
                <!-- Left -->
                <div class="flex flex-1 flex-col gap-4">
                    <div class="box-shadow rounded-lg border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-gray-900">
                        <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">Contact Details</p>
                        <div class="grid grid-cols-2 gap-4 max-sm:grid-cols-1">
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Full Name <span class="text-red-500">*</span></label>
                                <input type="text" name="full_name" value="<?php echo e(old('full_name')); ?>" required
                                    class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Email</label>
                                <input type="email" name="email" value="<?php echo e(old('email')); ?>"
                                    class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Phone</label>
                                <input type="text" name="phone" value="<?php echo e(old('phone')); ?>"
                                    class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Company</label>
                                <input type="text" name="company" value="<?php echo e(old('company')); ?>"
                                    class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                            </div>
                        </div>
                        <div class="mt-4 flex flex-col gap-1">
                            <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Address</label>
                            <textarea name="address" rows="3"
                                class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white"><?php echo e(old('address')); ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- Right -->
                <div class="flex w-80 max-w-full flex-col gap-4 max-sm:w-full">
                    <div class="box-shadow rounded-lg border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-gray-900">
                        <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">Additional Info</p>
                        <div class="flex flex-col gap-3">
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Registration Type</label>
                                <select name="registration_type"
                                    class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                                    <option value="converted" <?php if(old('registration_type','converted')=='converted'): echo 'selected'; endif; ?>>Converted Lead</option>
                                    <option value="direct" <?php if(old('registration_type')=='direct'): echo 'selected'; endif; ?>>Direct</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Linked Lead</label>
                                <select name="lead_id"
                                    class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                                    <option value="">— None —</option>
                                    <?php $__currentLoopData = $leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($lead->id); ?>" <?php if(old('lead_id')==$lead->id): echo 'selected'; endif; ?>><?php echo e($lead->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Hire / Join Date</label>
                                <input type="date" name="hire_date" value="<?php echo e(old('hire_date')); ?>"
                                    class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1)): ?>
<?php $attributes = $__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1; ?>
<?php unset($__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8001c520f4b7dcb40a16cd3b411856d1)): ?>
<?php $component = $__componentOriginal8001c520f4b7dcb40a16cd3b411856d1; ?>
<?php unset($__componentOriginal8001c520f4b7dcb40a16cd3b411856d1); ?>
<?php endif; ?>
<?php /**PATH D:\XAMPP_Install\htdocs\crm_modules_final\packages\Webkul\Admin\src/resources/views/customers/create.blade.php ENDPATH**/ ?>