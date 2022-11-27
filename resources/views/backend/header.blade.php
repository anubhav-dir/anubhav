<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  @stack('title')

  <!-- theme meta -->
  <meta name="theme-name" content="mono" />

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
  <link href="{{url('/storage/theme/plugins/material/css/materialdesignicons.min.css')}}" rel="stylesheet" />
  <link href="{{url('/storage/theme/plugins/simplebar/simplebar.css')}}" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="{{url('/storage/theme/plugins/nprogress/nprogress.css')}}" rel="stylesheet" />

  <link href="{{url('/storage/theme/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css')}}" rel="stylesheet" />
  <link href="{{url('/storage/theme/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
  <link href="{{url('/storage/theme/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" />
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <!-- MONO CSS -->
  <link id="main-css-href" rel="stylesheet" href="{{url('/storage/theme/css/style.css')}}" />
  <!-- FAVICON -->
  <link href="{{url('/storage/theme/images/favicon.png')}}" rel="shortcut icon" />

  <script src="{{url('/storage/theme/plugins/nprogress/nprogress.js')}}"></script>
  <style>
    .custom-image{
        height: 120px;
        width: 120px;
    }
    .user-image{
        height: 40px;
        width: 40px;
    }
  </style>
</head>


<body class="navbar-fixed sidebar-fixed" id="body">
  <script>
    NProgress.configure({ showSpinner: false });
    NProgress.start();
  </script>

  <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">


