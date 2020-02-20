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
        <li><a href="<?php echo e(url('backoffice/index')); ?>"><i class="fa fa-cog"></i> Backoffice</a></li>
        <li><a href="<?php echo e(url('backoffice/banner')); ?>">จัดการโฆษณา</a></li>
        <li class="active">เพิ่มโฆษณา</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <?php if(!isset($id)): ?>
        <?php echo e(Form::open(['url' => 'backoffice/add_banner','class'=>'form-horizontal form-label-left',
        'files'=>true])); ?>

        
      <?php endif; ?>
      <?php if(count($errors) > 0): ?>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <script>
                  swal("<?php echo e($error); ?>", "", "error");
              </script>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
      <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> ตำแหน่งโฆษณา <span class="required">*</span>
          </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="position" required>
                              <option value="ด้านบน">ด้านบน</option>
                              <option value="ด้านซ้าย">ด้านซ้าย</option>
                              <option value="ด้านขวา">ด้านขวา</option>
                              <option value="ด้านซ้ายล่าง">ด้านซ้ายล่าง</option>
                              <option value="ด้านขวาล่าง">ด้านขวาล่าง</option>
                            </select>


          </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> ระยะเวลา <span class="required">*</span>
            </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="expired" required>

                            <option value="1">1 เดือน</option>
                            <option value="2">2 เดือน</option>
                            <option value="3">3 เดือน</option>
                            <option value="4">4 เดือน</option>
                            <option value="5">5 เดือน</option>
                            <option value="6">6 เดือน</option>
                            <option value="7">7 เดือน</option>
                            <option value="8">8 เดือน</option>
                            <option value="9">9 เดือน</option>
                            <option value="10">10 เดือน</option>
                            <option value="11">11 เดือน</option>
                            <option value="12">12 เดือน</option>

                          </select>
            </div>
          </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> เลือกรูป <span class="required">*</span>
          </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" name="img" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Note <span class="required">*</span>
          </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="note" class="form-control" value="">
          </div>
        </div>

        <div class="ln_solid"></div>
        <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <button type="submit" class="btn btn-success" >Submit</button>
          <a href="<?php echo e(url('backoffice/admin')); ?>"><button type="button" class="btn btn-primary">Cancel</button>

        </div>
        </div>

        <?php echo e(Form::close()); ?>


    </section>
    <!-- /.content -->
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backoffice.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>