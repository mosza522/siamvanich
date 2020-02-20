<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $__env->yieldContent('page_title'); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php echo e(Html::style('assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>

  <!-- Font Awesome -->
  <?php echo e(Html::style('assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')); ?>

  <!-- Ionicons -->
  <?php echo e(Html::style('assets/AdminLTE/bower_components/Ionicons/css/ionicons.min.css')); ?>

  <!-- Theme style -->
  <?php echo e(Html::style('assets/AdminLTE/dist/css/AdminLTE.min.css')); ?>

  <?php echo e(Html::style('assets/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>


  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <?php echo e(Html::script('https://code.jquery.com/jquery-1.12.4.js')); ?>

  <?php echo e(Html::script('https://code.jquery.com/ui/1.12.1/jquery-ui.js')); ?>

  <?php echo e(Html::style('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css')); ?>

  <?php echo e(Html::script('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js')); ?>

  <?php echo e(Html::style('assets/AdminLTE/dist/css/skins/_all-skins.min.css')); ?>

  
  <?php echo e(Html::script('assets/ckeditor/ckeditor.js')); ?>

  <?php echo e(Html::script('https://unpkg.com/sweetalert/dist/sweetalert.min.js')); ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <?php echo e(Html::style('https://fonts.googleapis.com/css?family=Kanit')); ?>

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
                <?php echo e(Html::image('assets/img/index/logo-01.png','',array('class'=>'user-image'))); ?>

                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <?php 
                $id=Session::get('user');
                  $user=DB::table('tb_admin')->where('id', '=', $id)->first();
                 ?>
                <span class="hidden-xs"><?php echo e($user->admin_fullname); ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  
                  <?php echo e(Html::image('assets/img/index/logo-01.png','',array('class'=>'img-circle'))); ?>


                  <p>
                    <?php echo e($user->admin_fullname); ?>

                    
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
                    <?php echo e(HTML::link('backoffice/logout', 'Sign out', array('class'=>'btn btn-danger btn-flat'))); ?>

                    
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

            <?php echo e(Html::image('assets/img/index/logo-01.png','',array('class'=>'img-circle'))); ?>

          </div>
          <div class="pull-left info">
            <p><?php echo e($user->admin_fullname); ?></p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <!-- search form (Optional) -->
        
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">HEADER</li>
          <!-- Optionally, you can add icons to the links -->
          <?php 
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
           ?>
          <li class='<?php echo e($index); ?>'><a href="<?php echo e(url('backoffice/index')); ?>"><i class="fa fa-home"></i> <span>หน้าหลัก</span></a></li>
          <li class='<?php echo e($admin); ?>'><a href="<?php echo e(url('backoffice/admin')); ?>"><i class="fa fa-user-circle"></i> <span>ผู้ดูแลระบบ</span></a></li>
          <li class="treeview <?php echo e($userHome); ?><?php echo e($userConfirm); ?>">
            <a href="#"><i class="fa fa-user-o" aria-hidden="true"></i> <span>ผู้ใช้</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e($userHome); ?>"><a href="<?php echo e(url('backoffice/userHome')); ?>"><i class="fa fa-circle-o" style="color : #605ca8" aria-hidden="true"></i> หน้าหลักผู้ใช้
                  <?php 
                    $numuser=\App\user_tb::where('user_status_confirm',1)->get();
                   ?>
                  <small class="label pull-right bg-red"><?php if(count($numuser)>0): ?>
                      <?php echo e(count($numuser)); ?>

                  <?php endif; ?></small>
                </span></a></li>
              <li class="<?php echo e($userConfirm); ?>"><a href="<?php echo e(url('backoffice/userConfirm')); ?>"><i class="fa fa-circle-o" style="color : #605ca8" aria-hidden="true"></i> ยืนยันผู้ใช้
                <span class="pull-right-container">
                  <?php 
                    $numcon=\App\user_tb::where('user_status_confirm',0)->get();
                   ?>
                  <small class="label pull-right bg-red"><?php if(count($numcon)>0): ?>
                      <?php echo e(count($numcon)); ?>

                  <?php endif; ?></small>
                </span>
              </a></li>
            </ul>
            </li>
            <li class='<?php echo e($blacklist); ?>'><a href="<?php echo e(url('backoffice/blacklist')); ?>"><i class="fa fa-thumbs-down" aria-hidden="true"></i> <span>บัญชีดำ</span></a></li>
            <li class='<?php echo e($renew); ?>'>
              <a href="<?php echo e(url('backoffice/renew')); ?>">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> <span>ต่ออายุการใช้งาน</span>
                <span class="pull-right-container">
                  <?php 
                    $numrenew=\App\renew::where('read',0)->get();
                   ?>
                  <small class="label pull-right bg-red"><?php if(count($numrenew)>0): ?>
                      <?php echo e(count($numrenew)); ?>

                  <?php endif; ?></small>
                </span>
              </a></li>
              <li class="treeview <?php echo e($contentIndex); ?><?php echo e($contentRules); ?><?php echo e($contentFirstPage); ?>">
                <a href="#"><i class="fa fa-pencil-square" aria-hidden="true"></i> <span>เนื้อหา</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                  <li class="<?php echo e($contentFirstPage); ?>"><a href="<?php echo e(url('backoffice/contentFirstPage')); ?>"><i class="fa fa-circle-o" style="color : #605ca8" aria-hidden="true"></i> หน้าแรก</a></li>
                  <li class="<?php echo e($contentIndex); ?>"><a href="<?php echo e(url('backoffice/contentIndex')); ?>"><i class="fa fa-circle-o" style="color : #605ca8" aria-hidden="true"></i> หน้าหลักผู้ใช้</a></li>
                  <li class="<?php echo e($contentRules); ?>"><a href="<?php echo e(url('backoffice/contentRules')); ?>"><i class="fa fa-circle-o" style="color : #605ca8" aria-hidden="true"></i> ราคาผู้ใช้แบบ ธรรมดา</a></li>
                </ul>
                </li>
              
              <li class="treeview <?php echo e($forumCategory); ?><?php echo e($forumManage); ?>">
                <a href="#"><i class="fa fa-lightbulb-o" aria-hidden="true"></i> <span>กระทู้</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                  <li class="<?php echo e($forumCategory); ?>"><a href="<?php echo e(url('backoffice/forumCategory')); ?>"><i class="fa fa-circle-o" style="color : #605ca8" aria-hidden="true"></i> หมวดกระทู้</a></li>
                  <li class="<?php echo e($forumManage); ?>"><a href="<?php echo e(url('backoffice/forumManage')); ?>"><i class="fa fa-circle-o" style="color : #605ca8" aria-hidden="true"></i> จัดการกระทู้</a></li>
                </ul>
                </li>
                <li class='<?php echo e($banner); ?>'><a href="<?php echo e(url('backoffice/banner')); ?>"><i class="fa fa-picture-o" aria-hidden="true"></i> <span>จัดการโฆษณา</span></a></li>



        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <?php echo $__env->yieldContent('content'); ?>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      
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

<!-- Bootstrap 3.3.7 -->
<?php echo e(Html::script('assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>

<!-- AdminLTE App -->
<?php echo e(Html::script('assets/AdminLTE/dist/js/adminlte.min.js')); ?>

<?php echo e(Html::script('assets/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')); ?>

<?php echo e(Html::script('assets/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>



</body>
</html>
