<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use Hash;

class MailController extends Controller
{

  function checkoutRegistration($receiver) {
    $mailtext = '<html>
    <body>

    <h1>Hello thanks for using ROIC.</h1>

    </body>
    </html>
    ';

    $empfaenger = $receiver;
    $absendermail   = "info@jonasattiah.de";
    $absendername   = "Welcome to ROIC";
    $betreff    = "Thank you for using ROIC";

    $header  = "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html; charset=utf-8\r\n";

    $header .= "From: $absendername <$absendermail>";
    // $header .= "Cc: $cc\r\n";  // falls an CC gesendet werden soll
    $header .= "X-Mailer: PHP ". phpversion();

    mail($empfaenger, $betreff, $mailtext, $header);

  }

}
