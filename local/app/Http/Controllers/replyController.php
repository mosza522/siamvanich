<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\reply;
class replyController extends Controller
{
    public function reply(Request $r)
    {
      $reply=new reply;
      $reply->user_id=Session::get('userData')->id;
      $reply->forum_id=$r->forum_id;
      $reply->question=$r->question;
      $reply->save();
      Session::flash('success','สอบถามเสร็จสิ้น');
      return redirect()->back();

    }
    public function answer(Request $r)
    {
      $answer= new \App\answer_reply;
      $answer->reply_id = $r->id;
      $answer->answer_detail= $r->answer;
      $answer->user_id= $r->user_id;
      $answer->save();
      return redirect()->back();
    }
}
