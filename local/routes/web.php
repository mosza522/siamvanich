<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  if(Session::has('userData')){
    return redirect('indexUser');
  }else{
    return view('index');
  }
});
Route::get('backoffice', function () {
  Session::forget('user');
    return view('backoffice/login');
});
Route::get('/regis', function () {
    return view('regis');
});
Route::get('index', function () {
  if(Session::has('userData')){
    if(Session::has('wrong')){
      Session::flash('wrong', Session::get('wrong'));
    }
    return redirect('indexUser');
  }else{
    return view('index');
  }
});
Route::get('regis_member', function () {
    return view('regis_member');
});
Route::get('confirm_vip', function () {
    return view('confirm_vip');
});
Route::get('confirm_normal', function () {
    return view('confirm_normal');
});
//User_login
Route::post('loginUser','LoginController@LoginUser');
Route::get('indexUser', function () {
  if(Session::has('userData')){
    return view('pageUser');
  }else{
      return redirect('index');
  }

});
Route::get('profile', function () {
  if(Session::has('userData')){
    return view('profile');
  }else{
      return redirect('index');
  }
});
Route::get('profile/{id}', function ($id) {
  $data=array(
    'id'=> $id
  );
    return view('profile',$data);

});
Route::get('logoutUser', function () {
  Session::forget('userData');
  return redirect('index');
});

Route::resource('user','UserController');
Route::get('changeUserPassword', function () {
    return view('authenProfile');
});
Route::get('blacklist', function () {
    return view('blacklist');
});
Route::get('advertise', function () {
    return view('advertise');
});
Route::get('forgotPassword', function () {
    return view('forgotPassword');
});

Route::post('recoverPassword','recoverPassword@recoverPassword');
Route::post('changePassword','recoverPassword@changePassword');

Route::get('renew', function () {
    return view('renew');
});
Route::post('searchBlacklist','searchController@searchBlacklist');
// Auth::routes();
Route::get('editProfile', function () {
  if(Session::has('authen') or Session::has('wrong')){
    return view('editProfile');
  }else{
    return redirect('index');
  }
});
Route::post('changePasswordAndImg','LoginController@authProfile');
Route::post('changeUserData','UserController@changeUserData');

Route::get('forumVip', function () {
  if(Session::has('userData')){
    if(Session::get('userData')->user_type=='vip' or Session::get('userData')->user_type=='Admin'){
    return view('forumVip');
    }
    Session::flash('wrong', 'ไม่สามารถไปยังส่วนของ Vip ได้');
    return redirect('index');
  }else{
    Session::flash('wrong', 'กรุณา Login');
      return redirect('index');
  }

});
Route::get('forumNormal', function () {
return view('forumNormal');
});

Route::get('placeId', function () {
    return view('placeId');
});
Route::post('renew','renewController@renew');
Route::get('Category/vip/{id}',['uses' =>'forumController@chooseCategoryVip']);
Route::get('Category/vip/{id}/{page}',['uses' =>'forumController@chooseCategoryVipPage']);
Route::get('Category/normal/{id}', function ($id) {
  $data=array(
    'id'=>$id,
    'page'=> 1,
    'type'=> 'normal'
  );
  return view('after_category',$data);
});
Route::get('Category/normal/{id}/{page}', function ($id,$page) {
$data=array(
    'id'=>$id,
    'page'=> $page,
    'type'=> 'normal'
  );
  return view('after_category',$data);
});

Route::get('createForumForm/{id}', function ($id) {
  $data=array(
    'id'=>$id
  );
return view('createForum',$data);
});
Route::post('createForum','forumController@createForum');
Route::get('detailForum/{id}', function ($id) {
  $forums= App\forum::leftJoin('user_tbs', 'forums.user_id','=', 'user_tbs.id')
  ->where('forums.id',$id)
  ->select('user_tbs.user_type')
  ->first();
  if($forums->user_type=='vip'){
    if(Session::has('userData')){
    if(Session::get('userData')->user_type==$forums->user_type or Session::get('userData')->user_type=='Admin'){
    return view('detailForum',['id'=>$id]);
    }
    Session::flash('wrong', 'ไม่สามารถไปยังส่วนของ Vip ได้');
    return redirect('index');
  }else{
    Session::flash('wrong', 'กรุณา Login');
    return redirect('index');
  }
}else {
  return view('detailForum',['id'=>$id,]);
}

});
Route::get('middleSystem', function () {
      return view('middleSystem');
});
Route::post('reply','replyController@reply');
Route::post('answer','replyController@answer');
Route::post('myForum','forumController@myForum');
//============================================Backoffice===============================================
Route::post('login_backoffice','LoginController@LoginBackoffice');
Route::get('backoffice/logout', function () {
  DB::table('tb_admin')->where('id', '=', Session::get('user'))
    ->update(array('admin_lastlogout' => Carbon::now()));
    Session::forget('user');
    return redirect('backoffice/');
});
Route::get('backoffice/index', function () {
  if(!Session::has('user')){
    return redirect('backoffice/')->with('wrong', 'กรุณา Login. !!');
  }
    Session::put('page','index');
    return view('backoffice/index');
});
Route::get('backoffice/admin', function () {
  if(!Session::has('user')){
    return redirect('backoffice/')->with('wrong', 'กรุณา Login. !!');
  }
    Session::put('page','admin');
    return view('backoffice.admin.home');
});
Route::get('backoffice/addAdmin_form', function () {
  if(!Session::has('user')){
    return redirect('backoffice/')->with('wrong', 'กรุณา Login. !!');
  }
    return view('backoffice.admin.addAdmin_form');
});
Route::post('backoffice/add_admin','AdminController@add_admin');
Route::get('backoffice/del_admin/{id}', function ($id) {
  DB::table('tb_admin')->where('id', '=', $id)->delete();
  Session::flash('success', 'Delete Success');
  return redirect('backoffice/admin');
});
Route::get('backoffice/edit_admin/{id}',['uses' =>'AdminController@edit_admin']);
Route::post('backoffice/update_admin','AdminController@update_admin');
//Route::any('AddUser','UserController');

//USER
Route::get('backoffice/userHome', function () {
  if(!Session::has('user')){
    return redirect('backoffice/')->with('wrong', 'กรุณา Login. !!');
  }
    Session::put('page','userHome');
    return view('backoffice.user.home');
});
Route::get('backoffice/userConfirm', function () {
  if(!Session::has('user')){
    return redirect('backoffice/')->with('wrong', 'กรุณา Login. !!');
  }
    Session::put('page','userConfirm');
    return view('backoffice.user.confirm');
});
Route::get('backoffice/imgIden/{id}', function ($id) {
  $data=array(
    'id'=>$id
  );
    return view('backoffice.user.imgIden',$data);
});
Route::get('backoffice/imgAccount/{id}', function ($id) {
  $data=array(
    'id'=>$id
  );
    return view('backoffice.user.imgAccount',$data);
});
Route::get('backoffice/confirm_user/{id}', function ($id) {
  $char=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V'
  ,'W','X','Y','Z');
  $user_id=$char[rand(0,25)].substr(microtime(),2,6);
  $data=array(
    'user_status_confirm' => 1,
    'created_at' =>Carbon::now(),
    'updated_at'  => Carbon::now(),
    'date_expried'  => Carbon::now()->addYears(1),
    'user_id' => $user_id,
  );
  DB::table('user_tbs')->where('id', '=', $id)
    ->update($data);
      Session::flash('success', 'Confirm success');
    return redirect('backoffice/userConfirm');

});
Route::get('backoffice/del_user_con/{id}',['uses' =>'delUserController@del_user']);
Route::get('backoffice/del_user/{id}',['uses' =>'delUserController@del_user']);
Route::get('backoffice/ban_user/{id}', function ($id) {
  $data=array(
    'user_status_ban' => 1,
    'user_ban_date'  => Carbon::now()
  );
  DB::table('user_tbs')->where('id', '=', $id)
    ->update($data);
      Session::flash('success', 'Ban success');
      Alert::info('Info Message', 'Optional Title');
    return redirect('backoffice/userHome');

});
Route::get('backoffice/unban_user/{id}', function ($id) {
  $data=array(
    'user_status_ban' => 0,
    'user_ban_date'  => null
  );
  DB::table('user_tbs')->where('id', '=', $id)
    ->update($data);
      Session::flash('success', 'Unbanned success');
      Alert::info('Info Message', 'Optional Title');
      return redirect('backoffice/userHome');

});
Route::get('backoffice/blacklist', function () {
  if(!Session::has('user')){
    return redirect('backoffice/')->with('wrong', 'กรุณา Login. !!');
  }
    Session::put('page','blacklist');
    return view('backoffice.blacklist.home');
});
Route::get('backoffice/addBlacklist_form', function () {
    return view('backoffice.blacklist.addBlacklist_form');
});
Route::resource('add_blacklist','blacklistController');
Route::get('backoffice/del_blacklist/{id}', function ($id) {
  $bl=App\blacklist::where('id', $id)->first();
  $bl=$bl->delete();
  Session::flash('success', 'Deleted success');
  return back();
});
Route::get('backoffice/renew', function () {
  if(!Session::has('user')){
    return redirect('backoffice/')->with('wrong', 'กรุณา Login. !!');
  }
    Session::put('page','renew');
    return view('backoffice.renew.home');
});
// del_renew
// con_renew
Route::get('backoffice/con_renew/{id}',['uses' =>'renewController@con_renew']);
Route::get('backoffice/del_renew/{id}',['uses' =>'renewController@del_renew']);
Route::get('backoffice/contentFirstPage', function () {
  if(!Session::has('user')){
    return redirect('backoffice/')->with('wrong', 'กรุณา Login. !!');
  }
    Session::put('page','contentFirstPage');
    return view('backoffice.content.firstPage');
});
Route::get('backoffice/contentIndex', function () {
  if(!Session::has('user')){
    return redirect('backoffice/')->with('wrong', 'กรุณา Login. !!');
  }
    Session::put('page','contentIndex');
    return view('backoffice.content.Index');
});
Route::get('backoffice/contentRules', function () {
  if(!Session::has('user')){
    return redirect('backoffice/')->with('wrong', 'กรุณา Login. !!');
  }
    Session::put('page','contentRules');
    return view('backoffice.content.Rules');
});
Route::post('addContentIndex','contentController@addContentIndex');
Route::post('addContentRules','contentController@addContentRules');
Route::post('addContentFirstPage','contentController@addContentFirstPage');
Route::get('backoffice/deleteIndex', function () {
 $data= App\content::where('page','index')->first();
 $data->delete();
 Session::flash('success','ลบข้อมูลเสร็จสิ้น');
 return redirect()->back();
});
Route::get('backoffice/deleteRules', function () {
 $data= App\content::where('page','rules')->first();
 $data->delete();
 Session::flash('success','ลบข้อมูลเสร็จสิ้น');
 return redirect()->back();
});
Route::get('backoffice/deleteFirstPage', function () {
 $data= App\content::where('page','firstpage')->first();
 $data->delete();
 Session::flash('success','ลบข้อมูลเสร็จสิ้น');
 return redirect()->back();
});

Route::get('backoffice/forumCategory', function () {
  if(!Session::has('user')){
    return redirect('backoffice/')->with('wrong', 'กรุณา Login. !!');
  }
    Session::put('page','forumCategory');
    return view('backoffice.forum.category');
});
Route::get('backoffice/forumManage', function () {
  if(!Session::has('user')){
    return redirect('backoffice/')->with('wrong', 'กรุณา Login. !!');
  }
    Session::put('page','forumManage');
    return view('backoffice.forum.forum');
});
Route::get('backoffice/addCategory', function () {
  if(!Session::has('user')){
    return redirect('backoffice/')->with('wrong', 'กรุณา Login. !!');
  }
    Session::put('page','forumCategory');
    return view('backoffice.forum.addCategory');
});
Route::post('backoffice/addCategory','forumController@addCategory');
Route::post('backoffice/updateCategory','forumController@updateCategory');

Route::get('backoffice/edit_category/{id}',['uses' =>'forumController@edit_category']);
Route::get('backoffice/del_category/{id}',['uses' =>'forumController@delCategory']);
Route::get('backoffice/del_forum/{id}', function ($id) {

  $data= App\img::where('forum_id',$id)->get();
  foreach ($data as $key ) {
    Storage::delete('images/forum/'.$key->name);
    $key->delete();
  }
  $data= App\forum::where('id',$id)->first();
  $data->delete();
  Session::flash('success','ลบข้อมูลเสร็จสิ้น');
  return redirect()->back();
});
Route::get('backoffice/del_img_forum/{id}', function ($id) {
  $data= App\img::where('id',$id)->first();
  Storage::delete('images/forum/'.$data->name);
  $data->delete();
  Session::flash('success','ลบข้อมูลเสร็จสิ้น');
  return redirect()->back();
});
Route::get('backoffice/banner', function () {
  if(!Session::has('user')){
    return redirect('backoffice/')->with('wrong', 'กรุณา Login. !!');
  }
    Session::put('page','banner');
    return view('backoffice.banner.home');
});
Route::get('backoffice/addbanner_form', function () {
  if(!Session::has('user')){
    return redirect('backoffice/')->with('wrong', 'กรุณา Login. !!');
  }
    Session::put('page','banner');
    return view('backoffice.banner.addBanner_form');
});
Route::post('backoffice/add_banner','bannerController@add_banner');
Route::get('backoffice/del_banner/{id}', function ($id) {
  $data= App\banner::where('id',$id)->first();
  Storage::delete('images/banner/'.$data->name);
  $data->delete();
  Session::flash('success','ลบข้อมูลเสร็จสิ้น');
  return redirect()->back();
});
