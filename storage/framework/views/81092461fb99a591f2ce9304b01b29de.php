<?php
    if (! empty($value)) {
        if ($value instanceof \Carbon\Carbon) {
            $value = $value->format('Y-m-d');
        } elseif (is_string($value)) {
            $value = \Carbon\Carbon::parse($value)->format('Y-m-d');
        }
    }
?>

<?php if (isset($component)) { $__componentOriginal53af403f6b2179a3039d488b8ab2a267 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53af403f6b2179a3039d488b8ab2a267 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.control','data' => ['type' => 'date','id' => $attribute->code,'name' => $attribute->code,'value' => $value,'rules' => $validations.'|regex:^\d{4}-\d{2}-\d{2}$','label' => $attribute->name]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'date','id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->code),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->code),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'rules' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($validations.'|regex:^\d{4}-\d{2}-\d{2}$'),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute->name)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal53af403f6b2179a3039d488b8ab2a267)): ?>
<?php $attributes = $__attributesOriginal53af403f6b2179a3039d488b8ab2a267; ?>
<?php unset($__attributesOriginal53af403f6b2179a3039d488b8ab2a267); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53af403f6b2179a3039d488b8ab2a267)): ?>
<?php $component = $__componentOriginal53af403f6b2179a3039d488b8ab2a267; ?>
<?php unset($__componentOriginal53af403f6b2179a3039d488b8ab2a267); ?>
<?php endif; ?>
<?php /**PATH D:\XAMPP_Install\htdocs\CRM_2250_2244_2263_2301\packages\Webkul\Admin\src/resources/views/components/attributes/edit/date.blade.php ENDPATH**/ ?>