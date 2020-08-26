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
      <span class="logo-mini">
        <img src="http://localhost/siddiventures/public/themes/siddiventures/images/logo.png" alt="Quickai" width="50" style="vertical-align:middle">
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="background-color: #FFF; padding-top: 7px;">
        <table>
              <tbody><tr>
                <td style="padding-bottom:0px;">
                    <a href="http://localhost/siddiventures/public/index.php" title="SiddiVenture">
                      <img src="http://localhost/siddiventures/public/themes/siddiventures/images/logo.png" alt="Quickai" width="50" style="vertical-align:middle">
                    </a>
                </td>
                <td style="padding-bottom: 10px;">
                  <a href="http://localhost/siddiventures/public/index.php" title="SiddiVenture" style="color:#000">
                  <span style="font-size: 20px;display: block;">SiddhiVentures</span>
                  <small>Administrator</small>
                  </a>
                </td>
              </tr>
            </tbody></table>
      </span>
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
<?php /**PATH /var/www/html/siddiventures.admin/resources/views/layouts/header.blade.php ENDPATH**/ ?>