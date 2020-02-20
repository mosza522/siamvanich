<?php $__env->startSection('page_title','Siamvanich | d'); ?>
<?php $__env->startSection('content'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        หมวดกระทู้
        <?php if(!isset($cat)): ?>
          <small>เพิ่มหมวดกระทู้</small>
        <?php else: ?>
          <small>แก้ไขหมวดกระทู้ </small>
        <?php endif; ?>
        <p>
          

        </p>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-cog"></i> Backoffice</a></li>
        <li><a href="<?php echo e(url('backoffice/forumCategory')); ?>">หมวดกระทู้</a></li>
        <li class="active">เพิ่มหมวดกระทู้</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <?php if(!isset($cat)): ?>
        <?php echo e(Form::open(['url' => 'backoffice/addCategory','class'=>'form-horizontal form-label-left'])); ?>


      <?php else: ?>
        <?php echo e(Form::open(['url' => 'backoffice/updateCategory','class'=>'form-horizontal form-label-left'])); ?>

        <?php echo e(Form::hidden('id', $cat->id)); ?>

      <?php endif; ?>
      <?php if(count($errors) > 0): ?>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <script>
                  swal("<?php echo e($error); ?>", "", "error");
              </script>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
      <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> ชื่อหมวดกระทู้ <span class="required">*</span>
          </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
            <input <?php if(isset($cat)): ?>
              value="<?php echo e($cat->category_name); ?>"
            <?php endif; ?> type="text" class="form-control" name="category_name" id="category_name" placeholder="ชื่อหมวดกระทู้" required />
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Note
          </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
            <input <?php if(isset($cat)): ?>
              value="<?php echo e($cat->note); ?>"
            <?php endif; ?> type="text" class="form-control" name="note" id="note" 	placeholder="Note"  />
          </div>
        </div>

        <div class="ln_solid"></div>
        <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <button type="submit" class="btn btn-success" >Submit</button>
          <a href="<?php echo e(url('backoffice/forumCategory')); ?>"><button type="button" class="btn btn-primary">Cancel</button>

        </div>
        </div>

        <?php echo e(Form::close()); ?>


    </section>
    <!-- /.content -->
  </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backoffice.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>