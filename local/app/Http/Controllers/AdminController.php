<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use DB;
use Carbon;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestAdmin;
class AdminController extends Controller
{
  public function add_admin(RequestAdmin $r)
  {
    $user=$r->admin_fullname;
    $date=Carbon::now();
    $pass=md5($r->password);
    $data=array(
      'admin_fullname'=>$r->admin_fullname,
      'admin_username'=>$r->username,
      'admin_password'=>$pass,
      'admin_password_origin'=>$r->password,
      'admin_permission'=>'admin',
      'admin_status'=>'Y',
      'admin_lastlogin'=>'',
      'admin_lastlogout'=>'',
      'admin_create'=>$date
    );
    // dd($data);
    DB::table('tb_admin')->insert($data);
    $user=new \App\user_tb;
    $user->user_type = 'Admin';
    $user->user_fullname = $r->admin_fullname;
    $user->user_sex = 'Admin';
    $user->user_identity = 'Admin';
    $user->user_birth_date = 'Admin';
    $user->user_img_identity = 'Admin';
    $user->user_img_account_home = 'Admin';
    $user->user_address = 'Admin';
    $user->user_province = 'Admin';
    $user->user_zipcode = 'Admin';
    $user->user_tell = 'Admin';
    $user->user_bank_name = 'Admin';
    $user->user_account = 'Admin';
    $user->user_account_name = 'Admin';
    $user->user_account_type = 'Admin';
    $user->user_account_branch = 'Admin';
    $user->user_account_province = 'Admin';
    $user->user_email = 'Admin';
    $user->user_username = $r->username;
    $user->user_password_origin = $r->password;
    $user->user_password = $pass;
    $user->user_status_confirm = '1';
    $user->save();
    Session::flash('success', 'เพิ่ม Adminstrator เรียบร้อย');
    return redirect('backoffice/admin');
  }
  public function edit_admin($id)
  {
    $admin=DB::table('tb_admin')->where('id', '=', $id)->first();
    $data=array(
      'admin'=>$admin
    );
    // dd($data);
    return view('backoffice.admin.addAdmin_form',$data);
  }
  public function update_admin(Request $r)
  {

    $pass=md5($r->password);
    $data=array(
      'admin_fullname'=>$r->admin_fullname,
      'admin_username'=>$r->username,
      'admin_password'=>$pass,
      'admin_password_origin'=>$r->password
      );
    // dd($r);
    DB::table('tb_admin')->where('id', '=', $r->id)->update($data);
    Session::flash('success', 'แก้ไขข้อมูล Adminstrator เรียบร้อย');
     return redirect('backoffice/admin');
}
}
