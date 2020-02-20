<?php $__env->startSection('page_title','สยามวานิช'); ?>
<?php $__env->startSection('content'); ?>

  <?php 
  $perpage=10;
  if(isset($page)){
    $page=$page;
  }else{
    $page=1;
  }
  $start=($page-1)*$perpage;
  // dump($page);
  // dump($perpage);
  // dump($start);
   ?>
<div class="container-fluid">
  <div class="row">
  <div class="col-lg-12">
  <div class="row centerbg">






<div class="col-md-12 padding0">
<div class="logobg1"></div>
  </div>


      <div class="col-md-12 padding25 bgw">
        <?php 
        if(Session::has('userData')){
          $userType=Session::get('userData')->user_type;
        }
        else {
          $userType='normal';
        }
         ?>
              <?php if(Session::has('userData')): ?>
                <?php echo e(Form::open(['url'=>'myForum'])); ?>

                <?php echo e(Form::hidden('id',Session::get('userData')->id)); ?>

                <div class="col-md-6">
                    <br>
                    <a href="<?php echo e(url('createForumForm/'.$id)); ?>"><button type="button" class="btn btn-inverse">ตั้งกระทู้ขายสินค้า</button></a>
                <button  type="submit" class="btn btn-inverse">แสดงรายการตัวเอง</button>
                <?php if(Session::has('userData')): ?>
                  <?php if($userType=='normal'): ?>
                  <a href="<?php echo e(url('forumNormal')); ?>" class="btn btn-inverse">กลับสู่หน้ากระดาน</a>
                  <?php else: ?>
                  <a href="<?php echo e(url('forumVip')); ?>" class="btn btn-inverse">กลับสู่หน้ากระดาน</a>
                <?php endif; ?>
                <?php else: ?>
                  <a href="<?php echo e(url('forumNormal')); ?>" class="btn btn-inverse">กลับสู่หน้ากระดาน</a>
                <?php endif; ?>

                </div>
                <?php echo e(Form::close(['url'=>'myForum'])); ?>

                <?php else: ?>
                  <div class="col-md-6">
                    <a href="<?php echo e(url('index')); ?>" class="btn btn-inverse">กลับสู่หน้ากระดาน</a>
                  </div>
              <?php endif; ?>


              <br>
          <div class="col-md-6">
            <?php 
              $forumsData= App\forum::leftJoin('user_tbs', 'forums.user_id','=', 'user_tbs.id')
              ->where('category_id',$id)
              ->where('type','vip')
              ->orWhere('type','Admin')
              ->orderBy('forums.created_at','desc')
              ->select('forums.*','user_tbs.user_fullname')
              ->limit($perpage)
              ->offset($start)
              ->get();
              $forums=App\forum::leftJoin('user_tbs', 'forums.user_id','=', 'user_tbs.id')
              ->where('category_id',$id)
              ->where('type','vip')
              ->orWhere('type','Admin')
              ->orderBy('forums.created_at','desc')
              ->select('forums.*','user_tbs.user_fullname')
              ->get();

              if(isset($type)){
                $forumsData= App\forum::leftJoin('user_tbs', 'forums.user_id','=', 'user_tbs.id')
                ->where('category_id',$id)
                ->where('type','!=','vip')
                ->orderBy('forums.created_at','desc')
                ->select('forums.*','user_tbs.user_fullname')
                ->limit($perpage)
                ->offset($start)
                ->get();
                $forums=App\forum::leftJoin('user_tbs', 'forums.user_id','=', 'user_tbs.id')
                ->where('category_id',$id)
                ->where('type','!=','vip')
                ->orderBy('forums.created_at','desc')
                ->select('forums.*','user_tbs.user_fullname')
                ->get();
              }

              // $forums = DB::table('forums')
              //     ->leftJoin('user_tbs', 'forums.user_id', '=', 'user_tbs.id')
              //     ->get();
              $total_page=ceil($forums->count()/$perpage);
               ?>
              <?php if($forums->count()>0): ?>
                <div class="row click09" style="float: right;">
                <?php
                    if($page==1){?>
                      <p class="btn btn-success" style="">&laquo;</p>
                      <?php
                    }else{?>
                      <a href="<?php echo e(url('Category/'.$userType.'/'.$id.'/'.'1')); ?>" class="btn btn-success" style="">&laquo;</a>
                      <?php
                  }
                  $p=0;
                    for ($i=1; $i <= $total_page; $i++) {
                      $page1=$page-2;
                      $page2=$page+2;
                      if($total_page<4){
                      if($page==$i){?>
                        <a href="<?php echo e(url('Category/'.$userType.'/'.$id.'/'.$i)); ?>" class="btn btn-success active" style=""><?php echo e($i); ?></a>
                      <?php  }else{  ?>
                      <a href="<?php echo e(url('Category/'.$userType.'/'.$id.'/'.$i)); ?>" class="btn btn-success" style=""><?php echo e($i); ?></a>
                    <?php
                    }
                  }else{
                    if($page1>0 and $page2<=$total_page){
                    if($page==$i){?>
                    <a href="<?php echo e(url('Category/'.$userType.'/'.$id.'/'.$i)); ?>" class="active" style=""><?php echo e($i); ?></a>
                  <?php  }else if($i>=$page1 and $i<=$page2){  ?>
                    <a href="<?php echo e(url('Category/'.$userType.'/'.$id.'/'.$i)); ?>" style=""><?php echo e($i); ?></a>
                  <?php
                  }
                }else if($page2>$total_page){
                  $page1=$page1+($total_page-$page2);
                  if($page==$i){?>
                    <a href="<?php echo e(url('Category/'.$userType.'/'.$id.'/'.$i)); ?>" class="active btn btn-success" style=""><?php echo e($i); ?></a>
                <?php $p++;  }else if($p<5 and $i>=$page1){  ?>
                  <a href="<?php echo e(url('Category/'.$userType.'/'.$id.'/'.$i)); ?>" class="btn btn-success" style=""><?php echo e($i); ?></a>
                <?php
                $p++;
                }

              }else if($page1<=0){
                $page2=5;
                if($page==$i){?>
                <a href="<?php echo e(url('Category/'.$userType.'/'.$id.'/'.$i)); ?>" class="active btn btn-success" style=""><?php echo e($i); ?></a>
                <?php $p++;  }else if($p<5 and $i<=$page2){  ?>
                <a href="<?php echo e(url('Category/'.$userType.'/'.$id.'/'.$i)); ?>" class="btn btn-success" style=""><?php echo e($i); ?></a>
                <?php
                $p++;
                }
              }



                  }
                }
                    if($page==$total_page){?>
                      <p class="btn btn-success" style="">&raquo;</p>
                      <?php
                    }else{?>
                      <a href="<?php echo e(url('Category/'.$userType.'/'.$id.'/'.$total_page)); ?>" class="btn btn-success" style="">&raquo;</a>
                    <?php
                    }
                    ?>

      </div>
      <?php endif; ?>
      </div>




  <br>
  <br>
    <div class="container">
      <div class="row">
          <div class="col-lg-12">
            <?php if(Session::has('success')): ?>
              <div class="alert alert-success">
                <li><?php echo e(Session::get('success')); ?></li>
              </div>
            <?php endif; ?>
            <?php 
              $cat=App\forum_category::where('id',$id)->first();
             ?>
            <div class="text91"><?php echo e($cat->category_name); ?></div>
          <div class="table-responsive">
<table class="table">

              <div class="panel panel-default panel-table" style="width: 100%;text-align: center;margin-top: 15px;">
  <div class="panel-heading">
      <div class="tr">
          <div class="td">เลขที่</div>
          <div class="td">รูปภาพ</div>
          <div class="td">ชื่อสินค้า</div>
          <div class="td">ราคา</div>
          <div class="td">ผู้เข้าชม</div>
          <div class="td">ผู้ตอบ</div>
          <div class="td">ชื่อผู้ขาย</div>
      </div>
  </div>
  <div class="panel-body">

      <?php $__currentLoopData = $forumsData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php 
          $img= App\img::where('forum_id',$forum->id)->first();
          $count= App\count::where('forum_id',$forum->id)->get();
          $reply= App\reply::where('forum_id',$forum->id)->get();
         ?>

        <div class="tr">

            <div class="td"><a href="<?php echo e(url('detailForum/'.$forum->id)); ?>"><?php echo $forum->id; ?></a></div>
            <div class="td"><a href="<?php echo e(url('detailForum/'.$forum->id)); ?>"><img style="width:200px;" src=<?php echo e(asset("local/storage/app/images/forum/".$img->name)); ?>></a></div>
            <div class="td"><a href="<?php echo e(url('detailForum/'.$forum->id)); ?>"><?php echo e($forum->name); ?></a></div>
            <div class="td"><a href="<?php echo e(url('detailForum/'.$forum->id)); ?>"><?php echo e($forum->price); ?></a></div>
            <div class="td"><a href="<?php echo e(url('detailForum/'.$forum->id)); ?>"><?php echo e($count->count()); ?></a></div>
            <div class="td"><a href="<?php echo e(url('detailForum/'.$forum->id)); ?>"><?php echo e($reply->count()); ?></a></div>
            <?php if(Session::has('userData')): ?>
            <div class="td"><a href="<?php echo e(url('profile/'.$forum->user_id)); ?>"><?php echo e($forum->user_fullname); ?></a></div>
            <?php else: ?>
            <div class="td"><?php echo e($forum->user_fullname); ?></div>
            <?php endif; ?>

        </div>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php if($forumsData->count()==0): ?>
        <div class="tr">
            <div class="td">ไม่มีข้อมูล</div>
            <div class="td"><img style="width:200px;" src=<?php echo e(asset("assets/img/index/pe.png")); ?>></div>
            <div class="td">ไม่มีข้อมูล</div>
            <div class="td">ไม่มีข้อมูล</div>
            <div class="td">ไม่มีข้อมูล</div>
            <div class="td">ไม่มีข้อมูล</div>
            <div class="td">ไม่มีข้อมูล</div>
        </div>
      <?php endif; ?>

      

  </div>
</div>
</table>
</div>


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