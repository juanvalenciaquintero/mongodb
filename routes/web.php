<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MongodbController;

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

Route::get('/mongo', [MongodbController::class, 'mongo'])->name('mongo');

Route::get('/call', function ()
{
  $output = [];

  Artisan::call('clear-compiled');
  array_push($output, Artisan::output());

  Artisan::call('cache:clear');
  array_push($output, Artisan::output());

  Artisan::call('config:clear');
  array_push($output, Artisan::output());

   Artisan::call('route:clear');
  array_push($output, Artisan::output());

  Artisan::call('view:clear');
  array_push($output, Artisan::output());


  Artisan::call('route:cache');
  Artisan::call('config:cache');
  Artisan::call('optimize');

  return implode(' ', $output);
})->name('call');
