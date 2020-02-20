<?php $__env->startSection('page_title','สยามวานิช'); ?>
<?php $__env->startSection('content'); ?>


      <div class="container-fluid">
      <div class="row">

        <?php 
        $noti=App\reply::leftJoin('forums','replies.forum_id','forums.id')
        ->where('forums.user_id',Session::get('userData')->id)
        ->where('replies.owner_read',0)
        ->get();
         ?>
        <?php if($noti->count()>0): ?>
        <a href="<?php echo e(url('detailForum/'.$noti[0]->forum_id)); ?>"><i class="glyphicon glyphicon-envelope "><span class="label label-danger"><?php echo e($noti->count()); ?></span></i></a>
        <?php else: ?>
          <i class="glyphicon glyphicon-envelope"></i>
        <?php endif; ?>
      </div>
      </div>
      <?php 
        $userData=App\user_tb::where('id', Session::get('userData')->id )->first();
       ?>
      <!-- CONTENT PAGE -->
        <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="row centerbg">
                          <!--  Content LEFT  -->
                          <div class="col-md-3 col-sm-12 padding0">
                              <div class="col-md-12 col-sm-6 padding0">
                                  <!--   Login box    -->
                                  <div class="container-fluid login">
                                     <div class="text01">
                                          <form class="form-horizontal">
                                              <div class="col-md-12 col-sm-12 col-xs-12 info">
                                                <?php if(Session::has('wrong')): ?>
                                                  <div class="alert alert-danger">
                                                    <li><?php echo e(Session::get('wrong')); ?></li>
                                                  </div>
                                                <?php endif; ?>
                                                  <div class="col-md-0 " style="padding-top:40px;">

                                                    <?php if($userData->img==null or $userData->img==""): ?>
                                                      <img  class="img-porfile" src="<?php echo e(asset('assets/img/index/profile1.png')); ?>">
                                                    <?php else: ?>
                                                      <img  class="img-porfile" src="<?php echo e(asset('local/storage/app/images/user').'/'.$userData->img); ?>">
                                                      <?php endif; ?>
                                                      
                                                      <br><br>
                                                  </div>
                                              </div>


                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                              <div class="texty">คุณ <?php echo e($userData->user_fullname); ?></div>
                                              <div class="texty">สถานะ <?php echo e($userData->user_type); ?></div>
                                              </div>


                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                      <a href="<?php echo e(url('changeUserPassword')); ?>"><div class="texty">เปลี่ยนรหัสผ่าน</div></a>
                                              </div>
                                              <div class="col-md-6 col-sm-12 col-xs-12">
                                      <a href="<?php echo e(url('profile')); ?>"><p class="texty borber-right">ข้อมูลส่วนตัว</p></a>
                                              </div>
                                              <div class="col-md-6 col-sm-12 col-xs-12">
                                      <a href="<?php echo e(url('logoutUser')); ?>"><p class="texty">ออกจากระบบ</p></a>
                                              </div>
                                      <button id="singlebutton" type="button" class="board">เลือกกระดาน</button>

                                              <div class="bod">
                                                <?php if($userData->user_type=='vip' or $userData->user_type=='Admin'): ?>
                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                      <div class="textred"><a href="<?php echo e(url('forumVip')); ?>">กระดาน VIP</a></div>
                                                  </div>
                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                      <div class="textred02"><a href="<?php echo e(url('forumNormal')); ?>">กระดานธรรมดา</a></div>
                                                  </div>
                                                  <?php else: ?>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="textred02"><a href="<?php echo e(url('forumNormal')); ?>">กระดานธรรมดา</a></div>
                                                    </div>
                                                <?php endif; ?>

                                              </div>

                                          </form>
                                      </div>
                                  </div>
                                  <!--  end  Login box    -->
                              </div>
                              <!--  Ads picture -->
                              <div class=" text11 col-md-9 col-xs-12 center1 pading2">
                                <?php 
                                $banners=App\banner::where('position','ด้านซ้าย')->get();
                                 ?>
                                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <img class="img-responsive ads" src="<?php echo e(asset('local/storage/app/images/banner'.'/'.$banner->name)); ?>">
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php 
                                $banners=App\banner::where('position','ด้านซ้ายล่าง')->get();
                                 ?>
                                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <img class="img-responsive ads" src="<?php echo e(asset('local/storage/app/images/banner'.'/'.$banner->name)); ?>">
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                  
                              </div>
                              <!--end  Ads picture-->
                          </div>
                          <!--end  Content LEFT  -->


                          <!--  Content middle  -->
                          <div class="col-md-7 col-sm-12 padding0 centerbg">
                            <div id="myCarousel1" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php 
                                $banners=App\banner::where('position','ด้านบน')->get();
                                $i=0;
                                 ?>
                                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php if($i==0): ?>
                                    <li data-target="#myCarousel1" data-slide-to="<?php echo e($i); ?>" class="active"></li>

                                  <?php else: ?>
                                    <li data-target="#myCarousel1" data-slide-to="<?php echo e($i); ?>" class=""></li>
                                  <?php endif; ?>
                                  <?php 
                                    $i++;
                                   ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            </ol>

                            <div class="carousel-inner">
                              <?php 
                              $banners=App\banner::where('position','ด้านบน')->get();
                              $first=false;
                               ?>
                              <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($first!=true): ?>
                                  <div class="item active">
                                    <img class="img-responsive ads" src="<?php echo e(asset('local/storage/app/images/banner'.'/'.$banner->name)); ?>">
                                  </div>
                                  <?php 
                                    $first=true;
                                   ?>
                                <?php else: ?>
                                  <div class="item">
                                    <img class="img-responsive ads" src="<?php echo e(asset('local/storage/app/images/banner'.'/'.$banner->name)); ?>">
                                  </div>
                                <?php endif; ?>

                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            
                            </div>
                            </div>

                  <div class="bgwhite">
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


              <div class="col-md-2 col-sm-12">
              <div class="textyu">
              <a href="<?php echo e(url('renew')); ?>"><p>ต่ออายุสมาชิก</p></a>
              <style media="screen">
              div.ui-datepicker{
font-size:14px;
}
              </style>
    <div id="datepicker1" class="calendar"></div>
    <script type="text/javascript">
      $(function() {
        $("#datepicker1").datepicker({
          numberOfMonths:1
        });
      });
    </script>
              </div>
              <div class="">
                <?php 
                $banners=App\banner::where('position','ด้านขวา')->get();
                 ?>
                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <img class="img-responsive ads" src="<?php echo e(asset('local/storage/app/images/banner'.'/'.$banner->name)); ?>">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php 
                $banners=App\banner::where('position','ด้านขวาล่าง')->get();
                 ?>
                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <img class="img-responsive ads" src="<?php echo e(asset('local/storage/app/images/banner'.'/'.$banner->name)); ?>">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                  </div>
              </div>

      </div>


              <!-- end Content middle  -->
              <!--  CONTENT RIGHT     -->
              <div class="col-md-8 col-sm-12">
              <div style="overflow:hidden;">
              <div class="form-group">
              <div class="row">
              <div class="col-md-8">
              <div  style="color:red;">

              </div>
              </div>
              </div>
              </div>

              </div>


              </div>

              </div>



          </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>