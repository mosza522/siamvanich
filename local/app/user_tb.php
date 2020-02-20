<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_tb extends Model
{
    protected $fillable=[
  'user_type','user_fullname','user_sex','user_identity','user_birth_date','user_img_identity'
  ,'user_img_account_home','user_address','user_province','user_zipcode','user_tell','user_bank_name','user_account'
  ,'user_account_name','user_account_type','user_account_branch','user_account_province','user_email'
  ,'user_username','user_password_origin','user_password','user_status_confirm','user_status_ban','user_ban_date'
  ,'last_login','date_expried'
];
}
