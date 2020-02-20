@extends('backoffice.layouts.main')
@section('page_title','Siamvanich | จัดการโฆษณา')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        โฆษณา
        <small>จัดการโฆษณา</small>
        <p>
          {{-- {{Html::link('backoffice/add_admin','<i class="fa fa-plus-square" aria-hidden="true"></i>Add Admin',array('class'=>'btn btn-primary'))}} --}}

        </p>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('backoffice/index')}}"><i class="fa fa-cog"></i> Backoffice</a></li>
        <li class="active">จัดการโฆษณา</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      @if(Session::has('success'))
        <script>
            swal("{{ Session::get('success') }}", "", "success");
        </script>
    @endif
      <a  href="{{ url('backoffice/addbanner_form') }}"><button type="button" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> เพิ่มโฆษณา</button></a>
      <p></p>
      <table id="example" class="table">
      <thead>
        <tr>
<th class="text-center" style="width: 5%;">ลำดับ</th>
          <th class="text-center" style="width: 15%;">ตำแหน่ง</th>
          <th class="text-center" style="width: 15%;">หมดอายุ</th>
          <th class="text-center" style="width: 35%;">รูป</th>
          <th class="text-center" style="width: 15%;">Note</th>
<th class="text-center" style="width: 15%;">Action</th>
  </tr>
      </thead>
      <tbody>
        @php
        $data=App\banner::get();
        $i=1;
        @endphp
        @foreach ($data as $key )
          <tr>
          <td align="center">{{$i++}}</td>
          <td align="center">{{$key->position}}</td>
          <td align="center">{{$key->expired}}</td>
          <td align="center">

                        <div class="row"> <a href="" data-toggle="modal" data-target="#myModal{{$key->id}}"><img src="{{asset('local/storage/app/images/banner'.'/'.$key->name)}}" width="250" height="250" alt=""></a> </div>
                        <div class="modal fade" id="myModal{{$key->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
                            <div class="modal-dialog" role="document" style="z-index:50000;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button> <span aria-hidden="true"></span>
                                        <div class="modal-body"> <img class="img-responsive" src="{{asset('local/storage/app/images/banner'.'/'.$key->name)}}" style="width: 100%;">


                                        </div>
                                        <div class="modal-footer">
                                            <button type="Success" class="btn btn-warning" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </td>
          <td align="center">{{$key->note}}</td>
                    <td align="center">
          {{-- <a href="{{url('backoffice/del_admin/'.$key->id)}}"></a> --}}
          <button type="button" onclick="return sweetalert({{$key->id}})" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Delete</button>
          </td>
          </tr>
        @endforeach



      </tbody>
    </table>

    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
  function sweetalert(id) {
    swal({
  title: "ยืนยันการลบ?",
  text: "ต้องการลบโฆษนาใช่หรือไม่ ?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((sweetalert) => {
  if (sweetalert) {
    // setTimeout(function () {
  window.location = "{{url('backoffice/del_banner/')}}"+"/"+id;
// }, 1000);
  } else {
    swal("ยกเลิกการลบ!","","error");
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
