<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

// Admin
Route::group(['as' => 'admin.', 'middleware' => 'roles','roles' =>['admin'], 'namespace' => 'Admin', 'prefix' => 'admin'], function() {

    Route::put('ajax/status', ['as' => 'ajax.status', 'uses' => 'AjaxController@status']);
    Route::put('ajax/reorder', ['as' => 'ajax.reorder', 'uses' => 'AjaxController@reorder']);

    Route::resource('user', 'UserController');
    Route::resource('page', 'PageController');
    Route::resource('banner', 'BannerController');

    Route::get('code', ['as' => 'code.index', 'uses' => 'CodeController@index']);
    Route::get('code/import', ['as' => 'code.add', 'uses' => 'CodeController@add']);
    Route::post('code/import', ['as' => 'code.import', 'uses' => 'CodeController@import']);
    Route::delete('code/{code}', ['as' => 'code.destroy', 'uses' => 'CodeController@destroy']);

});


//Image resize & crop on view:  http://image.intervention.io/
Route::get('/resize/{w}/{h}',function($w=null, $h=null){
  $img = Illuminate\Support\Facades\Request::input("img");
  return \Image::make(public_path(urldecode($img)))->fit($w, $h, function ($constraint) {
      $constraint->upsize();
  })->response('jpg');
});