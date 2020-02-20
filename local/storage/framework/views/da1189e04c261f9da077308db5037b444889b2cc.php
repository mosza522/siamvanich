<?php $__env->startSection('page_title','สยามวานิช'); ?>
<?php $__env->startSection('content'); ?>
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
   ?>
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12 nopadding">
              <!-- left -->
              <div style="background-color: #a87e4e;" class="col-lg-2 col-md-3 nopadding">
                <?php if(Session::has('userData')): ?>
                  <div  class="nopadding col-lg-12">
                    <?php 
                      $userData=App\user_tb::where('id', Session::get('userData')->id )->first();
                     ?>
                  <div class="col-md-12 rub">
                    <?php if($userData->img==null or $userData->img==""): ?>
                      <img  class="imgprofile13" src="<?php echo e(asset('assets/img/index/profile1.png')); ?>">
                    <?php else: ?>
                      <img  class="imgprofile13" src="<?php echo e(asset('local/storage/app/images/user').'/'.$userData->img); ?>">
                      <?php endif; ?>
                  
                  </div>
                  <div class="col-md-12">
                     <div class="textname">ชื่อ <?php echo e(Session::get('userData')->user_fullname); ?></div>
                     <div class="textname">สถานะ <?php echo e(Session::get('userData')->user_type); ?></div>
                      <a href="<?php echo e(url('changeUserPassword')); ?>"><div class="textname">เปลี่ยนรหัสผ่าน</div></a>
                  </div>

                  <div class="col-md-6">
                       <a href="<?php echo e(url('profile')); ?>"><p class="textname borber-right">ข้อมูลส่วนตัว</p></a>
                  </div>

                  <div class="col-md-6">
                      <a href="<?php echo e(url('logoutUser')); ?>"><p class="textname">ออกจากระบบ</p></a>
                  </div>



              </div>
              <?php endif; ?>
               </div>
              <!-- center -->

                <div class="col-md-7 padding25 bgw">
                  <?php if(isset($id)): ?>
                    <?php 
                      $user=App\user_tb::where('id',$id)->first();
                     ?>
                    <div class="text91 magintop57">ข้อมูลส่วนตัว : <?php echo e($user->user_fullname); ?></div>
                <?php else: ?>
                      <div class="text91 magintop57">ข้อมูลส่วนตัว : <?php echo e(Session::get('userData')->user_fullname); ?></div>
                      <?php endif; ?>

                      <br>

                      <div>
                          <!--¡ÅèÍ§ Tab - start -->
                          <div>

                          </div>
                          <div class="tab-content">
                              <div id="tab1_bin" class="tab-pane active">

                                  <div class="toto"></div>



                                      <table style="width: 100%; ">
                                          <tbody><tr>
                                              <td class="top_1" style="text-align: center;"></td>
                                          </tr>
                                      </tbody></table>



                                  <div class="col-md-6">
                                      <div class="porfile15">
                                        <?php if(isset($id)): ?>
                                          <?php if($user->img==null or $user->img==""): ?>
                                            <img  style="width:250px;" src="<?php echo e(asset('assets/img/index/profile1.png')); ?>">
                                          <?php else: ?>
                                            <img style="width:250px;"   src="<?php echo e(asset('local/storage/app/images/user').'/'.$user->img); ?>">
                                            <?php endif; ?>
                                        <?php else: ?>
                                          <?php if($userData->img==null or $userData->img==""): ?>
                                            <img  style="width:250px;" src="<?php echo e(asset('assets/img/index/profile1.png')); ?>">
                                          <?php else: ?>
                                            <img style="width:250px;"   src="<?php echo e(asset('local/storage/app/images/user').'/'.$userData->img); ?>">
                                            <?php endif; ?>
                                        <?php endif; ?>

                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <br>
                      <?php if(isset($id)): ?>
                      <div class="col-md-6">
                      <div class="text02">รหัสสมาชิก : <?php echo e($user->user_id); ?></div>
                      <div class="text02">ชื่อสกุลจริง : <?php echo e($user->user_fullname); ?></div>
                      <div class="text02">เป็นสมาชิกเมื่อ : <?php echo e(DateThai($user->created_at)); ?></div>
                      <div class="text02">สถานะสมาชิก : <?php echo e($user->user_type); ?></div>
                      <div class="text02">หมดอายุ : <?php echo e(DateThai($user->date_expried)); ?></div>
                      <div class="text02">ใช้งานล่าสุด : <?php echo e(DateThai($user->last_login)); ?> <?php echo e(substr($user->last_login,11)); ?></div>
                      </div>
                      <?php else: ?>
                        <div class="col-md-6">
                        <div class="text02">รหัสสมาชิก : <?php echo e(Session::get('userData')->user_id); ?></div>
                        <div class="text02">ชื่อสกุลจริง : <?php echo e(Session::get('userData')->user_fullname); ?></div>
                        <div class="text02">เป็นสมาชิกเมื่อ : <?php echo e(DateThai(Session::get('userData')->created_at)); ?></div>
                        <div class="text02">สถานะสมาชิก : <?php echo e(Session::get('userData')->user_type); ?></div>
                        <div class="text02">หมดอายุ : <?php echo e(DateThai(Session::get('userData')->date_expried)); ?></div>
                        <div class="text02">ใช้งานล่าสุด : <?php echo e(DateThai($userData->last_login)); ?> <?php echo e(substr($userData->last_login,11)); ?></div>
                        </div>
                      <?php endif; ?>
                      <br>


                      <div class="col-lg-12">
                          <div class="text91 magintop55">ข้อมูลการขาย</div>
                          <br>
                          <?php if(isset($id)): ?>
                            <?php 
                              $forums=App\forum::where('user_id',$id)->get();
                             ?>
                          <?php else: ?>
                            <?php 
                              $forums=App\forum::where('user_id',Session::get('userData')->id)->get();
                             ?>
                          <?php endif; ?>
                          <div class="table-responsive">
                            <div class="panel panel-default panel-table" style="width: 100%;text-align: center;">

                              <div class="panel-heading">
                                  <div class="tr">
                                      <div class="td">รูปภาพ</div>
                                      <div class="td">ชื่อสินค้า</div>
                                      <div class="td">ราคา</div>
                                      <div class="td">ว/ด/ป</div>

                                  </div>
                              </div>
                              <div class="panel-body">
                                <?php $__currentLoopData = $forums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php 
                                    $img=App\img::where('forum_id',$forum->id)->first();
                                   ?>

                                  <div class="tr">
                                      <div class="td"><img style="width:200px;" src="<?php echo e(asset("local/storage/app/images/forum/".$img->name)); ?>"></div>
                                      <div class="td"><?php echo e($forum->name); ?></div>
                                      <div class="td"><?php echo e($forum->price); ?></div>
                                      <div class="td"><?php echo e(DateThai($forum->created_at)); ?></div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                  </div>
                              </div><table class="table">


                               </table>
</div>
                          </div>


                      </div>





          </div>


      </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>