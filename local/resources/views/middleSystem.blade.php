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
          <div class="text012 magintop30">ระบบตัวกลางทั้งผู้ซื้อกับผู้ขาย</div>
      <div class="text012">บริการเว็บไซต์เป็นสื่อกลางกรณีสมาชิกยังไม่มั่นใจในผู้ซื้อและผู้ขายซึ่งปลอดภัยที่สุดกับทุกฝ่าย</div>

       <br>

      <div class="text121"><span style="color:red">ผู้ซื้อ  :</span>&nbsp;&nbsp;ทำการโอนเงินค่าสินค้าเข้ามาที่บัญชีแจ้งเข้ามาที่สำนักงาน</div>
      <div class="text121"><span style="color:red">สำนักงาน  :</span>&nbsp;&nbsp;แจ้งการโอนเงินให้กับผู้ขายว่ามียอดเงินเข้ามาแล้ว</div>
      <div class="text121"><span style="color:red">ผู้ขาย  :</span>&nbsp;&nbsp;ได้รับสินค้าแล้วก็ทำการแจ้งเข้ามาที่สำนักงาน</div>
      <div class="text121"><span style="color:red">ผู้ซื้อ  :</span>&nbsp;&nbsp;ทำการส่งสินค้าให้ผู้ซื้อแล้วแจ้งกลับเข้ามาที่สำนักงาน</div>
      <div class="text121"><span style="color:red">สำนักงาน  :</span>&nbsp;&nbsp;จะทำการโอนเงินของผู้ซื้อให้กับผู้ขายสินค้า</div>

          <br>
          <br>

      <fieldset>
      <!-- Multiple Radios (inline) -->
          <div class="form-group">
               <label class="col-md-4 control-label" for="radios"></label>
                  <div class="col-md-12">
                      <label class="radio-inline" for="radios-0">
                  <input type="radio" name="radios" id="radios-0" value="" checked="checked"><span style="color:red">บัญชีสำหรับโอนเงินระบบสื่อกลางชำระค่าโอนเงินมาด้วย 100 บาท</span></label>
              </div>
          </div>
      </fieldset>


   <br>
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
          <div class="td" style="width:20%">ธนาคารทหารไทย จำกัด (มหาชน)</div>
          <div class="td"style="width:20%"> อิมพีเรียลเวิลด์ สำโรง</div>
          <div class="td" style="width:20%">น.ส.อัจฉิมา เทียนอำไพ</div>
          <div class="td" style="width:20%">082-2-86518-4</div>
          <div class="td" style="width:20%">ทีเอ็มบี ออลล์ ฟรี</div>
      </div>

              </div></div>
</table>
</div>
          <br>

          <img class="img-responsive12 headp3" src="{{asset('assets/img/index/wed.png')}}">

          <br>

          <br>
          <br>

          <br>

      <div class="text122">* หมายเหตุ  หากผู้ขายไม่ส่งสินค้าทางเว็บไซต์จะรังับการใช้งานระบบทันทีและเงินจะโอนกลับผู้ซื้อภายใน 5 นาทีหลังการตรวจสอบ (โปรดตกลงกันให้แน่ชัดก่อนทำการซื้อ-ขาย)สอบถามการใช้บริการเว็บไซต์โทร.<span style="color:red; ">064-756-0642</span></div>
      <br>
      <br>

      </div>

  <br>
  <br>
  <br>
  <br>



  </div>

  </div>




  </div>
  </div>
@endsection
