<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\blacklist;

class searchController extends Controller
{
  public function searchBlacklist(Request $r)
  {
    $bl=new blacklist;
    $bl=$bl->where('username','like','%'.$r->search.'%')->get();
    $data=array(
      'search'=> $bl
    );
    return view('blacklist',$data);
  }
}
