<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Go4Shop') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style type="text/css">
@charset "utf-8";
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
              <div class="logos">
            <table>
              <tbody><tr>
                <td>
                    <a href="http://localhost/siddiventures/public/index.php" title="SiddiVenture">
                      <img src="http://localhost/siddiventures/public/themes/siddiventures/images/logo.png" alt="Quickai" width="65" style="vertical-align:middle">
                    </a>
                </td>
                <td>
                  <a href="http://localhost/siddiventures/public/index.php" title="SiddiVenture" style="color:#000">
                  <span style="font-size: 20px;display: block;">SiddhiVentures</span>
                  <small>Recharge &amp; Bill Payment App</small>
                  </a>
                </td>
              </tr>
            </tbody></table>
            </div>
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
            @yield('content')
            </div>
        </main>
    </div>
</body>
</html>