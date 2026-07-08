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
     <?php $__env->slot('title', null, []); ?> Sales Reports <?php $__env->endSlot(); ?>

    <div class="flex flex-col gap-4">
        <div class="flex items-center justify-between rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">
            <div class="flex flex-col gap-2">
                <div class="flex gap-x-1 text-xs text-gray-600 dark:text-gray-300">
                    <a href="<?php echo e(route('admin.dashboard.index')); ?>" class="hover:underline">Dashboard</a>
                    <span>/</span>
                    <span class="font-medium text-gray-800 dark:text-white">Sales Reports</span>
                </div>
                <div class="text-xl font-bold dark:text-white">Sales Reports</div>
            </div>
            <div class="flex items-center gap-x-2.5">
                <button onclick="document.getElementById('gen-panel').classList.toggle('hidden')"
                    class="rounded-md border border-green-300 bg-green-50 px-4 py-2 text-sm font-semibold text-green-700 hover:bg-green-100 dark:border-green-700 dark:bg-green-900/20 dark:text-green-400 dark:hover:bg-green-900/40 transition-colors">
                    ⚡ Auto-Generate
                </button>
                <a href="<?php echo e(route('admin.sales-reports.create')); ?>" class="primary-button">+ Manual Report</a>
            </div>
        </div>

        <?php if(session('success')): ?>
            <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700 dark:border-green-800 dark:bg-green-900/20 dark:text-green-400">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <!-- Auto-Generate Panel -->
        <div id="gen-panel" class="hidden box-shadow rounded-lg border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-gray-900">
            <p class="mb-3 text-sm font-semibold text-gray-700 dark:text-gray-300">⚡ Auto-Generate from Live Data</p>
            <form action="<?php echo e(route('admin.sales-reports.generate')); ?>" method="POST" class="flex items-end gap-4 flex-wrap">
                <?php echo csrf_field(); ?>
                <div class="flex flex-col gap-1">
                    <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Select Month</label>
                    <input type="month" name="report_month" value="<?php echo e(now()->format('Y-m')); ?>" required
                        class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                </div>
                <button type="submit"
                    class="rounded-md border border-green-300 bg-green-50 px-4 py-2 text-sm font-semibold text-green-700 hover:bg-green-100 dark:border-green-700 dark:bg-green-900/20 dark:text-green-400 transition-colors">
                    Generate Report
                </button>
            </form>
        </div>

        <!-- Table -->
        <div class="box-shadow rounded-lg border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
            <?php if($reports->count()): ?>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-gray-200 dark:border-gray-800">
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Month</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Sales Person</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-600 dark:text-gray-300">Total Leads</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-600 dark:text-gray-300">Converted</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-600 dark:text-gray-300">Revenue</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Generated</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="border-b border-gray-100 transition-colors hover:bg-gray-50 dark:border-gray-800 dark:hover:bg-gray-800/50">
                                    <td class="px-4 py-3 font-bold text-gray-800 dark:text-white"><?php echo e($r->report_month); ?></td>
                                    <td class="px-4 py-3 text-gray-600 dark:text-gray-400"><?php echo e(optional($r->user)->name ?? 'N/A'); ?></td>
                                    <td class="px-4 py-3 text-right text-gray-600 dark:text-gray-400"><?php echo e(number_format($r->total_leads)); ?></td>
                                    <td class="px-4 py-3 text-right">
                                        <span class="inline-flex rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-semibold text-blue-700 dark:bg-blue-900/30 dark:text-blue-400">
                                            <?php echo e(number_format($r->converted_customers)); ?>

                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-right font-bold text-green-600 dark:text-green-400">
                                        $<?php echo e(number_format($r->revenue_generated, 2)); ?>

                                    </td>
                                    <td class="px-4 py-3 text-xs text-gray-500 dark:text-gray-500"><?php echo e($r->generated_date->format('d M Y H:i')); ?></td>
                                    <td class="px-4 py-3">
                                        <form action="<?php echo e(route('admin.sales-reports.delete', $r->id)); ?>" method="POST" onsubmit="return confirm('Delete this report?')">
                                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                            <button type="submit"
                                                class="rounded-md border border-red-200 bg-red-50 px-3 py-1.5 text-xs font-medium text-red-600 hover:bg-red-100 dark:border-red-800 dark:bg-red-900/20 dark:text-red-400 transition-colors">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php if($reports->hasPages()): ?>
                    <div class="border-t border-gray-200 px-4 py-3 dark:border-gray-800"><?php echo e($reports->links()); ?></div>
                <?php endif; ?>
            <?php else: ?>
                <div class="flex flex-col items-center justify-center gap-3 py-16">
                    <div class="text-6xl">📊</div>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-300">No Sales Reports Yet</p>
                    <p class="text-sm text-gray-500 dark:text-gray-500">Use Auto-Generate to create one from your live data.</p>
                    <button onclick="document.getElementById('gen-panel').classList.remove('hidden')" class="primary-button mt-2">⚡ Auto-Generate</button>
                </div>
            <?php endif; ?>
        </div>
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
<?php /**PATH D:\XAMPP_Install\htdocs\crm_modules_final\packages\Webkul\Admin\src/resources/views/sales-reports/index.blade.php ENDPATH**/ ?>