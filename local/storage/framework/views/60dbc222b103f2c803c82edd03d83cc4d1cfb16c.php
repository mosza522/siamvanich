<?php $__env->startSection('page_title','SiamVanich | INDEX'); ?>
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
        <li class="active">Index</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <a  href="<?php echo e(url('backoffice/add_admin')); ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Admin</button></a>
      <p></p>
      <table id="example" class="table">
      <thead>
        <tr>
<th class="text-center" style="width: 20%;">Date Create</th>
          <th class="text-center" style="width: 20%;">Name Admin</th>
          <th class="text-center" style="width: 20%;">Password</th>
          <th class="text-center" style="width: 15%;">Last Login</th>
          <th class="text-center" style="width: 15%;">Permission</th>
<th class="text-center" style="width: 10%;">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
<td align="center"></td>
<td align="center"></td>
<td align="center"></td>
<td align="center"></td>
<td align="center"></td>
          <td align="center">


</td>
        </tr>

      </tbody>
    </table>

    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
  $(document).ready(function(){
    $('#example').DataTable({
        "order": [[ 1, "asc" ]]
    });
  });

  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backoffice.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>