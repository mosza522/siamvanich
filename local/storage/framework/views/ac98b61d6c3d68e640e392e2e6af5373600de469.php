<?php $__env->startSection('page_title','Siamvanich | Blacklist'); ?>
<?php $__env->startSection('content'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blacklist
        <small>Manage blacklist</small>
        <p>
          

        </p>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-cog"></i> Backoffice</a></li>
        <li><a href="<?php echo e(url('backoffice/blacklist')); ?>">Blacklist</a></li>
        <li class="active">Add Blacklist</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <?php if(!isset($blacklist)): ?>
        <?php echo e(Form::open(['url' => 'add_blacklist','class'=>'form-horizontal form-label-left',
        'OnSubmit'=>'return fncSubmit();','name'=>'addblacklist'])); ?>


      <?php else: ?>
        <?php echo e(Form::open(['url' => 'backoffice/update_blacklist','class'=>'form-horizontal form-label-left',
        'OnSubmit'=>'return fncSubmit();','name'=>'addblacklist'])); ?>

        <?php echo e(Form::hidden('id', $blacklist->id)); ?>

      <?php endif; ?>
      <?php if(count($errors) > 0): ?>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <script>
                  swal("<?php echo e($error); ?>", "", "error");
              </script>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php 

    $user=App\user_tb::whereNotIn('user_id',function($query){
       $query->select('user_id')->from('blacklists');
    })->get();
    // $user=App\user_tb::get();
     ?>
      <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Choose blacklist user<span class="required">*</span>
          </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="user_id" id="user_id">
                          <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($data->id); ?>"><?php echo e($data->user_username); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
          </div>
        </div>

        <div class="ln_solid"></div>
        <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <button type="submit" class="btn btn-success" >Submit</button>
          <a href="<?php echo e(url('backoffice/blacklist')); ?>"><button type="button" class="btn btn-primary">Cancel</button>

        </div>
        </div>

        <?php echo e(Form::close()); ?>


    </section>
    <!-- /.content -->
  </div>
  <script type="text/javascript">
  function fncSubmit()
  {
    if(document.addadmin.password.value != document.addadmin.conpassword.value)
    {
      alert('ยืนยันรหัสผ่านไม่ตรงกัน กรุณากรอกใหม่อีกครั้ง');
      document.addadmin.conpassword.focus();
      return false;
    }


    document.addadmin.submit();
  }
  $(document).ready(function() {
  $('#user_id').select2();
  });
  </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backoffice.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>