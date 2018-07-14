<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use Hash;
use Carbon\Carbon;
use DateTime;
use Session;

class CartController extends Controller
{
  public function __construct()
  {
    //$this->middleware('auth');
  }

  public function checkCartSession()
  {
    $now = new DateTime();
    $getTempUser = (new MainController)->getTempUser();
    if ($getTempUser) {
      $user_id = $getTempUser->id;
    } else {
      $user_id = Auth::user()->id;
    }
    $cartSession = DB::table('cart_session')->where('user_id', $user_id)->where('status', 0)->orderby('id', 'DESC')->first();
    if (!isset($cartSession)) {
      $insertCart = DB::table('cart')->insertGetId(['user_id' => $user_id, 'time_created' => $now]);
      $insertCartSession = DB::table('cart_session')->insert(['user_id' => $user_id, 'cart_id' => $insertCart]);
    }
  }

  public function getCart()
  {
    $getUser = (new MainController)->getUserOrTempUser();
    $this->checkCartSession();
    $cartSession = DB::table('cart_session')->where('user_id', $getUser->id)->orderby('id', 'DESC')->first();
    $cart = DB::table('cart')->where('id', $cartSession->cart_id)->first();
    $cartItems = DB::table('cart_lines')->where('cart_id', $cart->id)->get();
    foreach ($cartItems as $key => $item) {
      if ($item->item_id !== 0) {
        $item->details = $getItem = DB::table('items')->where('id', $item->item_id)->first();
        if ($item->details == null) {
          //Prüft ob es einen Artikel mit dieser ID gibt, wenn nicht dann wird dieser aus der WarenkorbSession entfernt
          $deleteItemFromSession = DB::table('cart_lines')->where('id', $item->id)->delete();
        } else {
          //Prüft ob dieser Artikel im Warenkorb ist, wenn ja dann sollen diese zusammengefasst werden.
          /*
          $checkItemCount = DB::table('cart_lines')->where('item_id', $item->details->id)->get();
          if (count($checkItemCount) > 1) {
            $quantity_count = 0;
            foreach ($checkItemCount as $key => $item_count) {
              $quantity_count = $item_count->quantity + $quantity_count;
            }
            return $quantity_count;
            $updateSessionLine = DB::table('cart_lines')->where('id', $item->id)->update(['quantity' => $quantity_count]);
            $deleteOtherItems = DB::table('cart_lines')->where('item_id', $item->details->id)->where('id', '!=', $item->id)->delete();
          }
          */
        }
        if ($item->quantity == 0) {
          //Wenn dem Artikel keine Menge im Warenkorb zugeordnet wurde Menge auf 1 setzen
          $updateQuantity = DB::table('cart_lines')->where('id', $item->id)->update(['quantity' => 1]);
          $item->quantity = 1;
        }
      }
    }
    $getCart = ['items' => $cartItems, 'cart' => $cart, 'items_count' => count($cartItems)];
    return $getCart;
  }

  public function getCartJS()
  {
    return json_encode($this->getCart());
  }

  public function getCartSession()
  {
    $getUser = (new MainController)->getUserOrTempUser();
    $this->checkCartSession();
    $getCartSession = DB::table('cart_session')->where('user_id', $getUser->id)->orderby('id', 'DESC')->first();
    return $getCartSession;
  }

  public function getItems()
  {
    $getUser = (new MainController)->getUserOrTempUser();
    $cartSession = DB::table('cart_session')->where('user_id', $getUser->id)->orderby('id', 'DESC')->first();
    $cart = DB::table('cart')->where('cart_id', $cartSession->cart_id)->first();
    $cartItems = DB::table('cart_lines')->where('cart_id', $cart->id)->get();
    return $cartItems;
  }

  public function getItemCount()
  {
    $getItemCount = count($this->getItemCount());
    return $getItemCount;
  }

  public function removeFromCart()
  {
    $removeFromCart = DB::table('cart_lines')->where('id', $_POST['line_id'])->delete();
    if ($removeFromCart) {
      return json_encode(['status' => 'line_removed']);
    } else {
      return json_encode(['status' => 'no_change']);
    }
  }

  public function addCoupon()
  {
    $cart_id = $this->getCartSession()->cart_id;
    $checkCoupon = DB::table('cart_lines')->where('cart_id', $cart_id)->where('item_type', 'coupon')->count();
    if ($checkCoupon) {
      return json_encode(['status', 'coupon_already_added']);
    } else {
      $getCoupon = DB::table('coupons')->where('coupon_code', $_POST['coupon_code'])->first();
      $addItem = DB::table('cart_lines')->insert(['cart_id' => $cart_id, 'item_id' => $getCoupon->id, 'item_type' => 'coupon', 'single_price' => $getCoupon->value, 'amount' => $getCoupon->value, 'display_name' => $getCoupon->coupon_code]);
      $updateCart = DB::table('cart')->where('id', $cart_id)->update(['coupon_code' => $getCoupon->coupon_code]);
      return json_encode($getCoupon);
    }
  }

  public function removeCoupon()
  {
    $cart_id = $this->getCartSession()->cart_id;
    $removeCoupon = DB::table('cart_lines')->where('cart_id', $cart_id)->where('item_type', 'coupon')->delete();
    if ($removeCoupon) {
      return json_encode(['status' => 'coupon_removed']);
    } else {
      return json_encode(['status' => 'no_changes']);
    }
  }

  public function getCoupon()
  {
    $cart_id = $this->getCartSession()->cart_id;
    $getCart = DB::table('cart')->where('id', $cart_id)->first();
    $getCoupon = DB::table('coupons')->where('coupon_code', $getCart->coupon_code)->first();
    if (!$getCoupon) {
      $getCoupon = [];
    }
    return json_encode($getCoupon);
  }

  public function addItem()
  {
    $cart_id = $this->getCartSession()->cart_id;
    $checkIsItemAlreadyInCart = DB::table('cart_lines')->where('cart_id', $cart_id)->where('item_id', $_POST['item_id'])->first();
    if (isset($checkIsItemAlreadyInCart)) {
      $checkIsItemAlreadyInCart->quantity = $checkIsItemAlreadyInCart->quantity + 1;
      $amount = $checkIsItemAlreadyInCart->quantity * $checkIsItemAlreadyInCart->single_price;
      $updateQuantity = DB::table('cart_lines')->where('id', $checkIsItemAlreadyInCart->id)->update(['quantity' => $checkIsItemAlreadyInCart->quantity, 'amount' => $amount]);
      return json_encode(['status' => 'quantity_updated']);
    } else {
      $getItem = DB::table('items')->where('id', $_POST['item_id'])->first();
      if (isset($getItem)) {
        $getItem->amount = $getItem->price * 1;
        $addItem = DB::table('cart_lines')->insert(['cart_id' => $cart_id, 'item_id' => $_POST['item_id'], 'item_type' => $getItem->type, 'single_price' => $getItem->price, 'amount' => $getItem->amount]);
        if ($addItem) {
          return json_encode(['status' => 'item_added']);
        } else {
          return json_encode(['status' => 'error']);
        }
      } else {
        return json_encode(['status' => 'item_not_found']);
      }
    }
  }

  public function tempToUser()
  {
    $getTempUser = (new MainController)->getTempUser();
    if ($getTempUser) {
      $temp_password = Hash::make((new PasswordController)->randomPassword());
      (new MailController)->checkoutRegistration($getTempUser->email);
      $insertArray = array(
        'firstname' => $getTempUser->firstname,
        'lastname' => $getTempUser->lastname,
        'username' => $getTempUser->username,
        'address' => $getTempUser->address,
        'address_2' => $getTempUser->address_2,
        'country' => $getTempUser->country,
        'state' => $getTempUser->state,
        'zip' => $getTempUser->zip,
        'email' => $getTempUser->email,
        'password' => $temp_password
      );
      $insertUser = DB::table('users')->insertGetId($insertArray);
      if ($insertUser) {
        $updateTempUserStatus = DB::table('temp_users')->where('id', $getTempUser->rid)->update(['status' => 2]);
        return $insertUser;
      }
    }
  }

  public function generateOrderNumber()
  {
    $today = date("Ymd");
    $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
    return $unique = $today . $rand;
  }

  public function confirmCheckout()
  {
    $tempToUser = $this->tempToUser();
    if ($tempToUser || Auth::user()) {
      if (Auth::user()) {
        $user_id = Auth::user()->id;
      } else {
        $user_id = $tempToUser;
      }
      $getUser = DB::table('users')->where('id', $user_id)->select('firstname', 'lastname', 'email', 'address', 'zip', 'city')->first();
      $getCart = $this->getCart();
      $cartLinesAmount = DB::table('cart_lines')->where('cart_id', $getCart['cart']->id)->sum('amount');
      $order_id = $this->generateOrderNumber().$user_id;
      $order_array = [
        'user_id' => $user_id,
        'cart_id' => $getCart['cart']->id,
        'status' => 'payed',
        'amount' => $cartLinesAmount,
        'order_date' => date('Y-m-d'),
        'order_id' => $order_id,
        'user_firstname' => $getUser->firstname,
        'user_lastname' => $getUser->lastname,
        'user_email' => $getUser->email,
        'user_address' => $getUser->address.' ,'.$getUser->zip.' '.$getUser->city
      ];
      $insertOrder = DB::table('orders')->insertGetID($order_array);
      $updateCart = DB::table('cart_session')->where('cart_id', $getCart['cart']->id)->update(['status' => 1]);
      Session::forget('temp_user');
      Auth::loginUsingId($user_id, true);
      return json_encode(['status' => 'success', 'order_id' => $order_id]);
    }
  }

}
