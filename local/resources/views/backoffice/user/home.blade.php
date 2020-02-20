@extends('backoffice.layouts.main')
@section('page_title','Siamvanich | ผู้ใช้')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ผู้ใช้
        <small>หน้าหลักผู้ใช้</small>
        <p>
          {{-- {{Html::link('backoffice/add_admin','<i class="fa fa-plus-square" aria-hidden="true"></i>Add Admin',array('class'=>'btn btn-primary'))}} --}}

        </p>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('backoffice/index')}}"><i class="fa fa-cog"></i> Backoffice</a></li>
        <li class="active">หน้าหลักผู้ใช้</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      @if(Session::has('success'))
        {{-- <div class="alert alert-success">
          <ul>
          <li> {{ Session::get('success') }}</li>
          </ul>
        </div> --}}
        <script>
            swal("{{ Session::get('success') }}", "", "success");
        </script>
    @endif

    {{-- <script>
        swal("Good job!", "You clicked the button!", "success");
    </script> --}}

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
        @php
        $i=1;
        $data=DB::table('user_tbs')->where('user_status_confirm', '1')
        ->get();
        $id="";
        @endphp
        @if (count($data)>0)

          @foreach ($data as $key )
          <tr>
          <td align="center">{{$i++}}</td>
          <td align="center">{{$key->user_id}}</td>
          <td align="center"><div class="col-sm-12 col-lg-12 col-md-12">
              <div class="branch-1">
                  <div class="bordol-1">
                      <div class="row"> <a href="" data-toggle="modal" data-target="#myModal{{$key->id}}"><button type="button" name="button" class="btn btn-flat">ดูรายละเอียด</button></a> </div>
                      <div class="modal fade" id="myModal{{$key->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
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
                                          <input disabled class="form-control" type="text" name="" value="{{$key->user_type}}">
                                        </div>
                                        <div class="col-md-3" >
                                          <label >ชื่อ - นามสกุล :</label>
                                        </div>
                                        <div class="col-md-3" >
                                          <input disabled class="form-control" type="text" name="" value="{{$key->user_fullname}}">
                                        </div></div>
                                        <div class="row">
                                        <div class="col-md-3" >
                                          <label >เพศ</label>
                                        </div>
                                        <div class="col-md-3" >
                                          <input disabled class="form-control" type="text" name="" value="{{$key->user_sex}}">
                                        </div>
                                        <div class="col-md-3" >
                                          <label >วัน เดือน ปีเกิด :</label>
                                        </div>
                                        <div class="col-md-3" >
                                          <input disabled class="form-control" type="text" name="" value="{{$key->user_birth_date}}">
                                        </div></div>
                                        <div class="row">
                                        <div class="col-md-3" >
                                          <label >เลขบัตรประชาชน :</label>
                                        </div>
                                        <div class="col-md-3" >
                                          <input disabled class="form-control" type="text" name="" value="{{$key->user_identity}}">
                                        </div>
                                        <div class="col-md-3" >
                                          <label >จังหวัด :</label>
                                        </div>
                                        <div class="col-md-3" >
                                          <input disabled class="form-control" type="text" name="" value="{{$key->user_province}}">
                                        </div></div>
                                        <div class="row">

                                        <div class="col-md-3" >
                                          <label >ที่อยู่ :</label>
                                        </div>
                                        <div class="col-md-3" >
                                          <textarea disabled class="form-control" name="name" rows="5" cols="22">{{$key->user_address}}</textarea>
                                        </div>
                                        <div class="col-md-3" >
                                          <label >รหัสไปรษณีย์ :</label>
                                        </div>
                                        <div class="col-md-3" >
                                          <input disabled class="form-control" type="text" name="" value="{{$key->user_zipcode}}">
                                        </div></div>
                                        <div class="row">

                                        <div class="col-md-3" >
                                          <label >เบอร์โทรติดต่อ :</label>
                                        </div>
                                        <div class="col-md-3" >
                                          <input disabled class="form-control" type="text" name="" value="{{$key->user_tell}}">
                                        </div>
                                        <div class="col-md-3" >
                                          <label >ชื่อธนาคาร :</label>
                                        </div>
                                        <div class="col-md-3" >
                                          <input disabled class="form-control" type="text" name="" value="{{$key->user_bank_name}}">
                                        </div></div>
                                        <div class="row">
                                        <div class="col-md-3" >
                                          <label >หมายเลขบัญชี :</label>
                                        </div>
                                        <div class="col-md-3" >
                                          <input disabled class="form-control" type="text" name="" value="{{$key->user_account}}">
                                        </div>
                                        <div class="col-md-3" >
                                          <label >ชื่อบัญชี :</label>
                                        </div>
                                        <div class="col-md-3" >
                                          <input disabled class="form-control" type="text" name="" value="{{$key->user_account_name}}">
                                        </div>
                                      </div>
                                      <div class="row">
                                      <div class="col-md-3" >
                                        <label >ประเภทบัญชี :</label>
                                      </div>
                                      <div class="col-md-3" >
                                        <input disabled class="form-control" type="text" name="" value="{{$key->user_account_type}}">
                                      </div>
                                      <div class="col-md-3" >
                                        <label >สาขา :</label>
                                      </div>
                                      <div class="col-md-3" >
                                        <input disabled class="form-control" type="text" name="" value="{{$key->user_account_branch}}">
                                      </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-3" >
                                      <label >อีเมลล์ :</label>
                                    </div>
                                    <div class="col-md-3" >
                                      <input disabled class="form-control" type="text" name="" value="{{$key->user_email}}">
                                    </div>
                                    <div class="col-md-3" >
                                      <label >Username :</label>
                                    </div>
                                    <div class="col-md-3" >
                                      <input disabled class="form-control" type="text" name="" value="{{$key->user_username}}">
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
                                        <a href="{{url('backoffice/imgIden/'.$key->user_img_identity)}}" target="_blank">{{Html::image('local/storage/app/images/'.$key->user_img_identity,'',['width'=>'100%'])}}</a>
                                      </div>
                                      <div class="col-md-6">
                                        <a href="{{url('backoffice/imgAccount/'.$key->user_img_account_home)}}" target="_blank">{{Html::image('local/storage/app/images/'.$key->user_img_account_home,'',['width'=>'100%'])}}</a>
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
          @if ($key->user_status_ban==1)
            <td align="center">{{$key->user_ban_date}}</td>
          @else
            <td align="center"></td>
          @endif
          <td align="center">{{$key->created_at}}</td>
          <td align="center">
            @if ($key->user_status_ban==0)
              {{-- <a href="{{url('backoffice/ban_user/'.$key->id)}}"><button type="button" onclick="return confirm('ยืนยันการแบน')" class="btn btn-warning"><i class="fa fa-ban" aria-hidden="true"></i> Ban</button></a> --}}
              <button type="button" onclick="return ban_sweetalert({{$key->id}})" class="btn btn-warning"><i class="fa fa-ban" aria-hidden="true"></i> Ban</button>
            @else
              {{-- <a href="{{url('backoffice/unban_user/'.$key->id)}}"><button type="button" onclick="return confirm('ยืนยันการยกเลิกการแบน')" class="btn btn-warning"><i class="fa fa-check-circle" aria-hidden="true"></i> Unbanned</button></a> --}}
              <button type="button" onclick="return unban_sweetalert({{$key->id}})" class="btn btn-warning"><i class="fa fa-check-circle" aria-hidden="true"></i> Unbanned</button>
            @endif
            {{-- <a href="{{url('backoffice/edit_admin/'.$key->admin_id)}}"><button type="button" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>  Edit</button></a> --}}
          {{-- <a href="{{url('backoffice/del_user/'.$key->id)}}"><button type="button" onclick="return confirm('ยืนยันการลบ')" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Delete</button></a> --}}
          <button type="button" onclick="return del_sweetalert({{$key->id}})" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Delete</button>
          </td>
          </tr>

        @endforeach
        @endif


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
  window.location = "{{url('backoffice/del_user/')}}"+"/"+id;
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
  window.location = "{{url('backoffice/ban_user/')}}"+"/"+id;
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
  window.location = "{{url('backoffice/unban_user/')}}"+"/"+id;
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
@endsection
