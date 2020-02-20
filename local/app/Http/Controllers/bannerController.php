<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Carbon;
class bannerController extends Controller
{
    public function add_banner(Request $r)
    {
      $file = $r->file('img');
      $name= time().'-'.$file->getClientOriginalName();
      $file->storeAs('/images/banner',$name);
      $dt = Carbon::now();
      $dt = $dt->addMonths($r->expired);
      $banner= new \App\banner;
      $banner->position=$r->position;
      $banner->name=$name;
      $banner->expired=$dt;
      $banner->note=$r->note;
      $banner->save();
      Session::flash('success','เพิ่มโฆษณาเสร็จสิ้น');
      return redirect('backoffice/banner');

    }
}
