<?php $__env->startSection('page_title','สยามวานิช'); ?>
<?php $__env->startSection('content'); ?>
<style media="screen">
.imageBox {
position: absolute;
visibility: hidden;
border: solid 1px #CCC;
padding: 5px;
}
</style>
  <div class="container-fluid">
  <div class="row">
  <div class="col-lg-12">
  <div class="row centerbg">



  <div class="col-md-3 padding0">
  <div class="logobg1"></div>
  </div>


  <div class="col-md-7 padding25 bgw">
    <center>
      <img src="<?php echo e(asset('assets/img/placeId.jpg')); ?>" alt="">
      </center>
  </div>




  </div>
  </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>