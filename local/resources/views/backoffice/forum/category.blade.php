@extends('backoffice.layouts.main')
@section('page_title','Siamvanich | กระทู้')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        กระทู้
        <small>หมวดกระทู้</small>
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
    <a  href="{{ url('backoffice/addCategory') }}"><button type="button" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> เพิ่มหมวดกระทู้</button></a>
    <p></p>
      <table id="example" class="table">
      <thead>
        <tr>
<th class="text-center" style="width: 5%;">No .</th>
          <th class="text-center" style="width: 50%;">Name Category</th>
          <th class="text-center" style="width: 25%;text-align:center;">Note</th>
<th class="text-center" style="width: 20%;">Action</th>
  </tr>
      </thead>
      <tbody>
        @php
        $i=1;
        $data=DB::table('forum_categories')->get();
        @endphp


          @foreach ($data as $key )
          <tr>
          <td align="center">{{$i++}}{{"."}}</td>
          <td align="center">{{$key->category_name}}</td>
          <td>{{$key->note}}</td>
          <td align="center">
          {{-- <a href="{{url('backoffice/edit_admin/'.$key->admin_id)}}"><button type="button" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>  Edit</button></a> --}}
          {{-- <a href="{{url('backoffice/del_user/'.$key->id)}}"><button type="button" onclick="return confirm('ยืนยันการลบ')" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Delete</button></a> --}}
          <a href="{{url('backoffice/edit_category/'.$key->id)}}"><button type="button" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>  Edit</button></a>
          <button type="button" onclick="return del_sweetalert({{$key->id}})" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Delete</button>
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
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this record!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((sweetalert) => {
  if (sweetalert) {
    // setTimeout(function () {
  window.location = "{{url('backoffice/del_category/')}}"+"/"+id;
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
