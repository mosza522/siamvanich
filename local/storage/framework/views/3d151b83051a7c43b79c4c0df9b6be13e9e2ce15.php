<?php $__env->startSection('page_title','Siamvanich | ผู้ใช้'); ?>
<?php $__env->startSection('content'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ผู้ใช้
        <small>หน้าหลักผู้ใช้</small>
        <p>
          

        </p>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(url('backoffice/index')); ?>"><i class="fa fa-cog"></i> Backoffice</a></li>
        <li class="active">หน้าหลักผู้ใช้</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <?php if(Session::has('success')): ?>
        
        <script>
            swal("<?php echo e(Session::get('success')); ?>", "", "success");
        </script>
    <?php endif; ?>

    

      <table id="example" class="table">
      <thead>
        <tr>
<th class="text-center" style="width: 5%;">No .</th>
          <th class="text-center" style="width: 20%;">ID</th>
          <th class="text-center" style="width: 25%;text-align:center;">Detail</th>
          <th class="text-center" style="width: 15%;text-align:center;">Ban date start</th>
          <th class="text-center" style="width: 15%;text-align:center;">Register date</th>
<th class="text-center" style="width: 20%;">Action</th>
  </tr>
      </thead>
      <tbody>
        <?php 
        $i=1;
        $data=DB::table('user_tbs')->where('user_status_confirm', '1')
        ->get();
        $id="";
         ?>
        <?php if(count($data)>0): ?>

          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
          <td align="center"><?php echo e($i++); ?></td>
          <td align="center"><?php echo e($key->user_id); ?></td>
          <td align="center"><div class="col-sm-12 col-lg-12 col-md-12">
              <div class="branch-1">
                  <div class="bordol-1">
                      <div class="row"> <a href="" data-toggle="modal" data-target="#myModal<?php echo e($key->id); ?>"><button type="button" name="button" class="btn btn-flat">ดูรายละเอียด</button></a> </div>
                      <div class="modal fade" id="myModal<?php echo e($key->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
                          <div class="modal-dialog" role="document" style="width:80%;">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button> <span aria-hidden="true"></span>
                                      <div class="modal-body">
                                        <div class="col-md-12">
                                          <h2>ข้อมูลของผู้สมัคร</h2>
                                          <hr>
                                        </div>
                                        <br>
                                        <div class="row">
                                        <div class="col-md-3" style="">
                                          <label >ประเภทของสมาชิก :</label>
                                        </div>
                                        <div class="col-md-3" style="">
                                          <input disabled class="form-control" type="text" name="" value="<?php echo e($key->user_type); ?>">
                                        </div>
                                        <div class="col-md-3" >
                                          <label >ชื่อ - นามสกุล :</label>
                                        </div>
                                        <div class="col-md-3" >
                                          <input disabled class="form-control" type="text" name="" value="<?php echo e($key->user_fullname); ?>">
                                        </div></div>
                                        <div class="row">
                                        <div class="col-md-3" >
                                          <label >เพศ</label>
                                        </div>
                                        <div class="col-md-3" >
                                          <input disabled class="form-control" type="text" name="" value="<?php echo e($key->user_sex); ?>">
                                        </div>
                                        <div class="col-md-3" >
                                          <label >วัน เดือน ปีเกิด :</label>
                                        </div>
                                        <div class="col-md-3" >
                                          <input disabled class="form-control" type="text" name="" value="<?php echo e($key->user_birth_date); ?>">
                                        </div></div>
                                        <div class="row">
                                        <div class="col-md-3" >
                                          <label >เลขบัตรประชาชน :</label>
                                        </div>
                                        <div class="col-md-3" >
                                          <input disabled class="form-control" type="text" name="" value="<?php echo e($key->user_identity); ?>">
                                        </div>
                                        <div class="col-md-3" >
                                          <label >จังหวัด :</label>
                                        </div>
                                        <div class="col-md-3" >
                                          <input disabled class="form-control" type="text" name="" value="<?php echo e($key->user_province); ?>">
                                        </div></div>
                                        <div class="row">

                                        <div class="col-md-3" >
                                          <label >ที่อยู่ :</label>
                                        </div>
                                        <div class="col-md-3" >
                                          <textarea disabled class="form-control" name="name" rows="5" cols="22"><?php echo e($key->user_address); ?></textarea>
                                        </div>
                                        <div class="col-md-3" >
                                          <label >รหัสไปรษณีย์ :</label>
                                        </div>
                                        <div class="col-md-3" >
                                          <input disabled class="form-control" type="text" name="" value="<?php echo e($key->user_zipcode); ?>">
                                        </div></div>
                                        <div class="row">

                                        <div class="col-md-3" >
                                          <label >เบอร์โทรติดต่อ :</label>
                                        </div>
                                        <div class="col-md-3" >
                                          <input disabled class="form-control" type="text" name="" value="<?php echo e($key->user_tell); ?>">
                                        </div>
                                        <div class="col-md-3" >
                                          <label >ชื่อธนาคาร :</label>
                                        </div>
                                        <div class="col-md-3" >
                                          <input disabled class="form-control" type="text" name="" value="<?php echo e($key->user_bank_name); ?>">
                                        </div></div>
                                        <div class="row">
                                        <div class="col-md-3" >
                                          <label >หมายเลขบัญชี :</label>
                                        </div>
                                        <div class="col-md-3" >
                                          <input disabled class="form-control" type="text" name="" value="<?php echo e($key->user_account); ?>">
                                        </div>
                                        <div class="col-md-3" >
                                          <label >ชื่อบัญชี :</label>
                                        </div>
                                        <div class="col-md-3" >
                                          <input disabled class="form-control" type="text" name="" value="<?php echo e($key->user_account_name); ?>">
                                        </div>
                                      </div>
                                      <div class="row">
                                      <div class="col-md-3" >
                                        <label >ประเภทบัญชี :</label>
                                      </div>
                                      <div class="col-md-3" >
                                        <input disabled class="form-control" type="text" name="" value="<?php echo e($key->user_account_type); ?>">
                                      </div>
                                      <div class="col-md-3" >
                                        <label >สาขา :</label>
                                      </div>
                                      <div class="col-md-3" >
                                        <input disabled class="form-control" type="text" name="" value="<?php echo e($key->user_account_branch); ?>">
                                      </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-3" >
                                      <label >อีเมลล์ :</label>
                                    </div>
                                    <div class="col-md-3" >
                                      <input disabled class="form-control" type="text" name="" value="<?php echo e($key->user_email); ?>">
                                    </div>
                                    <div class="col-md-3" >
                                      <label >Username :</label>
                                    </div>
                                    <div class="col-md-3" >
                                      <input disabled class="form-control" type="text" name="" value="<?php echo e($key->user_username); ?>">
                                    </div>
                                  </div>
                                      </div>
                                      <hr>
                                      <div class="col-md-6">
                                        รูปบัตรประชาชน
                                      </div>
                                      <div class="col-md-6">
                                        รูปภาพสำเนาทะเบียน
                                      </div>
                                      <div class="col-md-6">
                                        <a href="<?php echo e(url('backoffice/imgIden/'.$key->user_img_identity)); ?>" target="_blank"><?php echo e(Html::image('local/storage/app/images/'.$key->user_img_identity,'',['width'=>'100%'])); ?></a>
                                      </div>
                                      <div class="col-md-6">
                                        <a href="<?php echo e(url('backoffice/imgAccount/'.$key->user_img_account_home)); ?>" target="_blank"><?php echo e(Html::image('local/storage/app/images/'.$key->user_img_account_home,'',['width'=>'100%'])); ?></a>
                                      </div>

                                  </div>
                                  <div class="modal-footer"  >
                                      <button  type="Success" class="btn btn-warning" data-dismiss="modal">Close</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div></td>
          <?php if($key->user_status_ban==1): ?>
            <td align="center"><?php echo e($key->user_ban_date); ?></td>
          <?php else: ?>
            <td align="center"></td>
          <?php endif; ?>
          <td align="center"><?php echo e($key->created_at); ?></td>
          <td align="center">
            <?php if($key->user_status_ban==0): ?>
              
              <button type="button" onclick="return ban_sweetalert(<?php echo e($key->id); ?>)" class="btn btn-warning"><i class="fa fa-ban" aria-hidden="true"></i> Ban</button>
            <?php else: ?>
              
              <button type="button" onclick="return unban_sweetalert(<?php echo e($key->id); ?>)" class="btn btn-warning"><i class="fa fa-check-circle" aria-hidden="true"></i> Unbanned</button>
            <?php endif; ?>
            
          
          <button type="button" onclick="return del_sweetalert(<?php echo e($key->id); ?>)" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Delete</button>
          </td>
          </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>


      </tbody>
    </table>

    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
  function del_sweetalert(id) {
    swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((sweetalert) => {
  if (sweetalert) {
    // setTimeout(function () {
  window.location = "<?php echo e(url('backoffice/del_user/')); ?>"+"/"+id;
// }, 1000);
  } else {
    swal("Your data is safe!","","error");
  }
});
  }
  function ban_sweetalert(id) {
    swal({
  title: "Are you sure?",
  text: "You want to ban this user ?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((sweetalert) => {
  if (sweetalert) {
    // setTimeout(function () {
  window.location = "<?php echo e(url('backoffice/ban_user/')); ?>"+"/"+id;
// }, 1000);
  } else {
    swal("This user is safe!","","error");
  }
});
  }
  function unban_sweetalert(id) {
    swal({
  title: "Are you sure?",
  text: "You want to unban this user ?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((sweetalert) => {
  if (sweetalert) {
    // setTimeout(function () {
  window.location = "<?php echo e(url('backoffice/unban_user/')); ?>"+"/"+id;
// }, 1000);
  } else {
    swal("This user still banned!","","error");
  }
});
  }
  $(document).ready(function(){
    $('#example').DataTable({
        "order": [[ 0, "asc" ]]
    });
  });

  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backoffice.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>