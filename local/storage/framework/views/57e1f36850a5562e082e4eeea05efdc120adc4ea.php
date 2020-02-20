<?php $__env->startSection('page_title','Siamvanich | Content'); ?>
<?php $__env->startSection('content'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        เนื้อหา
        <small>หน้าหลักผู้ใช้</small>
        <p>
          

        </p>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(url('backoffice/index')); ?>"><i class="fa fa-cog"></i> Backoffice</a></li>
        <li class="active">หน้าหลักผู้ใช้</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <?php if(Session::has('success')): ?>
        <script>
            swal("<?php echo e(Session::get('success')); ?>", "", "success");
        </script>
    <?php endif; ?>
    <?php if(Session::has('wrong')): ?>
      <script>
          swal("<?php echo e(Session::get('wrong')); ?>", "", "error");
      </script>
  <?php endif; ?>
      <p></p>
      <?php echo e(Form::open(['url' => 'addContentIndex'])); ?>

      <div class="col-md-12">
        <div class="form-group">
           <label class="control-label col-md-2 col-sm-3 col-xs-12" style="text-align:right;" for="first-name">เนื้อหา<span class="required">*</span>
           </label>
           <div class="col-md-10 col-sm-6 col-xs-12">
             <textarea required name="content" rows="8" cols="80" class="form-control ckeditor" required></textarea>
           </div>
           </div>

           <div class="ln_solid"></div>
           <div class="form-group">
             <div class="col-md-2 col-sm-3 col-xs-12">
              </div>
              <?php 
                $content=App\content::where('page','index')->first();
               ?>
           <div class="col-md-10 col-sm-6 col-xs-12">
             <button type="submit" class="btn btn-success" >Submit</button>
             <a href="<?php echo e(url('backoffice/index')); ?>"><button type="button" class="btn btn-primary">Cancel</button></a>
             <?php if(count($content)>0): ?>
               <button style="float: right;" onclick="sweetalert()" type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
            <?php endif; ?>
             <?php echo e(Form::close()); ?>

           </div>
           </div>
      </div>
      <div class="form-group">
        <div class="col-md-12 col-sm-3 col-xs-12">
          <h3 style="text-align:center;">ตัวอย่างข้อความ</h3>
         </div>
      </div>
      <div class="form-group">
        <div class="col-md-12 col-sm-3 col-xs-12">
          <?php 
            $content=App\content::where('page','index')->first();
           ?>
          <?php if(count($content)>0): ?>
            <?php echo $content->content; ?>

          <?php else: ?>
            <h3 style="">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
          <?php endif; ?>
         </div>
      </div>
  </section>



    <!-- /.content -->
  </div>

  <script type="text/javascript">
  function sweetalert(id) {
    swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this content!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((sweetalert) => {
  if (sweetalert) {
    // setTimeout(function () {
  window.location = "<?php echo e(url('backoffice/deleteIndex')); ?>";
// }, 1000);
  } else {
    swal("Your data is safe!","","error");
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