<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

Route::get('/', 'HomeController@dashboard');


/*
  |--------------------------------------------------------------------------
  | User Authentication Routes
  |--------------------------------------------------------------------------
  |
  | These are the routes used for user authentication
  |
 */

/* * ******** LOGIN/SESSION ********* */
Route::get('/', array('as' => 'login', 'uses' => 'HomeController@index'));
Route::get('login', array('as' => 'login', 'uses' => 'SessionsController@loggingIn'));
Route::get('logout', array('as' => 'logout', 'uses' => 'SessionsController@destroy'));
/* * ****** END LOGIN/SESSION ******* */

/* ################################### */

/* * ******** Dashboard ********* */
Route::get('dashboard', 'HomeController@dashboard');
/* * ****** END Dashboard ******* */

/* ################################### */

/* * ******** CONFIGURATION ********* */
Route::get('configuration', 'HomeController@site_settings');
Route::get('config_DT', array('as' => 'config_DT', 'uses' => 'SiteController@listAllConfig'));
Route::post('updateConfig', array('as' => 'updateConfig', 'uses' => 'SiteController@update'));

Route::get('data/config_DT', array('as' => 'config_DT', 'uses' => 'SiteController@listAllConfig'));
Route::post('data/updateConfig', array('as' => 'updateConfig', 'uses' => 'SiteController@update'));
Route::post('data/addConfig', array('as' => 'createConfig', 'uses' => 'SiteController@store'));
Route::get('data/config_delete/{id}', array('as' => 'config_delete', 'uses' => 'SiteController@delete'));

/* * ****** END CONFIGURATION ******* */

/* ################################### */

/* * ******** STATISTICS ********* */
Route::get('statistics', 'AccountController@index');
Route::get('statistics/invoice', 'AccountController@getInvoice');
Route::get('statistics/invoice_DT', array('as' => 'invoice_DT', 'uses' => 'AccountController@listInvoice'));
Route::post('statistics/updateInvoice', array('as' => 'updateInvoice', 'uses' => 'AccountController@update'));

Route::get('statistics/sales', 'AccountController@getSales');
Route::get('statistics/sales_DT', array('as' => 'sales_DT', 'uses' => 'AccountController@listSales'));
/* * ****** END STATISTICS ******* */

/* ################################### */

/* * ******** REST MANAGEMENT ********* */
Route::get('data', 'HomeController@item_settings');
Route::get('data/clients', 'ClientsController@index');
Route::get('data/clients_DT', array('as' => 'clients_DT', 'uses' => 'ClientsController@listAllClients'));

/* * ****** END REST MANAGEMENT ******* */

/* ################################### */

/* * ******** USER MANAGEMENT ********* */
Route::get('user_management', 'UserController@index');
Route::get('user_management/new_user', 'UserController@new_user');
Route::post('user_management/reg_user', 'UserController@create');
Route::get('user_management/list_user', 'UserController@user_list');
Route::get('user_management/user_DT', array('as' => 'user_DT', 'uses' => 'UserController@listAll'));
Route::get('user_management/user_edit/{id}', array('as' => 'user_edit', 'uses' => 'UserController@edit'));
Route::get('user_management/user_delete/{id}', array('as' => 'user_delete', 'uses' => 'UserController@delete'));
Route::get('create', function() {
    User::create([
        'username' => 'admin2',
        'email' => 'akela@nsuers.com',
        'password' => Hash::make('admin'),
        'role_id' => "1"
    ]);
    echo "User created";
});
/* * ****** END USER MANAGEMENT ******* */

/* ################################### */

/* * ******** ITEM MANAGEMENT ********* */
Route::get('data/new_item', 'ItemController@new_item');
Route::post('data/reg_item', 'ItemController@store');
Route::get('data/items', 'ItemController@item_list');
Route::get('data/item_DT', array('as' => 'item_DT', 'uses' => 'ItemController@listAll'));
Route::get('data/custom_item_DT', array('as' => 'custom_item_DT', 'uses' => 'ItemController@listAll_Custom'));
Route::get('data/item_edit/{id}', array('as' => 'item_edit', 'uses' => 'ItemController@edit'));
Route::post('data/updateItems/{id?}', 'ItemController@update');
Route::post('data/updateCustomItems/{id?}', 'ItemController@updateCustom');
Route::get('data/item_delete/{id}', array('as' => 'item_delete', 'uses' => 'ItemController@delete'));

Route::get('data/configuration', 'ItemController@OtherConfig');
Route::get('data/item_DT', array('as' => 'item_DT', 'uses' => 'ItemController@listAll'));
Route::get('data/item_DT', array('as' => 'item_DT', 'uses' => 'ItemController@listAll'));
Route::get('data/item_DT', array('as' => 'item_DT', 'uses' => 'ItemController@listAll'));
Route::get('data/item_DT', array('as' => 'item_DT', 'uses' => 'ItemController@listAll'));
/* * ****** END ITEM MANAGEMENT ******* */

/* ################################### */

/* * ******** SITE SETTINGS ********* */



/* * ****** SITE SETTINGS ******* */

//Route::resource('sessions', 'SessionsController');


Route::get('calculator', function() {
    return View::make('calculator');
});

/* * ******** POS ********* */
Route::get('pos', 'PosController@index');
Route::post('addItemToOrder', array('uses' => 'PosController@addItemToOrder'));
Route::post('printOrderClient', array('uses' => 'PosController@printOrderClient'));
//Route::get('posAccordion', 'PosController@accordion');

/* * ******** CLIENTS MANAGEMENT *********** */
Route::post('data/reg_client', 'ClientsController@store');
Route::post('clients_edit/{id?}', array('as'=> 'clients_edit' ,'uses' => 'ClientsController@edit'));
Route::post('clients_delete/{id?}', array('as'=> 'clients_delete' ,'uses' => 'ClientsController@destroy'));
Route::get('data/clients_edit/{id?}', 'ClientsController@edit');

/*PDF https://github.com/thujohn/pdf-l4 */

