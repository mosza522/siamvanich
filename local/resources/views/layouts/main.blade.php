<!DOCTYPE html>
<html>
  <head>
          <title>@yield('page_title')</title>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

          <!-- CSS Theme-->
          {{ Html::style('assets/css/bootstrap.css') }}
          {{ Html::style('assets/css/style.css') }}
          {{ Html::style('assets/css/responsive.css')}}
          {{ Html::style('assets/css/font-awesome.min.css')}}
          {{ Html::style('https://fonts.googleapis.com/css?family=Kanit')}}
          {{ Html::style('//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css')}}
          <!-- font -->


           <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
          <!-- Include all compiled plugins (below), or include individual files as needed -->
          {{-- {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.th.min.js')}} --}}
          {{ Html::script('https://code.jquery.com/jquery-1.12.4.js')}}
          {{ Html::script('https://code.jquery.com/ui/1.12.1/jquery-ui.js')}}
          {{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css')}}
          {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js')}}
          {{ Html::script('assets/js/bootstrap.min.js')}}
          {{ Html::script('https://www.google.com/recaptcha/api.js')}}
          {{Html::script('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}
  </head>

    <body class="bgcolor">
      <div class="container-fluid">
          <div class="row">
              <div class="col-sm-12 nopadding">
                  <div class="home">
                        <a href="{{url('index')}}"><img class="logotop" src="{{asset('assets/img/index/logo-01.png')}}"></a>
                  </div>
              </div>
          </div>
      </div>
      @php
      $ban=DB::table('user_tbs')->where([
        ['user_status_confirm', '=', '1'],
        ['user_status_ban','=','1'],
        ['user_ban_date','!=',null]
      ])->get();
      foreach ($ban as $key) {
        $dt = Carbon::create(substr($key->user_ban_date,0,4), substr($key->user_ban_date,5,2), substr($key->user_ban_date,8,2),substr($key->user_ban_date,11,2),substr($key->user_ban_date,14,2),substr($key->user_ban_date,17,2));
        $now = Carbon::now();
        if($dt->diffInMinutes($now, false)>=10080){
          $data=array(
            'user_status_ban' => 0,
            'user_ban_date'  => null
          );
          DB::table('user_tbs')->where('id', '=', $key->user_id)
	         ->update($data);
        }
      }

      $renews=App\renew::where('read',1)->get();
      foreach ($renews as $renew) {
      $dt = Carbon::create(substr($renew->updated_at,0,4), substr($renew->updated_at,5,2), substr($renew->updated_at,8,2),substr($renew->updated_at,11,2),substr($renew->updated_at,14,2),substr($renew->updated_at,17,2));
      $now = Carbon::now();
      // dd($dt->diffInMonths($now, false));
        if($dt->diffInMonths($now, false)>=2){
          Storage::delete('images/renew/'.$img->user_img_identity);
            $renew->delete();
        }
      }
      $forums=App\forum::get();
      // foreach ($forums as $forum) {
      // $dt = Carbon::create(substr($forum->created_at,0,4), substr($forum->created_at,5,2), substr($forum->created_at,8,2),substr($forum->created_at,11,2),substr($forum->created_at,14,2),substr($forum->created_at,17,2));
      // $now = Carbon::now();
      // // dd($dt->diffInMonths($now, false));
      //   if($dt->diffInDays($now, false)>=200){
      //     $data= App\img::where('forum_id',$forum->id)->get();
      //     foreach ($data as $key ) {
      //       Storage::delete('images/forum/'.$key->name);
      //       $key->delete();
      //     }
      //       $forum->delete();
      //   }
      // }
      $banners=App\banner::get();
      foreach ($banners as $banner) {
      $dt = Carbon::create(substr($banner->expired,0,4), substr($banner->expired,5,2), substr($banner->expired,8,2),substr($banner->expired,11,2),substr($banner->expired,14,2),substr($banner->expired,17,2));
      $now = Carbon::now();
      // dd($dt->diffInDays($now, false));
        if($dt->diffInDays($now, false)>=1){
          Storage::delete('images/banner/'.$banner->name);
          $banner->delete();
        }
      }
      $forums=App\forum::get();
      foreach ($forums as $forum) {
      $dt = Carbon::create(substr($forum->created_at,0,4), substr($forum->created_at,5,2), substr($forum->created_at,8,2),substr($forum->created_at,11,2),substr($forum->created_at,14,2),substr($forum->created_at,17,2));
      $now = Carbon::now();
        if($dt->diffInDays($now, false)>200){
          $imgs=App\img::where('forum_id',$forum->id)->get();
          foreach ($imgs as $img) {
          Storage::delete('images/forum/'.$img->name);
          $img->delete();
          }
          $replys=App\reply::where('forum_id',$forum->id)->get();
          foreach ($replys as $reply) {
            $answers=App\answer_reply::where('reply_id',$reply->id)->get();
            foreach ($answers as $answer) {
              $answer->delete();
            }
            $reply->delete();

          }
          $counts=App\count::where('forum_id',$forum->id)->get();
          foreach ($counts as $count) {
            $count->delete();
          }
          $forum->delete();
        }
      }
      @endphp
      @include('layouts.topmenu')
      @yield('content')
      </body>

</html>
