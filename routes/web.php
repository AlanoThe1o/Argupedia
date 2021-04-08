<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PositionToKnowController;
use App\Http\Controllers\ExpertOpinionController;
use App\Http\Controllers\PopularOpinionController;
use App\Http\Controllers\DebateController;
use App\Http\Controllers\ArgumentController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\AttackController;
use App\Http\Controllers\VoteController;


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

Route::get('/mydebate', [DebateController::class, 'myDebates'])->middleware('auth');
Route::get('/debate2', [DebateController::class, 'recentlyCreated']);
Route::get('/debate3', [DebateController::class, 'mostViews']);
Route::get('/vote/{argument}', [ArgumentController::class, 'updatePlusVote'])->middleware('auth')->name('plusVote');
Route::get('/votes/{argument}', [ArgumentController::class, 'updateNegVote'])->middleware('auth')->name('negVote');
Route::get('/search', [DebateController::class, 'search'])->name('search');



Route::resource('debate', DebateController::class);
Route::resource('argument', ArgumentController::class);

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/create', function () {
    return view('create');
});




Route::group(['middleware' => 'auth'], function () {
    Route::get('/attack/{debate}/{argument}', 'App\Http\Controllers\AttackController@schemes')->name('schemeselect');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/popapattack/{debate}/{argument}', 'App\Http\Controllers\AttackController@popappeal')->name('popappealattack');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/expopattack/{debate}/{argument}', 'App\Http\Controllers\AttackController@expop')->name('expopattack');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/actionattack/{debate}/{argument}', 'App\Http\Controllers\AttackController@action')->name('actionattack');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/postoknowattack/{debate}/{argument}', 'App\Http\Controllers\AttackController@postoknow')->name('postoknowattack');
});

//Route::get('postoknow', 'App\Http\Controllers\PositionToKnowController@create');
Route::post('postoknowattack/{debate}/{argument}', 'App\Http\Controllers\PositionToKnowController@storeAttack')->name('postoknow.storePosAttack');
Route::post('expopinionattack/{debate}/{argument}', 'App\Http\Controllers\ExpertOpinionController@storeAttack')->name('expopinion.storeattack');
Route::post('popopattack/{debate}/{argument}', 'App\Http\Controllers\PopularOpinionController@storeAttack')->name('popularopinion.storeAttack');
Route::post('actionattack/{debate}/{argument}', 'App\Http\Controllers\ActionController@storeAttack')->name('action.storeattack');
Route::resource('postoknow', PositionToKnowController::class)->middleware('auth');
Route::resource('expopinion', ExpertOpinionController::class)->middleware('auth');
Route::resource('popularopinion', PopularOpinionController::class)->middleware('auth');
Route::resource('action', ActionController::class)->middleware('auth');
Route::resource('attack', AttackController::class)->middleware('auth');
//Route::get('postoknow', [PositionToKnowController::class, 'create']);

//Route::post('/postoknow/add',[PositionToKnow::class,'add']);
//Route::resource('postoknow','PositionToKnowController');

Route::get('/home', function () {
    return view('home');
})->middleware('auth');