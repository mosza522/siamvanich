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

      <div class="texthead">เปลี่ยนรหัสผ่าน</div>
      <div class="form-horizontal">
       <fieldset>
       <!-- Text input-->
       <div class="form-group">
         {{Form::open(array('url'=>'changePassword','id'=>'form1'))}}

      <input type="hidden" name="id" value="{{$user->id}}">
      <p class="col-md-3 control-label text201" for="">แก้ไขรหัสผ่าน<p>
      <div class="col-md-6">
      <input id="pass" name="pass" type="password" placeholder="" class="form-control input-md">
      </div>
      <div class="col-md-3">
        <span><i class="fa fa-eye" id="eye"></i></span>
      </div>
      </div>
      </fieldset>
      </div>

      <div class="form-horizontal">
       <fieldset>
       <!-- Text input-->
       <div class="form-group">
       <p class="col-md-3 control-label text201" for="">ยืนยันรหัสผ่าน<p>
       <div class="col-md-6">
      <input id="conPass" name="conPass" type="password" placeholder="" class="form-control input-md">
      </div>
      </div>
      </fieldset>
      </div>
      <div class="form-horizontal">
        <div class="form-group">
          <label class="col-md-3 control-label" for=""></label>
        <div class="col-md-4">
          <p id="text_for_password"></p>
        </div>
      </div>

      </div>
      <div class="form-horizontal">
      <fieldset>  <!-- Button -->
      <div class="form-group">
      <label class="col-md-3 control-label" for=""></label>
      <div class="col-md-4">
      <button  class="btn btn-default bot201" type="button" disabled id="button" onclick="return sweetalert()">ตกลง</button>
      <a href="{{url('index')}}" class="btn btn-default bot202"> ยกเลิก</a>
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
function onSubmit(token) {
  document.getElementById("submit").disabled = false;
}
$('#birthday').keypress(function (e) {
      var regex =/^[0-9]+$/;
      var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
      if (regex.test(str)) {
        return true;
      }
      else {
        e.preventDefault();
        return false;
      }
    });
$('#iden').keypress(function (e) {
          var regex =/^[0-9]+$/;
          var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
          if (regex.test(str)) {
            return true;
          }
          else {
            e.preventDefault();
            return false;
          }
        });
        $('#conPass').on('keyup', function () {
          if ($('#conPass').val() == $('#pass').val()&& ($('#conPass').val()!="" && $('#pass').val()!="")) {
        $('#text_for_password').html('Password ตรงกัน').css('color', 'green');
        $("#button").prop('disabled', false);
      } else{
        $('#text_for_password').html('Password ไม่ตรงกัน').css('color', 'red');
        $("#button").prop('disabled', true);
      }
      });
      $('#pass').on('keyup', function () {
        if ($('#conPass').val() == $('#pass').val()&& ($('#conPass').val()!="" && $('#pass').val()!="")) {
      $('#text_for_password').html('Password ตรงกัน').css('color', 'green');
      $("#button").prop('disabled', false);
    } else{
      $('#text_for_password').html('Password ไม่ตรงกัน').css('color', 'red');
      $("#button").prop('disabled', true);
    }
    });

</script>
<script type="text/javascript">
function sweetalert() {
  swal({
title: "ยืนยันการเปลี่ยนรหัสผ่าน",
text: "",
icon: "warning",
buttons: true,
dangerMode: false,
})
.then((sweetalert) => {
if (sweetalert) {
swal("เปลี่ยนรหัสผ่านเสร็จสิ้น","คุณสามารถใช้รหัสผ่านใหม่ได้เลย","success");
setTimeout(function () {
document.getElementById("form1").submit();
}, 2000);
} else {
  swal("ยกเลิกการเปลี่ยนรหัส","","error");
}
});
}
$("#eye").mouseover(function() {
$('#pass').clone().attr('type','text').insertAfter('#pass').prev().remove();
});
$("#eye").mouseout(function() {
$('#pass').clone().attr('type','password').insertAfter('#pass').prev().remove();
});
</script>
@endsection
