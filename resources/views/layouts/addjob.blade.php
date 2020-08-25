<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{config('global.BACKENDCMS')}}/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- DataTables -->
        <!-- DataTables -->
    <link rel="stylesheet" href="{{config('global.BACKENDCMS')}}/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <link rel="stylesheet" href="{{config('global.BACKENDCMS')}}/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{config('global.BACKENDCMS')}}/backend/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{config('global.BACKENDCMS')}}/backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{config('global.BACKENDCMS')}}/backend/bower_components/Ionicons/css/ionicons.min.css">
     <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{config('global.BACKENDCMS')}}/backend/plugins/iCheck/all.css">
   <!-- jvectormap -->
    <link rel="stylesheet" href="{{config('global.BACKENDCMS')}}/backend/bower_components/jvectormap/jquery-jvectormap.css">

     <!-- Select2 -->
  <link rel="stylesheet" href="{{config('global.BACKENDCMS')}}/backend/bower_components/select2/dist/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{config('global.BACKENDCMS')}}/backend/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{config('global.BACKENDCMS')}}/backend/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="{{config('global.BACKENDCMS')}}/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
    
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@include('layouts.header')    
@include('layouts.sidebar')    
@yield('content')
</div>
<!-- jQuery 3 -->
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<!-- Select2 -->
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<!-- DataTables -->
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->


<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{config('global.BACKENDCMS')}}/backend/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="{{config('global.BACKENDCMS')}}/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{config('global.BACKENDCMS')}}/backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- bootstrap datepicker -->
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- date-range-picker -->
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/moment/min/moment.min.js"></script>
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->


<!-- SlimScroll -->
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE App -->
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{config('global.BACKENDCMS')}}/backend/dist/js/demo.js"></script>
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/ckeditor/ckeditor.js"></script>
<script src="{{config('global.BACKENDCMS')}}/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script>
$(document).ready(function(){
    $('.editModelBox').on('click',function(){
        var dataURL = $(this).attr('data-href');
        var candName = $(this).attr('data-candidate');
        var loader  = "{{config('global.LOADER')}}";
        var img = "<img src='"+loader+"'>";
        $('.modal-body').html(img);
        var str = "<iframe src='"+dataURL+"' width='100%'' height='800'> </iframe>";
        $('#nameOfCandidate').html(candName);
        $('.modal-body').html(str);
        //$('.modal-body').load(str,function(){
         //   $('#myModal').modal({show:true});
        //});
    }); 
});
</script>
<script>
  $(document).ready(function(){
    $('html, body').animate({
      scrollTop: $("#alljobapplicationList").offset().top
    }, 1000);
  });  

  $(function () {

      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })

     $(".Cancel").click(function(){
      window.history.back();
    });
     //Initialize Select2 Elements
    $('.select2').select2()

    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
     //Date picker
    //bootstrap WYSIHTML5 - text editor
    // $('.textarea').wysihtml5()
  })
</script>

</body>
</html>
