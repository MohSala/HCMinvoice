<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->get('/organization', function (Request $request) {
    return $request->organization();
});
Route::middleware('auth:api')->get('/invoice', function (Request $request) {return $request->invoice();});
Route::middleware('auth:api')->get('/item', function (Request $request) {return $request->item();});

Route::apiResources([
    'user' => 'API\UserController',
    'organization' => 'API\OrganizationController',
    'invoice' => 'API\InvoiceController',
    'item' => 'API\ItemController'
]);

Route::get('findInvoice', 'API\InvoiceController@search');


