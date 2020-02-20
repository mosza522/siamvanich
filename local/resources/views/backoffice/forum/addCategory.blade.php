@extends('backoffice.layouts.main')
@section('page_title','Siamvanich | d')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        หมวดกระทู้
        @if (!isset($cat))
          <small>เพิ่มหมวดกระทู้</small>
        @else
          <small>แก้ไขหมวดกระทู้ </small>
        @endif
        <p>
          {{-- {{Html::link('backoffice/add_admin','<i class="fa fa-plus-square" aria-hidden="true"></i>Add Admin',array('class'=>'btn btn-primary'))}} --}}

        </p>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-cog"></i> Backoffice</a></li>
        <li><a href="{{ url('backoffice/forumCategory') }}">หมวดกระทู้</a></li>
        <li class="active">เพิ่มหมวดกระทู้</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      @if (!isset($cat))
        {{Form::open(['url' => 'backoffice/addCategory','class'=>'form-horizontal form-label-left'])}}

      @else
        {{Form::open(['url' => 'backoffice/updateCategory','class'=>'form-horizontal form-label-left'])}}
        {{Form::hidden('id', $cat->id)}}
      @endif
      @if(count($errors) > 0)
          @foreach ($errors->all() as $error)
              <script>
                  swal("{{ $error}}", "", "error");
              </script>
            @endforeach
    @endif
      <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> ชื่อหมวดกระทู้ <span class="required">*</span>
          </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
            <input @if (isset($cat))
              value="{{$cat->category_name}}"
            @endif type="text" class="form-control" name="category_name" id="category_name" placeholder="ชื่อหมวดกระทู้" required />
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Note
          </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
            <input @if (isset($cat))
              value="{{$cat->note}}"
            @endif type="text" class="form-control" name="note" id="note" 	placeholder="Note"  />
          </div>
        </div>

        <div class="ln_solid"></div>
        <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <button type="submit" class="btn btn-success" >Submit</button>
          <a href="{{ url('backoffice/forumCategory') }}"><button type="button" class="btn btn-primary">Cancel</button>

        </div>
        </div>

        {{Form::close()}}

    </section>
    <!-- /.content -->
  </div>


@endsection
