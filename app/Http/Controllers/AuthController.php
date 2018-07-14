<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use Hash;
use Carbon\Carbon;
use DateTime;

class AuthController extends Controller
{

  public function logout()
  {
    Auth::logout();
     return redirect('login?out');
  }

  public function register()
  {
    return view('register');
  }

}
