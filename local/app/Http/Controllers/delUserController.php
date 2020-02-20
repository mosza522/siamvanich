<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Storage;
class delUserController extends Controller
{
    public function del_user($id)
    {
      // dd($id);
      $user=DB::table('user_tbs')->where('id', '=', $id)->get();
      $img=$user->first();
      Storage::delete('images/'.$img->user_img_identity);
      Storage::delete('images/'.$img->user_img_account_home);
      DB::table('user_tbs')->where('id', '=', $id)->delete();
      Session::flash('success', 'Delete Success');
      return redirect()->back();
    }
}
