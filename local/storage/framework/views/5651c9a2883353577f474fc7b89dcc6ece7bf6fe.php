<?php $__env->startSection('page_title','สยามวานิช'); ?>
<?php $__env->startSection('content'); ?>





<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="row centerbg">



<div class="col-md-3 padding0">
<div class="logobg1"></div>
</div>


  <div class="col-md-7 padding25 bgw">

      <div class="texthead">ลืมรหัสผ่าน</div>
      <div class="textunder">กรณีลืมรหัสผ่านในการเข้าใช้งาน กรุณากรอกข้อมูลด้านล่างนี้</div>
      <?php if($errors->count()>0): ?>
        <div class="alert alert-danger padding25 bgw">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      <?php endif; ?>
      <?php if(Session::has('failed')): ?>
        <div class="alert alert-danger padding25 bgw">
          <li><?php echo e(Session::get('failed')); ?></li>
        </div>
      <?php endif; ?>
      <div class="form-horizontal">

      <fieldset>
      <div class="form-group">
      <p class="col-md-3 idcard" for="textinput">ใส่เลขบัตรประชาชน</p>
      <div class="col-md-6">
        <?php echo e(Form::open(['url'=>'recoverPassword'])); ?>

        <?php echo e(Form::text('iden','',array('class' => 'form-control input-md' , 'maxlength'=>'13' ,'id' => 'iden','required' => 'required'))); ?>

      
      </div>
      </div>
      </fieldset>
</div>

      <div class="form-horizontal">

      <fieldset>
      <div class="form-group">
      <p class="col-md-3 idcard" for="textinput">Username</p>
      <div class="col-md-6">
        <?php echo e(Form::text('username','',array('class' => 'form-control input-md','id' => 'username','required' => 'required'))); ?>

      
      </div>
      </div>
      </fieldset>
</div>

      <div class="form-horizontal">

      <fieldset>
      <div class="form-group">
      <p class="col-md-3 idcard" for="textinput">วันเดือนปีที่เกิด</p>
      <div class="col-md-6">
        <?php echo e(Form::text('birthday','',array('class' => 'form-control input-md' , 'maxlength'=>'8' ,'id' => 'birthday','required' => 'required'))); ?>

      
      <p class="col-md-12 short" for="birthdate">ใส่เฉพาะตัวเลขเช่น 08042014</p>
      </div>
      </div>
      </fieldset>
</div>

<div class="form-horizontal">

<fieldset>
  <div class="form-group">
<div class="col-md-3 idcard">Captcha :</div>
<div class="col-md-6 g-recaptcha" data-sitekey="6Lc_NDQUAAAAABi_389s_pMtZJ-Euh3IirU5-LVD" data-callback="onSubmit"></div>

</div>
</fieldset>
</div>


       <div class="form-horizontal">
      <fieldset>

      <!-- Button -->
      <div class="form-group">
      <label class="col-md-3 control-label" for=""></label>
      <div class="col-md-3 top20">
        <?php echo e(Form::submit('กู้รหัสผ่าน',array('class' => 'btn regisbot03 btn-inverse vovo1' ,
        'id'=>'submit','disabled'=>'disabled'))); ?>

      </div>
      </div>
      </fieldset>
      </div>











  </div>

</div>
</div>
</div>
</div>
<script type="text/javascript">
function onSubmit(token) {
  document.getElementById("submit").disabled = false;
}
$('#birthday').keypress(function (e) {
      var regex =/^[0-9]+$/;
      var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
      if (regex.test(str)) {
        return true;
      }
      else {
        e.preventDefault();
        return false;
      }
    });
$('#iden').keypress(function (e) {
          var regex =/^[0-9]+$/;
          var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
          if (regex.test(str)) {
            return true;
          }
          else {
            e.preventDefault();
            return false;
          }
        });


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>