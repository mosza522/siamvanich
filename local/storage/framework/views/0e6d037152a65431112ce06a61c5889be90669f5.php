<?php $__env->startSection('page_title','Siamvanich | กระทู้'); ?>
<?php $__env->startSection('content'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        กระทู้
        <small>หมวดกระทู้</small>
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

    
    <a  href="<?php echo e(url('backoffice/addCategory')); ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> เพิ่มหมวดกระทู้</button></a>
    <p></p>
      <table id="example" class="table">
      <thead>
        <tr>
<th class="text-center" style="width: 5%;">No .</th>
          <th class="text-center" style="width: 50%;">Name Category</th>
          <th class="text-center" style="width: 25%;text-align:center;">Note</th>
<th class="text-center" style="width: 20%;">Action</th>
  </tr>
      </thead>
      <tbody>
        <?php 
        $i=1;
        $data=DB::table('forum_categories')->get();
         ?>


          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
          <td align="center"><?php echo e($i++); ?><?php echo e("."); ?></td>
          <td align="center"><?php echo e($key->category_name); ?></td>
          <td><?php echo e($key->note); ?></td>
          <td align="center">
          
          
          <a href="<?php echo e(url('backoffice/edit_category/'.$key->id)); ?>"><button type="button" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>  Edit</button></a>
          <button type="button" onclick="return del_sweetalert(<?php echo e($key->id); ?>)" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Delete</button>
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
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this record!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((sweetalert) => {
  if (sweetalert) {
    // setTimeout(function () {
  window.location = "<?php echo e(url('backoffice/del_category/')); ?>"+"/"+id;
// }, 1000);
  } else {
    swal("Your data is safe!","","error");
  }
});
  }
  function ban_sweetalert(id) {
    swal({
  title: "Are you sure?",
  text: "You want to ban this user ?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((sweetalert) => {
  if (sweetalert) {
    // setTimeout(function () {
  window.location = "<?php echo e(url('backoffice/ban_user/')); ?>"+"/"+id;
// }, 1000);
  } else {
    swal("This user is safe!","","error");
  }
});
  }
  function unban_sweetalert(id) {
    swal({
  title: "Are you sure?",
  text: "You want to unban this user ?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((sweetalert) => {
  if (sweetalert) {
    // setTimeout(function () {
  window.location = "<?php echo e(url('backoffice/unban_user/')); ?>"+"/"+id;
// }, 1000);
  } else {
    swal("This user still banned!","","error");
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