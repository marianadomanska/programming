


<?php $__env->startSection('title', 'Наші майстри'); ?>

<?php $__env->startSection('content'); ?>

<style>
    .masters-page {
        max-width: 950px;
        margin: 0 auto;
        padding: 30px;
        background: rgba(255, 248, 235, 0.93);
        border-radius: 15px;
        color: #382b23;
    }

    .masters-page h1,
    .masters-page h2 {
        text-align: center;
    }

    .masters-list {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 20px;
        margin: 30px 0;
    }

    .master-card {
        background: white;
        padding: 20px;
        border-radius: 12px;
        text-align: center;
        width: 210px;
    }

    .master-card h3 {
        margin-bottom: 8px;
    }

    .booking-form {
        max-width: 500px;
        margin: 30px auto;
    }

    .booking-form label {
        display: block;
        margin-top: 15px;
    }

    .booking-form input,
    .booking-form select,
    .booking-form textarea {
        width: 100%;
        box-sizing: border-box;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #c9b9a0;
        border-radius: 5px;
        font: inherit;
    }

    .booking-form button {
        background: #ECD59B;
        border: none;
        padding: 12px 25px;
        margin-top: 20px;
        cursor: pointer;
        font: inherit;
    }

    .error {
        color: #b00020;
        font-size: 14px;
    }
</style>

<div class="masters-page">

    <h1>Наші майстри</h1>
    <p style="text-align: center;">
        Познайомтеся з нашими спеціалістами та оберіть свого майстра.
    </p>

    <div class="masters-list">
        <?php $__currentLoopData = $masters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $master): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="master-card">
                <h3><?php echo e($master['name']); ?></h3>
                <p><?php echo e($master['specialty']); ?></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <h2>Записатися до майстра</h2>

    <form class="booking-form"
          method="POST"
          action="<?php echo e(route('masters.booking')); ?>">

        <?php echo csrf_field(); ?>

        <label for="name">Ваше ім'я</label>
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

        <label for="email">Електронна пошта</label>
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

        <label for="master">Оберіть майстра</label>
        <select id="master" name="master">
            <option value="">Оберіть майстра</option>
            <?php $__currentLoopData = $masters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $master): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($master['id']); ?>"
                    <?php if(old('master') == $master['id']): echo 'selected'; endif; ?>>
                    <?php echo e($master['name']); ?> —
                    <?php echo e($master['specialty']); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php $__errorArgs = ['master'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="error"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <label for="message">Ваше повідомлення</label>
        <textarea id="message" name="message"
                  rows="4"><?php echo e(old('message')); ?></textarea>
        <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="error"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <button type="submit">Надіслати заявку</button>

    </form>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\lavarel\reference-app\resources\views/site/masters.blade.php ENDPATH**/ ?>