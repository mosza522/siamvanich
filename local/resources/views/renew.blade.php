@extends('layouts.main')
@section('page_title','สยามวานิช')
@section('content')
  @php
    $userData=App\user_tb::where('id', Session::get('userData')->id )->first();
  @endphp
  <div class="container-fluid">
  <div class="row">
  <div class="col-lg-12">
  <div class="row centerbg">



  <div class="col-md-3 padding0">
  <div class="logobg1"></div>
  </div>


  <div class="col-md-7 padding25 bgw">
       <div class="text44">* กรณีต่ออายุ จะต้องเป็นสมาชิกอยู่แล้ว</div>
       @if (Session::has('success'))
         <div class="alert alert-success">
           <li>{{Session::get('success')}}</li>
         </div>
       @endif
      <br>
  <div class="table-responsive">
  <table class="table">
  <div class="panel panel-default panel-table tr1 col-md-12 nopadding" >
  <div class="panel-heading nopadding">
  <div class="tr">
      <div class="td" style="width:20%">ธนาคาร</div>
      <div class="td" style="width:21%">สาขา</div>
      <div class="td" style="width:24%">ชื่อบัญชี</div>
      <div class="td" style="width:20%">เลขบัญชี</div>
      <div class="td" style="width:20%">ประเภท</div>

  </div>
  </div>
  <div class="panel-body">
  <div class="tr">
      <div class="td" style="width:20%">ธนาคารกรุงศรีอยุธยา</div>
      <div class="td"style="width:20%"> อิมพีเรียลเวิลด์ สำโรง</div>
      <div class="td" style="width:20%">นายสามารถ รอดงาม และ น.ส.อัจฉิมา เทียนอำไพ</div>
      <div class="td" style="width:20%"> 598-1-54028-7</div>
      <div class="td" style="width:20%">ออมทรัพย์</div>
  </div>

          </div></div> </table>
  </div>

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="form-horizontal">
              <fieldset>
                  <!-- Multiple Radios (inline) -->
                      <div class="form-group">
                          <label class="col-md-4 control-label" for="radios"></label>
                      <div class="col-md-4">
                  <label class="radio-inline" for="radios-0">
                  <input type="radio" name="radios" id="radios-0" value="" checked="checked">แจ้งยืนยันการชำระเงิน</label>
            </div>
          </div>
      </fieldset>
          <br>

  <div class="form-horizontal">
  <fieldset>
      <!-- Text input-->
      <div class="form-group">
        <div class="col-md-3 control-label textwow" for="textinput">รหัสสมาชิก</div>
          <div class="col-md-5">
      <input id="" name="" type="text" placeholder="" class="form-control input-md"  value="{{Session::get('userData')->id}}" readonly>
  </div>
  </div>

  <div class="form-group">
      <div class="col-md-3 control-label textwow" for="textinput">Username</div>
          <div class="col-md-5">
      <input id="" name="" type="text" placeholder="" class="form-control input-md" value="{{Session::get('userData')->user_username}}" readonly>
  </div>
  </div>

  <div class="form-group">
       <div class="col-md-3 control-label textwow" for="textinput">ชื่อจริง-นามสกุล</div>
          <div class="col-md-5">
          <input id="" name="" type="text" placeholder="" class="form-control input-md" value="{{Session::get('userData')->user_fullname}}" readonly>
      </div>
  </div>
  <style media="screen">
  select {
text-align: center;
text-align-last: center;
/* webkit*/
}
option {
text-align: left;
/* reset to left*/
}
  </style>
  <div class="form-group">
       <div class="col-md-3 control-label textwow" for="textinput">อีเมล์</div>
          <div class="col-md-5">
      <input id="" name="" type="text" placeholder="" class="form-control input-md" value="{{Session::get('userData')->user_email}}" readonly>
  </div>
  </div>

  <div class="form-group">
       <div class="col-md-3 control-label textwow" for="textinput">เบอร์โทร</div>
          <div class="col-md-5">
      <input id="" name="" type="text" placeholder="" class="form-control input-md" value="{{Session::get('userData')->user_tell}}" readonly>
  </div>
  </div>
  {{Form::open(array('url'=> 'renew','files' => true))}}
  {{Form::hidden('id',$userData->id)}}
  <div class="form-group">
    <div class="col-md-3 control-label textwow" for="textinput">โอนเงินเพื่อทำการ</div>
      <div class="col-md-5">
          <select required id="type_renew" name="type_renew" class="form-control" style="text-align:center;">
          <option value="">--------- เลือก ---------</option>
          <option value="สมัคร Vip">สมัคร Vip</option>
        <option value="ต่ออายุ Vip">ต่ออายุ Vip</option>
        <option value="สมัคร ธรรมดา<">สมัคร ธรรมด</option>
        <option value="ต่ออายุ ธรรมดา">ต่ออายุ ธรรมดา</option>
      </select>
    </div>
  </div>

  <div class="form-group">
      <div class="col-md-3 control-label textwow" for="textinput">ธนาคารที่โอนเงิน</div>
          <div class="col-md-5">
              <select required id="bank" name="bank" class="form-control">
                <option value="">--------- เลือกธนาคาร ---------</option>
                <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
                <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
                <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
                <option value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา</option>
                <option value="ธนาคารเกียรตินาคิน">ธนาคารเกียรตินาคิน</option>
                <option value="ธนาคารซีไอเอ็มบีไทย">ธนาคารซีไอเอ็มบีไทย</option>
                <option value="ธนาคารทิสโก้">ธนาคารทิสโก้</option>
                <option value="ธนาคารยูโอบี">ธนาคารยูโอบี</option>
                <option value="ธนาคารสแตนดาร์ดชาร์เตอร์ด (ไทย)">ธนาคารสแตนดาร์ดชาร์เตอร์ด (ไทย)</option>
                <option value="ธนาคารไทยเครดิตเพื่อรายย่อย">ธนาคารไทยเครดิตเพื่อรายย่อย</option>
                <option value="ธนาคารแลนด์ แอนด์ เฮาส์">ธนาคารแลนด์ แอนด์ เฮาส์</option>
                <option value="ธนาคารไอซีบีซี (ไทย)">ธนาคารไอซีบีซี (ไทย)</option>
                <option value="ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร">ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร</option>
                <option value="ธนาคารอิสลามแห่งประเทศไทย">ธนาคารอิสลามแห่งประเทศไทย</option>
      </select>
    </div>
  </div>

  <div class="form-group">
      <div class="col-md-3 control-label textwow" for="textinput">จำนวนเงิน</div>
          <div class="col-md-5">
      <input required onkeypress="return check_number(this.value)" id="amout" name="money" type="text" placeholder="" class="form-control input-md">
  </div>
  </div>

@php
function DateThai($strDate)
{
  $strYear = date("Y",strtotime($strDate))+543;
  $strMonth= date("n",strtotime($strDate));
  $strDay= date("j",strtotime($strDate));
  $strHour= date("H",strtotime($strDate));
  $strMinute= date("i",strtotime($strDate));
  $strSeconds= date("s",strtotime($strDate));
  $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
  $strMonthThai=$strMonthCut[$strMonth];
  return "$strDay/$strMonth/$strYear";
  //return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
}
@endphp
  <div class="form-group">
  <div class="col-md-3 control-label textwow" for="textinput">วันที่ชำระ</div>
        <div class="col-md"></div>
      <div class="col-md-5">
  <input required id="date" name="date" type="text" placeholder="วัน/เดือน/ปี" class="form-control input-md" value="{{DateThai(Carbon::now())}}">
  </div>
  </div>


  <div class="form-group">
  <div class="col-md-3 control-label textwow" for="textinput">เลขสถานที่</div>
  <div class="col-md-5">
    <input required type="text" id="placeId" name="placeId" class="form-control">
  </div>
  <p class="col-md-4 control-label after textright" for="textinput"><a href="{{url('placeId')}}" target="_blank">ตัวอย่างเลขสถานที่</a></p>

  </div>


  <div class="form-group">
       <div class="col-md-3 control-label textwow" for="textinput">หลักฐานการโอนเงิน</div>
          <div class="col-md-4">
          <input required id="Transfer" name="Transfer" class="input-file" type="file">
      </div>
  </div>

  <div class="form-group">
  <label class="col-md-3 control-label" for="textinput"></label>
          <div class="col-md-5">
            <div class="g-recaptcha" data-sitekey="6Lc_NDQUAAAAABi_389s_pMtZJ-Euh3IirU5-LVD" data-callback="onSubmit"></div>
  </div>
  </div>

  </fieldset>
</div>
</div>
  </div>
  <br>
  <br>

  <div class="form-group">
  <label class="col-md-2 control-label" for="singlebutton"></label>
  <label class="col-md-3 control-label" for="singlebutton"></label>
  <div class="col-md-">
    {{ Form::submit('ส่งข้อมูล',array('class' => 'btn regisbot03 btn-inverse vovo1' ,
      'onclick' => '','id'=>'submit','disabled'=>'disabled'))}}
    {{Form::close()}}
  </div>
  </div>

       <div class="col-md-0 padding26 bgw">
       {{-- <div class="text44">* ข้อมมูลนี้จะไปขึ้นรายงานที่กระดาน Admin เพื่อรอการอนุมัติต่ออายุ</div> --}}

  </div>

  </div>




  </div>
  </div>
  </div>
  <script type="text/javascript">
  function onSubmit(token) {
    document.getElementById("submit").disabled = false;
  }
  function check_number(salary) {
  var vchar = String.fromCharCode(event.keyCode);
  if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
  salary.onKeyPress=vchar;

  }
  </script>
@endsection
