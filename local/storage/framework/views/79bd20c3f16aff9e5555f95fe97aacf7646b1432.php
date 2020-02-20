<?php $__env->startSection('page_title','สยามวานิช'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row">
  <div class="col-lg-12">
  <div class="row centerbg">

   <div class="col-md-12 padding26 bgb">
   <div class="text88 magintop50">Admin ฝากเตือน <br>
  User Vip และ User ธรรมดา<br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ห้ามนำสินค้าที่ผิดกฎหมายเช่น สัตว์ป่า ซากสัตว์ สัตว์สงวนคุ้มครองตาม พรบ งา กระดูกสัตว์ อาวุธหรือสิ่งเสมือนอาวุธลงมาขายโดยเด็ดขาดตรวจพบลบระงับการเข้าใช้หากท่านทำการฝ่าฝืนทันทีภาพถ่ายทุกภาพ โปรดอย่าใช้ ฝ่ามือ นิ้วมือ เป็นฉากหลังเพราะดูแล้วไม่สุภาพ(เพื่อความสวยงามของสินค้าท่านเอง)อย่าโอนเงินเด็ดขาดหากชื่อบัญชีไม่ตรงกับชื่อผู้ขายสินค้า</div></div>


<div class="col-md-12 padding0">
<div class="logobg1"></div>
  </div>


      <div class="col-md-12 padding25 bgw">
        <div class="container">
      <div class="row">

          <div class="text91">สินค้าที่น่าสนใจ (รายการของสมาชิก Vip เท่านั่น)</div>

          <div class="col-lg-12 table08">
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
        <?php 
          $forums= App\forum::leftJoin('user_tbs', 'forums.user_id','=', 'user_tbs.id')
          ->leftJoin('forum_categories', 'forums.category_id','=', 'forum_categories.id')
          ->where('type','vip')
          ->inRandomOrder()
          ->limit(10)
          ->orderBy('forums.created_at')
          ->select('forums.*','user_tbs.user_fullname','forum_categories.category_name')
          ->get();

          // $forums = DB::table('forums')
          //     ->leftJoin('user_tbs', 'forums.user_id', '=', 'user_tbs.id')
          //     ->get();
         ?>
        <?php $__currentLoopData = $forums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php 
            $img= App\img::where('forum_id',$forum->id)->first();
            $reply= App\reply::where('forum_id',$forum->id)->get();
            $count= App\count::where('forum_id',$forum->id)->get();
           ?>

          <div class="tr">

              <div class="td"><a href="<?php echo e(url('Category/vip/'.$forum->category_id)); ?>"><?php echo $forum->category_name; ?></a></div>
              <div class="td"><a href="<?php echo e(url('detailForum/'.$forum->id)); ?>"><img style="width:200px;" src=<?php echo e(asset("local/storage/app/images/forum/".$img->name)); ?>></a></div>
              <div class="td"><a href="<?php echo e(url('detailForum/'.$forum->id)); ?>"><?php echo e($forum->name); ?></a></div>
              <div class="td"><a href="<?php echo e(url('detailForum/'.$forum->id)); ?>"><?php echo e($forum->price); ?></a></div>
              <div class="td"><a href="<?php echo e(url('detailForum/'.$forum->id)); ?>"><?php echo e($count->count()); ?></a></div>
              <div class="td"><a href="<?php echo e(url('detailForum/'.$forum->id)); ?>"><?php echo e($reply->count()); ?></a></div>
              <div class="td"><a href="<?php echo e(url('profile/'.$forum->user_id)); ?>"><?php echo e($forum->user_fullname); ?></a></div>

          </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        

    </div>
  </div>
  </table>
  </div>
</div>

      <br>
       <div class="col-md-12 padding25 bgw">
          <div class="text91 magintop30">เลือกหมวดขาย</div>
           <br>

      <form class="form-horizontal">
      <!-- Button -->
      <?php 
        $cat=App\forum_category::get();
       ?>
      <div class="col-md-12 col-xs-12">
      <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <a href="<?php echo e(url('Category/vip/'.$data->id)); ?>" class="btn btn-inverse"><?php echo e($data->category_name); ?></a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </form>
      </div>






  </div>






  </div>
  </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>