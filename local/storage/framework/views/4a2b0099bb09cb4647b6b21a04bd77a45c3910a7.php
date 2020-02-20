<?php $__env->startSection('page_title','สยามวานิช'); ?>
<?php $__env->startSection('content'); ?>
<style media="screen">
.tagA{
  text-decoration: none !important;
  color: #42210b;
}
.tagA:hover {color:#42210b;}
.text007{
  color: #42210b;
}
.text08{
  color: #42210b;
}
</style>




<div class="container-fluid ">
<div class="row">
<div class="col-lg-12">
<div class="row centerbg">



<div class="col-md-3 col-sm-12 padding0">
  <div class="col-md-12 col-sm-6 padding0">
   <div class="container-fluid login">
      <div class="text01">
   <div class="form-horizontal">
  <fieldset>

  <!-- Form Name -->
  <div class="text08">ลงชื่อผู้เข้าใช้</div>



  <!-- Text input-->
  <?php if(Session::has('wrong')): ?>
  <div class="form-group">
  <div class="col-md-1"></div>
   <div class="col-md-10">
     <div class="alert alert-danger">
       <li>Username หรือ Password ไม่ถูกต้อง</li>
     </div>
   </div>
  <div class="col-md-1"></div>
  </div>
  <?php endif; ?>
  <div class="form-group">
  <div class="col-md-1"></div>
   <div class="col-md-10">
     <?php echo e(Form::open(['url' => 'loginUser'])); ?>

       <p class=" control-label text007" for="textinput">Username</p>
           <input id="textinput" name="username" type="text" placeholder="" class="form-control input-md"><span class="help-block"></span>
   </div>
  <div class="col-md-1"></div>
  </div>

  <!-- Password input-->

  <div class="form-group">
  <div class="col-md-1"></div>
   <div class="col-md-10 ">
       <p class=" control-label text007" for="textinput">Password</p>
           <input type="password" id="passwordinput" name="password" type="passwordinput" placeholder=""class="form-control input-md">
               <span class="help-block"></span>
           </div>
       <div class="col-md-1"></div>
   </div>

  <!-- Button -->
  <div class="form-group">
  <div class="col-md-1"></div>
   <div class="col-md-10">
       <button type="submit" class="btn btn-block btn-info text07" name="button">Login</button>
       
       <?php echo e(Form::close()); ?>

   </div>
  </div>


  </fieldset>
  </div>
  </div></div></div>
  <div class="col-md-12 col-sm-6 col-xs-12 info " style="padding-top:25px;">

      <div class="row">
         <div class="col-md-3 col-sm-3">
         <img class="icomhome img-responsive" src="<?php echo e(asset('assets/img/index/icon1.png')); ?>">
         </div>
          <div class="col-md-9 col-sm-9">
         <div class="text04"><?php echo e(Html::link('regis','สมัครสมาชิกใหม่',array('class' => 'tagA'))); ?></div>
         </div>
         </div>

     <div class="row">
         <div class="col-md-3 col-sm-3">
         <img class="icomhome img-responsive" src="<?php echo e(asset('assets/img/index/icon2.png')); ?>">
         </div>
         <div class="col-md-9 col-sm-9">
         <div class="text04"><?php echo e(Html::link('blacklist','รายชื่อห้ามโอนเงิน',array('class' => 'tagA'))); ?></div>
         </div>
         </div>

         <div class="row">
         <div class="col-md-3 col-sm-3">
         <img class="icomhome img-responsive" src="<?php echo e(asset('assets/img/index/icon3.png')); ?>">
         </div>
          <div class="col-md-9 col-sm-9">
         <div class="text04"><?php echo e(Html::link('advertise','ติดต่อโฆษณา',array('class' => 'tagA'))); ?></div>
         </div>
         </div>

          <div class="row">
         <div class="col-md-3 col-sm-3">
         <img class="icomhome img-responsive" src="<?php echo e(asset('assets/img/index/icon4.png')); ?>">
         </div>
          <div class="col-md-9 col-sm-9">
         <div class="text04"><?php echo e(Html::link('forgotPassword','ลืมรหัสผ่าน',array('class' => 'tagA'))); ?></div>
         </div>
         </div>


  </div>


<div class=" text11 col-md-9 col-xs-12 center1 pading2">
    <img class="img-responsive ads" src="<?php echo e(asset('assets/img/index/banner1.jpg')); ?>">
    <img class="img-responsive ads" src="<?php echo e(asset('assets/img/index/banner2.jpg')); ?>">
    <img class="img-responsive ads" src="<?php echo e(asset('assets/img/index/banner3.jpg')); ?>">
    <img class="img-responsive ads" src="<?php echo e(asset('assets/img/index/banner4.jpg')); ?>">
</div>
</div>



<div class="col-md-7 col-sm-12 ">
<img class="imgads" src="<?php echo e(asset('assets/img/index/asd1.png')); ?>">
<div class="textmor">ขนาดโฆษณาด้านบน ราคาค่าใช้จ่าย</div>
<div class="textmor">- 12,500  บาท/เดือน</div>


<img class="imgads150" src="<?php echo e(asset('assets/img/index/asd2.png')); ?>">
<div class="textmor">ขนาดโฆษณาด้านซ้าย ราคาค่าใช้จ่าย</div>
<div class="textmor">- 5,000  บาท/เดือน</div>


<img class="imgads150" src="<?php echo e(asset('assets/img/index/asd2.png')); ?>">
<div class="textmor">ขนาดโฆษณาด้านขวา ราคาค่าใช้จ่าย</div>
<div class="textmor">- 5,000  บาท/เดือน</div>


<img class="imgads150" src="<?php echo e(asset('assets/img/index/asd3.png')); ?>">
<div class="textmor">ขนาดโฆษณาด้านซ้ายล่าง ราคาค่าใช้จ่าย</div>
<div class="textmor">- 2,500  บาท/เดือน</div>


<img class="imgads150" src="<?php echo e(asset('assets/img/index/asd3.png')); ?>">
<div class="textmor">ขนาดโฆษณาด้านขวาล่าง ราคาค่าใช้จ่าย</div>
<div class="textmor">- 2,500  บาท/เดือน</div>
<div class="textmor">ติดต่อเบอร์โทร : 062-694-7371, 062-694-7502   </div>


</div>
 <div class="col-md-2 col-sm-12">
   <div class="button-menu" style="padding-bottom:30px;">
        <p class="text08">หมวดหมู่สินค้า</p>
        <?php 
        function DateThai($strDate)
        {
          $strYear = date("Y",strtotime($strDate))+543;
          $strMonth= date("n",strtotime($strDate));
          $strDay= date("j",strtotime($strDate));
          $strHour= date("H",strtotime($strDate));
          $strMinute= date("i",strtotime($strDate));
          $strSeconds= date("s",strtotime($strDate));
          $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
          $strMonthThai=$strMonthCut[$strMonth];
          return "$strDay/$strMonthThai/$strYear";
           //return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
        }
        $strDate = date("Y-m-d H:i:s");
          $cats=App\forum_category::get();
         ?>
        <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="<?php echo e(url('Category/normal/'.$cat->id)); ?>" class="btn btn-block btn-primary btn-info text09"><?php echo e($cat->category_name); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    </div>
    <div class="time-check" style="border:1px solid black; text-align: center;">
        <p><?php echo e(DateThai($strDate)); ?></p>
        <hr style="color:black!important;">
        <p>จำนวนผู้เข้าชมตอนนี้</p>
        <p><!-- BEGIN: Powered by Supercounters.com -->
<center><script type="text/javascript" src="//widget.supercounters.com/ssl/online_t.js"></script><script type="text/javascript">sc_online_t(1447292,"คน","#5f3813");</script><br><noscript><a href="http://www.supercounters.com/">Free Users Online Counter</a></noscript>
</center>
<!-- END: Powered by Supercounters.com --></p>
        <br>
        <p>ผู้เข้าชมรวมทั้งหมด</p>
        <p>      <!-- BEGIN: Powered by Supercounters.com -->
              <script type="text/javascript" src="//widget.supercounters.com/ssl/texthit.js"></script><script type="text/javascript">var sc_texthit_var = sc_texthit_var || [];sc_text_hit(1448421,"คน","#000000");</script><br><noscript><a href="http://www.supercounters.com">free Hit Counter</a></noscript>
              <!-- END: Powered by Supercounters.com --></p>
                </div>



<!--
     <div class="top"> วัน เดือน ปี </div>
     <div class="top"> จำนวนผู้เข้าชมตอนนี้ </div>
     <div class="top"> xxx,xxx คน </div>
     <div class="top"> ผู้เข้าชมรวมทั้งหมด </div>
     <div class="top"> xxx,xxx คน </div>
-->
     <div class="">
           <img class="img-responsive ads" src="<?php echo e(asset('assets/img/index/a1.jpg')); ?>">
           <img class="img-responsive ads" src="<?php echo e(asset('assets/img/index/a2.jpg')); ?>">
           <img class="img-responsive ads" src="<?php echo e(asset('assets/img/index/a3.jpg')); ?>">
           <img class="img-responsive ads" src="<?php echo e(asset('assets/img/index/a4.jpg')); ?>">
         </div>


</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>