

<?php $__env->startSection('title', 'Дані прийнято'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Дані прийнято</h1>

    <p>Ви ввели такі дані:</p>

    <ul>
        <li>
            <strong>Ім'я:</strong>
            <?php echo e($name); ?>

        </li>

        <li>
            <strong>Email:</strong>
            <?php echo e($email); ?>

        </li>
    </ul>

    <p>
        <a href="<?php echo e(route('entry.form')); ?>">
            Повернутися до форми
        </a>
    </p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\lavarel\reference-app\resources\views/site/entry-confirm.blade.php ENDPATH**/ ?>