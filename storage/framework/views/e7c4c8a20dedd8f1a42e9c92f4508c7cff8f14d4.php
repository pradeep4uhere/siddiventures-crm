<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Go4Shop')); ?></title>
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<style type="text/css">
@charset  "utf-8";
/* CSS Document */
.login-head{
background-color: #3d4353 !important;
    color: #fff;}


.font600{
    font-weight:600;
}

.login-bt{
    color: #fff;
    background-color: #1b4694;
    border-color: #153b81;
}

.login-bt:hover{
    color: #fff;
    background-color: #1b4694;
    border-color: #153b81;
}
.login-position{
    padding-top: 6rem;
    padding-bottom: 6rem;
}  
</style>
<body>
    <div id="app"  style="height: 100%;">
         <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container-fluid">
                <a href="http://182.156.76.108/cms-content/public/index.php" class="navbar-brand">
                     <div class="logo-lg text-c" style="background-color: #FFF; padding-top: 7px;">
                        <img height="38px" src="http://182.156.76.108/cms-content/public/Admin/dist/img/abit_logo.png">
                    </div>
                </a> 
                <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
                    <span class="navbar-toggler-icon"></span>
                </button> 
                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto"></ul> 
                    <ul class="navbar-nav ml-auto"></ul>
                </div>
            </div>
        </nav> 
        <main class="login-position"  >
            <div class="container" style="position: relative;">
            <?php echo $__env->yieldContent('content'); ?>
            </div>
        </main>
    </div>
</body>
</html><?php /**PATH /var/www/html/cms-content/resources/views/layouts/app.blade.php ENDPATH**/ ?>