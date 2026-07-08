<!DOCTYPE html>

<html
    class="<?php echo e(request()->cookie('dark_mode') ? 'dark' : ''); ?>"
    lang="<?php echo e(app()->getLocale()); ?>"
    dir="<?php echo e(in_array(app()->getLocale(), ['fa', 'ar']) ? 'rtl' : 'ltr'); ?>"
>

<head>

    <?php echo view_render_event('admin.layout.head.before'); ?>


    <title><?php echo e($title); ?></title>

    <meta charset="UTF-8">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <meta
        http-equiv="X-UA-Compatible"
        content="IE=edge"
    >
    <meta
        http-equiv="content-language"
        content="<?php echo e(app()->getLocale()); ?>"
    >

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <meta
        name="base-url"
        content="<?php echo e(url()->to('/')); ?>"
    >
    <meta
        name="currency"
        content="<?php echo e(json_encode([
                'code'   => config('app.currency'),
                'symbol' => core()->currencySymbol(config('app.currency'))])); ?>

        "
    >

    <?php echo $__env->yieldPushContent('meta'); ?>

    <?php echo e(vite()->set(['src/Resources/assets/css/app.css', 'src/Resources/assets/js/app.js'])); ?>


    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap"
        rel="stylesheet"
    />

    <link
        rel="preload"
        as="image"
        href="<?php echo e(url('cache/logo/bagisto.png')); ?>"
    >

    <?php if($favicon = core()->getConfigData('general.design.admin_logo.favicon')): ?>
        <link
            type="image/x-icon"
            href="<?php echo e(Storage::url($favicon)); ?>"
            rel="shortcut icon"
            sizes="16x16"
        >
    <?php else: ?>
        <link
            type="image/x-icon"
            href="<?php echo e(vite()->asset('images/favicon.ico')); ?>"
            rel="shortcut icon"
            sizes="16x16"
        />
    <?php endif; ?>

    <?php
        $brandColor = core()->getConfigData('general.settings.menu_color.brand_color') ?? '#FF7A29';
    ?>

    <?php echo $__env->yieldPushContent('styles'); ?>

    <style>
        :root {
            --brand-color: <?php echo e($brandColor); ?>;
        }

        .crm-theme-bg {
            background: linear-gradient(135deg, #eaf3ff 0%, #dcebff 28%, #ffe3cc 70%, #ffd2a3 100%) !important;
        }

        .dark .crm-theme-bg {
            background: linear-gradient(135deg, #051125 0%, #0b2240 25%, #163f63 55%, #6b2d12 85%, #ff7a29 100%) !important;
        }

        .crm-theme-header {
            background: linear-gradient(90deg, #ffffff 0%, #eaf2ff 100%) !important;
            border-bottom: 2px solid #ff7a29 !important;
        }

        .dark .crm-theme-header {
            background: linear-gradient(90deg, #0b1f3a 0%, #123c69 100%) !important;
            border-bottom: 2px solid #ff7a29 !important;
        }

        .crm-theme-sidebar {
            background: linear-gradient(180deg, #ffffff 0%, #eef5ff 100%) !important;
        }

        .dark .crm-theme-sidebar {
            background: linear-gradient(180deg, #0b1f3a 0%, #081428 100%) !important;
        }

        .crm-theme-footer {
            background: linear-gradient(90deg, #eaf2ff 0%, #ffe9d6 100%) !important;
        }

        .dark .crm-theme-footer {
            background: linear-gradient(90deg, #0b1f3a 0%, #3a1f0b 100%) !important;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #1E5F8C, #ff7a29) !important;
        }

        <?php echo core()->getConfigData('general.content.custom_scripts.custom_css'); ?>

    </style>

    <?php echo view_render_event('admin.layout.head.after'); ?>

</head>

<body class="h-full font-inter dark:bg-gray-950">
    <?php echo view_render_event('admin.layout.body.before'); ?>


    <div
        id="app"
        class="h-full"
    >
        <!-- Flash Message Blade Component -->
        <?php if (isset($component)) { $__componentOriginal701f473bf36886c6d0b4697249a816f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal701f473bf36886c6d0b4697249a816f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.flash-group.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::flash-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal701f473bf36886c6d0b4697249a816f6)): ?>
<?php $attributes = $__attributesOriginal701f473bf36886c6d0b4697249a816f6; ?>
<?php unset($__attributesOriginal701f473bf36886c6d0b4697249a816f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal701f473bf36886c6d0b4697249a816f6)): ?>
<?php $component = $__componentOriginal701f473bf36886c6d0b4697249a816f6; ?>
<?php unset($__componentOriginal701f473bf36886c6d0b4697249a816f6); ?>
<?php endif; ?>

        <!-- Confirm Modal Blade Component -->
        <?php if (isset($component)) { $__componentOriginalc603f2743be5e84d3c165d2adaeaf950 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc603f2743be5e84d3c165d2adaeaf950 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.modal.confirm','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::modal.confirm'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc603f2743be5e84d3c165d2adaeaf950)): ?>
<?php $attributes = $__attributesOriginalc603f2743be5e84d3c165d2adaeaf950; ?>
<?php unset($__attributesOriginalc603f2743be5e84d3c165d2adaeaf950); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc603f2743be5e84d3c165d2adaeaf950)): ?>
<?php $component = $__componentOriginalc603f2743be5e84d3c165d2adaeaf950; ?>
<?php unset($__componentOriginalc603f2743be5e84d3c165d2adaeaf950); ?>
<?php endif; ?>

        <?php echo view_render_event('admin.layout.content.before'); ?>


        <!-- Page Header Blade Component -->
        <?php if (isset($component)) { $__componentOriginala93dc3cfd6b332ac9bf34de04284104e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala93dc3cfd6b332ac9bf34de04284104e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.layouts.header.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::layouts.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala93dc3cfd6b332ac9bf34de04284104e)): ?>
<?php $attributes = $__attributesOriginala93dc3cfd6b332ac9bf34de04284104e; ?>
<?php unset($__attributesOriginala93dc3cfd6b332ac9bf34de04284104e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala93dc3cfd6b332ac9bf34de04284104e)): ?>
<?php $component = $__componentOriginala93dc3cfd6b332ac9bf34de04284104e; ?>
<?php unset($__componentOriginala93dc3cfd6b332ac9bf34de04284104e); ?>
<?php endif; ?>

        <div
            class="group/container sidebar-collapsed flex gap-4"
            ref="appLayout"
        >
            <!-- Page Sidebar Blade Component -->
            <?php if (isset($component)) { $__componentOriginal642f417c316c3cba5ee78b8a7076b486 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal642f417c316c3cba5ee78b8a7076b486 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.layouts.sidebar.desktop.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::layouts.sidebar.desktop'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal642f417c316c3cba5ee78b8a7076b486)): ?>
<?php $attributes = $__attributesOriginal642f417c316c3cba5ee78b8a7076b486; ?>
<?php unset($__attributesOriginal642f417c316c3cba5ee78b8a7076b486); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal642f417c316c3cba5ee78b8a7076b486)): ?>
<?php $component = $__componentOriginal642f417c316c3cba5ee78b8a7076b486; ?>
<?php unset($__componentOriginal642f417c316c3cba5ee78b8a7076b486); ?>
<?php endif; ?>

            <div class="crm-theme-bg flex min-h-[calc(100vh-62px)] max-w-full flex-1 flex-col bg-gray-100 pt-3 transition-all duration-300 dark:bg-gray-950">
                <!-- Page Content Blade Component -->
                <div class="px-4 pb-6 ltr:lg:pl-[85px] rtl:lg:pr-[85px]">
                    <?php echo e($slot); ?>

                </div>

                <!-- Powered By -->
                <div class="mt-auto pt-6">
                    <div class="crm-theme-footer border-t bg-white py-5 text-center text-sm font-normal dark:border-gray-800 dark:bg-gray-900 dark:text-white max-md:py-3">
                        <p><?php echo core()->getConfigData('general.settings.footer.label'); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <?php echo view_render_event('admin.layout.content.after'); ?>

    </div>

    <!-- AI Assistant Widget -->
    <?php echo $__env->make('admin::components.layouts.ai-assistant-widget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Camera Gesture Navigation Widget -->
    <?php echo $__env->make('admin::components.layouts.camera-gesture-widget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Voice Command Widget -->
    <?php echo $__env->make('admin::components.layouts.voice-command-widget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo view_render_event('admin.layout.body.after'); ?>


    <?php echo $__env->yieldPushContent('scripts'); ?>

    <?php echo view_render_event('admin.layout.vue-app-mount.before'); ?>


    <script>
        /**
         * Load event, the purpose of using the event is to mount the application
         * after all of our `Vue` components which is present in blade file have
         * been registered in the app. No matter what `app.mount()` should be
         * called in the last.
         */
        window.addEventListener("load", function(event) {
            app.mount("#app");
        });
    </script>

    <?php echo view_render_event('admin.layout.vue-app-mount.after'); ?>

</body>

</html>
<?php /**PATH D:\XAMPP_Install\htdocs\CRM_2250_2244_2263_2301\packages\Webkul\Admin\src/resources/views/components/layouts/index.blade.php ENDPATH**/ ?>