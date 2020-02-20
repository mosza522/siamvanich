@extends('backoffice.layouts.main')
@section('page_title','Siamvanich | Admin')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
        <small>Manage admin</small>
        <p>
          {{-- {{Html::link('backoffice/add_admin','<i class="fa fa-plus-square" aria-hidden="true"></i>Add Admin',array('class'=>'btn btn-primary'))}} --}}

        </p>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-cog"></i> Backoffice</a></li>
        <li><a href="{{ url('backoffice/admin') }}">Admin</a></li>
        <li class="active">Add Admin</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      @if (!isset($admin))
        {{Form::open(['url' => 'backoffice/add_admin','class'=>'form-horizontal form-label-left',
        'OnSubmit'=>'return fncSubmit();','name'=>'addadmin'])}}

      @else
        {{Form::open(['url' => 'backoffice/update_admin','class'=>'form-horizontal form-label-left',
        'OnSubmit'=>'return fncSubmit();','name'=>'addadmin'])}}
        {{Form::hidden('id', $admin->id)}}
      @endif
      <input type="hidden" name="admin_permission" value="admin">
      @if(count($errors) > 0)
          @foreach ($errors->all() as $error)
              <script>
                  swal("{{ $error}}", "", "error");
              </script>
            @endforeach
    @endif
      <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Full Name <span class="required">*</span>
          </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
            <input @if (isset($admin))
              value="{{$admin->admin_fullname}}"
            @endif type="text" class="form-control" name="admin_fullname" id="admin_fullname" placeholder="Full name" required="" />
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Username <span class="required">*</span>
          </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
            <input @if (isset($admin))
              value="{{$admin->admin_username}}"
            @endif type="text" class="form-control" name="username" id="username" 	placeholder="Username" required="" />
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Password <span class="required">*</span>
          </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
            <input @if (isset($admin))
              value="{{$admin->admin_password_origin}}"
            @endif type="password" class="form-control" name="password" id="password" placeholder="Password" required="" />
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Confirm Password <span class="required">*</span>
          </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="password" class="form-control" name="conpassword" id="conpassword" placeholder="Confirm Password" value="" required="" />
          </div>
        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <button type="submit" class="btn btn-success" >Submit</button>
          <a href="{{ url('backoffice/admin') }}"><button type="button" class="btn btn-primary">Cancel</button>

        </div>
        </div>

        {{Form::close()}}

    </section>
    <!-- /.content -->
  </div>
  <script type="text/javascript">
  function fncSubmit()
  {
    if(document.addadmin.password.value != document.addadmin.conpassword.value)
    {
      alert('ยืนยันรหัสผ่านไม่ตรงกัน กรุณากรอกใหม่อีกครั้ง');
      document.addadmin.conpassword.focus();
      return false;
    }


    document.addadmin.submit();
  }
  </script>

@endsection
