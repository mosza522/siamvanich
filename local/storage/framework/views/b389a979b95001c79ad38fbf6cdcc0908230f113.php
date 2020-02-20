<?php $__env->startSection('page_title','Siamvanich | กระทู้'); ?>
<?php $__env->startSection('content'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        กระทู้
        <small>จัดการกระทู้</small>
        <p>
          

        </p>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(url('backoffice/index')); ?>"><i class="fa fa-cog"></i> Backoffice</a></li>
        <li class="active">กระทู้</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <?php if(Session::has('success')): ?>
        
        <script>
            swal("<?php echo e(Session::get('success')); ?>", "", "success");
        </script>
    <?php endif; ?>

    
      <table id="example" class="table">
      <thead>
        <tr>
<th class="text-center" style="width: 5%;">No .</th>
          <th class="text-center" style="width: 10%;">หมวดกระทู้</th>
          <th class="text-center" style="width: 10%;">ประเภท</th>
          <th class="text-center" style="width: 10%;">ชื่อสินค้า</th>
          <th class="text-center" style="width: 10%;">ราคา</th>
          <th class="text-center" style="width: 20%;">ข้อความอธิบายสินค้า</th>
          <th class="text-center" style="width: 15%;text-align:center;">ชื่อผู้ขาย</th>
<th class="text-center" style="width: 20%;">Action</th>
  </tr>
      </thead>
      <tbody>
        <?php 
        $i=1;
        $data=App\forum::leftJoin('forum_categories','forums.category_id','forum_categories.id')
        ->leftJoin('user_tbs','forums.user_id','user_tbs.id')
        ->orderBy('type')
        ->orderBy('category_id')
        ->select('forums.*','forum_categories.category_name','user_tbs.user_fullname')
        ->get();
         ?>


          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
          <td align="center"><?php echo e($i++); ?><?php echo e("."); ?></td>
          <td><?php echo e($key->category_name); ?></td>
          <td><?php echo e($key->type); ?></td>
          <td><?php echo e($key->name); ?></td>
          <td><?php echo e($key->price); ?></td>
          <td><?php echo e($key->detail); ?></td>
          <td><?php echo e($key->user_fullname); ?></td>
          <td align="center">
          
          

                      <div class="row"> <a href="" data-toggle="modal" data-target="#myModal<?php echo e($key->id); ?>"><button type="button" name="button" class="btn btn-flat">ลบรูปภาพ</button></a>
                      <button type="button" onclick="return del_sweetalert(<?php echo e($key->id); ?>)" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> ลบกระทู้</button>
                      </div>
                      <div class="modal fade" id="myModal<?php echo e($key->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
                          <div class="modal-dialog" role="document" style="width:80%;">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button> <span aria-hidden="true"></span>
                                      <div class="modal-body">
                                        <?php 
                                            $imgs=App\img::where('forum_id',$key->id)->get();
                                           ?>
                                          <?php $__currentLoopData = $imgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-12" style="margin-top:10px;">
                                              <img src=<?php echo e(asset("local/storage/app/images/forum/".$img->name)); ?> alt="">
                                            </div>
                                            <div class="col-md-12" style="text-align:center;margin-top:10px;">
                                              <button type="button" onclick="return del_img_sweetalert(<?php echo e($img->id); ?>)" class="btn btn-danger"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i> Delete</button>
                                            </div>

                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                  <div class="modal-footer"  >
                                      <button  type="Success" class="btn btn-warning" data-dismiss="modal">Close</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>


          </td>
          </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



      </tbody>
    </table>

    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
  function del_sweetalert(id) {
    swal({
  title: "ลบกระทู้?",
  text: "ท่านต้องการลบกระทู้ใช่หรือไม่ ?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((sweetalert) => {
  if (sweetalert) {
    // setTimeout(function () {
  window.location = "<?php echo e(url('backoffice/del_forum/')); ?>"+"/"+id;
// }, 1000);
  } else {
    swal("Your data is safe!","","error");
  }
});
  }
  function del_img_sweetalert(id) {
    swal({
  title: "ลบรูปภาพ?",
  text: "ท่านต้องการลบรูปภาพใช่หรือไม่ ?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((sweetalert) => {
  if (sweetalert) {
    // setTimeout(function () {
  window.location = "<?php echo e(url('backoffice/del_img_forum/')); ?>"+"/"+id;
// }, 1000);
  } else {
    swal("ยกเลิกการลบรูปภาพ!","","error");
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