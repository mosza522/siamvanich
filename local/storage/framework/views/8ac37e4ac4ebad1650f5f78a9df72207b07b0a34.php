<?php $__env->startSection('page_title','Siamvanich | จัดการโฆษณา'); ?>
<?php $__env->startSection('content'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        โฆษณา
        <small>จัดการโฆษณา</small>
        <p>
          

        </p>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(url('backoffice/index')); ?>"><i class="fa fa-cog"></i> Backoffice</a></li>
        <li class="active">จัดการโฆษณา</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <?php if(Session::has('success')): ?>
        <script>
            swal("<?php echo e(Session::get('success')); ?>", "", "success");
        </script>
    <?php endif; ?>
      <a  href="<?php echo e(url('backoffice/addbanner_form')); ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> เพิ่มโฆษณา</button></a>
      <p></p>
      <table id="example" class="table">
      <thead>
        <tr>
<th class="text-center" style="width: 5%;">ลำดับ</th>
          <th class="text-center" style="width: 15%;">ตำแหน่ง</th>
          <th class="text-center" style="width: 15%;">หมดอายุ</th>
          <th class="text-center" style="width: 35%;">รูป</th>
          <th class="text-center" style="width: 15%;">Note</th>
<th class="text-center" style="width: 15%;">Action</th>
  </tr>
      </thead>
      <tbody>
        <?php 
        $data=App\banner::get();
        $i=1;
         ?>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
          <td align="center"><?php echo e($i++); ?></td>
          <td align="center"><?php echo e($key->position); ?></td>
          <td align="center"><?php echo e($key->expired); ?></td>
          <td align="center">

                        <div class="row"> <a href="" data-toggle="modal" data-target="#myModal<?php echo e($key->id); ?>"><img src="<?php echo e(asset('local/storage/app/images/banner'.'/'.$key->name)); ?>" width="250" height="250" alt=""></a> </div>
                        <div class="modal fade" id="myModal<?php echo e($key->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
                            <div class="modal-dialog" role="document" style="z-index:50000;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button> <span aria-hidden="true"></span>
                                        <div class="modal-body"> <img class="img-responsive" src="<?php echo e(asset('local/storage/app/images/banner'.'/'.$key->name)); ?>" style="width: 100%;">


                                        </div>
                                        <div class="modal-footer">
                                            <button type="Success" class="btn btn-warning" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </td>
          <td align="center"><?php echo e($key->note); ?></td>
                    <td align="center">
          
          <button type="button" onclick="return sweetalert(<?php echo e($key->id); ?>)" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Delete</button>
          </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



      </tbody>
    </table>

    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
  function sweetalert(id) {
    swal({
  title: "ยืนยันการลบ?",
  text: "ต้องการลบโฆษนาใช่หรือไม่ ?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((sweetalert) => {
  if (sweetalert) {
    // setTimeout(function () {
  window.location = "<?php echo e(url('backoffice/del_banner/')); ?>"+"/"+id;
// }, 1000);
  } else {
    swal("ยกเลิกการลบ!","","error");
  }
});
  }

  $(document).ready(function(){
    $('#example').DataTable({
        "order": [[ 0, "asc" ]]
    });
  });

  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backoffice.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>