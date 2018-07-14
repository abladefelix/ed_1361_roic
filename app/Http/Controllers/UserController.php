<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use Hash;
use Carbon\Carbon;
use DateTime;

class UserController extends Controller
{
  public function __construct()
  {
    //$this->middleware('auth');
  }

  public function getUser()
  {
    $getUser = (new MainController)->getUserOrTempUser();
    return json_encode($getUser);
  }

  public function getUserCoins()
  {
    $getUserCoins = DB::table('users')->where('id', Auth::user()->id)->select('roic_coins')->first();
    return json_encode($getUserCoins);
  }

  public function updateUser()
  {
    if ((new MainController)->checkTempSession()) {
      $getTempUser = (new MainController)->getTempUser();
      $getTempUser->id = str_replace('T', '', $getTempUser->id);
      $updateTempUser = DB::table('temp_users')->where('id', $getTempUser->id)->update(['firstname' => $_POST['firstname'], 'lastname' => $_POST['lastname'], 'username' => $_POST['username'], 'email' => $_POST['email'], 'address' => $_POST['address'], 'city' => $_POST['city'], 'country' => $_POST['country'], 'state' => $_POST['state'], 'zip' => $_POST['zip']]);
      if ($updateTempUser) {
        return json_encode(['status' => 'success']);
      } else {
        return json_encode(['status' => 'no_changes']);
      }
    } else {
      $updateUser = DB::table('users')->where('id', Auth::user()->id)->update(['firstname' => $_POST['firstname'], 'lastname' => $_POST['lastname'], 'username' => $_POST['username'], 'address' => $_POST['address'], 'city' => $_POST['city'], 'country' => $_POST['country'], 'state' => $_POST['state'], 'zip' => $_POST['zip']]);
      if ($updateUser) {
        return json_encode(['status' => 'success']);
      } else {
        return json_encode(['status' => 'no_changes']);
      }
    }
  }

  public function getUserOverview()
  {
    $getUserOverview = [];
    $getUserOrdersCount = DB::table('orders')->where('user_id', Auth::user()->id)->count();
    $getUserOverview['orders_count'] = $getUserOrdersCount;
    return json_encode($getUserOverview);
  }

}
