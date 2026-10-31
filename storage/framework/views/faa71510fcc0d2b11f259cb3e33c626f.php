<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $__env->yieldContent('title', 'Салон краси'); ?></title>

    <style>
        body {
            margin: 0;
    font-family: Cormorant Garamond, sans-serif;

    background-image: url(https://primelaser.com.ua/wp-content/uploads/2020/06/45879075.jpg);
background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 650px;
    
        }

        nav {
            background: #ECD59B;
            padding: 15px 30px;
        }

        nav a {
            color:  black;
            text-decoration: none;
            margin-right: 40px;
        }

        main {
            padding: 140px;
        }

        footer {
            background: #ECD59B;
            color: white;
            padding: 15px 30px;
            margin-top: 40px;
        }
    </style>
</head>

<body>

    <nav>
        <a href="<?php echo e(url('/')); ?>">Головна</a>
        <a href="<?php echo e(url('/about')); ?>">Про нас</a>
        <a href="<?php echo e(url('/contact')); ?>">Контакти</a>
<a href="<?php echo e(url('/Social network')); ?>">Ми у соцмережах</a>
<a href="<?php echo e(route('site.masters')); ?>">Наші майстри</a>
    </nav>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer><a href="<?php echo e(url('/FAQ')); ?>">FAQ<br>
        Ціни<br>
        Подарунки<br>
        Наші майстри<br>
        &copy; <?php echo e(date('Y')); ?> Салон краси "Креатив"
    </footer>

</body>
</html><?php /**PATH D:\lavarel\reference-app\resources\views/layouts/app.blade.php ENDPATH**/ ?>