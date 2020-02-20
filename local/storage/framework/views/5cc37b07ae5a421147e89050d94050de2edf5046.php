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

          <div class="col-md-6">
              <br>

              <a href="<?php echo e(url()->previous()); ?>" class="btn btn-inverse">กลับสู่หน้ากระดาน</a>
              </div>
              <br>
          <div class="col-md-6">
            <?php 
              $forumsData= App\forum::leftJoin('user_tbs', 'forums.user_id','=', 'user_tbs.id')
              ->leftJoin('forum_categories', 'forums.category_id','=', 'forum_categories.id')
              ->where('forums.user_id','=',$id)
              ->where('type',Session::get('userData')->user_type)
              ->orderBy('forums.created_at','desc')
              ->select('forums.*','user_tbs.user_fullname','forum_categories.category_name')
              ->limit($perpage)
              ->offset($start)
              ->get();
              $forums=App\forum::leftJoin('user_tbs', 'forums.user_id','=', 'user_tbs.id')
              ->where('forums.user_id','=',$id)
              ->where('type',Session::get('userData')->user_type)
              ->orderBy('forums.created_at','desc')
              ->select('forums.*','user_tbs.user_fullname')
              ->get();
              // $forums = DB::table('forums')
              //     ->leftJoin('user_tbs', 'forums.user_id', '=', 'user_tbs.id')
              //     ->get();
              $total_page=ceil($forums->count()/$perpage);
               ?>
              <div class="row click09" style="float: right;">
                <?php
                    if($page==1){?>
                      <p class="btn btn-success" style="margin-bottom: 15px;">&laquo;</p>
                      <?php
                    }else{?>
                      <a href="<?php echo e(url('Category/'.Session::get('userData')->user_type.'/'.$id.'/'.'1')); ?>" class="btn btn-success" style="margin-bottom: 15px;">&laquo;</a>
                      <?php
                  }
                  $p=0;
                    for ($i=1; $i <= $total_page; $i++) {
                      $page1=$page-2;
                      $page2=$page+2;
                      if($total_page<4){
                      if($page==$i){?>
                        <a href="<?php echo e(url('Category/'.Session::get('userData')->user_type.'/'.$id.'/'.$i)); ?>" class="btn btn-success active" style="margin-bottom: 15px;"><?php echo e($i); ?></a>
                      <?php  }else{  ?>
                      <a href="<?php echo e(url('Category/'.Session::get('userData')->user_type.'/'.$id.'/'.$i)); ?>" class="btn btn-success" style="margin-bottom: 15px;"><?php echo e($i); ?></a>
                    <?php
                    }
                  }else{
                    if($page1>0 and $page2<=$total_page){
                    if($page==$i){?>
                    <a href="<?php echo e(url('Category/'.Session::get('userData')->user_type.'/'.$id.'/'.$i)); ?>" class="active" style="margin-bottom: 15px;"><?php echo e($i); ?></a>
                  <?php  }else if($i>=$page1 and $i<=$page2){  ?>
                    <a href="<?php echo e(url('Category/'.Session::get('userData')->user_type.'/'.$id.'/'.$i)); ?>" style="margin-bottom: 15px;"><?php echo e($i); ?></a>
                  <?php
                  }
                }else if($page2>$total_page){
                  $page1=$page1+($total_page-$page2);
                  if($page==$i){?>
                    <a href="<?php echo e(url('Category/'.Session::get('userData')->user_type.'/'.$id.'/'.$i)); ?>" class="active btn btn-success" style="margin-bottom: 15px;"><?php echo e($i); ?></a>
                <?php $p++;  }else if($p<5 and $i>=$page1){  ?>
                  <a href="<?php echo e(url('Category/'.Session::get('userData')->user_type.'/'.$id.'/'.$i)); ?>" class="btn btn-success" style="margin-bottom: 15px;"><?php echo e($i); ?></a>
                <?php
                $p++;
                }

              }else if($page1<=0){
                $page2=5;
                if($page==$i){?>
                <a href="<?php echo e(url('Category/'.Session::get('userData')->user_type.'/'.$id.'/'.$i)); ?>" class="active btn btn-success" style="margin-bottom: 15px;"><?php echo e($i); ?></a>
                <?php $p++;  }else if($p<5 and $i<=$page2){  ?>
                <a href="<?php echo e(url('Category/'.Session::get('userData')->user_type.'/'.$id.'/'.$i)); ?>" class="btn btn-success" style="margin-bottom: 15px;"><?php echo e($i); ?></a>
                <?php
                $p++;
                }
              }



                  }
                }
                    if($page==$total_page){?>
                      <p class="btn btn-success" style="margin-bottom: 15px;">&raquo;</p>
                      <?php
                    }else{?>
                      <a href="<?php echo e(url('Category/'.Session::get('userData')->user_type.'/'.$id.'/'.$total_page)); ?>" class="btn btn-success" style="margin-bottom: 15px;">&raquo;</a>
                    <?php
                    }
                    ?>

      </div>
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

          <div class="table-responsive">
<table class="table">

              <div class="panel panel-default panel-table" style="width: 100%;text-align: center;">
  <div class="panel-heading">
      <div class="tr">
          <div class="td">หมวดหมู่</div>
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

            <div class="td"><a href="<?php echo e(url('detailForum/'.$forum->id)); ?>"><?php echo $forum->category_name; ?></a></div>
            <div class="td"><a href="<?php echo e(url('detailForum/'.$forum->id)); ?>"><img style="width:200px;" src=<?php echo e(asset("local/storage/app/images/forum/".$img->name)); ?>></a></div>
            <div class="td"><a href="<?php echo e(url('detailForum/'.$forum->id)); ?>"><?php echo e($forum->name); ?></a></div>
            <div class="td"><a href="<?php echo e(url('detailForum/'.$forum->id)); ?>"><?php echo e($forum->price); ?></a></div>
            <div class="td"><a href="<?php echo e(url('detailForum/'.$forum->id)); ?>"><?php echo e($count->count()); ?></a></div>
            <div class="td"><a href="<?php echo e(url('detailForum/'.$forum->id)); ?>"><?php echo e($reply->count()); ?></a></div>
            <div class="td"><a href="<?php echo e(url('detailForum/'.$forum->id)); ?>"><?php echo e($forum->user_fullname); ?></a></div>

        </div>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      

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