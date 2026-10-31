

<?php $__env->startSection('title', 'Форма введення даних'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Форма введення даних</h1>

    <form method="POST" action="<?php echo e(route('entry.store')); ?>">
        <?php echo csrf_field(); ?>

        <div>
            <label for="name">Ім'я</label>

            <input type="text" id="name" name="name"
                   value="<?php echo e(old('name')); ?>">

            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div>
            <label for="email">Email</label>

            <input type="text" id="email" name="email"
                   value="<?php echo e(old('email')); ?>">

            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <button type="submit">Надіслати</button>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\lavarel\reference-app\resources\views/site/entry.blade.php ENDPATH**/ ?>