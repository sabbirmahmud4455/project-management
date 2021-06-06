<!DOCTYPE html>
<html lang="en">
  <head>


<!-- Font Awesome Icons -->
  {{-- <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}"> --}}
  <!-- Theme style -->
  {{-- <link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css')}}"> --}}
  <!-- Google Font: Source Sans Pro -->
  {{-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> --}}

  {{-- custom css --}}
  {{-- <link rel="stylesheet" href="{{asset('template/dist/css/custom.css')}}"> --}}


  {{-- -------------------------- --}}






    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Blank Page - Vali Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" href="{{asset('template/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl">
    @if (Auth::check())
    <script>
        window.Laravel = {!!json_encode([
               'isLoggedin' => true,
               'user' => Auth::user(),
               'roles'=>Auth::user()->roles
           ])!!}
    </script>
      @else
          <script>
              window.Laravel = {!!json_encode([
                      'isLoggedin' => false
                  ])!!}
          </script>
      @endif

    <div id="app">
        <app-main class="mb-4"></app-main>
    </div>






    <!-- Essential javascripts for application to work-->
    <script src="{{asset('template/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('template/js/popper.min.js')}}"></script>
    <script src="{{asset('template/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('template/js/main.js')}}"></script>

    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->


 <!-- Data table plugin-->
    <script src="{{asset('template/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('template/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">
       function loadDataTable(){
           $('#sampleTable').DataTable();
       }
    </script>




    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>




<!-- AdminLTE App -->
{{-- <script src="{{asset('template/dist/js/adminlte.min.js')}}"></script> --}}
{{-- <script src="{{asset('template/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script> --}}
<script src="{{asset('js/app.js')}}"></script>
{{-- <script>
  $(document).ready(function () {
    bsCustomFileInput.init()
  })
</script> --}}







  </body>
</html>

