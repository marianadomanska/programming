


<?php $__env->startSection('title', 'Заявку надіслано'); ?>

<?php $__env->startSection('content'); ?>

<div style="max-width: 600px; margin: 30px auto;
            padding: 35px; background: #fff8eb;
            border-radius: 15px; text-align: center;">

    <h1>Дякуємо за заявку!</h1>

    <p>Ваші дані успішно отримано.</p>

    <p><b>Ім'я:</b> <?php echo e($name); ?></p>
    <p><b>Email:</b> <?php echo e($email); ?></p>

    <p><b>Обраний майстер:</b>
        <?php switch($master):
            case ('hair'): ?>
                Перукар-стиліст
                <?php break; ?>
            <?php case ('nails'): ?>
                Майстер манікюру
                <?php break; ?>
            <?php case ('makeup'): ?>
                Візажист
                <?php break; ?>
        <?php endswitch; ?>
    </p>

    <p><b>Повідомлення:</b> <?php echo e($message); ?></p>

    <a href="<?php echo e(route('site.masters')); ?>">
        Повернутися до майстрів
    </a>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\lavarel\reference-app\resources\views/site/master-confirm.blade.php ENDPATH**/ ?>