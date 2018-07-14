<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use Hash;
use Carbon\Carbon;
use DateTime;
use Session;

class ShopController extends Controller
{
  
  public function getArticles($category_id)
  {
    $getArticles = DB::table('items')->where('category_id', $category_id)->get();
    return json_encode($getArticles);
  }

}
