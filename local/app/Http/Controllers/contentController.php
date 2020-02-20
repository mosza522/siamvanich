<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\content;
use Session;
class contentController extends Controller
{
    public function addContentIndex(Request $r)
    {
      if($r->content!=null) {
      $content= content::where('page','index')->get();
      if(count($content)==0 or $content==null){
        $content=new content;
        $content->page="index";
        $content->content=$r->content;
        $content->save();
        Session::flash('success','บันทึกเสร็จสิ้น');
        return redirect()->back();
      }
      else{
        $content2= content::where('page','index')->first();
        $content2->content=$r->content;
        $content2->save();
        Session::flash('success','บันทึกเสร็จสิ้น');
        return redirect()->back();

      }
    }else{
      Session::flash('wrong','กรุณากรอกข้อมูล');
      return redirect()->back();
    }
  }
    public function addContentRules(Request $r)
    {
      if($r->content!=null) {
      $content= content::where('page','rules')->get();
      if(count($content)==0 or $content==null){
        $content=new content;
        $content->page="rules";
        $content->content=$r->content;
        $content->save();
        Session::flash('success','บันทึกเสร็จสิ้น');
        return redirect()->back();
      }
      else{
        $content2= content::where('page','rules')->first();
        $content2->content=$r->content;
        $content2->save();
        Session::flash('success','บันทึกเสร็จสิ้น');
        return redirect()->back();

      }
    }else{
        Session::flash('wrong','กรุณากรอกข้อมูล');
        return redirect()->back();
      }
    }
    public function addContentFirstPage(Request $r)
    {
      if($r->content!=null) {
      $content= content::where('page','firstpage')->get();
      if(count($content)==0 or $content==null){
        $content=new content;
        $content->page="firstpage";
        $content->content=$r->content;
        $content->save();
        Session::flash('success','บันทึกเสร็จสิ้น');
        return redirect()->back();
      }
      else{
        $content2= content::where('page','firstpage')->first();
        $content2->content=$r->content;
        $content2->save();
        Session::flash('success','บันทึกเสร็จสิ้น');
        return redirect()->back();

      }
    }else{
        Session::flash('wrong','กรุณากรอกข้อมูล');
        return redirect()->back();
      }
    }

}
