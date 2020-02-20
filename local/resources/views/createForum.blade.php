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

      <div class="form-horizontal">
<fieldset>

<!-- Form Name -->
<div class="text91 magintop55">ยินดีต้อนรับเข้าสู่การ ซื้อ - ขาย สินค้า</div>

<!-- Multiple Checkboxes -->
<br>

<fieldset>

  @php
      $cat=App\forum_category::find($id);
    @endphp
<!-- Text input-->
{{Form::open(['url' => 'createForum' , 'files' => true , 'name'=>'form1' ,'id'=>'form1'])}}
{{Form::hidden('id',Session::get('userData')->id)}}
{{Form::hidden('category_id',$cat->id)}}
<div class="form-group">
<p class="col-md-3 control-label" for="textinput">* ชื่อสมาชิก :</p>
  <p class="col-md-2 control-label" style="text-align:left;" for="textinput">{{Session::get('userData')->user_fullname}}</p>
</div>

</fieldset>

<div class="form-horizontal">
<fieldset>
  <div class="form-group">
  <p class="col-md-3 control-label" for="name">หมวดสินค้า  :</p>

<p class="col-md-3 control-label" style="text-align:left;" for="textinput">{{$cat->category_name}}</p>

  </div>
<div class="form-group">
<p class="col-md-3 control-label" for="name">ชื่อสินค้าที่ขาย  :</p>
<div class="col-md-6">
<input id="name" onkeyup="return check2(this.id)" name="name" type="text" placeholder="" class="form-control input-md" required>
<span class="help-block"><span style="color:red">* การตั้งชื่อสินค้า ไม่ควรใส่สัญลักษณ์พิเศษต่าง ๆ</span></span>
</div>
</div>
  <!-- Text input-->
      <div class="form-group">
        <p class="col-md-3 control-label" for="textinput">ราคาสินค้าที่ขาย :</p>

        <div class="col-md-6">
        <input id="price" name="price" onkeyup="return check2(this.id)" type="text" placeholder="" class="form-control input-md" required>
        </div>
      </div>
</fieldset>
</div>

           <div class="form-horizontal">
              <fieldset>
              <div class="form-group">
                <p class="col-md-3 control-label" for="textarea">รายละเอียดของสินค้า</p>
                <div class="col-md-6">
                  <textarea class="form-control" onkeyup="return check();" id="textarea" name="detail" rows="10" required></textarea>
                </div>
              </div>
              </fieldset>
              </div>

</fieldset>
                  <div class="form-horizontal">
                  <fieldset>
                  <div class="form-group">
                    <p class="col-md-3 control-label" for="img">รูปภาพสินค้า  :</p>
                    <div class="col-md-6">
                      <input id="img" name="img[]" class="input-file form-control" type="file" multiple required>
                    </div>
                  </div>

                  </fieldset>
                  </div>

          <div class="form-horizontal">
          <fieldset>

          <div class="form-group">
            <p class="col-md-3 control-label" for="textinput">การชำระเงิน  :</p>
            <div class="col-md-6">
            ชื่อธนาคาร : {{Session::get('userData')->user_bank_name}}<br>
            เลขบัญชี :{{Session::get('userData')->user_account}}<br>
            ชื่อบัญชี : {{Session::get('userData')->user_account_name}}<br>
            สาขา : {{Session::get('userData')->user_account_branch}}<br>
            ประเภท : {{Session::get('userData')->user_account_type}}<br>

            </div>
          </div>


      <!-- Text input-->
      <div class="form-group">
        <p class="col-md-3 control-label" for="textinput">ข้อมูลที่อยู่</p>
        <div class="col-md-6">
        ที่อยู่ : {{Session::get('userData')->user_address}}<br>
        จังหวัด : {{Session::get('userData')->user_province}}<br>
        รหัสไปรษณีย์ : {{Session::get('userData')->user_zipcode}}<br>
        เบอร์โทรติดต่อ : {{Session::get('userData')->user_tell}}<br>
        E-mail : {{Session::get('userData')->user_email}}<br>
        </div>
      </div>
</fieldset>
</div>

          <br>

    <div class="form-horizontal">
        <fieldset>
          <div class="form-group">
            <label class="col-md-3 control-label" for="button1id"></label>
            <div class="col-md-8">
              <input type="submit"  class="btn btn-inverse" value="สร้างกระทู้">
              {{-- <button id="button1id" type="submit" name="button1id" class="btn btn-inverse">สร้างกระทู้</button> --}}
              <input type="reset" value="เคลียร์ข้อความ" class="btn btn-inverse">
                <a href="{{url('index')}}" class="btn btn-inverse">กลับสู่หน้าแรก</a>
            </div>
          </div>
        {{Form::close()}}
</fieldset>
</div>

</div>


</div>
</div>
</div>




       <div class="col-md-2 ">

  </div>
  </div>
  </div>
  <script type="text/javascript">
  function checkFilename() {
    var files = document.getElementById("img").files;
    for (var i = 0; i < files.length; i++)
    {
      var extall="jpg,gif,png";
      ext = files[i].name.split('.').pop().toLowerCase();
      if(parseInt(extall.indexOf(ext)) < 0)
      {
        alert('สามารถใช้ได้เฉพาะไฟล์ : ' + extall);
        return false;
      }else{
        return true;
      }


  }
}
    function check() {
    var string = document.getElementById('textarea').value;
    substring = [
      'หี','หำ','ควย','เย็ด','สัส','ฆวย','ครวย','ฆรวย','เย็ด','เยด','มึง'
    ];
    for (var i = 0; i < substring.length; i++) {
      if(  string.indexOf(substring[i]) !== -1){
        alert('ห้ามใช้คำหยาบคาย');
        document.getElementById('textarea').value="";
      }
    }
    check2('textarea');
    }
    function check2(id) {
      var reg =/<(.|\n)*?>/g;
      if (reg.test($('#'+id).val()) == true) {
        alert('ห้ามใช้เครื่องหมายนี้');
        document.getElementById(id).value="";
      }
    }

  </script>
  <script type="text/javascript">
  var type="{{Session::get('userData')->user_type}}";
  $("#form1").submit(function(){
    if(type=='normal'){
      var length=4;
    }
    else{
      var length=10;
    }
      var $fileUpload = $("input[type='file']");
          if (parseInt($fileUpload.get(0).files.length)>length){
           alert("ใส่รูปภาพได้สูงสุด "+length+" รูป");
           return false;
          }
      if(checkFilename()!=true){
        $("#img").val('');
        return false;
      }
    //       for (var i = 0; i < parseInt($fileUpload.get(0).files.length); i++) {
    //         var ext = $('#img').val().split('.').pop().toLowerCase();
    //         if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
    //           alert('invalid extension!');
    //           return false;
    //         }
    //
    //       }
    // // alert($('input[type=file]').get(0).files.length);
    // // return false;
      });

  </script>

@endsection
