<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\renew;
use App\user_tb;
use Session;
use Carbon;
class renewController extends Controller
{
    public function renew(Request $r)
    {
    $file = $r->file('Transfer');
    $name= time().'-'.$file->getClientOriginalName();
    $file->storeAs('/images/renew',$name);

    $renew=new renew;
    $renew->user_id = $r->id;
    $renew->type_renew = $r->type_renew;
    $renew->bank = $r->bank;
    $renew->amount = $r->money;
    $renew->date = $r->date;
    $renew->num_place = $r->placeId;
    $renew->image = $name;
    $renew->save();


    Session::flash('success','แจ้งยืนยันการชำระเงินเรียบร้อย รอ Admin ยืนยัน');
    return redirect('renew');

    }
    public function con_renew($id)
    {
      $renew= renew::find($id);
      $user= user_tb::find($renew->user_id);
      // $expire= Carbon::createFromFormat('Y-m-d H', $user->date_expried)->toDateTimeString();
      $dt = Carbon::create(substr($user->date_expried,0,4), substr($user->date_expried,5,2), substr($user->date_expried,8,2),substr($user->date_expried,11,2),substr($user->date_expried,14,2),substr($user->date_expried,17,2));
      $now=Carbon::now();
      if($dt->diffInSeconds($now, false)>0){
      $user->date_expried=Carbon::now()->addYears(1);
      }else{
      $user->date_expried=$dt->addYears(1);
      }
      $renew->read=1;
      $renew->save();
      $user->save();
      Session::flash('success','ต่ออายุเสร็จสิ้น!!');
      return redirect('backoffice/renew');
      // ($dt->diffInMinutes($now, false)>=10080)
      // if($dt->diffInSeconds($now, false)>=10080){

      // }
      // $user->date_expried=Carbon::now()->addYears(1)
    }
    public function del_renew($id)
    {
      $renew= renew::find($id);
      $renew->delete();
      Session::flash('success','ลบเสร็จสิ้น !!');
      return redirect('backoffice/renew');
    }
}
