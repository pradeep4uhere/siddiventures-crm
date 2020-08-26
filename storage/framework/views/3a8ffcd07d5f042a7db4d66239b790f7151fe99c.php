<style type="text/css">
  .navbar-nav>.user-menu>.dropdown-menu>li.user-header {
    height: 50px !important  ;
    padding: 10px;
    text-align: center;
}
</style>
<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo e(env('APP_URL')); ?>" class="logo" style="background-color: #FFF;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b><?php echo e(substr(env('APP_NAME'),0,1)); ?></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="background-color: #FFF; padding-top: 7px;"><img height="38px" src="<?php echo e(config('global.BACKENDCMS')); ?>/Admin/dist/img/rsz_logo_1.png"></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo e(config('global.BACKENDCMS')); ?>/backend/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"> <?php echo e(ucwords(Auth::user()->name)); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
           
                <p>
                  <?php echo e(ucwords(Auth::user()->name)); ?>

                  <small>Member since 06 June 2020</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                </div>
                <div class="pull-right">
                  <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                  <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;"><?php echo csrf_field(); ?></form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>
<?php /**PATH /var/www/html/debaleenacms/resources/views/layouts/header.blade.php ENDPATH**/ ?>