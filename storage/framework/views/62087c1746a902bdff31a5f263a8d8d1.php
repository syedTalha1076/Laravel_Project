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
     <?php $__env->slot('title', null, []); ?> 
        <?php echo app('translator')->get('admin::app.leads.create.title'); ?>
     <?php $__env->endSlot(); ?>

    <?php echo view_render_event('admin.leads.create.form.before'); ?>


    <!-- Create Lead Form -->
    <?php if (isset($component)) { $__componentOriginal81b4d293d9113446bb908fc8aef5c8f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81b4d293d9113446bb908fc8aef5c8f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.index','data' => ['action' => route('admin.leads.store')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.leads.store'))]); ?>
        <div class="flex flex-col gap-4">
            <div class="flex items-center justify-between rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">
                <div class="flex flex-col gap-2">
                    <?php if (isset($component)) { $__componentOriginal477735b45b070062c5df1d72c43d48f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal477735b45b070062c5df1d72c43d48f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.breadcrumbs.index','data' => ['name' => 'leads.create']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'leads.create']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal477735b45b070062c5df1d72c43d48f5)): ?>
<?php $attributes = $__attributesOriginal477735b45b070062c5df1d72c43d48f5; ?>
<?php unset($__attributesOriginal477735b45b070062c5df1d72c43d48f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal477735b45b070062c5df1d72c43d48f5)): ?>
<?php $component = $__componentOriginal477735b45b070062c5df1d72c43d48f5; ?>
<?php unset($__componentOriginal477735b45b070062c5df1d72c43d48f5); ?>
<?php endif; ?>

                    <div class="text-xl font-bold dark:text-white">
                        <?php echo app('translator')->get('admin::app.leads.create.title'); ?>
                    </div>
                </div>

                <?php echo view_render_event('admin.leads.create.save_button.before'); ?>


                <div class="flex items-center gap-x-2.5">
                    <!-- Save button for person -->
                    <div class="flex items-center gap-x-2.5">
                        <?php echo view_render_event('admin.leads.create.form_buttons.before'); ?>


                        <button
                            type="submit"
                            class="primary-button"
                        >
                            <?php echo app('translator')->get('admin::app.leads.create.save-btn'); ?>
                        </button>

                        <?php echo view_render_event('admin.leads.create.form_buttons.after'); ?>

                    </div>
                </div>

                <?php echo view_render_event('admin.leads.create.save_button.after'); ?>

            </div>

            <?php if(request('stage_id')): ?>
                <input
                    type="hidden"
                    id="lead_pipeline_stage_id"
                    name="lead_pipeline_stage_id"
                    value="<?php echo e(request('stage_id')); ?>"
                />
            <?php endif; ?>

            <?php if(request('pipeline_id')): ?>
                <input
                    type="hidden"
                    id="lead_pipeline_id"
                    name="lead_pipeline_id"
                    value="<?php echo e(request('pipeline_id')); ?>"
                />
            <?php endif; ?>

            <!-- Lead Create Component -->
            <v-lead-create>
                <?php if (isset($component)) { $__componentOriginal5097a43dd21c97cf91dc23a27f8f52fe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5097a43dd21c97cf91dc23a27f8f52fe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.shimmer.leads.datagrid','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::shimmer.leads.datagrid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5097a43dd21c97cf91dc23a27f8f52fe)): ?>
<?php $attributes = $__attributesOriginal5097a43dd21c97cf91dc23a27f8f52fe; ?>
<?php unset($__attributesOriginal5097a43dd21c97cf91dc23a27f8f52fe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5097a43dd21c97cf91dc23a27f8f52fe)): ?>
<?php $component = $__componentOriginal5097a43dd21c97cf91dc23a27f8f52fe; ?>
<?php unset($__componentOriginal5097a43dd21c97cf91dc23a27f8f52fe); ?>
<?php endif; ?>
            </v-lead-create>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal81b4d293d9113446bb908fc8aef5c8f6)): ?>
<?php $attributes = $__attributesOriginal81b4d293d9113446bb908fc8aef5c8f6; ?>
<?php unset($__attributesOriginal81b4d293d9113446bb908fc8aef5c8f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal81b4d293d9113446bb908fc8aef5c8f6)): ?>
<?php $component = $__componentOriginal81b4d293d9113446bb908fc8aef5c8f6; ?>
<?php unset($__componentOriginal81b4d293d9113446bb908fc8aef5c8f6); ?>
<?php endif; ?>

    <?php echo view_render_event('admin.leads.create.form.after'); ?>


    <?php if (! $__env->hasRenderedOnce('d363b3f2-600f-4277-82a8-d167c2ac4d7b')): $__env->markAsRenderedOnce('d363b3f2-600f-4277-82a8-d167c2ac4d7b');
$__env->startPush('scripts'); ?>
        <script
            type="text/x-template"
            id="v-lead-create-template"
        >
            <div class="box-shadow flex flex-col gap-4 rounded-lg border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
                <?php echo view_render_event('admin.leads.edit.form_controls.before'); ?>


                <div class="flex w-full gap-2 border-b border-gray-200 dark:border-gray-800">
                    <!-- Tabs -->
                    <template
                        v-for="tab in tabs"
                        :key="tab.id"
                    >
                        <?php echo view_render_event('admin.leads.create.tabs.before'); ?>


                        <a
                            :href="'#' + tab.id"
                            :class="[
                                'inline-block px-3 py-2.5 border-b-2  text-sm font-medium ',
                                activeTab === tab.id
                                ? 'text-brandColor border-brandColor dark:brandColor dark:brandColor'
                                : 'text-gray-600 dark:text-gray-300  border-transparent hover:text-gray-800 hover:border-gray-400 dark:hover:border-gray-400  dark:hover:text-white'
                            ]"
                            @click="scrollToSection(tab.id)"
                            :text="tab.label"
                        >
                        </a>

                        <?php echo view_render_event('admin.leads.create.tabs.after'); ?>

                    </template>
                </div>

                <div class="flex flex-col gap-4 px-4 py-2">
                    <?php echo view_render_event('admin.leads.create.details.before'); ?>


                    <!-- Details section -->
                    <div
                        class="flex flex-col gap-4"
                        id="lead-details"
                    >
                        <div class="flex flex-col gap-1">
                            <p class="text-base font-semibold dark:text-white">
                                <?php echo app('translator')->get('admin::app.leads.create.details'); ?>
                            </p>

                            <p class="text-gray-600 dark:text-white">
                                <?php echo app('translator')->get('admin::app.leads.create.details-info'); ?>
                            </p>
                        </div>

                        <div class="w-1/2 max-md:w-full">
                            <?php echo view_render_event('admin.leads.create.details.attributes.before'); ?>


                            <!-- Lead Details Title and Description -->
                            <?php if (isset($component)) { $__componentOriginal454997736aeabbf070177223ed7ce374 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal454997736aeabbf070177223ed7ce374 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.attributes.index','data' => ['customAttributes' => app('Webkul\Attribute\Repositories\AttributeRepository')->findWhere([
                                    ['code', 'NOTIN', ['lead_value', 'lead_type_id', 'lead_source_id', 'expected_close_date', 'user_id', 'lead_pipeline_id', 'lead_pipeline_stage_id']],
                                    'entity_type' => 'leads',
                                    'quick_add'   => 1
                                ]),'customValidations' => [
                                    'expected_close_date' => [
                                        'date_format:yyyy-MM-dd',
                                        'after:' .  \Carbon\Carbon::yesterday()->format('Y-m-d')
                                    ],
                                ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::attributes'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['custom-attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(app('Webkul\Attribute\Repositories\AttributeRepository')->findWhere([
                                    ['code', 'NOTIN', ['lead_value', 'lead_type_id', 'lead_source_id', 'expected_close_date', 'user_id', 'lead_pipeline_id', 'lead_pipeline_stage_id']],
                                    'entity_type' => 'leads',
                                    'quick_add'   => 1
                                ])),'custom-validations' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                                    'expected_close_date' => [
                                        'date_format:yyyy-MM-dd',
                                        'after:' .  \Carbon\Carbon::yesterday()->format('Y-m-d')
                                    ],
                                ])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal454997736aeabbf070177223ed7ce374)): ?>
<?php $attributes = $__attributesOriginal454997736aeabbf070177223ed7ce374; ?>
<?php unset($__attributesOriginal454997736aeabbf070177223ed7ce374); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal454997736aeabbf070177223ed7ce374)): ?>
<?php $component = $__componentOriginal454997736aeabbf070177223ed7ce374; ?>
<?php unset($__componentOriginal454997736aeabbf070177223ed7ce374); ?>
<?php endif; ?>

                            <!-- Lead Details Other input fields -->
                            <div class="flex gap-4 max-sm:flex-wrap">
                                <div class="w-full">
                                    <?php if (isset($component)) { $__componentOriginal454997736aeabbf070177223ed7ce374 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal454997736aeabbf070177223ed7ce374 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.attributes.index','data' => ['customAttributes' => app('Webkul\Attribute\Repositories\AttributeRepository')->findWhere([
                                            ['code', 'IN', ['lead_value', 'lead_type_id', 'lead_source_id']],
                                            'entity_type' => 'leads',
                                            'quick_add'   => 1
                                        ]),'customValidations' => [
                                            'expected_close_date' => [
                                                'date_format:yyyy-MM-dd',
                                                'after:' .  \Carbon\Carbon::yesterday()->format('Y-m-d')
                                            ],
                                        ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::attributes'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['custom-attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(app('Webkul\Attribute\Repositories\AttributeRepository')->findWhere([
                                            ['code', 'IN', ['lead_value', 'lead_type_id', 'lead_source_id']],
                                            'entity_type' => 'leads',
                                            'quick_add'   => 1
                                        ])),'custom-validations' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                                            'expected_close_date' => [
                                                'date_format:yyyy-MM-dd',
                                                'after:' .  \Carbon\Carbon::yesterday()->format('Y-m-d')
                                            ],
                                        ])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal454997736aeabbf070177223ed7ce374)): ?>
<?php $attributes = $__attributesOriginal454997736aeabbf070177223ed7ce374; ?>
<?php unset($__attributesOriginal454997736aeabbf070177223ed7ce374); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal454997736aeabbf070177223ed7ce374)): ?>
<?php $component = $__componentOriginal454997736aeabbf070177223ed7ce374; ?>
<?php unset($__componentOriginal454997736aeabbf070177223ed7ce374); ?>
<?php endif; ?>
                                </div>

                                <div class="w-full">
                                    <?php if (isset($component)) { $__componentOriginal454997736aeabbf070177223ed7ce374 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal454997736aeabbf070177223ed7ce374 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.attributes.index','data' => ['customAttributes' => app('Webkul\Attribute\Repositories\AttributeRepository')->findWhere([
                                            ['code', 'IN', ['expected_close_date', 'user_id']],
                                            'entity_type' => 'leads',
                                            'quick_add'   => 1
                                        ]),'customValidations' => [
                                            'expected_close_date' => [
                                                'date_format:yyyy-MM-dd',
                                                'after:' .  \Carbon\Carbon::yesterday()->format('Y-m-d')
                                            ],
                                        ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::attributes'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['custom-attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(app('Webkul\Attribute\Repositories\AttributeRepository')->findWhere([
                                            ['code', 'IN', ['expected_close_date', 'user_id']],
                                            'entity_type' => 'leads',
                                            'quick_add'   => 1
                                        ])),'custom-validations' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                                            'expected_close_date' => [
                                                'date_format:yyyy-MM-dd',
                                                'after:' .  \Carbon\Carbon::yesterday()->format('Y-m-d')
                                            ],
                                        ])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal454997736aeabbf070177223ed7ce374)): ?>
<?php $attributes = $__attributesOriginal454997736aeabbf070177223ed7ce374; ?>
<?php unset($__attributesOriginal454997736aeabbf070177223ed7ce374); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal454997736aeabbf070177223ed7ce374)): ?>
<?php $component = $__componentOriginal454997736aeabbf070177223ed7ce374; ?>
<?php unset($__componentOriginal454997736aeabbf070177223ed7ce374); ?>
<?php endif; ?>
                                </div>
                            </div>

                            <?php echo view_render_event('admin.leads.create.details.attributes.after'); ?>

                        </div>
                    </div>

                    <?php echo view_render_event('admin.leads.create.details.after'); ?>


                    <?php echo view_render_event('admin.leads.create.contact_person.before'); ?>


                    <!-- Contact Person -->
                    <div
                        class="flex flex-col gap-4"
                        id="contact-person"
                    >
                        <div class="flex flex-col gap-1">
                            <p class="text-base font-semibold dark:text-white">
                                <?php echo app('translator')->get('admin::app.leads.create.contact-person'); ?>
                            </p>

                            <p class="text-gray-600 dark:text-white">
                                <?php echo app('translator')->get('admin::app.leads.create.contact-info'); ?>
                            </p>
                        </div>

                        <div class="w-1/2 max-md:w-full">
                            <!-- Contact Person Component -->
                            <?php echo $__env->make('admin::leads.common.contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>

                    <?php echo view_render_event('admin.leads.create.contact_person.after'); ?>


                    <!-- Product Section -->
                    <div
                        class="flex flex-col gap-4"
                        id="products"
                    >
                        <div class="flex flex-col gap-1">
                            <p class="text-base font-semibold dark:text-white">
                                <?php echo app('translator')->get('admin::app.leads.create.products'); ?>
                            </p>

                            <p class="text-gray-600 dark:text-white">
                                <?php echo app('translator')->get('admin::app.leads.create.products-info'); ?>
                            </p>
                        </div>

                        <div>
                            <!-- Product Component -->
                            <?php echo $__env->make('admin::leads.common.products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>

                <?php echo view_render_event('admin.leads.form_controls.after'); ?>

            </div>
        </script>

        <script type="module">
            app.component('v-lead-create', {
                template: '#v-lead-create-template',

                data() {
                    return {
                        activeTab: 'lead-details',

                        tabs: [
                            { id: 'lead-details', label: '<?php echo app('translator')->get('admin::app.leads.create.details'); ?>' },
                            { id: 'contact-person', label: '<?php echo app('translator')->get('admin::app.leads.create.contact-person'); ?>' },
                            { id: 'products', label: '<?php echo app('translator')->get('admin::app.leads.create.products'); ?>' }
                        ],
                    };
                },

                methods: {
                    /**
                     * Scroll to the section.
                     *
                     * @param {String} tabId
                     *
                     * @returns {void}
                     */
                    scrollToSection(tabId) {
                        const section = document.getElementById(tabId);

                        if (section) {
                            section.scrollIntoView({ behavior: 'smooth' });
                        }
                    },
                },
            });
        </script>
    <?php $__env->stopPush(); endif; ?>

    <?php if (! $__env->hasRenderedOnce('d449408e-1e9c-4a37-8e0f-0224a58420ab')): $__env->markAsRenderedOnce('d449408e-1e9c-4a37-8e0f-0224a58420ab');
$__env->startPush('styles'); ?>
        <style>
            html {
                scroll-behavior: smooth;
            }
        </style>
    <?php $__env->stopPush(); endif; ?>
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
<?php /**PATH D:\XAMPP_Install\htdocs\CRM_2250_2244_2263_2301\packages\Webkul\Admin\src/resources/views/leads/create.blade.php ENDPATH**/ ?>