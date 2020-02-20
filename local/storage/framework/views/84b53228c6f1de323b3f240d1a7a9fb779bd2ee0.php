<?php $__env->startSection('page_title','สยามวานิช'); ?>
<?php $__env->startSection('content'); ?>





<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="row centerbg">



<div class="col-md-3 padding0">
<div class="logobg1"></div>
</div>


  <div class="col-md-7 padding25 bgw">

       <div class="texthot">ธนาคารที่ห้ามโอนเงิน</div>
       <div class="textro">บุคคลที่มีรายชื่อต่อไปนี้ เป็นบุคคลอันตรายที่เคยโกงเงินสมาชิกด้วยกัน ดังนั่นหากท่านจะโอนเงินโปรดตรวจสอบรายชื่อให้เรียบร้อย</div>

<br>
      <div class="form-horizontal">
      <fieldset>
      <!-- Text input-->
      <div class="form-group">
      <p class="col-md-3 control-labelusername" for="textinput">ค้นหา Username</p>
      <div class="col-md-3">
      <?php echo e(Form::open(['url'=>'searchBlacklist'])); ?>

      <input id="textinput" name="search" type="text" placeholder="" class="form-control input-md">
      <?php if(isset($search)and $search->count()<1): ?>
        <p class="texthot">ไม่พบข้อมูล</p>
      <?php endif; ?>
      </div>
      <div class="col-md-4">
      <button id="" name="" class="btn3 bot17 btn-inverse">ค้นหา</button>
      <?php echo e(Form::close()); ?>


      </div>
      </div>
      </fieldset>
      </div>


<div class="col-lg-12">

<div class="panel panel-default panel-table table18" style="width: 100%;text-align: center;">
<div class="panel-heading">
<div class="tr">
      <div class="td">Username</div>
      <div class="td">ชื่อสมาชิก</div>
      <div class="td">เลขที่บัญชี</div>
      <div class="td">ธนาคาร</div>

</div>
</div>
<?php 
if(isset($search)){
  $bl=$search;
}else{
    $bl=App\blackList::get();
}
 ?>
<?php $__currentLoopData = $bl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="panel-body">
    <div class="tr">
        <div class="td"><?php echo e($data->username); ?></div>
        <div class="td"><?php echo e($data->fullname); ?></div>
        <div class="td"><?php echo e($data->account_bank); ?></div>
        <div class="td"><?php echo e($data->bank); ?></div>
    </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



  </div>

  </div>

</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>