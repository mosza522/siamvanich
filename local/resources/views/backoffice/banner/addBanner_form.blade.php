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
        <li><a href="{{ url('backoffice/index') }}"><i class="fa fa-cog"></i> Backoffice</a></li>
        <li><a href="{{ url('backoffice/banner') }}">จัดการโฆษณา</a></li>
        <li class="active">เพิ่มโฆษณา</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      @if (!isset($id))
        {{Form::open(['url' => 'backoffice/add_banner','class'=>'form-horizontal form-label-left',
        'files'=>true])}}
        
      @endif
      @if(count($errors) > 0)
          @foreach ($errors->all() as $error)
              <script>
                  swal("{{ $error}}", "", "error");
              </script>
            @endforeach
    @endif
      <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> ตำแหน่งโฆษณา <span class="required">*</span>
          </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="position" required>
                              <option value="ด้านบน">ด้านบน</option>
                              <option value="ด้านซ้าย">ด้านซ้าย</option>
                              <option value="ด้านขวา">ด้านขวา</option>
                              <option value="ด้านซ้ายล่าง">ด้านซ้ายล่าง</option>
                              <option value="ด้านขวาล่าง">ด้านขวาล่าง</option>
                            </select>


          </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> ระยะเวลา <span class="required">*</span>
            </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="expired" required>

                            <option value="1">1 เดือน</option>
                            <option value="2">2 เดือน</option>
                            <option value="3">3 เดือน</option>
                            <option value="4">4 เดือน</option>
                            <option value="5">5 เดือน</option>
                            <option value="6">6 เดือน</option>
                            <option value="7">7 เดือน</option>
                            <option value="8">8 เดือน</option>
                            <option value="9">9 เดือน</option>
                            <option value="10">10 เดือน</option>
                            <option value="11">11 เดือน</option>
                            <option value="12">12 เดือน</option>

                          </select>
            </div>
          </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> เลือกรูป <span class="required">*</span>
          </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" name="img" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Note <span class="required">*</span>
          </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="note" class="form-control" value="">
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

@endsection
