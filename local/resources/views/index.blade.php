@extends('layouts.main')
@section('page_title','สยามวานิช')
@section('content')
{{-- @include('layouts.topmenu') --}}


<style media="screen">
.tagA{
  text-decoration: none !important;
  color: #42210b;
}
.tagA:hover {color:#42210b;}
.text007{
  color: #42210b;
}
.text08{
  color: #42210b;
}
</style>


<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="row centerbg">



<div class="col-md-3 col-sm-12 padding0">
 <div class="col-md-12 col-sm-6 padding0">
  <div class="container-fluid login">
     <div class="text01">
  <div class="form-horizontal">
<fieldset>

<!-- Form Name -->
<div class="text08">ลงชื่อผู้เข้าใช้</div>



<!-- Text input-->
@if (Session::has('wrong'))
<div class="form-group">
<div class="col-md-1"></div>
  <div class="col-md-10">
    <div class="alert alert-danger">
      <li>{{Session::get('wrong')}}</li>
    </div>
  </div>
<div class="col-md-1"></div>
</div>
@endif
<div class="form-group">
<div class="col-md-1"></div>
  <div class="col-md-10">
    {{Form::open(['url' => 'loginUser'])}}
      <p class=" control-label text007" for="textinput">Username</p>
          <input id="textinput" name="username" type="text" placeholder="" class="form-control input-md"><span class="help-block"></span>
  </div>
<div class="col-md-1"></div>
</div>

<!-- Password input-->

<div class="form-group">
<div class="col-md-1"></div>
  <div class="col-md-10 ">
      <p class=" control-label text007" for="textinput">Password</p>
          <input type="password" id="passwordinput" name="password" type="passwordinput" placeholder=""class="form-control input-md">
              <span class="help-block"></span>
          </div>
      <div class="col-md-1"></div>
  </div>

<!-- Button -->
<div class="form-group">
<div class="col-md-1"></div>
  <div class="col-md-10">
      <button type="submit" class="btn btn-block btn-info text07" name="button">Login</button>
      {{-- <a href="#" class="btn btn-block btn-info text07">Login</a> --}}
      {{Form::close()}}
  </div>
</div>


</fieldset>
</div>
</div></div></div>
<div class="col-md-12 col-sm-6 col-xs-12 info " style="padding-top:25px;">

     <div class="row">
        <div class="col-md-3 col-sm-3">
        <img class="icomhome img-responsive" src="{{ asset('assets/img/index/icon1.png') }}">
        </div>
         <div class="col-md-9 col-sm-9">
        <div class="text04">{{Html::link('regis','สมัครสมาชิกใหม่',array('class' => 'tagA'))}}</div>
        </div>
        </div>

    <div class="row">
        <div class="col-md-3 col-sm-3">
        <img class="icomhome img-responsive" src="{{ asset('assets/img/index/icon2.png') }}">
        </div>
        <div class="col-md-9 col-sm-9">
        <div class="text04">{{Html::link('blacklist','รายชื่อห้ามโอนเงิน',array('class' => 'tagA'))}}</div>
        </div>
        </div>

        <div class="row">
        <div class="col-md-3 col-sm-3">
        <img class="icomhome img-responsive" src="{{ asset('assets/img/index/icon3.png') }}">
        </div>
         <div class="col-md-9 col-sm-9">
        <div class="text04">{{Html::link('advertise','ติดต่อโฆษณา',array('class' => 'tagA'))}}</div>
        </div>
        </div>

         <div class="row">
        <div class="col-md-3 col-sm-3">
        <img class="icomhome img-responsive" src="{{ asset('assets/img/index/icon4.png') }}">
        </div>
         <div class="col-md-9 col-sm-9">
        <div class="text04">{{Html::link('forgotPassword','ลืมรหัสผ่าน',array('class' => 'tagA'))}}</div>
        </div>
        </div>


</div>
  {{-- <div class="col-md-12 col-sm-6 col-xs-12 info">
      <div class="col-md-3 col-sm-4" style="padding-top:30px;">
          <img class="icomhome img-responsive" src="{{ asset('assets/img/index/icon1.png') }}">
          <img class="icomhome img-responsive"   src="{{ asset('assets/img/index/icon2.png') }}">
          <img class="icomhome img-responsive"   src="{{ asset('assets/img/index/icon3.png') }}">
          <img class="icomhome img-responsive"   src="{{ asset('assets/img/index/icon4.png') }}">
      </div>
      <div class="col-md-9 col-sm-8 col-xs-12">
        <div class="text04">{{Html::link('regis','สมัครสมาชิกใหม่')}}</div>
          <div class="text04">{{Html::link('blacklist','รายชื่อห้ามโอนเงิน')}}</div>
          <div class="text04">{{Html::link('advertise','ติดต่อโฆษณา')}}</div>
          <div class="text04">{{Html::link('forgotPassword','ลืมรหัสผ่าน')}}</div>
          {{-- <div class="text04"><a href="regis">สมัครสมาชิกใหม่</a></div>
          <div class="text04"><a href="page17.php" style="color: 412319;">รายชื่อห้ามโอนเงิน</a></div>
          <div class="text04"><a href="page16.php" style="color: 412319;">ติดต่อโฆษณา</a></div>
          <div class="text04"><a href="page19.php" style="color: 412319;">ลืมรหัสผ่าน</a></div> --}}



      {{-- </div>
  </div> --}}


  <div class=" text11 col-md-9 col-xs-12 center1 pading2">
    @php
    $banners=App\banner::where('position','ด้านซ้าย')->get();
    @endphp
    @foreach ($banners as $banner)
      <img class="img-responsive ads" src="{{ asset('local/storage/app/images/banner'.'/'.$banner->name) }}">
    @endforeach
    @php
    $banners=App\banner::where('position','ด้านซ้ายล่าง')->get();
    @endphp
    @foreach ($banners as $banner)
      <img class="img-responsive ads" src="{{ asset('local/storage/app/images/banner'.'/'.$banner->name) }}">
    @endforeach

      {{-- <img class="img-responsive ads" src="{{ asset('assets/img/index/banner1.jpg') }}">
      <img class="img-responsive ads" src="{{ asset('assets/img/index/banner2.jpg') }}">
      <img class="img-responsive ads" src="{{ asset('assets/img/index/banner3.jpg') }}">
      <img class="img-responsive ads" src="{{ asset('assets/img/index/banner4.jpg') }}"> --}}
  </div>
</div>



<div class="col-md-7 col-sm-12 padding0 centerbg">

<div id="myCarousel1" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
    @php
    $banners=App\banner::where('position','ด้านบน')->get();
    $i=0;
    @endphp
    @foreach ($banners as $banner)
      @if ($i==0)
        <li data-target="#myCarousel1" data-slide-to="{{$i}}" class="active"></li>

      @else
        <li data-target="#myCarousel1" data-slide-to="{{$i}}" class=""></li>
      @endif
      @php
        $i++;
      @endphp
    @endforeach
{{-- <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
<li data-target="#myCarousel1" data-slide-to="1" class=""></li>
<li data-target="#myCarousel1" data-slide-to="2" class=""></li>
<li data-target="#myCarousel1" data-slide-to="3" class=""></li>
<li data-target="#myCarousel1" data-slide-to="4" class=""></li> --}}
</ol>

<div class="carousel-inner">
  @php
  $banners=App\banner::where('position','ด้านบน')->get();
  $first=false;
  @endphp
  @foreach ($banners as $banner)
    @if ($first!=true)
      <div class="item active">
        <img class="img-responsive ads" src="{{ asset('local/storage/app/images/banner'.'/'.$banner->name) }}">
      </div>
      @php
        $first=true;
      @endphp
    @else
      <div class="item">
        <img class="img-responsive ads" src="{{ asset('local/storage/app/images/banner'.'/'.$banner->name) }}">
      </div>
    @endif

  @endforeach

{{-- <div class="item active">
{{Html::image('assets/img/index/banner6.png','Premium Grade PLA Cups')}}
</div>
<div class="item">
{{Html::image('assets/img/index/banner6.png','Premium Grade PLA Cups')}}
</div>
<div class="item">
{{Html::image('assets/img/index/banner6.png','Save Cost PP Cups')}}
</div>
 <div class="item">
{{Html::image('assets/img/index/banner6.png','Save Cost PP Cups')}}
</div>
 <div class="item">
{{Html::image('assets/img/index/banner6.png','Save Cost PP Cups')}}
</div> --}}
</div>
</div>

{{-- <div id="myCarousel2" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
<li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
<li data-target="#myCarousel2" data-slide-to="1" class=""></li>
<li data-target="#myCarousel2" data-slide-to="2" class=""></li>
<li data-target="#myCarousel2" data-slide-to="3" class=""></li>
<li data-target="#myCarousel2" data-slide-to="4" class=""></li>
</ol>

<div class="carousel-inner">
<div class="item active">
{{Html::image('assets/img/index/banner7.jpg','Premium Grade PLA Cups')}}
</div>

<div class="item">
{{Html::image('assets/img/index/banner7.jpg','Premium Grade PLA Cups')}}
</div>

<div class="item">
{{Html::image('assets/img/index/banner7.jpg','Save Cost PP Cups')}}
</div>

 <div class="item">
{{Html::image('assets/img/index/banner7.jpg','Save Cost PP Cups')}}
</div>

 <div class="item">
{{Html::image('assets/img/index/banner7.jpg','Save Cost PP Cups')}}
</div>
</div>
</div> --}}
@php
  $content=App\content::where('page','firstpage')->first();
@endphp
@if (count($content)>0)
  {!!$content->content!!}
@else
  <div class="textindex"> “ ผู้ที่ต้องการเข้าร่วมซื้อข-ขายจำเป็นต้องสมัครสมาชิคก่อนอันดับแรก ” บุคคลที่ต้องการเข้าร่วมซื้อ - ขายสินค้าและกิจกรรมต่าง ๆ กับทาง www.siamwanich.com</div>
  <div class="textindex"> โปรดสมัครสมาชิกเพื่อแสดงถึงตัวตนของท่านเองในการเสอนอความคิดเห็นซื้อ - ขายอย่างตรงไปตรงมากับผู้อื่นอีกในหนึ่งคือเป็นการคัดกรองบุคคลที่เข้ามาสมัครสมาชิกด้วยไม่ให้โจรผู้ที่ลอกลวงมิจฉาชีพมาใช้พื้นที่นี้กระทำ
การมิชอบต่อผู้อื่น </div>
   <div class="textindex"> ทาง www.siamwanich.com จึงขอเรียนเชิญทุกท่านได้เข้าร่วมการซื้อ - ขายเป็นระบบมีความปลอดภัยและในเว็บนี้ ทางเว็บมาสเตอร์มีสิทธิในการแก้ไข ลบรูปสินค้าที่ผิดกฏหมาย หรือข้อความที่พาดพิง ต่อผู้อื่นและสร้างความเสียหายให้กับผู้อื่นได้ทันที เพื่อป้องกันปัญหาในภายหลัง โดยไม่ต้องแจ้งให้ทราบล่วงหน้า</div>
  <br>
  <div class="text03"> ขอขอบพระคุณทุกท่าน ณ ที่นี้ด้วย</div>
  <br>
  <div class="text05"> 12 ตุลาคม 2560</div>
  <br>
  <div class="text006"> www.siamwanich.com</div>
@endif

  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
      <img class="img-responsive margin02 headitem" src="{{asset('assets/img/index/new-item1.png')}}">
  <div class="col-md-12 newitem centeritem">
    @php
      $forums=App\forum::orderBy('created_at')
      ->limit(8)
      ->get();
    @endphp
    @foreach ($forums as $forum)
      @php
        $img=App\img::where('forum_id',$forum->id)->first();
      @endphp
      <a href="{{url('detailForum/'.$forum->id)}}"><div class="col-md-3 col-sm-6 newitem">
     <img class="img-responsive" src="{{asset('local/storage/app/images/forum/'.$img->name)}}">
     <div class="text00">{{$forum->name}}@if ($forum->type=='vip')
       (VIP เท่านั้น)
     @endif</div></div></a>
    @endforeach
       {{-- <div class="col-md-3 col-sm-6 newitem">
      <img class="img-responsive" src="{{asset('assets/img/index/img1.png')}}">
      <div class="text00">ชื่อสินค้า</div></div>
       <div class="col-md-3 col-sm-6 newitem">
      <img class="img-responsive" src="{{asset('assets/img/index/img1.png')}}">
      <div class="text00">ชื่อสินค้า</div></div>
       <div class="col-md-3 col-sm-6 newitem">
      <img class="img-responsive" src="{{asset('assets/img/index/img1.png')}}">
      <div class="text00">ชื่อสินค้า</div></div>
       <div class="col-md-3 col-sm-6 newitem">
      <img class="img-responsive" src="{{asset('assets/img/index/img1.png')}}">
      <div class="text00">ชื่อสินค้า</div></div>

      <div class="col-md-3 col-sm-6 newitem">
      <img class="img-responsive" src="{{asset('assets/img/index/img1.png')}}">
      <div class="text00">ชื่อสินค้า</div></div>
       <div class="col-md-3 col-sm-6 newitem">
      <img class="img-responsive" src="{{asset('assets/img/index/img1.png')}}">
      <div class="text00">ชื่อสินค้า</div></div>
       <div class="col-md-3 col-sm-6 newitem">
      <img class="img-responsive" src="{{asset('assets/img/index/img1.png')}}">
      <div class="text00">ชื่อสินค้า</div></div>
       <div class="col-md-3 col-sm-6 newitem">
      <img class="img-responsive" src="{{asset('assets/img/index/img1.png')}}">
      <div class="text00">ชื่อสินค้า</div></div> --}}




  <img class="img-responsive pading40 headitem" src="{{asset('assets/img/index/new-item2.png')}}">
  <div class="col-md-12 newitem">
    @php
      $forums=DB::select('SELECT forums.*, (SELECT COUNT(*) FROM counts
      WHERE counts.forum_id = forums.id) AS count FROM forums WHERE forums.type="normal" order by count DESC');
    @endphp
    @foreach ($forums as $forum)
      @php
        $img=App\img::where('forum_id',$forum->id)->first();
      @endphp
      <a href="{{url('detailForum/'.$forum->id)}}"><div class="col-md-3 col-sm-6 newitem">
     <img class="img-responsive" src="{{asset('local/storage/app/images/forum/'.$img->name)}}">
     <div class="text00">{{$forum->name}}</div></div></a>
    @endforeach
       {{-- <div class="col-md-3 col-sm-6 newitem">
      <img class="img-responsive" src="{{asset('assets/img/index/img1.png')}}">
      <div class="text00">ชื่อสินค้า</div></div>
       <div class="col-md-3 col-sm-6 newitem">
      <img class="img-responsive" src="{{asset('assets/img/index/img1.png')}}">
      <div class="text00">ชื่อสินค้า</div></div>
       <div class="col-md-3 col-sm-6 newitem">
      <img class="img-responsive" src="{{asset('assets/img/index/img1.png')}}">
      <div class="text00">ชื่อสินค้า</div></div>
       <div class="col-md-3 col-sm-6 newitem">
      <img class="img-responsive" src="{{asset('assets/img/index/img1.png')}}">
      <div class="text00">ชื่อสินค้า</div></div>

      <div class="col-md-3 col-sm-6 newitem">
      <img class="img-responsive" src="{{asset('assets/img/index/img1.png')}}">
      <div class="text00">ชื่อสินค้า</div></div>
       <div class="col-md-3 col-sm-6 newitem">
      <img class="img-responsive" src="{{asset('assets/img/index/img1.png')}}">
      <div class="text00">ชื่อสินค้า</div></div>
       <div class="col-md-3 col-sm-6 newitem">
      <img class="img-responsive" src="{{asset('assets/img/index/img1.png')}}">
      <div class="text00">ชื่อสินค้า</div></div>
       <div class="col-md-3 col-sm-6 newitem">
      <img class="img-responsive" src="{{asset('assets/img/index/img1.png')}}">
      <div class="text00">ชื่อสินค้า</div></div> --}}
</div>
</div>


</div>
   <div class="col-md-2 col-sm-12">
      <div class="button-menu" style="padding-bottom:30px;">
           <p class="text08">หมวดหมู่สินค้า</p>
           @php
             $cats=App\forum_category::get();
           @endphp
           @foreach ($cats as $cat)
             <a href="{{url('Category/normal/'.$cat->id)}}" class="btn btn-block btn-primary btn-info text09">{{$cat->category_name}}</a>
           @endforeach
           {{-- <a href="#" class="btn btn-block btn-primary btn-info text09 text-media" style="font-size">รถยนต์/รถมอร์ไซค์มือ1,2</a>
           <a href="#" class="btn btn-block btn-primary btn-info text09">อสังหาริมทรัพย์</a>
           <a href="#" class="btn btn-block btn-primary btn-info text09">แฟชั่นทุกประเภท</a>
           <a href="#" class="btn btn-block btn-primary btn-info text09 text-media">อาหารเสริม/เครื่องสำอาง</a>
           <a href="#" class="btn btn-block btn-primary btn-info text09">ไอที/เครื่องเสียง</a>
           <a href="#" class="btn btn-block btn-primary btn-info text09 text-media">สินค้าทางการเกษตร</a>
           <a href="#" class="btn btn-block btn-primary btn-info text09">เครื่องประดับ</a>
           <a href="#" class="btn btn-block btn-primary btn-info text09 text-media">เฟอร์นิเจอร์ตกแต่ง</a>
            <a href="#" class="btn btn-block btn-primary btn-info text09 text-media">หนังสือและวรรณกรรม</a>
            <a href="#" class="btn btn-block btn-primary btn-info text09 text-media">สินค้าที่ไม่เข้าหมวด</a> --}}
       </div>
       <?php
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
         return "$strDay/$strMonthThai/$strYear";
          //return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
       }
       function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

       $strDate = date("Y-m-d H:i:s");
       ?>
       <div class="time-check" style="border:1px solid black; text-align: center;">
           <p>{{
           DateThai($strDate)
         }}</p>
           <hr style="">
           <p>จำนวนผู้เข้าชมตอนนี้</p>
           <p ><!-- BEGIN: Powered by Supercounters.com -->
<center><script type="text/javascript" src="//widget.supercounters.com/ssl/online_t.js"></script><script type="text/javascript">sc_online_t(1448423,"คน","#000000");</script><br><noscript><a style="color:black!important;" href="http://www.supercounters.com/">Free Users Online Counter</a></noscript>
</center>
<!-- END: Powered by Supercounters.com --></p>
           <br>
           <p>ผู้เข้าชมรวมทั้งหมด</p>
           <p>      <!-- BEGIN: Powered by Supercounters.com -->
                 <script type="text/javascript" src="//widget.supercounters.com/ssl/texthit.js"></script><script type="text/javascript">var sc_texthit_var = sc_texthit_var || [];sc_text_hit(1448421,"คน","#000000");</script><br><noscript><a href="http://www.supercounters.com">free Hit Counter</a></noscript>
                 <!-- END: Powered by Supercounters.com --></p>
          </div>



<!--
       <div class="top"> วัน เดือน ปี </div>
       <div class="top"> จำนวนผู้เข้าชมตอนนี้ </div>
       <div class="top"> xxx,xxx คน </div>
       <div class="top"> ผู้เข้าชมรวมทั้งหมด </div>
       <div class="top"> xxx,xxx คน </div>
-->
       <div class="">
         @php
         $banners=App\banner::where('position','ด้านขวา')->get();
         @endphp
         @foreach ($banners as $banner)
           <img class="img-responsive ads" src="{{ asset('local/storage/app/images/banner'.'/'.$banner->name) }}">
         @endforeach

         @php
         $banners=App\banner::where('position','ด้านขวาล่าง')->get();
         @endphp
         @foreach ($banners as $banner)
           <img class="img-responsive ads" src="{{ asset('local/storage/app/images/banner'.'/'.$banner->name) }}">
         @endforeach
             {{-- <img class="img-responsive ads" src="{{asset('assets/img/index/a1.jpg')}}">
             <img class="img-responsive ads" src="{{asset('assets/img/index/a2.jpg')}}">
             <img class="img-responsive ads" src="{{asset('assets/img/index/a3.jpg')}}">
             <img class="img-responsive ads" src="{{asset('assets/img/index/a4.jpg')}}"> --}}
           </div>


</div>
</div>
</div>
</div>
<script type="text/javascript">
$('#mylink').click(function(event) {

  // This will prevent the default action of the anchor
  event.preventDefault();

  // Failing the above, you could use this, however the above is recommended
  return false;

});
</script>
@endsection
