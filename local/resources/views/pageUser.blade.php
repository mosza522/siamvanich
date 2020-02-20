@extends('layouts.main')
@section('page_title','สยามวานิช')
@section('content')


      <div class="container-fluid">
      <div class="row">

        @php
        $noti=App\reply::leftJoin('forums','replies.forum_id','forums.id')
        ->where('forums.user_id',Session::get('userData')->id)
        ->where('replies.owner_read',0)
        ->get();
        @endphp
        @if ($noti->count()>0)
        <a href="{{url('detailForum/'.$noti[0]->forum_id)}}"><i class="glyphicon glyphicon-envelope "><span class="label label-danger">{{$noti->count()}}</span></i></a>
        @else
          <i class="glyphicon glyphicon-envelope"></i>
        @endif
      </div>
      </div>
      @php
        $userData=App\user_tb::where('id', Session::get('userData')->id )->first();
      @endphp
      <!-- CONTENT PAGE -->
        <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="row centerbg">
                          <!--  Content LEFT  -->
                          <div class="col-md-3 col-sm-12 padding0">
                              <div class="col-md-12 col-sm-6 padding0">
                                  <!--   Login box    -->
                                  <div class="container-fluid login">
                                     <div class="text01">
                                          <form class="form-horizontal">
                                              <div class="col-md-12 col-sm-12 col-xs-12 info">
                                                @if (Session::has('wrong'))
                                                  <div class="alert alert-danger">
                                                    <li>{{Session::get('wrong')}}</li>
                                                  </div>
                                                @endif
                                                  <div class="col-md-0 " style="padding-top:40px;">

                                                    @if ($userData->img==null or $userData->img=="")
                                                      <img  class="img-porfile" src="{{asset('assets/img/index/profile1.png')}}">
                                                    @else
                                                      <img  class="img-porfile" src="{{asset('local/storage/app/images/user').'/'.$userData->img}}">
                                                      @endif
                                                      {{-- <img class="img-porfile" src="{{asset('local/storage/app/images/user').'/'.$userData->img}}"> --}}
                                                      <br><br>
                                                  </div>
                                              </div>


                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                              <div class="texty">คุณ {{$userData->user_fullname}}</div>
                                              <div class="texty">สถานะ {{$userData->user_type}}</div>
                                              </div>


                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                      <a href="{{ url('changeUserPassword')}}"><div class="texty">เปลี่ยนรหัสผ่าน</div></a>
                                              </div>
                                              <div class="col-md-6 col-sm-12 col-xs-12">
                                      <a href="{{ url('profile')}}"><p class="texty borber-right">ข้อมูลส่วนตัว</p></a>
                                              </div>
                                              <div class="col-md-6 col-sm-12 col-xs-12">
                                      <a href="{{ url('logoutUser')}}"><p class="texty">ออกจากระบบ</p></a>
                                              </div>
                                      <button id="singlebutton" type="button" class="board">เลือกกระดาน</button>

                                              <div class="bod">
                                                @if ($userData->user_type=='vip' or $userData->user_type=='Admin')
                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                      <div class="textred"><a href="{{ url('forumVip')}}">กระดาน VIP</a></div>
                                                  </div>
                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                      <div class="textred02"><a href="{{ url('forumNormal')}}">กระดานธรรมดา</a></div>
                                                  </div>
                                                  @else
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="textred02"><a href="{{ url('forumNormal')}}">กระดานธรรมดา</a></div>
                                                    </div>
                                                @endif

                                              </div>

                                          </form>
                                      </div>
                                  </div>
                                  <!--  end  Login box    -->
                              </div>
                              <!--  Ads picture -->
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
                              <!--end  Ads picture-->
                          </div>
                          <!--end  Content LEFT  -->


                          <!--  Content middle  -->
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

                  <div class="bgwhite">
                    @php
                      $content=App\content::where('page','index')->first();
                    @endphp
                    @if (count($content)>0)
                      {!!$content->content!!}
                    @else
                      <h3 style="">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
                    @endif
                  </div>
              </div>


              <div class="col-md-2 col-sm-12">
              <div class="textyu">
              <a href="{{url('renew')}}"><p>ต่ออายุสมาชิก</p></a>
              <style media="screen">
              div.ui-datepicker{
font-size:14px;
}
              </style>
    <div id="datepicker1" class="calendar"></div>
    <script type="text/javascript">
      $(function() {
        $("#datepicker1").datepicker({
          numberOfMonths:1
        });
      });
    </script>
              </div>
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


              <!-- end Content middle  -->
              <!--  CONTENT RIGHT     -->
              <div class="col-md-8 col-sm-12">
              <div style="overflow:hidden;">
              <div class="form-group">
              <div class="row">
              <div class="col-md-8">
              <div  style="color:red;">

              </div>
              </div>
              </div>
              </div>

              </div>


              </div>

              </div>



          </div>

@endsection
