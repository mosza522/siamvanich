<?php $__env->startSection('page_title','SiamVanich | INDEX'); ?>
<?php $__env->startSection('content'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ยินดีต้อนรับผู้ดูแลระบบ
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-cog"></i> Backoffice</a></li>
        <li class="active">หน้าหลัก</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <?php 
      $id=Session::get('user');
      $user=DB::table('tb_admin')->where('id', '=', $id)->get();
       ?>
      ยินดีต้อนรับ <?php echo e($user[0]->admin_fullname); ?> .
      <br><br>
      จำนวนผู้เข้าชมทั้งหมด
      <!-- BEGIN: Powered by Supercounters.com -->
      <script type="text/javascript" src="//widget.supercounters.com/ssl/texthit.js"></script><script type="text/javascript">var sc_texthit_var = sc_texthit_var || [];sc_text_hit(1448421,"คน","#000000");</script><br><noscript><a href="http://www.supercounters.com">free Hit Counter</a></noscript>
      <!-- END: Powered by Supercounters.com -->




    </section>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backoffice.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>