<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\user_tb;
use Alert;
use Input;
use Storage;
use File;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $password_md5=md5($request->user_password);
        $date="";
        $month="";
        $birthdate="";
        if(strlen($request->date)<2){
          $date="0".$request->date;
        }else{
          $date=$request->date;
        }
        if(strlen($request->month)<2){
          $month="0".$request->month;
        }else{
          $month=$request->month;
        }
        //uploadFile
        $file = $request->file('user_img_identity');
        $file2 = $request->file('user_img_account_home');
        $name= time().'-'.$file->getClientOriginalName();
        $name2= time().'-'.$file2->getClientOriginalName();

        $file->storeAs('/images',$name);
        $file2->storeAs('/images',$name2);



        // $path_name = $file->storeAs($code,$name);
        $birthdate=$date.$month.$request->years;
        $user=new user_tb;
        $user->user_type = $request->user_type;
        $user->user_fullname = $request->user_fullname;
        $user->user_sex = $request->user_sex;
        $user->user_identity = $request->identity;
        $user->user_birth_date = $birthdate;
        $user->user_img_identity = $name;
        $user->user_img_account_home = $name2;
        $user->user_address = $request->user_address;
        $user->user_province = $request->user_province;
        $user->user_zipcode = $request->user_zipcode;
        $user->user_tell = $request->user_tell;
        $user->user_bank_name = $request->user_bank_name;
        $user->user_account = $request->user_account;
        $user->user_account_name = $request->user_account_name;
        $user->user_account_type = $request->user_account_type;
        $user->user_account_branch = $request->user_account_branch;
        $user->user_account_province = $request->user_account_province;
        $user->user_email = $request->user_email;
        $user->user_username = $request->user_username;
        $user->user_password_origin = $request->user_password;
        $user->user_password = $password_md5;
        $user->save();
        // $user_img_identity = rand(0,1000)."-".$request->user_img_identity;
        // $user_img_account_home = rand(0,1000)."-".$request->user_img_account_home;
        // $file1 = $request->file('user_img_identity');
        // $file2 = $request->file('user_img_account_home');

        // Storage::move('old/file1.jpg', 'new/file1.jpg');
        if($request->user_type=="vip"){
          // Alert::message('Robots are working!');
          return redirect('confirm_vip');
        }else{
          return redirect('confirm_normal');
        }

        // $this->validate($request, [
        //   'user_type'=> 'required',
        //   'user_fullname'=> 'required',
        //   'user_sex'=> 'required',
        //   'date'=> 'required',
        //   'month'=> 'required',
        //   'years'=> 'required',
        //   'identity'=> 'required',
        //   'user_img_identity'=> 'required',
        //   'user_img_account_home'=> 'required',
        //   'user_address'=> 'required',
        //   'user_province'=> 'required',
        //   'user_zipcode'=> 'required',
        //   'user_tell'=> 'required',
        //   'user_bank_name'=> 'required',
        //   'user_account'=> 'required',
        //   'user_account_name'=> 'required',
        //   'user_account_type'=> 'required',
        //   'user_account_branch'=> 'required',
        //   'user_account_province'=> 'required',
        //   'user_email'=> 'required',
        //   'user_username'=> 'required',
        //   'user_password'=> 'required',
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // $user_tb=user_tb::find($id);
      // $user_tb->user_status_confirm = 1;
      // $user_tb->save();
      //
      // Session::flash('success','Confirm success');
      // return redirect('backoffice/userConfirm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function changeUserData(Request $r)
    {
      $user=\App\user_tb::where('id',$r->id)->first();
      if($user->user_password==md5($r->oldpass)){
        if (Input::hasFile('img')){
          $file = $r->file('img');
          $name= time().'-'.$file->getClientOriginalName();
          $file->storeAs('/images/user',$name);

          $user=user_tb::where('id',$r->id)->first();
          if($user->img!=null or $user->img!=""){
            Storage::delete('images/user/'.$user->img);
          // File::delete('local/storage/app/images/user'.'/'.$user->img);
          }
          $user->img=$name;
          $user->save();

        }
        if($r->newpass!=null){
          $user=user_tb::where('id',$r->id)->first();
          $user->user_password=md5($r->newpass);
          $user->user_password_origin=$r->newpass;
          $user->save();
        }
        return redirect('profile');

        // dd(Input::file('img'));
        // $file = $r->file('img');
        // $name= time().'-'.$file->getClientOriginalName();
        // echo $name;
      }else{
        Session::flash('wrong','รหัสผ่านไม่ถูกต้อง');
        return redirect()->back();
      }


    }
}
