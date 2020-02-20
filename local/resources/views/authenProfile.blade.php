@extends('layouts.main')
@section('page_title','สยามวานิช')
@section('content')
<div class="container-fluid nopadding">
  <div class="row">
  <div class="col-lg-12">
  <div class="row centerbg">



<div class="col-md-3 padding0">
<div class="logobg1"></div>
  </div>


      <div class="col-md-7 padding25 bgw">
        @if (Session::has('wrong'))
          <div class="alert alert-danger">
            <li>{{Session::get('wrong')}}</li>
          </div>
        @endif
        {{Form::open(['url' => 'changePasswordAndImg'])}}
        {{Form::hidden('id',Session::get('userData')->id)}}
          <div class="textpc">โปรดระบุเลขบัตรประชาชน 13 หลัก</div>

           <div class="form-horizontal">
           <fieldset>
           <!-- Text input-->
           <div class="form-group">
           <div class="col-md-6">
          <input required  id="iden" name="iden" onkeypress="return check_number(this.value)" type="text" placeholder="" class="form-control77 input-md" maxlength="13">
          </div>
          </div>
          </fieldset>
          </div>
          <div class="form-horizontal">
          <fieldset>

          <!-- Button -->
          <div class="form-group">
          <div class="col-md-4 top18">
          <a href="edit_profile.php">
          <button type="submit" class="btn btn-default bot181">ตกลง</button>
          </a>
          <button id="" name="" class="btn btn-default bot182">ยกเลิก</button>
          </div>
          </div>
          </fieldset>
          </div>
          {{Form::close()}}



      </div>

  </div>
  </div>
  </div>
  </div>
  <script type="text/javascript">
  function check_number(salary) {
  var vchar = String.fromCharCode(event.keyCode);
  if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
  salary.onKeyPress=vchar;

  }
  </script>
@endsection
