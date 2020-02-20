@extends('layouts.main')
@section('page_title','สยามวานิช')
@section('content')
<div class="container-fluid">
  <div class="row">
  <div class="col-lg-12">
  <div class="row centerbg">



<div class="col-md-3 padding0">
<div class="logobg1"></div>
  </div>


      <div class="col-md-7 padding25 bgw">


  <br>

    <div > <!--¡ÅèÍ§ Tab - start -->
        <div >

        </div>
        <div class="tab-content" >
           <div  id="tab1_bin" class="tab-pane active" >

                  <div class="toto"></div>
                <td>
                  <table style="width: 100%; ">
                    <tr>
                       <td class="top_1" style="text-align: center;">
                         @if (Session::has('wrong'))
                           <div class="alert alert-danger">
                             <li>{{Session::get('wrong')}}</li>
                           </div>
                         @endif

                       </td>
                      </tr>
                  </table>
              </td>
                  </div>
                      </div>
                          </div>
                              <div class="porfile201">
                                @php
                                  $userData=App\user_tb::where('id', Session::get('userData')->id )->first();
                                @endphp
                                @if ($userData->img==null or $userData->img=="")
                                  <img  class="porfile201" src="{{asset('assets/img/index/profile1.png')}}">
                                @else
                                  <img  class="porfile201" src="{{asset('local/storage/app/images/user').'/'.$userData->img}}">
                                  @endif
                                </div>
            {{Form::open(['url' => 'changeUserData','files' => true])}}
            {{Form::hidden('id',Session::get('userData')->id)}}
       <div class="form-horizontal">
          <fieldset>
          <!-- File Button -->
              <div class="choosefile">
          <div class="form-group">
          <label class="col-md-6 control-label" for=""></label>
          <div class="col-md-6">
          <input id="img" name="img" class="input-file" type="file">
          </div>
          </div>
           </div>
          </fieldset>
          </div>

           <div class="form-horizontal">
           <fieldset>
           <!-- Text input-->
           <div class="form-group">
           <p class="col-md-3 control-label text201" for="">รหัสผ่านเดิม<p>
           <div class="col-md-6">
          <input required id="oldpass" name="oldpass" type="password" placeholder="" class="form-control input-md">
          </div>
          </div>
          </fieldset>
          </div>

          <div class="form-horizontal">
           <fieldset>
           <!-- Text input-->
           <div class="form-group">
           <p class="col-md-3 control-label text201" for="">รหัสผ่านใหม่<p>
           <div class="col-md-6">
          <input  id="newpass" name="newpass" type="password" placeholder="" class="form-control input-md">
          </div>
          </div>
          </fieldset>
          </div>

          <div class="form-horizontal">
           <fieldset>
           <!-- Text input-->
           <div class="form-group">
           <p class="col-md-3 control-label text201" for="">ยืนยันรหัสผ่านใหม่<p>
           <div class="col-md-6">
          <input  id="connewpass" name="connewpass" type="password" placeholder="" class="form-control input-md">
          </div>
          <div class="col-md-3" id="text_for_password">

          </div>
          </div>
          </fieldset>
          </div>


          <div class="form-horizontal">
          <fieldset>

          <!-- Button -->
          <div class="form-group">
          <label class="col-md-3 control-label" for=""></label>
          <div class="col-md-4">
          <button id="" name="" onclick="return check_all()" class="btn btn-default bot201">ตกลง</button>
          <a href="{{url('index')}}"><button type="button" id="" name="" class="btn btn-default bot202">ยกเลิก</button></a>
          {{Form::close()}}
          </div>
          </div>




</fieldset>
</div>



      </div>

  </div>
  </div>
  </div>
  </div>
  <script type="text/javascript">
  function check_all() {
    if(document.getElementById('newpass').value!="" && document.getElementById('connewpass').value!=""){
    if(document.getElementById('text_for_password').innerHTML=="Password ตรงกัน"){
      return true;
    }
    else{
      document.getElementById('newpass').focus();
      return false;
    }
  }
}
  $('#connewpass').on('keyup', function () {

  if ($('#connewpass').val() == $('#newpass').val()&& ($('#connewpass').val()!="" && $('#newpass').val()!="")) {
  $('#text_for_password').html('Password ตรงกัน').css('color', 'green');
  } else
  $('#text_for_password').html('Password ไม่ตรงกัน').css('color', 'red');

  });
  $('#newpass').on('keyup', function () {

      if ($('#connewpass').val() == $('#newpass').val()&& ($('#connewpass').val()!="" && $('#newpass').val()!="")) {
      $('#text_for_password').html('Password ตรงกัน').css('color', 'green');
      } else
      $('#text_for_password').html('Password ไม่ตรงกัน').css('color', 'red');

      });
  </script>
@endsection
