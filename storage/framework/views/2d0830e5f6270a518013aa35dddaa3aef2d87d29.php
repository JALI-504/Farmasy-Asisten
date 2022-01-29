<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>

        <div class="login">
            <div class="form">
                <h1 class="">PHARMACY ASSISTANT</h1>
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>

        <style>
            .login {
                width: 100%;
                height:100%;
                border: 1px solid #CCC;
                background: url(./img/f.jpg);
                background-size: cover;
                position: relative;
                /*left: 60%;*/
                margin:0; 
                padding:0;
            }
            
           
            .login .form {
                width: 100%;
                height: 100%;
                padding: 10px 10px;
            }
            .login .form h1 {
                color: #FFF;
                text-align: center;
                font-size: 40px;
                margin-top: 60px;
                margin-bottom: 80px;
                font-weight: bold;
            }

            .login .form h2 {
                color: #d0d0d0;
                text-align: center;
                font-size: 20px;
                margin-top: 60px;
                margin-bottom: 80px;
                font-weight: bold;
            }
        </style>

</body>
</html><?php /**PATH C:\laragon\www\pharmacy-assistant\resources\views/layouts/app.blade.php ENDPATH**/ ?>