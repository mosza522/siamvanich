@extends('backoffice.layouts.main')
@section('page_title','Siamvanich | Blacklist')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blacklist
        <small>Manage blacklist</small>
        <p>
          {{-- {{Html::link('backoffice/add_admin','<i class="fa fa-plus-square" aria-hidden="true"></i>Add Admin',array('class'=>'btn btn-primary'))}} --}}

        </p>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-cog"></i> Backoffice</a></li>
        <li><a href="{{ url('backoffice/blacklist') }}">Blacklist</a></li>
        <li class="active">Add Blacklist</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      @if (!isset($blacklist))
        {{Form::open(['url' => 'add_blacklist','class'=>'form-horizontal form-label-left',
        'OnSubmit'=>'return fncSubmit();','name'=>'addblacklist'])}}

      @else
        {{Form::open(['url' => 'backoffice/update_blacklist','class'=>'form-horizontal form-label-left',
        'OnSubmit'=>'return fncSubmit();','name'=>'addblacklist'])}}
        {{Form::hidden('id', $blacklist->id)}}
      @endif
      @if(count($errors) > 0)
          @foreach ($errors->all() as $error)
              <script>
                  swal("{{ $error}}", "", "error");
              </script>
            @endforeach
    @endif
    @php

    $user=App\user_tb::whereNotIn('user_id',function($query){
       $query->select('user_id')->from('blacklists');
    })->get();
    // $user=App\user_tb::get();
    @endphp
      <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Choose blacklist user<span class="required">*</span>
          </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="user_id" id="user_id">
                          @foreach ($user as $data)
                            <option value="{{$data->id}}">{{$data->user_username}}</option>
                          @endforeach
                        </select>
          </div>
        </div>

        <div class="ln_solid"></div>
        <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <button type="submit" class="btn btn-success" >Submit</button>
          <a href="{{ url('backoffice/blacklist') }}"><button type="button" class="btn btn-primary">Cancel</button>

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
  $(document).ready(function() {
  $('#user_id').select2();
  });
  </script>

@endsection
