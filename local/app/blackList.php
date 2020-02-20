<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blacklist extends Model
{
protected $fillable=[
'username','fullname','account_bank','bank'
];
}
