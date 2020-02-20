
   <nav class="navbar navbar-default topmenu">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">SIAM WANICH</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="{{url('regis')}}">สมัครสมาชิกใหม่</a></li>
        <li><a href="{{url('blacklist')}}">รายชื่อห้ามโอนเงิน</a></li>
        <li><a href="{{url('advertise')}}">ติดต่อโฆษณา</a></li>
        <li><a href="{{url('forgotPassword')}}">ลืมรหัสผ่าน</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">หมวดหมู่สินค้า <span class="caret"></span></a>
          <ul class="dropdown-menu">
            @php
              $cats=App\forum_category::get();
            @endphp
            @foreach ($cats as $cat)
              <li><a href="{{url('Category/normal/'.$cat->id)}}">{{$cat->category_name}}</a></li>
            @endforeach
            {{-- <li><a href="#">รถยนต์/รถมอร์ไซค์มือ1,2</a></li>
            <li><a href="#">อสังหาริมทรัพย์</a></li>
            <li><a href="#">แฟชั่น ทุกประเภท</a></li>
            <li><a href="#">อาหารเสริม/เครื่องสำอาง</a></li>
            <li><a href="#">ไอที/เครื่องเสียง</a></li>
            <li><a href="#">สินค้าทางการเกษตร</a></li>
            <li><a href="#">เครื่องประดับ</a></li>
            <li><a href="#">เฟอร์นิเจอร์ตกแต่ง</a></li>
            <li><a href="#">หนังสือและวรรณกรรม</a></li>
            <li><a href="#">สินค้าที่ไม่เข้าหมวด</a></li> --}}

          </ul>
        </li>
      </ul>



    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
