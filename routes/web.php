<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('panel');
});
/*
Route::get('/panel/data', function() {
    return View::make('panel/data');
});
*/
Auth::routes();

//Route::get('/panel/getSendMailAgain', 'PanelController@getSendMailAgain');
Route::get('/verify/email', 'PanelController@Verify_Email');
Route::get('/panel/mailError', 'PanelController@mailError');

Route::get('/panel/potential/add', 'PanelController@viewPotentialAdd');
/* sety 7. July 2017 */Route::get('/panel/potential/{id}', 'PanelController@viewPotentialOpen');
Route::get('/panel/potential/add/{id}', 'PanelController@addPotential');
Route::post('panel/potential/setIsAskingForHelp/{id}/{Status}', 'PanelController@setIsAskingForHelp');
Route::post('panel/potential/cancel/{id}', 'PanelController@setCancelContract');

Route::post('/potential/update/{id}', 'PanelController@updatePotential');

Route::get('panel/pdf/{zID}/{relatedid}/{pdf}', 'PanelController@pdf');

Route::get('/panel/cases/add', 'PanelController@viewCasesAdd');
Route::post('/panel/case/add', 'PanelController@addCase');
Route::post('/panel/case/close/{id}', 'PanelController@caseClose');

Route::post('/panel/data/crm/fetch', 'PanelController@dataCrmFetch');
Route::post('/panel/data/create', 'GlobalController@panelCreateContact');

Route::post('/reg/ver', 'RegController@ver');
Route::post('/reg/ver/pin', 'RegController@verPin');
Route::get('/reg/key/{Key}', 'PagesController@Verify_Email');

Route::get('/agb', function () {
    return view('agb');
});

Route::get('/datenschutz', function () {
    return view('datenschutz');
});


//Sales Panel
Route::get('/panel/verwaltung', 'PanelSalesController@index');

Route::get('/psds', 'PanelSalesController@dashboardShow');//S
Route::get('/pscs', 'PanelSalesController@customerShow');//panel/sales/customer/show
Route::get('/panel/sales/customer/add', 'PanelSalesController@customerAddShow');
Route::post('/panel/sales/loginAssCustomer/{id}', 'PanelSalesController@loginAssCustomer');

Route::get('/scds/{cID}', 'PanelSalesController@customerDataShow');//sccs = sales + customer + data + show

Route::get('/sccs/{cID}', 'PanelSalesController@customerCasesShow');//sccs = sales + customer + cases + show

//Route::get('/sales/customer/cases/show/{cID}', 'PanelSalesController@customerCasesShow');
Route::get('/sccns/{uid}', 'PanelSalesController@customerCasesNewShow');//sales/customer/cases/new/show
Route::post('/sales/customer/cases/new/{uid}', 'PanelSalesController@customerCasesNew');

Route::post('/sales/back/', 'PanelController@salesBack');
Route::post('/sales/switch/', 'PanelSalesController@salesSwitch');

Route::post('/customer/search/{salesid}/{term}', 'SearchController@customer');

Route::get('/qac/{Kunde}', 'PanelSalesController@qacontracts');
//SETY2717
Route::get('/qaco/{Kunde}/{id}', 'PanelSalesController@qacontractopen');

//Global
Route::get('/gvd/{Vertrag}', 'GlobalController@Vertrags_Dateien');

//KD
Route::get('/Vertrag/Neu/{Versicherer}', 'PanelController@KD_Vertrag_Neu');

//AW :
Route::get('/awpscs', 'AWController@customer');
//SETY3717
Route::get('/aw/qaco/{id}', 'AWController@qacontractopen');
Route::post('/awvs/{Vertrag}', 'AWController@Vertrag_Speichern');

Route::get('/aw/vorgang/suche/{Begriff}', 'AWController@Vorgang_Suchen');

//SP
Route::get('/spkw', 'SPController@Kunden_Verwalten');

Route::get('/spkvn/{Kunde}', 'SPController@Kunden_Vertrag_Neu');
Route::get('/spkvn/{iid}/{Kunde}', 'SPController@Kunden_Vertrag_Anlegen');

Route::get('/spkna/{Kunde}', 'SPController@Kunden_Nachrichten_Alle');
Route::get('/spknc/{Nachricht}', 'SPController@Kunden_Nachrichten_Chat');
Route::get('/spknn/{Kunde}', 'SPController@Kunden_Nachrichten_Neu');
Route::get('/sp/customer/name/{Kunde}', 'SPController@Kunde_Name');

Route::get('/spkn', 'SPController@Nachrichten_Kunden');
Route::get('/spnkc/{Nachricht}', 'SPController@Nachrichten_Kunden_Chat');

Route::get('/spka', 'SPController@Kunden_Anlegen_View');
Route::post('/sp/kundenkonto/anlegen', 'SPController@Kunden_Anlegen');

Route::post('/sync/potentials/{Kunde}', 'GlobalController@syncContracts');
Route::resource('panel', 'PanelController');


//Dokumente
Route::get('Dokument/{Dokument}', 'GlobalController@Dokument');

Route::get('Dokument/CRM/{Dokument}', 'GlobalController@Dokument_Aufrufen');
Route::post('Dokument/Entfernen/{Dokument}', 'GlobalController@Dokument_Entfernen');

//Test
Route::get('auth/as/{email}', 'ApiController@Auth_As');
Route::get('auth/admin', 'ApiController@Auth_Admin');

Route::get('test/user/{email}', 'TestController@user');
Route::get('test/cases/{contact}', 'TestController@cases');
Route::get('test/potentials/{contact}', 'TestController@potentials');

Route::get('out', 'ApiController@Out');


/* Pages */
Route::get('test', 'TestController@test');
Route::get('test/mailver', 'PagesController@test_mailver');


/* Admin */
Route::get('admin', 'AdminController@index');


/* Api */


Route::post('api/password/reset/check', 'ApiController@password_reset');
Route::post('api/password/reset/', 'ApiController@password_reset_password');

Route::post('api/password/reset/pin/{token}', 'ApiController@password_reset_pin');
Route::get('api/password/token/{token}', 'ApiController@password_check_token');


/* SP */
Route::get('sp', 'SPTempController@index');
Route::get('api/sp', 'SPTempController@sp');
Route::get('api/sp/customers', 'SPTempController@customers');
Route::get('api/sp/customer/{customer}', 'SPTempController@customer');

Route::get('api/sp/customer/potentials/{customer}', 'SPTempController@potentials');
Route::get('api/sp/customer/potential/{potential}', 'SPTempController@potential');
Route::get('api/sp/customer/potential/files/{potential}', 'SPTempController@files');
Route::get('api/sp/customer/potential/status/{potential}', 'SPTempController@potential_status');
Route::post('api/sp/customer/potential/new', 'SPTempController@newContract');

Route::get('api/sp/customer/cases/{customer}', 'SPTempController@cases');
Route::get('api/sp/customer/case/{case}', 'SPTempController@dbcase');
Route::get('api/sp/customer/case/{case}/messages', 'SPTempController@case_messages');

Route::get('api/sp/customer/check/registered/{customer}', 'SPTempController@check_registered');
Route::get('api/sp/customers/count', 'SPTempController@customers_count');

Route::get('api/search/insurance/{term}', 'SearchController@searchInsurance');

Route::get('test/awsync/{AW}', 'AWController@syncContracts_AW');


/* AW */
Route::post('api/man/players', 'ManController@getPlayers');
Route::get('api/man/player/{id}', 'ManController@getPlayer');
Route::get('api/man/player/{id}/kills', 'ManController@getPlayerKills');
Route::get('api/man/player/{id}/KD', 'ManController@getPlayerKD');
Route::post('api/man/search/players', 'ManController@searchPlayers');

Route::get('api/aw', 'AWController@getAw');
Route::post('api/aw/potentials', 'AWController@getPotentials');
Route::post('api/aw/potential/pin', 'AWController@pinPotential');
Route::post('api/aw/search', 'AWController@searchProcess');




/* ROIC */
Route::get('/', 'MainController@index');
Route::get('register', 'AuthController@register');

Route::get('logout', 'AuthController@logout');

Route::get('api/user', 'UserController@getUser');
Route::get('api/user/overview', 'UserController@getUserOverview');
Route::get('api/user/coin', 'UserController@getUserCoins');
Route::get('api/user/orders', 'OrdersController@getUserOrders');
Route::get('api/user/order/{order_id}', 'OrdersController@getUserOrder');

Route::get('api/shop/articles/{category_id}', 'ShopController@getArticles');

Route::get('api/session/cart/items/count', 'CartController@getItemCount');
Route::get('api/session/cart', 'CartController@getCartJS');
Route::post('api/session/cart/item/remove', 'CartController@removeFromCart');
Route::get('api/session/cart/coupon', 'CartController@getCoupon');
Route::post('api/session/cart/coupon/add', 'CartController@addCoupon');
Route::post('api/session/cart/coupon/remove', 'CartController@removeCoupon');
Route::post('api/session/cart/item/add', 'CartController@addItem');

Route::post('api/checkout/user/update', 'UserController@updateUser');
Route::post('api/checkout/confirm', 'CartController@confirmCheckout');

Route::get('/partner', 'MLMController@index');

// Get All Referrals
Route::get('/api/referral/all', 'MLMReferralController@getAllReferrals');

// Get Referral Link
Route::get('/api/referrallink/{referral_link_id}', 'MLMReferralController@getReferralLink');

// Get Referral Monthly Actions
Route::get('/api/referral/monthlyactions', 'MLMReferralController@getReferralMonthlyActions');