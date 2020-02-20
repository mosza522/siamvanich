@extends('backoffice.layouts.main')
@section('page_title','Siamvanich | กระทู้')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        กระทู้
        <small>จัดการกระทู้</small>
        <p>
          {{-- {{Html::link('backoffice/add_admin','<i class="fa fa-plus-square" aria-hidden="true"></i>Add Admin',array('class'=>'btn btn-primary'))}} --}}

        </p>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('backoffice/index')}}"><i class="fa fa-cog"></i> Backoffice</a></li>
        <li class="active">กระทู้</li>
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
          <th class="text-center" style="width: 10%;">หมวดกระทู้</th>
          <th class="text-center" style="width: 10%;">ประเภท</th>
          <th class="text-center" style="width: 10%;">ชื่อสินค้า</th>
          <th class="text-center" style="width: 10%;">ราคา</th>
          <th class="text-center" style="width: 20%;">ข้อความอธิบายสินค้า</th>
          <th class="text-center" style="width: 15%;text-align:center;">ชื่อผู้ขาย</th>
<th class="text-center" style="width: 20%;">Action</th>
  </tr>
      </thead>
      <tbody>
        @php
        $i=1;
        $data=App\forum::leftJoin('forum_categories','forums.category_id','forum_categories.id')
        ->leftJoin('user_tbs','forums.user_id','user_tbs.id')
        ->orderBy('type')
        ->orderBy('category_id')
        ->select('forums.*','forum_categories.category_name','user_tbs.user_fullname')
        ->get();
        @endphp


          @foreach ($data as $key )
          <tr>
          <td align="center">{{$i++}}{{"."}}</td>
          <td>{{$key->category_name}}</td>
          <td>{{$key->type}}</td>
          <td>{{$key->name}}</td>
          <td>{{$key->price}}</td>
          <td>{{$key->detail}}</td>
          <td>{{$key->user_fullname}}</td>
          <td align="center">
          {{-- <a href="{{url('backoffice/edit_admin/'.$key->admin_id)}}"><button type="button" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>  Edit</button></a> --}}
          {{-- <a href="{{url('backoffice/del_user/'.$key->id)}}"><button type="button" onclick="return confirm('ยืนยันการลบ')" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Delete</button></a> --}}

                      <div class="row"> <a href="" data-toggle="modal" data-target="#myModal{{$key->id}}"><button type="button" name="button" class="btn btn-flat">ลบรูปภาพ</button></a>
                      <button type="button" onclick="return del_sweetalert({{$key->id}})" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> ลบกระทู้</button>
                      </div>
                      <div class="modal fade" id="myModal{{$key->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
                          <div class="modal-dialog" role="document" style="width:80%;">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button> <span aria-hidden="true"></span>
                                      <div class="modal-body">
                                        @php
                                            $imgs=App\img::where('forum_id',$key->id)->get();
                                          @endphp
                                          @foreach ($imgs as $img)
                                            <div class="col-md-12" style="margin-top:10px;">
                                              <img src={{asset("local/storage/app/images/forum/".$img->name)}} alt="">
                                            </div>
                                            <div class="col-md-12" style="text-align:center;margin-top:10px;">
                                              <button type="button" onclick="return del_img_sweetalert({{$img->id}})" class="btn btn-danger"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i> Delete</button>
                                            </div>

                                          @endforeach
                                        </div>
                                  <div class="modal-footer"  >
                                      <button  type="Success" class="btn btn-warning" data-dismiss="modal">Close</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>


          </td>
          </tr>

        @endforeach



      </tbody>
    </table>

    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
  function del_sweetalert(id) {
    swal({
  title: "ลบกระทู้?",
  text: "ท่านต้องการลบกระทู้ใช่หรือไม่ ?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((sweetalert) => {
  if (sweetalert) {
    // setTimeout(function () {
  window.location = "{{url('backoffice/del_forum/')}}"+"/"+id;
// }, 1000);
  } else {
    swal("Your data is safe!","","error");
  }
});
  }
  function del_img_sweetalert(id) {
    swal({
  title: "ลบรูปภาพ?",
  text: "ท่านต้องการลบรูปภาพใช่หรือไม่ ?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((sweetalert) => {
  if (sweetalert) {
    // setTimeout(function () {
  window.location = "{{url('backoffice/del_img_forum/')}}"+"/"+id;
// }, 1000);
  } else {
    swal("ยกเลิกการลบรูปภาพ!","","error");
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
