<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Starter</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  {{-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> --}}

  {{-- custom css --}}
  <link rel="stylesheet" href="{{asset('template/dist/css/custom.css')}}">
</head>
<body class="layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div id="app">
    <app-main class="mb-4"></app-main>
</div>
<!-- AdminLTE App -->
<script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('template/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('template/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('template/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script>
  $(document).ready(function () {
    bsCustomFileInput.init()
  })
</script>
</body>
</html>


