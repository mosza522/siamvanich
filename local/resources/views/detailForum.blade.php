@extends('layouts.main')
@section('page_title','สยามวานิช')
@section('content')
  @php
  if(Session::has('userData')){
  $notis=App\reply::leftJoin('forums','replies.forum_id','forums.id')
  ->where('forums.user_id',Session::get('userData')->id)
  ->where('forums.id',$id)
  ->where('replies.owner_read',0)
  ->get();
  if($notis->count()>0){
  // $newnotis=App\reply::where('forum_id',$notis[0]->forum_id);
  // $newnotis->owner_read = 1;
  // $newnotis->save();
  DB::table('replies')
              ->where('forum_id', $notis[0]->forum_id)
              ->update(['owner_read' => 1,'updated_at'=> Carbon::now()]);
    }
  }
  @endphp
  @php
  $count=App\count::where('forum_id',$id)
  ->where('ip',Request::ip())
  ->get();
    if($count->count()==0){
    $countNEw= new App\count;
    $countNEw->forum_id=$id;
    $countNEw->ip=Request::ip();
    $countNEw->save();
    }
  @endphp
  <style media="screen">
    .link-break{
      overflow-wrap: break-word;
    }
  </style>
<div class="container-fluid">
  <div class="row">
  <div class="col-lg-12">
  <div class="row centerbg">



  <div class="col-md-3 padding0">
<div class="logobg1"></div>
  </div>


  <div class="col-md-7 padding25 bgw"

      <div class="form-horizontal">

<fieldset>

<!-- Form Name -->
     <div class="text111">ข้อมูลสินค้า</div>

</fieldset>
      @php
      $forums= App\forum::leftJoin('user_tbs', 'forums.user_id','=', 'user_tbs.id')
      ->leftJoin('forum_categories', 'forums.category_id','=', 'forum_categories.id')
      ->where('forums.id',$id)
      ->first();
      $imgs=App\img::where('forum_id',$id)->get();
      @endphp
      <div class="form-horizontal"fieldset>
      <div class="form-group">
          <p class="col-md-3 control-label" for="textinput">ประเภทหมวด  :</p>
              <div class="col-md-6">
                  <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md"
                  value="{{$forums->category_name}}" readonly>
              <span class="help-block"></span>
          </div>
      </div>

      <div class="form-group">
          <p class="col-md-3 control-label" for="textinput">ชื่อสินค้า  :</p>
              <div class="col-md-6">
                  <input id="textinput" name="textinput" type="text" placeholder=""
                  class="form-control input-md" value="{{$forums->name}}" readonly>
              <span class="help-block"></span>
          </div>
      </div>

      <div class="col-md-12" style="margin-bottm:100px;">
        @php
          if (count($imgs)%4==1) {
            $class='col-md-12 img01';
          }
          if (count($imgs)%4==2) {
            $class='col-md-6 img01';
          }
          if (count($imgs)%4==3) {
            $class='col-md-4 img01';
          }
          if (count($imgs)%4==0) {
            $class='col-md-3 img01';
          }
        @endphp
        @for ($i = 0; $i < count($imgs); $i++)
          @if (count($imgs)-$i<=4)
            <div class="{{$class}}">
              <div class="col-sm-12 col-lg-12 col-md-12" style="text-align:center;">
                <div class="branch-1">
                    <div class="bordol-1">
                        <div class="row"> <a href="" data-toggle="modal" data-target="#myModal{{$imgs[$i]->id}}">
                          <img id="{{$imgs[$i]->id}}" width="250" height="250" src="{{asset('local/storage/app/images/forum/'.$imgs[$i]->name)}}">
                        </a> </div>
                        <div class="modal fade" id="myModal{{$imgs[$i]->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
                            <div class="modal-dialog" role="document" style="width:80%;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button> <span aria-hidden="true"></span>
                                        <div class="modal-body">
                                          <script type="text/javascript">
                                            document.getElementById({{$imgs[$i]->id}}).classList.remove('img01');
                                          </script>
                                          <img id="{{$imgs[$i]->id}}"  src="{{asset('local/storage/app/images/forum/'.$imgs[$i]->name)}}">
                                        </div>

                                    </div>
                                    <div class="modal-footer"  >
                                        <button  type="Success" class="warning" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             </div>
             @else
               <div class="{{$class}}">
                 <div class="col-sm-12 col-lg-12 col-md-12">
                   <div class="branch-1">
                       <div class="bordol-1">
                           <div class="row"> <a href="" data-toggle="modal" data-target="#myModal{{$imgs[$i]->id}}">
                             <img id="{{$imgs[$i]->id}}" width="250" height="250" src="{{asset('local/storage/app/images/forum/'.$imgs[$i]->name)}}">
                           </a> </div>
                           <div class="modal fade" id="myModal{{$imgs[$i]->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
                               <div class="modal-dialog" role="document" style="width:80%;">
                                   <div class="modal-content">
                                       <div class="modal-header">
                                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button> <span aria-hidden="true"></span>
                                           <div class="modal-body">
                                            <script type="text/javascript">
                                              document.getElementById({{$imgs[$i]->id}}).classList.remove('img01');
                                            </script>
                                             <img id="{{$imgs[$i]->id}}"  src="{{asset('local/storage/app/images/forum/'.$imgs[$i]->name)}}">
                                           </div>

                                       </div>
                                       <div class="modal-footer"  >
                                           <button  type="Success" class="warning" data-dismiss="modal">Close</button>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
                </div>
          @endif
        @endfor


       {{-- <div class="col-md-3 img01">
          <img src="img/index/p1.png">
       </div>

       <div class="col-md-3 img01">
           <img src="img/index/p1.png">
      </div>

      <div class="col-md-3 img01">
          <img src="img/index/p4.png">
      </div> --}}
      </div>

      <div class="col-md-12 " style="padding-bottom: 40px; "></div>
          <div class="form-group">
              <p class="col-md-3 control-label" for="textinput">ราคาสินค้า  :</p>
                  <div class="col-md-6">
                      <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md"
                      value="{{$forums->price}}" readonly>
                  <span class="help-block"></span>
              </div>
          </div>

       <div class="form-group">
           <p class="col-md-3 control-label" for="textinput">ข้อความอธิบายสินค้า  :</p>
              <div class="col-md-6">
                    <textarea name="name" rows="8" class="form-control input-md" readonly>{{$forums->detail}}</textarea>
              <span class="help-block"></span>
          </div>
      </div>

      <div class="form-group">
          <p class="col-md-3 control-label" for="textinput">ผู้ที่ขาย  :</p>
              <div class="col-md-6">
                <input id="seller" name="textinput" type="text" placeholder="" class="form-control input-md"
                @if (Session::has('userData'))
                  value="{{$forums->user_fullname}}"
                @endif readonly>
              <span class="help-block"></span>
          </div>
      </div>

      <div class="form-group">
          <p class="col-md-3 control-label" for="textinput">ที่อยู่  :</p>
              <div class="col-md-6">
                <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md"
                value="{{$forums->user_address}}" readonly>
              <span class="help-block"></span>
          </div>
      </div>

      <div class="form-group">
          <p class="col-md-3 control-label" for="textinput">จังหวัด  :</p>
              <div class="col-md-6">
                <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md"
                value="{{$forums->user_province}}" readonly>
          <span class="help-block"></span>
      </div>
  </div>

      <div class="form-group">
          <p class="col-md-3 control-label" for="textinput">รหัสไปรษณีย์  :</p>
           <div class="col-md-6">
              <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md"
              value="{{$forums->user_zipcode}}" readonly>
           <span class="help-block"></span>
       </div>
    </div>

      <div class="form-group">
          <p class="col-md-3 control-label" for="textinput">เบอร์โทรติดต่อ  :</p>
              <div class="col-md-6">
                  <input id="tell" name="textinput" type="text" placeholder="" class="form-control input-md"
                  @if (Session::has('userData'))
                    value="{{$forums->user_tell}}"
                  @endif readonly>
              <span class="help-block"></span>
          </div>
      </div>

     <div class="form-group">
          <p class="col-md-3 control-label" for="textinput">กรุณาโอนเงินไปที่</p>
      </div>

      <div class="form-group">
          <p class="col-md-3 control-label" for="textinput">ชื่อบัญชี  :</p>
              <div class="col-md-6">
                  <input id="account_name" name="textinput" type="text" placeholder="" class="form-control input-md"
                  @if (Session::has('userData'))
                    value="{{$forums->user_account_name}}"
                  @endif readonly>
              <span class="help-block"></span>
          </div>
      </div>

          <div class="form-group">
          <p class="col-md-3 control-label" for="textinput">เลขบัญชี  :</p>
              <div class="col-md-6">
                  <input id="account" name="textinput" type="text" placeholder="" class="form-control input-md"
                  @if (Session::has('userData'))
                    value="{{$forums->user_account}}"
                  @endif readonly>
              <span class="help-block"></span>
          </div>
      </div>

           <div class="form-group">
          <p class="col-md-3 control-label" for="textinput">ประเภทบัญชี  :</p>
              <div class="col-md-6">
                  <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md"
                  value="{{$forums->user_account_type}}" readonly>
              <span class="help-block"></span>
          </div>
      </div>

           <div class="form-group">
          <p class="col-md-3 control-label" for="textinput">ชื่อธนาคาร  :</p>
              <div class="col-md-6">
                  <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md"
                  value="{{$forums->user_bank_name}}" readonly>
              <span class="help-block"></span>
          </div>
      </div>

           <div class="form-group">
          <p class="col-md-3 control-label" for="textinput">สาขา  :</p>
              <div class="col-md-6">
                  <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md"
                  value="{{$forums->user_account_branch}}" readonly>
              <span class="help-block"></span>
          </div>
      </div>
      @if (Session::has('userData'))
        <div class="form-group">
       <p class="col-md-3 control-label" for="textinput">E-mail  :</p>
           <div class="col-md-6">
               <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md"
               value="{{$forums->user_email}}" readonly>
           <span class="help-block"></span>
       </div>
   </div>
      @endif


          <div class="form-horizontal">
          <fieldset>

          <!-- Multiple Checkboxes (inline) -->
          <div class="form-group">
              <label class="col-md-3 control-label" for="checkboxes"></label>
                  <div class="col-md-4">
                      <label class="checkbox-inline" for="checkboxes-0">
                <input type="checkbox" name="checkboxes" id="checkboxes-0" value="">ระบบการ ซื้อ - ขาย ผ่านทางเว็บไซต์
              </label>
            </div>
          </div>
          </fieldset>
          </div>


          <div class="text99">1. เกิดความปลอดภัยในการ ซื้อ - ขาย</div>
           <div class="text99">2. มีกระบวนการทางเว็บไซต์ดูแลให้</div>
          <div class="text99">3. หากท่านเองเต็มใจที่จะเสี่ยงและไม่เชื่อว่ากระบวนการ ซื้อ - ขาย <br>
          ของทางเว็บไซต์ดีพอ เราจะไม่ขัดท่าน แต่ถ้าท่านต้องการบริการนี้  <a href="{{url('middleSystem')}}" target="_blank" class="btn btn-default btn-xs now1" >คลิกที่นี่</a></div>


          <div class="col-md-3 " style=""></div>
              <fieldset>
                @if (Session::has('userData'))
                  <legend>ยินดีต้อนรับครับคุณ {{Session::get('userData')->user_fullname}} เข้าร่วมซื้อ - ขาย</legend>
                @else
                  <legend>กรุณาสมัครสมาชิกเพื่อดูข้อมูลผู้ขายทันที</legend>
                @endif


              </fieldset>
              @if (Session::has('userData'))
            {{Form::open(['url'=>'reply'])}}
              {{Form::hidden('forum_id',$id)}}
          <div class="form-horizontal">
          <fieldset>
              <div class="form-group">
                  <p class="col-md-3 control-label" for="textarea">สอบถามรายละเอียด  :<br>เพิ่มเติมจากผู้ขายสินค้า</p>
                  <div class="col-md-6">
              <textarea class="form-control" id="textarea" name="question"></textarea>
            </div>
          </div>
          </fieldset>
          </div>

<div class="form-horizontal">
        <fieldset>
          <div class="form-group">
            <label class="col-md-3 control-label" for="button1id"></label>
            <div class="col-md-8">
              <button class="btn btn-inverse">ส่งข้อความ</button>
              <button type="reset" class="btn btn-inverse">ยกเลิก</button>
              @if (Session::has('userData'))
                <a href="{{url('Category/'.Session::get('userData')->user_type.'/'.$forums->category_id)}}" class="btn btn-inverse">ออกจากหน้านี้</a>
                @else
                  <a href="{{url('Category/normal/'.$forums->category_id)}}" class="btn btn-inverse">ออกจากหน้านี้</a>

              @endif
            </div>
            {{Form::close()}}
          </div>

</fieldset>
</div>
@endif
<div class="col-md-12">
  <ul class="nav nav-tabs" >
    <li class="active tab01" ><a data-toggle="tab" href="#tab1_bin ">เรียงลำดับคำตอบ</a></li>
  </ul>

</div>
@php
  $replies=App\reply::leftJoin('forums','replies.forum_id','=','forums.id')
  ->leftJoin('user_tbs','replies.user_id','=','user_tbs.id')
  ->where('replies.forum_id',$id)
  ->select('replies.*','user_tbs.user_fullname')
  ->get();
  $i=1;
@endphp
@foreach ($replies as $reply)
<div class="bb1 text-right col-md-12 col-sm-12">
  @if (Session::has('userData'))
      {{Form::open(['url'=>'answer'])}}
      {{Form::hidden('id',$reply->id)}}
      {{Form::hidden('user_id',Session::get('userData')->id)}}
        <i class="glyphicon glyphicon-envelope textbot02"></i><input type="text" name="answer" placeholder="ตอบข้อความนี้">
        {{Form::close()}}

        @endif
</div>
<p class="col-md-2 col-sm-2 control-label text-left" style="text-align:center;" for="textarea">ลำดับ {{$i++}}</p>
<p class="col-md-5 col-sm-5 control-label text-left" style="text-align:center;"for="textarea">จากคุณ {{$reply->user_fullname}}</p>
<div class="col-md-12 col-sm-12 link-break" style="margin-top:20px;margin-bottom:20px;">
{!!$reply->question!!}
</div>
@php
  $answers=App\answer_reply::leftJoin('user_tbs','answer_replies.user_id','user_tbs.id')
  ->where('reply_id',$reply->id)->get();
  $j=1;
@endphp
@if ($answers->count()>0)
  <div class="col-md-12 col-sm-12 link-break" style="">
    <h4>การตอบกลับ</h4>
  </div>
  @foreach ($answers as $answer)
    <div class="col-md-12 col-sm-12 link-break" style="margin-bottom:10px;">
      {{$j++.". "}} จากคุณ {{$answer->user_fullname}}
      <br>
      <b>{{$answer->answer_detail}}</b>
    </div>
  @endforeach

@endif

            @endforeach


        </div>
      </div>




          </div>



      </div>






</div>
</div>
</div>




       <div class="col-md-2 ">

  </div>
  </div>
  <!-- Display the countdown timer in an element -->
  @if (!(Session::has('userData')))
  <script>
  var seller="{{$forums->user_fullname}}";
  var tell="{{$forums->user_tell}}";
  var account_name="{{$forums->user_account_name}}";
  var account="{{$forums->user_account}}";
  // Set the date we're counting down to
  var now1 = new Date();
  now1.setHours(now1.getHours() + 1);


  // Update the count down every 1 second
  var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();

    // Find the distance between now an the count down date
    var distance = now1 - now;

    // Time calculations for days, hours, minutes and seconds
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("seller").value =minutes+" m"+ seconds + "s ";
    document.getElementById("tell").value = minutes+" m"+seconds + "s ";
    document.getElementById("account_name").value = minutes+" m"+seconds + "s ";
    document.getElementById("account").value = minutes+" m"+seconds + "s ";

    // If the count down is finished, write some text
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("seller").value=seller;
      document.getElementById("tell").value=tell;
      document.getElementById("account_name").value=account_name;
      document.getElementById("account").value=account;
    }
  }, 1000);
  </script>
@endif
@endsection
