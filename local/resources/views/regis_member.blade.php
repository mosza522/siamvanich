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
    {{Form::open(array('url' => 'user' ,'id' => 'form1','files' => true))}}
    @if(count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li> {{ $error }}</li>
          @endforeach
        </ul>
      </div>
  @endif
  <!-- Form Name -->
  <div class="topheadp3">1. ประเภทของสมาชิก</div>

  <!-- Multiple Checkboxes -->
  <div class="form-group">
    <div class="text02 textunderheadp3">คลิ๊กเพื่อเลือกประเภทสมาชิก</div>
      <div class="col-md-12">
          <div class="checkbox">
            <span style="padding-left:2em"></span>
            {{-- {{Form::radio('user_type','vip',array('id'=>'vip'))}} --}}
            <input required  type="radio" name="user_type"  value="vip" class="single-checkbox" id="check-member1">
            {{-- {{Form::checkbox('user_type','1',array('class' => 'single-checkbox'))}} --}}
            สมาชิก Vip (ค่าสมัครสมาชิกปีละ1,200 บาท) มีสิทธิพิเศษเต็มที่ ซึ่งผู้ที่จะสมัครสมาชิใหม่ หรืออัพเกรด
            จะต้องชำระค่าสมาชิก เป็นรายปี ๆ ละ 1,200 บาท
            <br><br>
            <span style="padding-left:2em"></span>
            {{-- {{Form::radio('user_type','normal',array('id'=>'normal'))}} --}}
            <input  required type="radio" name="user_type"  value="normal" class="single-checkbox" id="check-member2">
            {{-- {{Form::checkbox('user_type','2',array('class' => 'single-checkbox'))}} --}}
      สมาชิก ธรรมดา (อยู่ในการใช้งานฟรี) สามารถใช้ระบบได้ตามปกติในพื้นที่ ๆ จัดให้ สามารถแสดง
              ข้อความคิดเห็น เสนอ ซื้อ ขาย ได้ เฉพาะบางหน้ากระดานที่ทางเว็บไซต์จัดให้เฉพาะบางหน้ากระดานที่เว็บไซต์จัดให้

       <br>
      <br>
        <div class="topheadp3">2. ระบุข้อมูลของท่าน</div>
        <div class="form-horizontal">
  <fieldset>



  <!-- Text input-->
  <!--
  <div class="form-group">
    <label class=" col-md-12 control-label" for="textinput">* ชื่อ - นามสกุล :</label>
    <div class="col-md-6">
    <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md">

          <label class="col-md-12 control-label" for="textinput">กรอกชื่อ-นามสกุลจริง</label>
    </div>
  </div>
  -->
  <fieldset>


  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-3 control-label textbon" for="user_fullname">* ชื่อ - นามสกุล :</label>
      <label class="col-md- control-label textafter textafter03" for="user_fullname">กรอกชื่อ-นามสกุลจริง</label>
    <div class="col-md-4">
    <input required  id="user_fullname" name="user_fullname" type="text" placeholder="" class="form-control input-md">
    {{-- {{Form::text('user_fullname','',['class' => 'form-control input-md'])}} --}}
    </div>
  </div>

      <div class="form-horizontal">
  <fieldset>

  <!-- Multiple Checkboxes (inline) -->
  <div class="form-group">
    <label class="col-md-3 control-label">* เพศ</label>
    <div class="col-md-4">
      <label class="checkbox-inline" for="sex-0">
        {{-- {{Form::radio('user_sex','male')}} --}}
        <input required  type="radio" name="user_sex" id="sex-0" value="male">
        ชาย
      </label>
      <label class="checkbox-inline" for="sex-1">
        {{-- {{Form::radio('user_sex','female')}} --}}
        <input required type="radio" name="user_sex" id="sex-1" value="female">
        หญิง
      </label>
    </div>
  </div>



  </fieldset>
  </div>

  </fieldset>

      <fieldset>

  <!-- Select Basic -->
  <div class="form-group">
    <div class="col-md-3 control-label textbon" for="textinput">* วัน เดือน ปีเกิด :</div>
    <div class="col-md-2 col-sm-4 col-xs-3">
      <select required id="date" name="date" class="form-control" >
        <option value="">วัน</option>
      </select>
      {{-- {{Form::select('date', array('key' => 'value'), 'key', array('class' => 'form-control','id'=>'date'))}} --}}
    </div>
      <div class="col-md-2 col-sm-4 col-xs-5">
      <select required id="month" onchange="change_month(this.value)" name="month" class="form-control" >
          <option value="">เดือน</option>
      </select>
    </div>
      <div class="col-md-2 col-sm-4 col-xs-4">
      <select required id="years" name="years" class="form-control" >
          <option value="">ปี</option>
      </select>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-4">
    <label class="col-md- control-label textafter textafter03" for="textinput">อายุระหว่าง 20-70 ปี</label>
  </div>
  </div>
          <div class="form-group">
     <label class="col-md-3 control-label textbon" for="identity">* เลขที่บัตรประชาชน :</label>

    <div class="col-md-4">
      {{-- {{Form::text('identity','',array('onkeypress' =>'return check_number(this)',
      'maxlength'=>'13','class'=>'form-control input-md'))}} --}}
    <input required  id="identity" onkeypress="return check_number(this);" name="identity" type="text" placeholder="" maxlength="13" class="form-control input-md">

    </div>
    <div class="col-md-5" id="text_for_id"></div>
  </div>

       <div class="form-horizontal">
  <fieldset>

  <div class="form-horizontal">
  <fieldset>

  <!-- Textarea -->
  <div class="form-group">
    <label class="col-md-3 control-label" for="textarea"></label>
    <div class="col-md-4">
      <img class="img-responsive control-label marginimg02" src="{{asset('assets/img/index/card1.png')}}">

    </div>


  </div>

  </fieldset>
  </div>

  <!-- File Button -->
  <div class="form-group">
    <label class="col-md-3 control-label" for=""></label>
    <div class="col-md-4 chooseidcard">
      <input required  id="user_img_identity" name="user_img_identity" class="input-file form-control" type="file">
      {{-- {{Form::file('user_img_identity',array('id'=>'user_img_identity','class'=>'form-control input-file'))}} --}}
    </div>
  </div>

      <fieldset>
  <div class="form-group">
    <label class="col-md-3 control-label" for="textinput"></label>
    <div class="col-md-8">
    <span class="help-block oo">Upload รูปบัตรประชาชนที่เป็น “รูปสี” เท่านั่นหากไม่ปฏิบัติตามคุณอาจจะไม่ได้รับอนุมัติการใช้งาน  จาก Webmaster</span>
    </div>
  </div>

  </fieldset>
  </fieldset>
  </div>

  </fieldset>

      <div class="form-horizontal">
  <fieldset>

  <div class="form-horizontal">
  <fieldset>

  <div class="form-group">
    <label class="col-md-3 control-label" for="textarea"></label>
    <div class="col-md-4 homeimg">
          <img class="img-responsive control-label marginimg" src="{{asset('assets/img/index/card2.png')}}">
    </div>

  </div>

  </fieldset>
  </div>

  <!-- File Button -->
  <div class="form-group">
    <label class="col-md-3 control-label" for=""></label>
    <div class="col-md-4 mama1">
      <input required  id="user_img_account_home" name="user_img_account_home" class="input-file form-control" type="file">
      {{-- {{Form::file('user_img_account_home',array('id'=>'user_img_account_home','class'=>'form-control input-file'))}} --}}

    </div>
  </div>

      <fieldset>
  <div class="form-group">
    <label class="col-md-3 control-label" for="textinput"></label>

    <div class="col-md-8">
    <span class="help-block oo2">Upload รูปภาพสำเนาทะเบียนบ้านที่มีข้อมูลครบถ้วนเลขที่บ้านและหน้าผู้สมัครหากไม่ปฏิบัติตามคุณอาจะไม่ได้รับอนุมัติการเข้าใช้</span>
    </div>
  </div>

  </fieldset>
  </fieldset>
  </div>

  </fieldset>
            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="user_address">* ที่อยู่ :</label>
              <div class="col-md-6">
              {{-- <input required  id="user_address" name="user_address" type="text" placeholder="" class="form-control input-md"> --}}
              <textarea name="user_address" id="user_address" rows="3" cols="80" class="form-control"></textarea>
              {{-- {{Form::text('user_address','',array('id'=>'user_address','class'=>'form-control input-md'))}} --}}
              </div>
            </div>
                      <div class="form-group">
              <label class="col-md-3 control-label" for="user_province">* จังหวัด :</label>
              <div class="col-md-4">
                {{-- {{Form::select('name', array('' => '--------- เลือกจังหวัด ---------'
,'กรุงเทพมหานคร'=>'กรุงเทพมหานคร','กระบี่'=>'กระบี่','กาญจนบุรี'=>'กาญจนบุรี','กาญจนบุรี'=>'กาญจนบุรี'
,'ขอนแก่น'=>'ขอนแก่น','จันทบุรี'=>'จันทบุรี','ฉะเชิงเทรา'=>'ฉะเชิงเทรา','ชัยนาท'=>'ชัยนาท','ชัยภูมิ'=>'ชัยภูมิ'
,'ชุมพร'=>'ชุมพร','ชลบุรี'=>'ชลบุรี','เชียงใหม่'=>'เชียงใหม่','เชียงราย'=>'เชียงราย','ตรัง'=>'ตรัง','ตราด'=>'ตราด'
,'ตาก'=>'ตาก','นครนายก'=>'นครนายก','นครปฐม'=>'นครปฐม','นครพนม'=>'นครพนม','นครราชสีมา'=>'นครราชสีมา'
,'นครศรีธรรมราช'=>'นครศรีธรรมราช','นครสวรรค์'=>'นครสวรรค์','นราธิวาส'=>'นราธิวาส','น่าน'=>'น่าน'
,'นนทบุรี'=>'นนทบุรี','บึงกาฬ'=>'บึงกาฬ','บุรีรัมย์'=>'บุรีรัมย์','ประจวบคีรีขันธ์'=>'ประจวบคีรีขันธ์'
,'ปทุมธานี'=>'ปทุมธานี','ปราจีนบุรี'=>'ปราจีนบุรี','ปัตตานี'=>'ปัตตานี','พะเยา'=>'พะเยา',
'พระนครศรีอยุธยา'=>'พระนครศรีอยุธยา','พังงา'=>'พังงา','พิจิตร'=>'พิจิตร','พิษณุโลก'=>'พิษณุโลก'
,'เพชรบุรี'=>'เพชรบุรี','เพชรบูรณ์'=>'เพชรบูรณ์','แพร่'=>'แพร่','พัทลุง'=>'พัทลุง','ภูเก็ต'=>'ภูเก็ต'
,'มหาสารคาม'=>'มหาสารคาม','มุกดาหาร'=>'มุกดาหาร','แม่ฮ่องสอน'=>'แม่ฮ่องสอน','ยโสธร'=>'ยโสธร'
,'ยะลา'=>'ยะลา','ร้อยเอ็ด'=>'ร้อยเอ็ด','ระนอง'=>'ระนอง','ระยอง'=>'ระยอง','ราชบุรี'=>'ราชบุรี','ลพบุรี'=>'ลพบุรี'
,'ลำปาง'=>'ลำปาง','ลำพูน'=>'ลำพูน','เลย'=>'เลย','ศรีสะเกษ'=>'ศรีสะเกษ','สกลนคร'=>'สกลนคร','สงขลา'=>'สงขลา'
,'สมุทรสาคร'=>'สมุทรสาคร','สมุทรปราการ'=>'สมุทรปราการ','สมุทรสงคราม'=>'สมุทรสงคราม','สระแก้ว'=>'สระแก้ว','สระบุรี'=>'สระบุรี','สิงห์บุรี'=>'สิงห์บุรี'
,'สุโขทัย'=>'สุโขทัย','สุพรรณบุรี'=>'สุพรรณบุรี','สุราษฎร์ธานี'=>'สุราษฎร์ธานี','สุรินทร์'=>'สุรินทร์','สตูล'=>'สตูล','หนองคาย'=>'หนองคาย'
,'หนองบัวลำภู'=>'หนองบัวลำภู','อำนาจเจริญ'=>'อำนาจเจริญ','อุดรธานี'=>'อุดรธานี','อุตรดิตถ์'=>'อุตรดิตถ์','อุทัยธานี'=>'อุทัยธานี'
,'อุบลราชธานี'=>'อุบลราชธานี','อ่างทอง'=>'อ่างทอง'), '', array('class' => 'form-control','id' =>'user_province'))}} --}}
                <select required id="user_province" name="user_province" class="form-control user_province">
                  <option value="" selected>--------- เลือกจังหวัด ---------</option>
                  <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                  <option value="กระบี่">กระบี่ </option>
                  <option value="กาญจนบุรี">กาญจนบุรี </option>
                  <option value="กาฬสินธุ์">กาญจนบุรี </option>
                  <option value="กำแพงเพชร">กำแพงเพชร </option>
                  <option value="ขอนแก่น">ขอนแก่น</option>
                  <option value="จันทบุรี">จันทบุรี</option>
                  <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
                  <option value="ชัยนาท">ชัยนาท </option>
                  <option value="ชัยภูมิ">ชัยภูมิ </option>
                  <option value="ชุมพร">ชุมพร </option>
                  <option value="ชลบุรี">ชลบุรี </option>
                  <option value="เชียงใหม่">เชียงใหม่ </option>
                  <option value="เชียงราย">เชียงราย </option>
                  <option value="ตรัง">ตรัง </option>
                  <option value="ตราด">ตราด </option>
                  <option value="ตาก">ตาก </option>
                  <option value="นครนายก">นครนายก </option>
                  <option value="นครปฐม">นครปฐม </option>
                  <option value="นครพนม">นครพนม </option>
                  <option value="นครราชสีมา">นครราชสีมา </option>
                  <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
                  <option value="นครสวรรค์">นครสวรรค์ </option>
                  <option value="นราธิวาส">นราธิวาส </option>
                  <option value="น่าน">น่าน </option>
                  <option value="นนทบุรี">นนทบุรี </option>
                  <option value="บึงกาฬ">บึงกาฬ</option>
                  <option value="บุรีรัมย์">บุรีรัมย์</option>
                  <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
                  <option value="ปทุมธานี">ปทุมธานี </option>
                  <option value="ปราจีนบุรี">ปราจีนบุรี </option>
                  <option value="ปัตตานี">ปัตตานี </option>
                  <option value="พะเยา">พะเยา </option>
                  <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
                  <option value="พังงา">พังงา </option>
                  <option value="พิจิตร">พิจิตร </option>
                  <option value="พิษณุโลก">พิษณุโลก </option>
                  <option value="เพชรบุรี">เพชรบุรี </option>
                  <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
                  <option value="แพร่">แพร่ </option>
                  <option value="พัทลุง">พัทลุง </option>
                  <option value="ภูเก็ต">ภูเก็ต </option>
                  <option value="มหาสารคาม">มหาสารคาม </option>
                  <option value="มุกดาหาร">มุกดาหาร </option>
                  <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
                  <option value="ยโสธร">ยโสธร </option>
                  <option value="ยะลา">ยะลา </option>
                  <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
                  <option value="ระนอง">ระนอง </option>
                  <option value="ระยอง">ระยอง </option>
                  <option value="ราชบุรี">ราชบุรี</option>
                  <option value="ลพบุรี">ลพบุรี </option>
                  <option value="ลำปาง">ลำปาง </option>
                  <option value="ลำพูน">ลำพูน </option>
                  <option value="เลย">เลย </option>
                  <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                  <option value="สกลนคร">สกลนคร</option>
                  <option value="สงขลา">สงขลา </option>
                  <option value="สมุทรสาคร">สมุทรสาคร </option>
                  <option value="สมุทรปราการ">สมุทรปราการ </option>
                  <option value="สมุทรสงคราม">สมุทรสงคราม </option>
                  <option value="สระแก้ว">สระแก้ว </option>
                  <option value="สระบุรี">สระบุรี </option>
                  <option value="สิงห์บุรี">สิงห์บุรี </option>
                  <option value="สุโขทัย">สุโขทัย </option>
                  <option value="สุพรรณบุรี">สุพรรณบุรี </option>
                  <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
                  <option value="สุรินทร์">สุรินทร์ </option>
                  <option value="สตูล">สตูล </option>
                  <option value="หนองคาย">หนองคาย </option>
                  <option value="หนองบัวลำภู">หนองบัวลำภู </option>
                  <option value="อำนาจเจริญ">อำนาจเจริญ </option>
                  <option value="อุดรธานี">อุดรธานี </option>
                  <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
                  <option value="อุทัยธานี">อุทัยธานี </option>
                  <option value="อุบลราชธานี">อุบลราชธานี</option>
                  <option value="อ่างทอง">อ่างทอง </option>
              </select>
              </div>
            </div>
            <div class="form-group">
    <label class="col-md-3 control-label textbon" for="user_zipcode">* รหัสไปรษณีย์ :</label>
    <div class="col-md-4">
    <input required id="user_zipcode" name="user_zipcode" onkeypress="return check_number(this);" type="text" placeholder="" class="form-control input-md">
    </div>
  </div>
         <!-- Text input-->
  <div class="form-group">
    <label class="col-md-3 control-label textbon" for="user_tell">* เบอร์โทรติดต่อ :</label>
      <div class="col-md-4">
    <input required id="user_tell" name="user_tell" onkeypress="return check_number(this);" type="text" placeholder="" class="form-control input-md">
    </div>
      <label class="col-md- control-label textafter textafter03 textright" for="user_tell">เบอร์โทรบ้านหรือมือถือ</label>

  </div>
            <div class="form-horizontal">
  <fieldset>
  <!-- Select Basic -->
  <div class="form-group">
    <label class="col-md-3 control-label" for="user_bank_name">* ชื่อธนาคาร :</label>
    <div class="col-md-4">
      <select required id="user_bank_name" name="user_bank_name" class="form-control user_bank_name">
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
  </fieldset>
  </div>
            <div class="form-group">
    <label class="col-md-3 control-label textbon" for="user_account">* หมายเลขบัญชี :</label>
    <div class="col-md-4">
    <input required id="user_account" onkeypress="return check_number(this);" name="user_account" type="text" placeholder="" class="form-control input-md">
    </div>
  </div>
            <div class="form-group">
    <label class="col-md-3 control-label textbon" for="user_account_name">* ชื่อบัญชี :</label>
                 <div class="col-md-4">
    <input required id="user_account_name" name="user_account_name" type="text" placeholder="" class="form-control input-md">
    </div>
     <label class="col-md- control-label textafter textafter03 textright" for="textinput">ต้องใช้ชื่อบัญชีที่ตรงกับเลขบัตรประชาชน</label>
  </div>

         <div class="form-horizontal">
  <fieldset>
  <!-- Select Basic -->
  <div class="form-group">
    <div class="col-md-3 control-label textbon" for="user_account_type">* ประเภทบัญชี :</div>
        <div class="col-md-4">
          <select required id="user_account_type" name="user_account_type" class="form-control">
            <option value="">-------เลือกประเภทบัญชี-------</option>
            <option value="ออมทรัพย์">ออมทรัพย์</option>
            <option value="เงินฝากประจำ">เงินฝากประจำ</option>
          </select>
    </div>
      <label class="col-md- control-label textafter textafter03 textright" for="textinput">ออมทรัพย์</label>

  </div>
  </fieldset>
  </div>
          <div class="form-group">
    <div class="col-md-3 control-label textbon" for="user_account_branch">* สาขา :</div>
    <div class="col-md-4">
    <input required id="user_account_branch" name="user_account_branch" type="user_account_branch" placeholder="" class="form-control input-md">
    </div>
  </div>
            <fieldset>
  <!-- Select Basic -->
  <div class="form-group">
    <div class="col-md-3 control-label textbon" for="user_account_province">* จังหวัด :</div>
    <div class="col-md-4">
      <select required id="user_account_province" name="user_account_province" class="form-control user_account_province">
        <option value="" selected>--------- เลือกจังหวัด ---------</option>
        <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
        <option value="กระบี่">กระบี่ </option>
        <option value="กาญจนบุรี">กาญจนบุรี </option>
        <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
        <option value="กำแพงเพชร">กำแพงเพชร </option>
        <option value="ขอนแก่น">ขอนแก่น</option>
        <option value="จันทบุรี">จันทบุรี</option>
        <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
        <option value="ชัยนาท">ชัยนาท </option>
        <option value="ชัยภูมิ">ชัยภูมิ </option>
        <option value="ชุมพร">ชุมพร </option>
        <option value="ชลบุรี">ชลบุรี </option>
        <option value="เชียงใหม่">เชียงใหม่ </option>
        <option value="เชียงราย">เชียงราย </option>
        <option value="ตรัง">ตรัง </option>
        <option value="ตราด">ตราด </option>
        <option value="ตาก">ตาก </option>
        <option value="นครนายก">นครนายก </option>
        <option value="นครปฐม">นครปฐม </option>
        <option value="นครพนม">นครพนม </option>
        <option value="นครราชสีมา">นครราชสีมา </option>
        <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
        <option value="นครสวรรค์">นครสวรรค์ </option>
        <option value="นราธิวาส">นราธิวาส </option>
        <option value="น่าน">น่าน </option>
        <option value="นนทบุรี">นนทบุรี </option>
        <option value="บึงกาฬ">บึงกาฬ</option>
        <option value="บุรีรัมย์">บุรีรัมย์</option>
        <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
        <option value="ปทุมธานี">ปทุมธานี </option>
        <option value="ปราจีนบุรี">ปราจีนบุรี </option>
        <option value="ปัตตานี">ปัตตานี </option>
        <option value="พะเยา">พะเยา </option>
        <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
        <option value="พังงา">พังงา </option>
        <option value="พิจิตร">พิจิตร </option>
        <option value="พิษณุโลก">พิษณุโลก </option>
        <option value="เพชรบุรี">เพชรบุรี </option>
        <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
        <option value="แพร่">แพร่ </option>
        <option value="พัทลุง">พัทลุง </option>
        <option value="ภูเก็ต">ภูเก็ต </option>
        <option value="มหาสารคาม">มหาสารคาม </option>
        <option value="มุกดาหาร">มุกดาหาร </option>
        <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
        <option value="ยโสธร">ยโสธร </option>
        <option value="ยะลา">ยะลา </option>
        <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
        <option value="ระนอง">ระนอง </option>
        <option value="ระยอง">ระยอง </option>
        <option value="ราชบุรี">ราชบุรี</option>
        <option value="ลพบุรี">ลพบุรี </option>
        <option value="ลำปาง">ลำปาง </option>
        <option value="ลำพูน">ลำพูน </option>
        <option value="เลย">เลย </option>
        <option value="ศรีสะเกษ">ศรีสะเกษ</option>
        <option value="สกลนคร">สกลนคร</option>
        <option value="สงขลา">สงขลา </option>
        <option value="สมุทรสาคร">สมุทรสาคร </option>
        <option value="สมุทรปราการ">สมุทรปราการ </option>
        <option value="สมุทรสงคราม">สมุทรสงคราม </option>
        <option value="สระแก้ว">สระแก้ว </option>
        <option value="สระบุรี">สระบุรี </option>
        <option value="สิงห์บุรี">สิงห์บุรี </option>
        <option value="สุโขทัย">สุโขทัย </option>
        <option value="สุพรรณบุรี">สุพรรณบุรี </option>
        <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
        <option value="สุรินทร์">สุรินทร์ </option>
        <option value="สตูล">สตูล </option>
        <option value="หนองคาย">หนองคาย </option>
        <option value="หนองบัวลำภู">หนองบัวลำภู </option>
        <option value="อำนาจเจริญ">อำนาจเจริญ </option>
        <option value="อุดรธานี">อุดรธานี </option>
        <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
        <option value="อุทัยธานี">อุทัยธานี </option>
        <option value="อุบลราชธานี">อุบลราชธานี</option>
        <option value="อ่างทอง">อ่างทอง </option>
        <option value="อื่นๆ">อื่นๆ</option>
  </select>
    </div>
  </div>
  </fieldset>

  <div class="form-group">
    <div class="col-md-3 control-label textbon" for="user_email">* อีเมล์ :</div>
    <div class="col-md-4">
    <input required id="user_email" name="user_email" type="text" placeholder="" class="form-control input-md">
    </div>
  </div>
            <div class="form-group">
    <div class="col-md-3 control-label textbon" for="confirm_user_email">* ยืนยันอีเมล์ :</div>
    <div class="col-md-4">
    <input required onPaste="return false" id="confirm_user_email" name="confirm_user_email" type="text" placeholder="" class="form-control input-md">
    </div>
    <div class="col-md-5" id="text_for_email"></div>
  </div>
        <fieldset>
  <div class="form-group">
    <label class="col-md-3 control-label" for="textinput"></label>
    <div class="col-md-8">
    <span class="help-block text50">ถ้าหากท่านไม่มีอีเมล์กรุณาสมัครได้ที่ www.hotmail.com หรือ www.gmail.com </span>
    </div>
  </div>

  </fieldset>
            <!-- Text input-->
  <div class="form-group">
      <div class="col-md-3 control-label textbon" for="user_username">* Username :</div>
       <div class="col-md-4">

    <input required id="user_username" maxlength="18" name="user_username" type="text" placeholder="" class="form-control input-md">
    </div>
    <div class="col-md-2">
       <button class="btn btn-default chakebox" onclick="return check_name()" type="button">ตรวจสอบชื่อว่าง</button>
       </div>
       <div class="col-md-3" id="after_check"></div>

  </div>

  <!-- Button (Double) -->
  <div class="form-group">
    <label class="col-md-4 control-label" for=""></label>
  </div>
         <fieldset>
  <div class="form-group">
    <label class="col-md-3 control-label" for="textinput"></label>
    <div class="col-md-8">
    <span class="help-block text51" id="text_username">ชื่อ Username ต้องมีอย่างน้อย 7 ตัวอักษรแต่ไม่เกิน 18 ตัวอักษรห้ามมีช่องว่างหรือ อักษรพิเศษและไม่สามารถแก้ไขได้ ถ้าได้กดปุ่มสมัครสมาชิกไปแล้ว</span>
    </div>
  </div>
  </fieldset>
            <div class="form-group">
    <div class="col-md-3 control-label textbon" for="user_password">* Password :</div>
    <div class="col-md-4">
    <input required id="user_password" name="user_password" onkeypress="testPassword(this.value)" type="password" placeholder="" class="form-control input-md">
    </div>
    <div class="col-md-5">
      <i class="fa fa-eye" id="eye"></i>
      <SPAN id="valid_password1"></SPAN>ความปลอดภัยของรหัสผ่าน:
      <DIV id="borderprogress" style="BORDER-RIGHT: #cccccc 2px solid; PADDING-RIGHT: 0px; BORDER-TOP: #cccccc 1px solid; PADDING-LEFT: 0px; FONT-SIZE: 5px; PADDING-BOTTOM: 0px; MARGIN: 1px; BORDER-LEFT: #cccccc 1px solid; WIDTH: 242px; PADDING-TOP: 0px; BORDER-BOTTOM: #cccccc 1px solid">
      <DIV id="strengprogress" style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; FONT-SIZE: 5px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px"></DIV></DIV>
      <SPAN id="verdict">รหัสผ่านที่ปลอดภัยมากส่วนใหญ่จะมีความยาว 7-16 ตัวอักษร</SPAN></DIV>
    </div>
  </div>
            <div class="form-group">
    <div class="col-md-3 control-label textbon" for="confirm_user_password">* ยืนยัน Password :</div>
    <div class="col-md-4">
    <input required id="confirm_user_password"  name="confirm_user_password" type="password" placeholder="" class="form-control input-md">
    </div>
    <div class="col-md-5" >
      <span id="text_for_password"></span>
    </div>
  </div>
  <div class="form-group">
<div class="col-md-3 control-label textbon">Captcha :</div>
<div class="col-md-9 g-recaptcha" data-sitekey="6Lc_NDQUAAAAABi_389s_pMtZJ-Euh3IirU5-LVD" data-callback="onSubmit"></div>

</div>






            <div class="form-horizontal">
  <fieldset>
  <!-- Button -->
  <div class="form-group page3botbut">
    <div class="col-md-5 col-xs-5 samak">
    <div class="control-label" for="singlebutton">
      {{ Form::submit('สมัครสมาชิก',array('class' => 'btn regisbot03 btn-inverse vovo1' ,
        'onclick' => 'return check_all()','id'=>'submit','disabled'=>'disabled'))}}
      {{Form::close()}}
      {{-- <button id="singlebutton" name="singlebutton" class="btn regisbot03 btn-inverse vovo1">สมัครสมาชิก</button> --}}
      </div></div>
    <div class="col-md-5 col-xs-5">
      {{Html::link('regis','ยกเลิก',array(
        'class' => 'btn canclebot04 btn-inverse canclebot  '
      ))}}
      {{-- <button id="singlebutton" name="singlebutton" class="btn canclebot04 btn-inverse canclebot  ">ยกเลิก</button> --}}
    </div>
  </div>
  </fieldset>

  </div>

  </div>



      </div>
    </div>
  </div>

  </fieldset>
  </div>








      </div>

      </div>



           <div class="col-md-2 ">

      </div>

      </div>
      </div>
      </div>



  <script>
  // $(document).ready(function(){
  //
  //     $('#check_name').click(function(){
  //       $.ajax({
  //         type: "POST",
  //         url: "local/resources/views/check_name.php",
  //         data:{user_username:$('#user_username').val()},
  //         dataType: "html",
  //         success: function (data) {
  //           alert(data);
  //         },
  //         error: function (data) {
  //             console.log('Error:', data);
  //         }
  //     });
  //   });
  //
  // });
  function check_email(){
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if(document.getElementById("user_email").value==""){
    document.getElementById('text_for_email').innerHTML="กรุณากรอกอีเมล";
    document.getElementById("text_for_email").style.color = "red";
    document.getElementById('user_email').focus();
    return false;
  }
  if (!(document.getElementById("user_email").value.match(mailformat)))
  {
    document.getElementById('text_for_email').innerHTML="รูปแบบ Email ไม่ถูกต้อง";
    document.getElementById("text_for_email").style.color = "red";
    document.getElementById('user_email').focus();
    return false;
  }
  }

  function check_all() {
    if(document.getElementById('identity').value.length<13){
      document.getElementById('identity').focus();
      document.getElementById('text_for_id').innerHTML="กรุณากรอกเลขบัตรประชาชนให้ครบ 13 หลัก";
      document.getElementById('text_for_id').style.color="red";
      return false;
    }else{
      document.getElementById('text_for_id').innerHTML="";
    }
    if(check_email()==false){
      return false;
    }
    else if(!(document.getElementById('text_for_email').innerHTML=="Email ตรงกัน")){
      document.getElementById('text_for_email').innerHTML="กรุณากรอกอีเมลให้ตรงกัน";
      document.getElementById("text_for_email").style.color = "red";
      return false;
    }
    else if(document.getElementById('after_check').innerHTML!="สามารถใช้ได้"){
      document.getElementById('user_username').focus();
      document.getElementById('after_check').innerHTML="กรุณาตรวจสอบ Username";
      document.getElementById('after_check').style.color="red";
      return false;
    }
    else if(document.getElementById('text_for_password').innerHTML!="Password ตรงกัน"){
      document.getElementById('user_password').focus();
      document.getElementById('text_for_password').innerHTML="กรุณากรอก Password ให้ถูกต้อง";
      document.getElementById('text_for_password').style.color="red";
      return false;
    }

  //   if(document.getElementById('text_for_email').innerHTML=="Email ตรงกัน"){
  //     return true;
  //   }else{
  //     document.getElementById('text_for_email').innerHTML="กรุณากรอกอีเมลให้ตรงกัน";
  //     document.getElementById("text_for_email").style.color = "red";
  //     return false;
  //   }
  // if(document.getElementById('user_username').value==""){
    // document.getElementById('user_username').focus();
    // document.getElementById('after_check').innerHTML="กรุณาตรวจสอบ Username";
    // document.getElementById('after_check').style.color="red";
    // return false;
  // }else{
  //   return true;
  // }

  }
  function onSubmit(token) {
    document.getElementById("submit").disabled = false;
  }
    $(document).ready(function() {
  $('#user_username').on('keyup', function () {
  $('#after_check').html('');
  });
    });
  $('#confirm_user_password').on('keyup', function () {

  if ($('#confirm_user_password').val() == $('#user_password').val()&& ($('#confirm_user_password').val()!="" && $('#user_password').val()!="")) {
  $('#text_for_password').html('Password ตรงกัน').css('color', 'green');
  } else
  $('#text_for_password').html('Password ไม่ตรงกัน').css('color', 'red');

  });
  $('#user_password').on('keyup', function () {

  if ($('#confirm_user_password').val() == $('#user_password').val()&& ($('#confirm_user_password').val()!="" && $('#user_password').val()!="")) {
  $('#text_for_password').html('Password ตรงกัน').css('color', 'green');
  } else
  $('#text_for_password').html('Password ไม่ตรงกัน').css('color', 'red');

  });
  $('#confirm_user_email').on('keyup', function () {

  if ($('#confirm_user_email').val() == $('#user_email').val() && ($('#confirm_user_email').val()!="" && $('#user_email').val()!="")) {
  $('#text_for_email').html('Email ตรงกัน').css('color', 'green');
  } else
  $('#text_for_email').html('Email ไม่ตรงกัน').css('color', 'red');

  });
  $('#user_email').on('keyup', function () {

  if ($('#confirm_user_email').val() == $('#user_email').val() && ($('#confirm_user_email').val()!="" && $('#user_email').val()!="")) {
  $('#text_for_email').html('Email ตรงกัน').css('color', 'green');
  } else
  $('#text_for_email').html('Email ไม่ตรงกัน').css('color', 'red');

  });
  $(document).ready(function() {
  $('#user_province').select2();
  $('#user_bank_name').select2();
  $('#user_account_province').select2();
  });

  var limit = 1;
  $('input.single-checkbox').on('change', function(evt) {
  if($(this).siblings(':checked').length >= limit) {
     this.checked = false;
  }
  });
  $('#user_username').keypress(function (e) {
        var regex =/^[a-zA-Z0-9]+$/;
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
          return true;
        }
        else {
          e.preventDefault();
          return false;
        }
      });
  function check_number(salary) {
  var vchar = String.fromCharCode(event.keyCode);
  if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
  salary.onKeyPress=vchar;

  }
  var date=31;
  date_select(document.getElementById('date'));
  function date_select(selector)
  {
  selector.options[0] = new Option("วัน","");
  var i;
  var date_2="";
  for (i=1;i<=date;i++){
    if(i<10){
      date_2="0"+i;
    }else{
      date_2=i;
    }
    selector.options[i] = new Option(date_2,date_2);
  }
  }

  month_select(document.getElementById('month'));
  function month_select(selector)
  {
  selector.options[0] = new Option("เดือน","");
  var i;
  var mounth="0";
  for (i=1;i<=12;i++){
    switch(i) {
  case 1:
  if(i<10)mounth+i;
  else mounth=i;
      selector.options[i] = new Option("มกราคม",i);
      break;
  case 2:
  if(i<10)mounth+i;
  else mounth=i;
      selector.options[i] = new Option("กุมภาพันธ์",i);
      break;
  case 3:
  if(i<10)mounth+i;
  else mounth=i;
      selector.options[i] = new Option("มีนาคม",i);
      break;
  case 4:
  if(i<10)mounth+i;
  else mounth=i;
      selector.options[i] = new Option("เมษายน",i);
      break;
  case 5:
  if(i<10)mounth+i;
  else mounth=i;
      selector.options[i] = new Option("พฤษภาคม",i);
      break;
  case 6:
  if(i<10)mounth+i;
  else mounth=i;
      selector.options[i] = new Option("มิถุนายน",i);
      break;
  case 7:
  if(i<10)mounth+i;
  else mounth=i;
    selector.options[i] = new Option("กรกฏาคม",i);
      break;
  case 8:
  if(i<10)mounth+i;
  else mounth=i;
      selector.options[i] = new Option("สิงหาคม",i);
      break;
  case 9:
  if(i<10)mounth+i;
  else mounth=i;
      selector.options[i] = new Option("กันยายน",i);
    break;
  case 10:
  if(i<10)mounth+i;
  else mounth=i;
      selector.options[i] = new Option("ตุลาคม",i);
      break;
  case 11:
      selector.options[i] = new Option("พฤษจิกายน",i);
      break;
  case 12:
      selector.options[i] = new Option("ธันวาคม",i);
      break;
    }
  }
  }
  $(document).ready(function () {
  $("#month").change(function () {
      var val = $(this).val();
      var i;
      var date_string;
      var date="";

      if (val == "1" || val=="3" || val=="5" || val=="7" || val=="8" || val=="10" || val=="12") {
        date_string="<option value=''>วัน</option>";
        for (var i = 1; i <= 31; i++) {
          if(i<10){
            date="0"+i;
          }else{
            date=i;
          }
          date_string+="<option value='"+date+"'>"+date+"</option>";
        }
      } else if (val == "2") {
        date_string="<option value=''>วัน</option>";
        for (var i = 1; i <= 28; i++) {
          if(i<10){
            date="0"+i;
          }else{
            date=i;
          }
          date_string+="<option value='"+date+"'>"+date+"</option>";
        }
      }
      else if (val == "4"|| val=="6" || val=="9" || val=="11") {
        date_string="<option value=''>วัน</option>";
        for (var i = 1; i <= 30; i++) {
          if(i<10){
            date="0"+i;
          }else{
            date=i;
          }
          date_string+="<option value='"+date+"'>"+date+"</option>";
        }
      }
      $("#date").html(date_string);
  });
  });
  years_select(document.getElementById('years'));
  function years_select(selector)
  {
  var d = new Date();
  var n = d.getFullYear();
  selector.options[0] = new Option("ปี","");
  var i;
  for (i=1;i<=51;i++){
    var new_year=parseInt(n)-19;
    new_year=new_year-i;
    selector.options[i] = new Option(new_year,new_year);

  }
  }
  $(document).ready(function () {
  $("#years").change(function () {
      var val = $(this).val();
      if(val%4==0 && document.getElementById('month').value=="2"){
        date_string="<option value=''>วัน</option>";
        for (var i = 1; i <= 29; i++) {
          date_string+="<option value='"+i+"'>"+i+"</option>";
        }
        $("#date").html(date_string);
      }
  });
  });
  function check_name() {
  if(document.getElementById('user_username').value.length >=7 && document.getElementById('user_username').value.length <=18){
  $.ajax({
    url: "local/resources/views/check_name.php",
    type: "POST",
    data:{user_username:document.getElementById('user_username').value},
    dataType: "html",
    success: function(response) {
      if(response=="pass"){
        document.getElementById('after_check').innerHTML="สามารถใช้ได้";
        document.getElementById('after_check').style.color="green";
        return true;
      }else{
        document.getElementById('after_check').innerHTML="มี Username นี้แล้ว";
        document.getElementById('after_check').style.color="red";
        return false;
      }
    }
  });
  document.getElementById('text_username').style.color = '';
  return true;
  }else{
  document.getElementById('after_check').innerHTML="";
  document.getElementById('text_username').style.color = 'red';
  return false;
  }
  }

  </script>
  <script>
  function testPassword(passwd)
  {
  var intPassWd = 0
  var strVerdict = "weak"
  var strLog = ""
  // PASSWORD LENGTH
  if (passwd.length<1) // ความยาวของรหัสผ่าน
  {
  intPassWd = (intPassWd+0)
  strLog = strLog + "1 คะแนนสำหรับความยาวนี้ (" + passwd.length + ")\n"
  }else if (passwd.length>1 && passwd.length<5) // ความยาวของรหัสผ่านระหว่าง 2 - 5
  {
  intPassWd = (intPassWd+1)
  strLog = strLog + "3 คะแนนสำหรับความยาวนี้ (" + passwd.length + ")\n"
  }
  else if (passwd.length>4 && passwd.length<8) // ความยาวของรหัสผ่านระหว่าง 5 - 7
  {
  intPassWd = (intPassWd+2)
  strLog = strLog + "3 คะแนนสำหรับความยาวนี้ (" + passwd.length + ")\n"
  }
  else if (passwd.length>7 && passwd.length<16)// ความยาวของรหัสผ่านระหว่าง 8 - 15
  {
  intPassWd = (intPassWd+5)
  strLog = strLog + "6 คะแนนสำหรับความยาวนี้ (" + passwd.length + ")\n"
  }
  else if (passwd.length>15) // ความยาวของรหัสผ่านมากว่า 16
  {
  intPassWd = (intPassWd+8)
  strLog = strLog + "9 คะแนนสำหรับความยาวนี้ (" + passwd.length + ")\n"
  }
  // ให้คะแนนความปลอดภัยเพิ่มเติม
  if (passwd.match(/[a-z]/)) //ถ้ามี a-z
  {
  intPassWd = (intPassWd+1)
  strLog = strLog + "1 คะแนนสำหรับเงื่่อนไขนี้\n"
  }
  if (passwd.match(/[A-Z]/)) //ถ้ามี A-Z
  {
  intPassWd = (intPassWd+1)
  strLog = strLog + "1 คะแนนสำหรับเงื่่อนไขนี้\n"
  }
  // NUMBERS
  if (passwd.match(/\d+/)) // ถ้ามีตัวเลข
  {
  intPassWd = (intPassWd+1)
  strLog = strLog + "5 คะแนนสำหรับเงื่่อนไขนี้\n"
  }
  if (passwd.match(/(.*[0-9].*[0-9].*[0-9])/)) // ถ้ามีตัวเลข ต่อท้าย 3 ตัว
  {
  intPassWd = (intPassWd+3)
  strLog = strLog + "3 คะแนนสำหรับเงื่่อนไขนี้\n"
  }
  // SPECIAL CHAR
  if (passwd.match(/.[!,@,#,$,%,^,&,*,?,_,~]/)) // ถ้ามีตัวอักษรพิเศษ 1 ตัว
  {
  intPassWd = (intPassWd+4)
  strLog = strLog + "5 คะแนนสำหรับเงื่่อนไขนี้\n"
  }
  // [verified] at least two special characters
  if (passwd.match(/(.*[!,@,#,$,%,^,&,*,?,_,~].*[!,@,#,$,%,^,&,*,?,_,~])/))
  {
  intPassWd = (intPassWd+4)
  strLog = strLog + "5 คะแนนสำหรับเงื่่อนไขนี้\n"
  }


  // COMBOS
  if (passwd.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) // ถ้ามีตัวอักษรตัวเล็กตัวใหญ่สลับกัน
  {
  intPassWd = (intPassWd+5)
  strLog = strLog + "3 คะแนนสำหรับเงื่่อนไขนี้\n"
  }

  if (passwd.match(/([a-zA-Z])/) && passwd.match(/([0-9])/)) // ถ้ามีตัวอักษรเ และเลข
  {
  intPassWd = (intPassWd+6)
  strLog = strLog + "4 คะแนนสำหรับเงื่่อนไขนี้\n"
  }

  // ถ้ามีตัวอักษรเ และเลข และตัวอักษรพิเศษ
  if (passwd.match(/([a-zA-Z0-9].*[!,@,#,$,%,^,&,*,?,_,~])|([!,@,#,$,%,^,&,*,?,_,~].*[a-zA-Z0-9])/))
  {
  intPassWd = (intPassWd+7)
  strLog = strLog + "7 คะแนนสำหรับเงื่่อนไขนี้\n"
  }


  if(intPassWd <= 4)
  {
  strVerdict = "ปลอดภัยน้อยมาก"
  strBg="#FF0000"
  }
  else if (intPassWd >=5 && intPassWd <= 9)
  {
  strVerdict = "ปลอดภัยน้อย"
  strBg="#FF6600"
  }
  else if (intPassWd >= 10 && intPassWd <= 14)
  {
  strVerdict = "ปลอดภัย"
  strBg="#FFFF00"
  }
  else if (intPassWd >= 10 && intPassWd <= 19)
  {
  strVerdict = "ปลอดภัยมาก"
  strBg="#00CC00"
  }
  else
  {
  strVerdict = "ปลอดภัยมากที่สุด"
  strBg="#009900"
  }
  var topwidth=20;
  var curscor=parseInt((intPassWd*220)/topwidth);
  if(curscor<=250){
  document.getElementById("strengprogress").style.backgroundColor=strBg
  document.getElementById("strengprogress").style.width=(curscor)+"px"
  document.getElementById("strengprogress").style.height="3px"
  document.getElementById("verdict").innerHTML=(strVerdict)
  document.getElementById("test").innerHTML=intPassWd
  }
  }
  $("#eye").mouseover(function() {
  $('#user_password').clone().attr('type','text').insertAfter('#user_password').prev().remove();
  });
  $("#eye").mouseout(function() {
  $('#user_password').clone().attr('type','password').insertAfter('#user_password').prev().remove();
  });
  </script>
@endsection
