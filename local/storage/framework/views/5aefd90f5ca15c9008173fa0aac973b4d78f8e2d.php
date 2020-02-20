<?php $__env->startSection('page_title','Siamvanich | ต่ออายุ'); ?>
<?php $__env->startSection('content'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ต่ออายุการใช้งาน
        <small>ต่ออายุการใช้งาน</small>
        <p>
          

        </p>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(url('backoffice/index')); ?>"><i class="fa fa-cog"></i> Backoffice</a></li>
        <li class="active">ต่ออายุการใช้งาน</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <?php if(Session::has('success')): ?>
        <script>
            swal("<?php echo e(Session::get('success')); ?>", "", "success");
        </script>
    <?php endif; ?>
      
      <p></p>
      <table id="example" class="table">
      <thead>
        <tr>
<th class="text-center" style="width: 5%;">ลำดับ</th>
          <th class="text-center" style="width: 10%;">ประเภทการต่ออายุ</th>
          <th class="text-center" style="width: 15%;">ธนาคาร</th>
          <th class="text-center" style="width: 10%;">จำนวนเงิน</th>
          <th class="text-center" style="width: 15%;">วันที่</th>
          <th class="text-center" style="width: 10%;">เลขสถานที่</th>
          <th class="text-center" style="width: 10%;">ใบเสร็จ</th>
<th class="text-center" style="width: 25%;">Action</th>
  </tr>
      </thead>
      <tbody>
        <?php 
        $i=1;
        $data=App\renew::where('read',0)->orderBy('created_at')->get();
         ?>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
          <td align="center"><?php echo e($i); ?></td>
          <td align="center"><?php echo e($key->type_renew); ?></td>
          <td align="center"><?php echo e($key->bank); ?></td>
          <td align="center"><?php echo e($key->amount); ?></td>
          <td align="center"><?php echo e($key->date); ?></td>
          <td align="center"><?php echo e($key->num_place); ?></td>
          <td align="center"><div class="col-sm-3 col-lg-3 col-md-3">
              <div class="branch-1">
                  <div class="bordol-1">
                      <div class="row"> <a href="" data-toggle="modal" data-target="#myModal<?php echo e($key->id); ?>"><img width="250px" src="<?php echo e(asset('local/storage/app/images/renew'.'/'.$key->image)); ?>" alt=""></a> </div>
                      <div class="modal fade" id="myModal<?php echo e($key->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
                          <div class="modal-dialog" role="document" style="z-index:50000;">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button> <span aria-hidden="true"></span>
                                      <div class="modal-body"> <img class="img-responsive" src="<?php echo e(asset('local/storage/app/images/renew'.'/'.$key->image)); ?>" style="width: 100%;">


                                      </div>
                                      <div class="modal-footer">
                                          <button type="Success" class="btn btn-warning" data-dismiss="modal">Close</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
            </td>
                    <td align="center">
          <button type="button" onclick="return con_sweetalert(<?php echo e($key->id); ?>)" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Confirm</button>
          
          <button type="button" onclick="return del_sweetalert(<?php echo e($key->id); ?>)" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Delete</button>
          </td>
        </tr>
        <?php 
          $i++;
         ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



      </tbody>
    </table>

    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
  function del_sweetalert(id) {
    swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((sweetalert) => {
  if (sweetalert) {
    // setTimeout(function () {
  window.location = "<?php echo e(url('backoffice/del_renew/')); ?>"+"/"+id;
// }, 1000);
  } else {
    swal("Your data is safe!","","error");
  }
});
  }
  function con_sweetalert(id) {
    swal({
  title: "Are you sure?",
  text: "ยืนยันการต่ออายุของผู้ใช้?",
  icon: "info",
  buttons: true,
  dangerMode: false,
})
.then((sweetalert) => {
  if (sweetalert) {
    // setTimeout(function () {
      window.location = "<?php echo e(url('backoffice/con_renew/')); ?>"+"/"+id;

// }, 1000);
  } else {
    swal("ผู้ใช้ยังไม่ได้ต่ออายุ","","error");
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