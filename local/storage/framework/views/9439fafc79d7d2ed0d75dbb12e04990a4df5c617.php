
   <nav class="navbar navbar-default topmenu">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">SIAM WANICH</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo e(url('regis')); ?>">สมัครสมาชิกใหม่</a></li>
        <li><a href="<?php echo e(url('blacklist')); ?>">รายชื่อห้ามโอนเงิน</a></li>
        <li><a href="<?php echo e(url('advertise')); ?>">ติดต่อโฆษณา</a></li>
        <li><a href="<?php echo e(url('forgotPassword')); ?>">ลืมรหัสผ่าน</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">หมวดหมู่สินค้า <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php 
              $cats=App\forum_category::get();
             ?>
            <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><a href="<?php echo e(url('Category/normal/'.$cat->id)); ?>"><?php echo e(url('Category/normal/'.$cat->category_name)); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            

          </ul>
        </li>
      </ul>



    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
