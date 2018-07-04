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
use App\Room;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/', function () {
    return view('welcome');
});

// Route::get('/adm', function () {
//     return view('administrativo/principal');
// });

// Route::get('/user', function () {
// 	$rooms = Room::all();
//     return view('usuario/principal')->with('rooms', $rooms);
// });

Route::get('/reports', function () {
    return view('administrativo/chart');
});

Route::resource('/distributors', 'DistributorsController');
Route::resource('/rooms', 'RoomsController');
Route::resource('/user', 'UsersController');
Route::resource('/equipments', 'EquipmentsController');
// Route::resource('/reports', 'ReportsController');

Route::get('/equipments/create/{room}', 'EquipmentsController@create_for_room')->name('equipments.create_for_room');

Auth::routes();