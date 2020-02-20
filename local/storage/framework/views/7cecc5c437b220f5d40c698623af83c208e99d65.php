<?php $__env->startSection('page_title','Siamvanich | Admin'); ?>
<?php $__env->startSection('content'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
        <small>Manage admin</small>
        <p>
          

        </p>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-cog"></i> Backoffice</a></li>
        <li class="active">Admin</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <?php if(Session::has('success')): ?>
        <div class="alert alert-success">
          <ul>
          <li> <?php echo e(Session::get('success')); ?></li>
          </ul>
        </div>
    <?php endif; ?>
      <a  href="<?php echo e(url('backoffice/addAdmin_form')); ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Admin</button></a>
      <p></p>
      <table id="example" class="table">
      <thead>
        <tr>
<th class="text-center" style="width: 15%;">Date Create</th>
          <th class="text-center" style="width: 20%;">Name Admin</th>
          <th class="text-center" style="width: 15%;">Password</th>
          <th class="text-center" style="width: 15%;">Last Login</th>
          <th class="text-center" style="width: 15%;">Permission</th>
<th class="text-center" style="width: 20%;">Action</th>
  </tr>
      </thead>
      <tbody>
        <?php 
        $data=DB::table('tb_admin')->get();
         ?>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
          <td align="center"><?php echo e($key->admin_create); ?></td>
          <td align="center"><?php echo e($key->admin_fullname); ?></td>
          <td align="center"><?php echo e($key->admin_password_origin); ?></td>
          <td align="center"><?php echo e($key->admin_lastlogin); ?></td>
          <td align="center"><?php echo e($key->admin_permission); ?></td>
                    <td align="center">
          <a href="<?php echo e(url('backoffice/edit_admin/'.$key->admin_id)); ?>"><button type="button" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>  Edit</button></a>
          <a href="<?php echo e(url('backoffice/del_admin/'.$key->admin_id)); ?>"><button type="button" onclick="return confirm('ยืนยันการลบ')" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Delete</button></a>
          </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



      </tbody>
    </table>

    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
  $(document).ready(function(){
    $('#example').DataTable({
        "order": [[ 0, "asc" ]]
    });
  });

  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backoffice.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>