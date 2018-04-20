
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('content1')</title>
  <!-- Tell the browser to be responsive to screen width -->
  @yield('content2')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/png" href="{{ asset('public/login') }}/images/icons/favicons.ico"/>
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('public/dashboard') }}/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('public/dashboard') }}/fonts/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('public/dashboard') }}/fonts/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('public/dashboard') }}/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('public/dashboard') }}/dist/css/skins/_all-skins.min.css">
  


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="{{ asset('public/dashboard') }}/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="{{ asset('public/dashboard') }}/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-purple sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ route('index') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">Demo</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Tu Nhien</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="{{ route('logout') }}" class="btn btn-default btn-flat" style="color: #5e2295">Log out</a>
            
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <h4 style="color: rosybrown"><b></b></h4>
        </div>
        
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="{{ route('Header') }}">
            <span>Header</span>
          </a>
        </li>

        <li class="treeview">
          <a href="{{ route('Slidebar') }}">
            <span>Slide bar</span>
          </a>
        </li>

        <li class="treeview">
          <a href="{{ route('About') }}">
            <span>About</span>
          </a>
        </li>

        <li class="treeview">
          <a href="{{ route('Product') }}">
            <span>Product</span>
          </a>
        </li>

        <li class="treeview">
          <a href="{{ route('Why') }}">
            <span>Why?</span>
          </a>
        </li>

        <li class="treeview">
          <a href="{{ route('Statical') }}">
            <span>Statistical</span>
          </a>
        </li>

        <li class="treeview">
          <a href="{{ route('TesMonial') }}">
            <span>Testimonial</span>
          </a>
        </li>

        <li class="treeview">
          <a href="{{ route('LogoSlide') }}">
            <span>LogoSlide</span>
          </a>
        </li>

        <li class="treeview">
          <a href="{{ route('contact') }}">
            <span>Contact</span>
          </a>
        </li>

        <li class="treeview">
          <a href="{{ route('googlemap') }}">
            <span>Google map</span>
          </a>
        </li>

        <li class="treeview">
          <a href="{{ route('apm') }}">
            <span>address-phone-email</span>
          </a>
        </li>

        <li class="treeview">
          <a href="{{ route('footer') }}">
            <span>Footer</span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       @yield('content3')
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('contentdashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        @yield('content4')
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">@yield('content5')</h3>

          <!-- <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div> -->
        </div>
        <div class="box-body">
          @yield('content6')
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          @yield('content7')
        </div>
        <!-- /.box-footer-->
      </div>
      @yield('content8')
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    Footer tự nhiên
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
@yield('script1')
<script src="{{ asset('public/dashboard') }}/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('public/dashboard') }}/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="{{ asset('public/dashboard') }}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{ asset('public/dashboard') }}/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/dashboard') }}/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/dashboard') }}/dist/js/demo.js"></script>
@yield('script')


</body>
</html>
