<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use Hash;
use Carbon\Carbon;
use DateTime;
use Session;

class MainController extends Controller
{
  public function __construct()
  {
    //$this->middleware('auth');
  }

  public function checkTempSession()
  {
    if (!Auth::user()) {
      $getTempUserID = Session::get('temp_user');
      if (!$getTempUserID) {
        $insertTempUserGetID = DB::table('temp_users')->insertGetID(['status' => 1]);
        if ($insertTempUserGetID) {
          Session::put('temp_user', $insertTempUserGetID);
          return true;
        } else {
          //IF new temp_user entry couldnt be created
          return false;
        }
      } else {
        //IF there is a temp_user session and user not logged in
        $getTempUser = DB::table('temp_users')->where('id', $getTempUserID)->first();
        if ($getTempUser) {
          return true;
        } else {
          Session::forget('temp_user');
          $this->checkTempSession();
          return true;
        }
      }
    } else {
      //IF user is logged in
      return false;
    }
  }

  public function getTempUser()
  {
    if (!Auth::user()) {
      $getTempUserID = Session::get('temp_user');
      if ($this->checkTempSession()) {
        $getTempUser = DB::table('temp_users')->where('id', $getTempUserID)->first();
        $getTempUser->rid = $getTempUser->id;
        $getTempUser->id = 'T'.$getTempUser->id;
        return $getTempUser;
      } else {
        return false;
      }
    }
  }

  public function getUserOrTempUser()
  {
    //IF user is logged in return array of "user", if not return array of "temp_user"
    $getTempUser = $this->getTempUser();
    if ($getTempUser) {
      return $getTempUser;
    } else {
      return Auth::user();
    }
  }

  public function index()
  {
    //IF user not logged in create session
    $this->checkTempSession();
    //DEV loggt automatisch User mit ID 1 ein
    Auth::loginUsingId(1, true);
    return view('index');
  }

}
