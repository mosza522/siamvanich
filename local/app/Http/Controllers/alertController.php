<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
class alertController extends Controller
{
    public function alert()
    {
      Alert::error('Error Message', 'Optional Title');
      return redirect('backoffice/');
    }
}
