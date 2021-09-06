<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;
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



  Route::apiResource('/class','App\Http\Controllers\Api\ClassController');
  Route::apiResource('/subject','App\Http\Controllers\Api\SubjectController');
  Route::apiResource('/section','App\Http\Controllers\Api\SectionController');
  Route::apiResource('/student','App\Http\Controllers\Api\StudentController');

//Routes
// Route::get('/student',[StudentController::class,'index']);
// Route::post('/store',[StudentController::class,'store']);


Route::group([

    'prefix' => 'auth'

], function () {

    Route::post('login', 'App\Http\Controllers\Api\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\Api\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\Api\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\Api\AuthController@me');
    Route::post('payload','App\Http\Controllers\Api\AuthController@payload');
    Route::post('register','App\Http\Controllers\Api\AuthController@register');

});
