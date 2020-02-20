<?php

namespace App\Http\Controllers;
use user_tb;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\requestRecover;
use DB;
class recoverPassword extends Controller
{
    public function recoverPassword(requestRecover $r)
    {
      $user=DB::table('user_tbs')->where([
        ['user_identity', '=', $r->iden],
        ['user_username', '=', $r->username],
        ['user_birth_date', '=', $r->birthday],
        ['user_status_confirm', '=', 1]
        ])->first();
        if(count($user)>0){
          $data=array(
            'user'=>$user
          );
          return view('changePassword',$data);
        }else{
          Session::flash('failed','ไม่พบข้อมูล');
          return back();
        }
    }
    public function changePassword(Request $r)
    {
      $pass=md5($r->pass);
      $data=array(
        'user_password_origin'=>$r->pass,
        'user_password'=>$pass
      );
      DB::table('user_tbs')->where('user_id', '=', $r->id)
	       ->update($data);
         return redirect('index');
    }
}
