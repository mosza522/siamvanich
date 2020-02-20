<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use DB;
use Carbon;
use Alert;
class LoginController extends Controller
{
    public function LoginBackoffice(Request $r)
    {
      // dd($r);
    $pass=md5($r->pass);
    $user = DB::table('tb_admin')->where([
      ['admin_username' ,'=', $r->user],
      ['admin_password' ,'=', $pass]
    ])
      ->first();
    if(isset($user)){
      Session::put('user',$user->id);
      Session::put('page','index');
      DB::table('tb_admin')->where('id', '=', $user->id)
	    ->update(array('admin_lastlogin' => Carbon::now()));
      return redirect('backoffice/index');
    }else{
      // Alert::message('Robots are working!');
      return back()->with('wrong', 'Username or password is wrong. !!');
    }
    }
    public function LoginUser(Request $r)
    {
      $password=md5($r->password);
      $user=\App\user_tb::where([
        ['user_status_confirm',1 ],
        ['user_status_ban',0 ],
        ['user_username',$r->username ],
        ['user_password', $password],
      ])->first();
      if(count($user)>0){
        DB::table('user_tbs')->where('id', '=', $user->id)
  	    ->update(array('last_login' => Carbon::now()));
        Session::put('userData', $user);
        return redirect('indexUser');
      }else{
        Session::flash('wrong', 'Username หรือ Password ไม่ถูกต้อง');
        return redirect('index');
      }
      // Session::flash('message','I am a successful message!');
      // return view('pageUser');
    }
    public function authProfile(Request $r)
    {
      $user=\App\user_tb::where('id',$r->id)->first();
      if($user->user_identity==$r->iden){
        Session::put('authen', 'authen');
        return redirect('editProfile');
      }else{
        Session::flash('wrong', 'รหัสประจำตัวประชาชน ไม่ถูกต้อง');
        return redirect()->back();
      }
    }
}
