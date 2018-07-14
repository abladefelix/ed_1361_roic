<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MLMReferralController extends Controller
{
	// get Referral Link
	public function getReferralLink($referral_link_id)
	{
    $getReferralLink = DB::table('referral_links')->where('id', $referral_link_id)->get();
    return json_encode($getReferralLink);   
    //return (string) $getReferralLink;
	}

    // get all Referrals
    public function getAllReferrals()
  	{
	    $getAllReferrals = DB::table('referrals')->orderBy('time_of_action', 'desc')->get();
    	return json_encode($getAllReferrals);
  	}

  	// get all Referral Monthly Actions
    public function getReferralMonthlyActions()
  	{
      // Dummy JSON Array
      $arr = [
          [
              "referral_link_id" => 1,
              "one_month" => 30,
              "three_months" => 78,
              "one_year" => 214
          ],
          [
              "referral_link_id" => 2,
              "one_month" => 30,
              "three_months" => 78,
              "one_year" => 214
          ],
          [
              "referral_link_id" => 3,
              "one_month" => 30,
              "three_months" => 78,
              "one_year" => 214
          ]
      ];

      return json_encode($arr);
  	}
}
