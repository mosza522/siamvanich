@extends('backoffice.layouts.main')
@section('page_title','Siamvanich | ผู้ดูแลระบบ')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ผู้ดูแลระบบ
        <small>จัดการผู้ดูแลระบบ</small>
        <p>
          {{-- {{Html::link('backoffice/add_admin','<i class="fa fa-plus-square" aria-hidden="true"></i>Add Admin',array('class'=>'btn btn-primary'))}} --}}

        </p>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('backoffice/index')}}"><i class="fa fa-cog"></i> Backoffice</a></li>
        <li class="active">ผู้ดูแลระบบ</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      @if(Session::has('success'))
        <script>
            swal("{{ Session::get('success') }}", "", "success");
        </script>
    @endif
      <a  href="{{ url('backoffice/addAdmin_form') }}"><button type="button" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> เพิ่มผู้ดูแลระบบ</button></a>
      <p></p>
      <table id="example" class="table">
      <thead>
        <tr>
<th class="text-center" style="width: 15%;">Date Create</th>
          <th class="text-center" style="width: 15%;">ชื่อผู้ดูแลระบบ</th>
          <th class="text-center" style="width: 15%;">Username</th>
          <th class="text-center" style="width: 15%;">Password</th>
          <th class="text-center" style="width: 15%;">Last Login</th>
          <th class="text-center" style="width: 10%;">Permission</th>
<th class="text-center" style="width: 15%;">Action</th>
  </tr>
      </thead>
      <tbody>
        @php
        $data=DB::table('tb_admin')->get();
        @endphp
        @foreach ($data as $key )
          <tr>
          <td align="center">{{$key->admin_create}}</td>
          <td align="center">{{$key->admin_fullname}}</td>
          <td align="center">{{$key->admin_username}}</td>
          <td align="center">{{$key->admin_password_origin}}</td>
          <td align="center">{{$key->admin_lastlogin}}</td>
          <td align="center">{{$key->admin_permission}}</td>
                    <td align="center">
          <a href="{{url('backoffice/edit_admin/'.$key->id)}}"><button type="button" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>  Edit</button></a>
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
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((sweetalert) => {
  if (sweetalert) {
    // setTimeout(function () {
  window.location = "{{url('backoffice/del_admin/')}}"+"/"+id;
// }, 1000);
  } else {
    swal("Your data is safe!","","error");
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
