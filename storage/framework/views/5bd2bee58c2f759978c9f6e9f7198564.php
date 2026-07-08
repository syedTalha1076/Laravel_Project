<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'attribute'   => '',
    'value'       => '',
    'validations' => '',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'attribute'   => '',
    'value'       => '',
    'validations' => '',
]); ?>
<?php foreach (array_filter(([
    'attribute'   => '',
    'value'       => '',
    'validations' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php switch($attribute->type):
    case ('text'): ?>
        <?php if (isset($component)) { $__componentOriginalde75748975650fc859d806825ee22ab9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalde75748975650fc859d806825ee22ab9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.attributes.edit.text','data' => ['attribute' => $attribute,'value' => $value,'validations' => $validations]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::attributes.edit.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attribute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'validations' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($validations)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalde75748975650fc859d806825ee22ab9)): ?>
<?php $attributes = $__attributesOriginalde75748975650fc859d806825ee22ab9; ?>
<?php unset($__attributesOriginalde75748975650fc859d806825ee22ab9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalde75748975650fc859d806825ee22ab9)): ?>
<?php $component = $__componentOriginalde75748975650fc859d806825ee22ab9; ?>
<?php unset($__componentOriginalde75748975650fc859d806825ee22ab9); ?>
<?php endif; ?>

        <?php break; ?>

    <?php case ('email'): ?>
        <?php if (isset($component)) { $__componentOriginalf3560396c2f81e5ce11ba20e7271f7df = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf3560396c2f81e5ce11ba20e7271f7df = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.attributes.edit.email','data' => ['attribute' => $attribute,'value' => $value,'validations' => $validations]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::attributes.edit.email'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attribute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'validations' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($validations)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf3560396c2f81e5ce11ba20e7271f7df)): ?>
<?php $attributes = $__attributesOriginalf3560396c2f81e5ce11ba20e7271f7df; ?>
<?php unset($__attributesOriginalf3560396c2f81e5ce11ba20e7271f7df); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf3560396c2f81e5ce11ba20e7271f7df)): ?>
<?php $component = $__componentOriginalf3560396c2f81e5ce11ba20e7271f7df; ?>
<?php unset($__componentOriginalf3560396c2f81e5ce11ba20e7271f7df); ?>
<?php endif; ?>

        <?php break; ?>

    <?php case ('phone'): ?>
        <?php if (isset($component)) { $__componentOriginal5f7891fdbee7b67774b1b2798a9abfb6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5f7891fdbee7b67774b1b2798a9abfb6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.attributes.edit.phone','data' => ['attribute' => $attribute,'value' => $value,'validations' => $validations]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::attributes.edit.phone'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attribute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'validations' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($validations)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5f7891fdbee7b67774b1b2798a9abfb6)): ?>
<?php $attributes = $__attributesOriginal5f7891fdbee7b67774b1b2798a9abfb6; ?>
<?php unset($__attributesOriginal5f7891fdbee7b67774b1b2798a9abfb6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5f7891fdbee7b67774b1b2798a9abfb6)): ?>
<?php $component = $__componentOriginal5f7891fdbee7b67774b1b2798a9abfb6; ?>
<?php unset($__componentOriginal5f7891fdbee7b67774b1b2798a9abfb6); ?>
<?php endif; ?>

        <?php break; ?>

    <?php case ('lookup'): ?>
        <?php if (isset($component)) { $__componentOriginal90e17c46c497ef276bee72e56b6e5d6d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal90e17c46c497ef276bee72e56b6e5d6d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.attributes.edit.lookup','data' => ['attribute' => $attribute,'value' => $value,'validations' => $validations,'canAddNew' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::attributes.edit.lookup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attribute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'validations' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($validations),'can-add-new' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal90e17c46c497ef276bee72e56b6e5d6d)): ?>
<?php $attributes = $__attributesOriginal90e17c46c497ef276bee72e56b6e5d6d; ?>
<?php unset($__attributesOriginal90e17c46c497ef276bee72e56b6e5d6d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90e17c46c497ef276bee72e56b6e5d6d)): ?>
<?php $component = $__componentOriginal90e17c46c497ef276bee72e56b6e5d6d; ?>
<?php unset($__componentOriginal90e17c46c497ef276bee72e56b6e5d6d); ?>
<?php endif; ?>

        <?php break; ?>

    <?php case ('select'): ?>
        <?php if (isset($component)) { $__componentOriginal976b0c8741e7025df218e7f1928c480a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal976b0c8741e7025df218e7f1928c480a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.attributes.edit.select','data' => ['attribute' => $attribute,'value' => $value,'validations' => $validations]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::attributes.edit.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attribute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'validations' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($validations)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal976b0c8741e7025df218e7f1928c480a)): ?>
<?php $attributes = $__attributesOriginal976b0c8741e7025df218e7f1928c480a; ?>
<?php unset($__attributesOriginal976b0c8741e7025df218e7f1928c480a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal976b0c8741e7025df218e7f1928c480a)): ?>
<?php $component = $__componentOriginal976b0c8741e7025df218e7f1928c480a; ?>
<?php unset($__componentOriginal976b0c8741e7025df218e7f1928c480a); ?>
<?php endif; ?>

        <?php break; ?>
    
    <?php case ('multiselect'): ?>
        <?php if (isset($component)) { $__componentOriginalea6dd0ae2671fcf60a800a07cae50a3b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalea6dd0ae2671fcf60a800a07cae50a3b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.attributes.edit.multiselect','data' => ['attribute' => $attribute,'value' => $value,'validations' => $validations]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::attributes.edit.multiselect'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attribute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'validations' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($validations)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalea6dd0ae2671fcf60a800a07cae50a3b)): ?>
<?php $attributes = $__attributesOriginalea6dd0ae2671fcf60a800a07cae50a3b; ?>
<?php unset($__attributesOriginalea6dd0ae2671fcf60a800a07cae50a3b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalea6dd0ae2671fcf60a800a07cae50a3b)): ?>
<?php $component = $__componentOriginalea6dd0ae2671fcf60a800a07cae50a3b; ?>
<?php unset($__componentOriginalea6dd0ae2671fcf60a800a07cae50a3b); ?>
<?php endif; ?>
        
        <?php break; ?>

    <?php case ('price'): ?>
        <?php if (isset($component)) { $__componentOriginal5c2608403732fa245bfa82e0d5452dd4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5c2608403732fa245bfa82e0d5452dd4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.attributes.edit.price','data' => ['attribute' => $attribute,'value' => $value,'validations' => $validations]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::attributes.edit.price'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attribute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'validations' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($validations)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5c2608403732fa245bfa82e0d5452dd4)): ?>
<?php $attributes = $__attributesOriginal5c2608403732fa245bfa82e0d5452dd4; ?>
<?php unset($__attributesOriginal5c2608403732fa245bfa82e0d5452dd4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5c2608403732fa245bfa82e0d5452dd4)): ?>
<?php $component = $__componentOriginal5c2608403732fa245bfa82e0d5452dd4; ?>
<?php unset($__componentOriginal5c2608403732fa245bfa82e0d5452dd4); ?>
<?php endif; ?>

        <?php break; ?>

    <?php case ('image'): ?>
        <?php if (isset($component)) { $__componentOriginalb6a9f0e0947346b331949f7e06e92b2a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb6a9f0e0947346b331949f7e06e92b2a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.attributes.edit.image','data' => ['attribute' => $attribute,'value' => $value,'validations' => $validations]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::attributes.edit.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attribute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'validations' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($validations)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb6a9f0e0947346b331949f7e06e92b2a)): ?>
<?php $attributes = $__attributesOriginalb6a9f0e0947346b331949f7e06e92b2a; ?>
<?php unset($__attributesOriginalb6a9f0e0947346b331949f7e06e92b2a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb6a9f0e0947346b331949f7e06e92b2a)): ?>
<?php $component = $__componentOriginalb6a9f0e0947346b331949f7e06e92b2a; ?>
<?php unset($__componentOriginalb6a9f0e0947346b331949f7e06e92b2a); ?>
<?php endif; ?>

        <?php break; ?>

    <?php case ('file'): ?>
        <?php if (isset($component)) { $__componentOriginal6ce8fdad0e040dc5dc0eae196487e22d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6ce8fdad0e040dc5dc0eae196487e22d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.attributes.edit.file','data' => ['attribute' => $attribute,'value' => $value,'validations' => $validations]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::attributes.edit.file'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attribute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'validations' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($validations)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6ce8fdad0e040dc5dc0eae196487e22d)): ?>
<?php $attributes = $__attributesOriginal6ce8fdad0e040dc5dc0eae196487e22d; ?>
<?php unset($__attributesOriginal6ce8fdad0e040dc5dc0eae196487e22d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6ce8fdad0e040dc5dc0eae196487e22d)): ?>
<?php $component = $__componentOriginal6ce8fdad0e040dc5dc0eae196487e22d; ?>
<?php unset($__componentOriginal6ce8fdad0e040dc5dc0eae196487e22d); ?>
<?php endif; ?>

        <?php break; ?>

    <?php case ('textarea'): ?>
        <?php if (isset($component)) { $__componentOriginaldff21aac595639b20fabb37dbf454c88 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldff21aac595639b20fabb37dbf454c88 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.attributes.edit.textarea','data' => ['attribute' => $attribute,'value' => $value,'validations' => $validations]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::attributes.edit.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attribute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'validations' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($validations)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldff21aac595639b20fabb37dbf454c88)): ?>
<?php $attributes = $__attributesOriginaldff21aac595639b20fabb37dbf454c88; ?>
<?php unset($__attributesOriginaldff21aac595639b20fabb37dbf454c88); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldff21aac595639b20fabb37dbf454c88)): ?>
<?php $component = $__componentOriginaldff21aac595639b20fabb37dbf454c88; ?>
<?php unset($__componentOriginaldff21aac595639b20fabb37dbf454c88); ?>
<?php endif; ?>

        <?php break; ?>

    <?php case ('address'): ?>
        <?php if (isset($component)) { $__componentOriginala7fd76ae141060678eb9363689c3ddb5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala7fd76ae141060678eb9363689c3ddb5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.attributes.edit.address','data' => ['attribute' => $attribute,'value' => $value,'validations' => $validations]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::attributes.edit.address'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attribute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'validations' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($validations)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala7fd76ae141060678eb9363689c3ddb5)): ?>
<?php $attributes = $__attributesOriginala7fd76ae141060678eb9363689c3ddb5; ?>
<?php unset($__attributesOriginala7fd76ae141060678eb9363689c3ddb5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala7fd76ae141060678eb9363689c3ddb5)): ?>
<?php $component = $__componentOriginala7fd76ae141060678eb9363689c3ddb5; ?>
<?php unset($__componentOriginala7fd76ae141060678eb9363689c3ddb5); ?>
<?php endif; ?>

        <?php break; ?>

    <?php case ('date'): ?>
        <?php if (isset($component)) { $__componentOriginalcf3797923ece5a55be59f7bcd49442dc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf3797923ece5a55be59f7bcd49442dc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.attributes.edit.date','data' => ['attribute' => $attribute,'value' => $value,'validations' => $validations]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::attributes.edit.date'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attribute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'validations' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($validations)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf3797923ece5a55be59f7bcd49442dc)): ?>
<?php $attributes = $__attributesOriginalcf3797923ece5a55be59f7bcd49442dc; ?>
<?php unset($__attributesOriginalcf3797923ece5a55be59f7bcd49442dc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf3797923ece5a55be59f7bcd49442dc)): ?>
<?php $component = $__componentOriginalcf3797923ece5a55be59f7bcd49442dc; ?>
<?php unset($__componentOriginalcf3797923ece5a55be59f7bcd49442dc); ?>
<?php endif; ?>

        <?php break; ?>

    <?php case ('datetime'): ?>
        <?php if (isset($component)) { $__componentOriginal3fa591f4a47608ba2e20015a6322f4e7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3fa591f4a47608ba2e20015a6322f4e7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.attributes.edit.datetime','data' => ['attribute' => $attribute,'value' => $value,'validations' => $validations]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::attributes.edit.datetime'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attribute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'validations' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($validations)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3fa591f4a47608ba2e20015a6322f4e7)): ?>
<?php $attributes = $__attributesOriginal3fa591f4a47608ba2e20015a6322f4e7; ?>
<?php unset($__attributesOriginal3fa591f4a47608ba2e20015a6322f4e7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3fa591f4a47608ba2e20015a6322f4e7)): ?>
<?php $component = $__componentOriginal3fa591f4a47608ba2e20015a6322f4e7; ?>
<?php unset($__componentOriginal3fa591f4a47608ba2e20015a6322f4e7); ?>
<?php endif; ?>

        <?php break; ?>

    <?php case ('boolean'): ?>
        <?php if (isset($component)) { $__componentOriginal22f30ccfe60d8346a93e784fb2817401 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal22f30ccfe60d8346a93e784fb2817401 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.attributes.edit.boolean','data' => ['attribute' => $attribute,'value' => $value,'validations' => $validations]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::attributes.edit.boolean'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attribute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'validations' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($validations)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal22f30ccfe60d8346a93e784fb2817401)): ?>
<?php $attributes = $__attributesOriginal22f30ccfe60d8346a93e784fb2817401; ?>
<?php unset($__attributesOriginal22f30ccfe60d8346a93e784fb2817401); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal22f30ccfe60d8346a93e784fb2817401)): ?>
<?php $component = $__componentOriginal22f30ccfe60d8346a93e784fb2817401; ?>
<?php unset($__componentOriginal22f30ccfe60d8346a93e784fb2817401); ?>
<?php endif; ?>

        <?php break; ?>

    <?php case ('checkbox'): ?>
        <?php if (isset($component)) { $__componentOriginal8d1f9b3e2f6531417950cf96900456ba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d1f9b3e2f6531417950cf96900456ba = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.attributes.edit.checkbox','data' => ['attribute' => $attribute,'value' => $value,'validations' => $validations]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::attributes.edit.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attribute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'validations' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($validations)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d1f9b3e2f6531417950cf96900456ba)): ?>
<?php $attributes = $__attributesOriginal8d1f9b3e2f6531417950cf96900456ba; ?>
<?php unset($__attributesOriginal8d1f9b3e2f6531417950cf96900456ba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d1f9b3e2f6531417950cf96900456ba)): ?>
<?php $component = $__componentOriginal8d1f9b3e2f6531417950cf96900456ba; ?>
<?php unset($__componentOriginal8d1f9b3e2f6531417950cf96900456ba); ?>
<?php endif; ?>

        <?php break; ?>
<?php endswitch; ?>
<?php /**PATH D:\XAMPP_Install\htdocs\CRM_2250_2244_2263_2301\packages\Webkul\Admin\src/resources/views/components/attributes/edit/index.blade.php ENDPATH**/ ?>