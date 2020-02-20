@extends('layouts.main')
@section('page_title','สยามวานิช')
@section('content')
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
    return "$strDay/$strMonthThai/$strYear";
    //return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
  }
  @endphp
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12 nopadding">
              <!-- left -->
              <div style="background-color: #a87e4e;" class="col-lg-2 col-md-3 nopadding">
                @if (Session::has('userData'))
                  <div  class="nopadding col-lg-12">
                    @php
                      $userData=App\user_tb::where('id', Session::get('userData')->id )->first();
                    @endphp
                  <div class="col-md-12 rub">
                    @if ($userData->img==null or $userData->img=="")
                      <img  class="imgprofile13" src="{{asset('assets/img/index/profile1.png')}}">
                    @else
                      <img  class="imgprofile13" src="{{asset('local/storage/app/images/user').'/'.$userData->img}}">
                      @endif
                  {{-- <img class="imgprofile13"  src="{{asset('local/storage/app/images/user')."/".$userData->img}}"> --}}
                  </div>
                  <div class="col-md-12">
                     <div class="textname">ชื่อ {{Session::get('userData')->user_fullname}}</div>
                     <div class="textname">สถานะ {{Session::get('userData')->user_type}}</div>
                      <a href="{{ url('changeUserPassword')}}"><div class="textname">เปลี่ยนรหัสผ่าน</div></a>
                  </div>

                  <div class="col-md-6">
                       <a href="{{ url('profile')}}"><p class="textname borber-right">ข้อมูลส่วนตัว</p></a>
                  </div>

                  <div class="col-md-6">
                      <a href="{{ url('logoutUser')}}"><p class="textname">ออกจากระบบ</p></a>
                  </div>



              </div>
              @endif
               </div>
              <!-- center -->

                <div class="col-md-7 padding25 bgw">
                  @if (isset($id))
                    @php
                      $user=App\user_tb::where('id',$id)->first();
                    @endphp
                    <div class="text91 magintop57">ข้อมูลส่วนตัว : {{$user->user_fullname}}</div>
                @else
                      <div class="text91 magintop57">ข้อมูลส่วนตัว : {{Session::get('userData')->user_fullname}}</div>
                      @endif

                      <br>

                      <div>
                          <!--¡ÅèÍ§ Tab - start -->
                          <div>

                          </div>
                          <div class="tab-content">
                              <div id="tab1_bin" class="tab-pane active">

                                  <div class="toto"></div>



                                      <table style="width: 100%; ">
                                          <tbody><tr>
                                              <td class="top_1" style="text-align: center;"></td>
                                          </tr>
                                      </tbody></table>



                                  <div class="col-md-6">
                                      <div class="porfile15">
                                        @if (isset($id))
                                          @if ($user->img==null or $user->img=="")
                                            <img  style="width:250px;" src="{{asset('assets/img/index/profile1.png')}}">
                                          @else
                                            <img style="width:250px;"   src="{{asset('local/storage/app/images/user').'/'.$user->img}}">
                                            @endif
                                        @else
                                          @if ($userData->img==null or $userData->img=="")
                                            <img  style="width:250px;" src="{{asset('assets/img/index/profile1.png')}}">
                                          @else
                                            <img style="width:250px;"   src="{{asset('local/storage/app/images/user').'/'.$userData->img}}">
                                            @endif
                                        @endif

                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <br>
                      @if (isset($id))
                      <div class="col-md-6">
                      <div class="text02">รหัสสมาชิก : {{$user->user_id}}</div>
                      <div class="text02">ชื่อสกุลจริง : {{$user->user_fullname}}</div>
                      <div class="text02">เป็นสมาชิกเมื่อ : {{DateThai($user->created_at)}}</div>
                      <div class="text02">สถานะสมาชิก : {{$user->user_type}}</div>
                      <div class="text02">หมดอายุ : {{DateThai($user->date_expried)}}</div>
                      <div class="text02">ใช้งานล่าสุด : {{DateThai($user->last_login)}} {{substr($user->last_login,11)}}</div>
                      </div>
                      @else
                        <div class="col-md-6">
                        <div class="text02">รหัสสมาชิก : {{Session::get('userData')->user_id}}</div>
                        <div class="text02">ชื่อสกุลจริง : {{Session::get('userData')->user_fullname}}</div>
                        <div class="text02">เป็นสมาชิกเมื่อ : {{DateThai(Session::get('userData')->created_at)}}</div>
                        <div class="text02">สถานะสมาชิก : {{Session::get('userData')->user_type}}</div>
                        <div class="text02">หมดอายุ : {{DateThai(Session::get('userData')->date_expried)}}</div>
                        <div class="text02">ใช้งานล่าสุด : {{DateThai($userData->last_login)}} {{substr($userData->last_login,11)}}</div>
                        </div>
                      @endif
                      <br>


                      <div class="col-lg-12">
                          <div class="text91 magintop55">ข้อมูลการขาย</div>
                          <br>
                          @if (isset($id))
                            @php
                              $forums=App\forum::where('user_id',$id)->get();
                            @endphp
                          @else
                            @php
                              $forums=App\forum::where('user_id',Session::get('userData')->id)->get();
                            @endphp
                          @endif
                          <div class="table-responsive">
                            <div class="panel panel-default panel-table" style="width: 100%;text-align: center;">

                              <div class="panel-heading">
                                  <div class="tr">
                                      <div class="td">รูปภาพ</div>
                                      <div class="td">ชื่อสินค้า</div>
                                      <div class="td">ราคา</div>
                                      <div class="td">ว/ด/ป</div>

                                  </div>
                              </div>
                              <div class="panel-body">
                                @foreach ($forums as $forum)
                                  @php
                                    $img=App\img::where('forum_id',$forum->id)->first();
                                  @endphp

                                  <div class="tr">
                                      <div class="td"><img style="width:200px;" src="{{asset("local/storage/app/images/forum/".$img->name)}}"></div>
                                      <div class="td">{{$forum->name}}</div>
                                      <div class="td">{{$forum->price}}</div>
                                      <div class="td">{{DateThai($forum->created_at)}}</div>
                                    </div>
                                    @endforeach

                                  </div>
                              </div><table class="table">


                               </table>
</div>
                          </div>


                      </div>





          </div>


      </div>
  </div>
@endsection
