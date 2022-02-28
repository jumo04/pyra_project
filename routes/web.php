<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\HistoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|/
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('users', UserController::class);
	Route::get('/boleto', [TicketController::class, 'createForm'])->name('ticket.form');
    Route::post('/boleto', [TicketController::class, 'TicketForm'])->name('ticket.store');

    Route::post('/loterias', [App\Http\Controllers\LotteryController::class, 'store'])->name('lottery.store');

    Route::get('/lugar', [App\Http\Controllers\PlaceController::class, 'createForm'])->name('place.form');
    Route::post('/lugar', [App\Http\Controllers\PlaceController::class, 'PlaceForm'])->name('place.store');

	Route::get('/historia', [App\Http\Controllers\HistoryController::class, 'createForm'])->name('history.form');
    Route::post('/historia', [App\Http\Controllers\HistoryController::class, 'HistoryForm'])->name('history.store');
	Route::post('/bloqueo', [App\Http\Controllers\BlockNumberController::class, 'block_number'])->name('block');
    Route::post('/desbloqueo', [App\Http\Controllers\BlockNumberController::class, 'deblock_number'])->name('deblock');

	Route::get('/eliminar', [App\Http\Controllers\HomeController::class, 'delete_all'])->name('delete_all');

	Route::get('/bloqueo', [App\Http\Controllers\BlockNumberController::class, 'block'])->name('block');
	Route::get('/desbloqueo', [App\Http\Controllers\BlockNumberController::class, 'deblock'])->name('deblock');

	Route::get('/mostrar-boleto', [TicketController::class, 'show_ticket'])->name('show_ticket');

	Route::get('mostrar-numero', [TicketController::class, 'show_number'])->name('show_number');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
	Route::get('/usuarios/crear', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
	Route::post('/crear-usuario', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
	Route::get('/loterias', [App\Http\Controllers\LotteryController::class, 'index'])->name('lotteries.index');
	Route::get('/crear-loteria', [App\Http\Controllers\LotteryController::class, 'create'])->name('lotteries.create');
	Route::get('/editar-loteria/{id}', [App\Http\Controllers\LotteryController::class, 'edit'])->name('lotteries.edit');
	Route::post('/editar-loteria/{id}', [App\Http\Controllers\LotteryController::class, 'update'])->name('lotteries.update');
	Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
	Route::get('/roles-mostrar/{id}', [App\Http\Controllers\RoleController::class, 'show'])->name('roles.show');
	Route::get('/registro', [App\Http\Controllers\UniqueController::class, 'index'])->name('unique.index');
	Route::get('/registro/{id}', [App\Http\Controllers\UniqueController::class, 'edit'])->name('unique.edit');
	Route::post('/registro/{id}', [App\Http\Controllers\UniqueController::class, 'update'])->name('unique.update');
	Route::get('/crear-rol', [App\Http\Controllers\RoleController::class, 'create'])->name('roles.create');
	Route::get('/editar-rol/{id}', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
	Route::post('/crear-rol', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
	Route::post('/editar-rol/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
	Route::get('/usuarios', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
	Route::get('/editar-usuario/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
	Route::post('/editar-usuario/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
	Route::post('/eliminar-usuario/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
	Route::get('/historial', [App\Http\Controllers\HistoryController::class, 'index'])->name('history.index');
	Route::get('/crear-historial', [App\Http\Controllers\HistoryController::class, 'create'])->name('history.create');
	Route::post('/crear-historial', [App\Http\Controllers\HistoryController::class, 'store'])->name('history.store');
	Route::get('/dia', [HistoryController::class, 'days'])->name('history.days');
	Route::post('/dia', [HistoryController::class, 'historyForDays'])->name('history.days');
    Route::get('/fetch/{id}', [HistoryController::class, 'fetch'])->name('history.fetch');
	Route::get('/numero-historial', [App\Http\Controllers\HistoryController::class, 'number'])->name('history.number');
	Route::post('/numero-historial', [App\Http\Controllers\HistoryController::class, 'numberHistory'])->name('history.num');
	Route::get('/editar-historial/{id}', [App\Http\Controllers\HistoryController::class, 'edit'])->name('history.edit');
	Route::post('/editar-historial/{id}', [App\Http\Controllers\HistoryController::class, 'update'])->name('history.update');
	Route::post('/eliminar-historial/{id}', [App\Http\Controllers\HistoryController::class, 'destroy'])->name('history.destroy');
	Route::post('/eliminar-rol/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');
	Route::post('/eliminar-usuario/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
	Route::post('/eliminar-boleto/{id}', [App\Http\Controllers\TicketController::class, 'destroy'])->name('ticket.destroy');
});

