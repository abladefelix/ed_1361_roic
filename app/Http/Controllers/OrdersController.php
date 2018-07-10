<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use Hash;
use Carbon\Carbon;
use DateTime;

class OrdersController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function getUserOrders()
  {
    $getOrders = DB::table('orders')->where('user_id', Auth::user()->id)->orderby('id', 'DESC')->get();
    foreach ($getOrders as $key => $order) {
      $order->items_coins = DB::table('cart_lines')->where('cart_id', $order->cart_id)->where('item_type', 'roic_coins')->count();
      $order->items_info = DB::table('cart_lines')->where('cart_id', $order->cart_id)->where('item_type', 'information')->count();
    }
    return json_encode($getOrders);
  }

  public function getUserOrder($order_id)
  {
    $getOrder = DB::table('orders')->where('order_id', $order_id)->first();
    $getOrder->lines = DB::table('cart_lines')->where('cart_id', $getOrder->cart_id)->get();
    $getOrder->items_coins = DB::table('cart_lines')->where('cart_id', $getOrder->cart_id)->where('item_type', 'roic_coins')->count();
    $getOrder->items_info = DB::table('cart_lines')->where('cart_id', $getOrder->cart_id)->where('item_type', 'information')->count();
    return json_encode($getOrder);
  }

}
