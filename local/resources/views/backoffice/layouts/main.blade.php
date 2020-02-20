<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('page_title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  {{Html::style('assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')}}
  <!-- Font Awesome -->
  {{Html::style('assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')}}
  <!-- Ionicons -->
  {{Html::style('assets/AdminLTE/bower_components/Ionicons/css/ionicons.min.css')}}
  <!-- Theme style -->
  {{Html::style('assets/AdminLTE/dist/css/AdminLTE.min.css')}}
  {{Html::style('assets/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}

  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  {{ Html::script('https://code.jquery.com/jquery-1.12.4.js')}}
  {{ Html::script('https://code.jquery.com/ui/1.12.1/jquery-ui.js')}}
  {{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css')}}
  {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js')}}
  {{Html::style('assets/AdminLTE/dist/css/skins/_all-skins.min.css')}}
  {{-- <script src="ckeditor/ckeditor.js"></script> --}}
  {{Html::script('assets/ckeditor/ckeditor.js')}}
  {{Html::script('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  {{Html::style('https://fonts.googleapis.com/css?family=Kanit')}}
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-purple sidebar-mini">

  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>S</b>WN</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Siamwanich </b></span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->

            <!-- /.messages-menu -->

            <!-- Notifications Menu -->

            <!-- Tasks Menu -->

            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                {{Html::image('assets/img/index/logo-01.png','',array('class'=>'user-image'))}}
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                @php
                $id=Session::get('user');
                  $user=DB::table('tb_admin')->where('id', '=', $id)->first();
                @endphp
                <span class="hidden-xs">{{$user->admin_fullname}}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> --}}
                  {{Html::image('assets/img/index/logo-01.png','',array('class'=>'img-circle'))}}

                  <p>
                    {{$user->admin_fullname}}
                    {{-- <small>Member since Nov. 2012</small> --}}
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">

                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="text-center">
                    {{HTML::link('backoffice/logout', 'Sign out', array('class'=>'btn btn-danger btn-flat'))}}
                    {{-- <a href="logout" class="btn btn-danger btn-flat">Sign out</a> --}}
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->

          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="pull-left image">

            {{Html::image('assets/img/index/logo-01.png','',array('class'=>'img-circle'))}}
          </div>
          <div class="pull-left info">
            <p>{{$user->admin_fullname}}</p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <!-- search form (Optional) -->
        {{-- <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
          </div>
        </form> --}}
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">HEADER</li>
          <!-- Optionally, you can add icons to the links -->
          @php
          $index='';
          $admin='';
          $userHome='';
          $userConfirm='';
          $blacklist='';
          $renew='';
          $content='';
          $contentFirstPage='';
          $contentIndex='';
          $contentRules='';
          $forumCategory='';
          $forumManage='';
          $banner='';
            switch (Session::get('page')) {
              case 'index':
              $index='active';
              break;
              case 'admin':
              $admin='active';
              break;
              case 'userHome':
              $userHome='active';
              break;
              case 'userConfirm':
              $userConfirm='active';
              break;
              case 'blacklist':
              $blacklist='active';
              break;
              case 'renew':
              $renew='active';
              break;
              case 'contentFirstPage':
              $contentFirstPage='active';
              break;
              case 'contentIndex':
              $contentIndex='active';
              break;
              case 'contentRules':
              $contentRules='active';
              break;
              case 'forumCategory':
              $forumCategory='active';
              break;
              case 'forumManage':
              $forumManage='active';
              break;
              case 'banner':
              $banner='active';
              break;
            }
          @endphp
          <li class='{{$index}}'><a href="{{url('backoffice/index')}}"><i class="fa fa-home"></i> <span>หน้าหลัก</span></a></li>
          <li class='{{$admin}}'><a href="{{url('backoffice/admin')}}"><i class="fa fa-user-circle"></i> <span>ผู้ดูแลระบบ</span></a></li>
          <li class="treeview {{$userHome}}{{$userConfirm}}">
            <a href="#"><i class="fa fa-user-o" aria-hidden="true"></i> <span>ผู้ใช้</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{$userHome}}"><a href="{{url('backoffice/userHome')}}"><i class="fa fa-circle-o" style="color : #605ca8" aria-hidden="true"></i> หน้าหลักผู้ใช้
                  @php
                    $numuser=\App\user_tb::where('user_status_confirm',1)->get();
                  @endphp
                  <small class="label pull-right bg-red">@if (count($numuser)>0)
                      {{count($numuser)}}
                  @endif</small>
                </span></a></li>
              <li class="{{$userConfirm}}"><a href="{{url('backoffice/userConfirm')}}"><i class="fa fa-circle-o" style="color : #605ca8" aria-hidden="true"></i> ยืนยันผู้ใช้
                <span class="pull-right-container">
                  @php
                    $numcon=\App\user_tb::where('user_status_confirm',0)->get();
                  @endphp
                  <small class="label pull-right bg-red">@if (count($numcon)>0)
                      {{count($numcon)}}
                  @endif</small>
                </span>
              </a></li>
            </ul>
            </li>
            <li class='{{$blacklist}}'><a href="{{url('backoffice/blacklist')}}"><i class="fa fa-thumbs-down" aria-hidden="true"></i> <span>บัญชีดำ</span></a></li>
            <li class='{{$renew}}'>
              <a href="{{url('backoffice/renew')}}">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> <span>ต่ออายุการใช้งาน</span>
                <span class="pull-right-container">
                  @php
                    $numrenew=\App\renew::where('read',0)->get();
                  @endphp
                  <small class="label pull-right bg-red">@if (count($numrenew)>0)
                      {{count($numrenew)}}
                  @endif</small>
                </span>
              </a></li>
              <li class="treeview {{$contentIndex}}{{$contentRules}}{{$contentFirstPage}}">
                <a href="#"><i class="fa fa-pencil-square" aria-hidden="true"></i> <span>เนื้อหา</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                  <li class="{{$contentFirstPage}}"><a href="{{url('backoffice/contentFirstPage')}}"><i class="fa fa-circle-o" style="color : #605ca8" aria-hidden="true"></i> หน้าแรก</a></li>
                  <li class="{{$contentIndex}}"><a href="{{url('backoffice/contentIndex')}}"><i class="fa fa-circle-o" style="color : #605ca8" aria-hidden="true"></i> หน้าหลักผู้ใช้</a></li>
                  <li class="{{$contentRules}}"><a href="{{url('backoffice/contentRules')}}"><i class="fa fa-circle-o" style="color : #605ca8" aria-hidden="true"></i> ราคาผู้ใช้แบบ ธรรมดา</a></li>
                </ul>
                </li>
              {{-- <li class='{{$content}}'><a href="{{url('backoffice/content')}}"><i class="fa fa-pencil-square"></i> <span>Content</span></a></li> --}}
              <li class="treeview {{$forumCategory}}{{$forumManage}}">
                <a href="#"><i class="fa fa-lightbulb-o" aria-hidden="true"></i> <span>กระทู้</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                  <li class="{{$forumCategory}}"><a href="{{url('backoffice/forumCategory')}}"><i class="fa fa-circle-o" style="color : #605ca8" aria-hidden="true"></i> หมวดกระทู้</a></li>
                  <li class="{{$forumManage}}"><a href="{{url('backoffice/forumManage')}}"><i class="fa fa-circle-o" style="color : #605ca8" aria-hidden="true"></i> จัดการกระทู้</a></li>
                </ul>
                </li>
                <li class='{{$banner}}'><a href="{{url('backoffice/banner')}}"><i class="fa fa-picture-o" aria-hidden="true"></i> <span>จัดการโฆษณา</span></a></li>



        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      {{-- <div class="pull-right hidden-xs">
        Anything you want
      </div> --}}
      <!-- Default to the left -->
      <strong>Copyright &copy; 2017 <a target="_blank" href="https://www.orange-thailand.com/">Orange-Thailand</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>

<!-- jQuery 3 -->
{{-- {{Html::script('assets/AdminLTE/bower_components/jquery/dist/jquery.min.js')}} --}}
<!-- Bootstrap 3.3.7 -->
{{Html::script('assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')}}
<!-- AdminLTE App -->
{{Html::script('assets/AdminLTE/dist/js/adminlte.min.js')}}
{{Html::script('assets/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')}}
{{Html::script('assets/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}


</body>
</html>
