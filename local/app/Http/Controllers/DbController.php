<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class DbController extends Controller
{
    public function index()
    {
      $time=\Carbon\Carbon :: now();
      //$db=DB::table('articles')->find('1');
      $db=DB::select('select * from articles');
      // $db=DB::insert('insert into articles(title,body,published_at) values (?, ?, ?)',['Article 5','Loremmmmmm',$time ]);
      dd($db);
    }
}
