<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use Hash;
use Carbon\Carbon;
use DateTime;

class MLMController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    return view('mlm');
  }

}
