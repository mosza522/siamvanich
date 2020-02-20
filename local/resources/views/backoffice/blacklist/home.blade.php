@extends('backoffice.layouts.main')
@section('page_title','Siamvanich | บัญชีดำ')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        บัญชีดำ
        <small>บัญชีดำ</small>
        <p>
          {{-- {{Html::link('backoffice/add_admin','<i class="fa fa-plus-square" aria-hidden="true"></i>Add Admin',array('class'=>'btn btn-primary'))}} --}}

        </p>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-cog"></i> Backoffice</a></li>
        <li class="active">บัญชีดำ</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      @if(Session::has('success'))
        <script>
            swal("{{ Session::get('success') }}", "", "success");
        </script>
    @endif
      <a  href="{{ url('backoffice/addBlacklist_form') }}"><button type="button" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> เพิ่มรายชื่อ</button></a>
      <p></p>
      <table id="example" class="table">
      <thead>
        <tr>
<th class="text-center" style="width: 15%;">Date Create</th>
          <th class="text-center" style="width: 15%;">ชื่อผู้ใช้</th>
          <th class="text-center" style="width: 15%;">Username</th>
          <th class="text-center" style="width: 15%;">Account</th>
          <th class="text-center" style="width: 15%;">Bank</th>
<th class="text-center" style="width: 15%;">Action</th>
  </tr>
      </thead>
      <tbody>
        @php
        $data=DB::table('blacklists')->get();
        @endphp
        @foreach ($data as $key )
          <tr>
          <td align="center">{{$key->created_at}}</td>
          <td align="center">{{$key->fullname}}</td>
          <td align="center">{{$key->username}}</td>
          <td align="center">{{$key->account_bank}}</td>
          <td align="center">{{$key->bank}}</td>
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
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((sweetalert) => {
  if (sweetalert) {
    // setTimeout(function () {
  window.location = "{{url('backoffice/del_blacklist/')}}"+"/"+id;
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
