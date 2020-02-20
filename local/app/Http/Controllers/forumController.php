<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\forum_category;
use App\forum;
use App\img;
use Input;
use Storage;
class forumController extends Controller
{
    public function addCategory(Request $r)
    {
      $cat= new forum_category;
      $cat->category_name=$r->category_name;
      $cat->note=$r->note;
      $cat->save();
      Session::flash('success','เพิ่มหมวดกระทู้เสร็จสิ้น');
      return redirect('backoffice/forumCategory');
    }
    public function edit_category($id)
    {
      $cat=forum_category::find($id);
      $data=array(
        'cat'=>$cat
      );
      return view('backoffice.forum.addCategory',$data);
    }
    public function updateCategory(Request $r)
    {
      $cat=forum_category::find($r->id);
      $cat->category_name=$r->category_name;
      $cat->note=$r->note;
      $cat->save();
      Session::flash('success','แก้ไขหมวดกระทู้เรียบร้อย');
      return redirect('backoffice/forumCategory');
    }
    public function delCategory($id)
    {
      $cat=forum_category::find($id);
      $cat->delete();
      Session::flash('success','ลบกระทู้เรียบร้อย');
      return redirect('backoffice/forumCategory');
    }
    public function chooseCategoryVip($id)
    {
      if(Session::get('userData')->user_type=='vip' or Session::get('userData')->user_type=='Admin'){
        $data=array(
          'id'=>$id,
          'page'=> 1
        );
        return view('after_category',$data);
      }
      return redirect('index');
    }
    public function createForum(Request $r)
    {
    $forum =new forum;
    $forum->category_id = $r->category_id;
    $forum->type = Session::get('userData')->user_type;
    $forum->name = $r->name;
    $forum->price = $r->price;
    $forum->detail = $r->detail;
    $forum->user_id = Session::get('userData')->id;
    $forum->save();

    $newForum= forum::orderBy('id','desc')->first();
    $files = $r->file('img');
    foreach ($files as $file ) {
    $img = new img;
    $name= $newForum->id.'-'.time().'-'.$file->getClientOriginalName();
    $file->storeAs('/images/forum',$name);
    $img->forum_id = $newForum->id;
    $img->name = $name;
    $img->save();
    }
    Session::flash('success','ตั้งกระทู้ขายสินค้าเสร็จสิ้น');
    return redirect('Category/'.Session::get('userData')->user_type.'/'.$newForum->category_id);

    }
    public function chooseCategoryVipPage($id , $page)
    {
      if(Session::get('userData')->user_type=='vip'){
        $data=array(
          'id'=>$id,
          'page'=> $page
        );
        return view('after_category',$data);
      }
      return redirect('index');
    }
    public function myForum(Request $r)
    {
      if(Session::get('userData')->id==$r->id){
        $data=array(
          'id'=>$r->id
        );
        return view('myForum',$data);
      }
      return redirect('index');
    }
}
