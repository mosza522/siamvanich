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
          <a href='https://freehitcounters.org/'>Hit Counters - for free!</a> <script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=b9305174a6c20bf1c156701a92da6d964adc1756'></script>

      <script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/311496/t/3"></script> คน


    </section>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backoffice.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>