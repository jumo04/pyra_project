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
|/
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

	Route::get('/boleto', [App\Http\Controllers\TicketController::class, 'createForm'])->name('ticket.form');
    Route::post('/boleto', [App\Http\Controllers\TicketController::class, 'TicketForm'])->name('ticket.store');

    Route::get('/loteria', [App\Http\Controllers\LotteryController::class, 'createForm'])->name('lottery.form');
    Route::post('/loteria', [App\Http\Controllers\LotteryController::class, 'LotteryForm'])->name('lottery.store');

    Route::get('/lugar', [App\Http\Controllers\PlaceController::class, 'createForm'])->name('place.form');
    Route::post('/lugar', [App\Http\Controllers\PlaceController::class, 'PlaceForm'])->name('place.store');

	Route::get('/historia', [App\Http\Controllers\HistoryController::class, 'createForm'])->name('history.form');
    Route::post('/historia', [App\Http\Controllers\HistoryController::class, 'HistoryForm'])->name('history.store');
	Route::post('/bloqueo', [App\Http\Controllers\BlockNumberController::class, 'BlockNumber'])->name('block');
    Route::post('/desbloqueo', [App\Http\Controllers\BlockNumberController::class, 'deBlockNumber'])->name('deblock');
	
	Route::get('bloqueo', function () {
		return view('forms.block');
	})->name('block');

	Route::get('desbloqueo', function () {
		return view('forms.deblock');
	})->name('deblock');

	Route::get('/mostrar-boleto', 
				[App\Http\Controllers\TicketController::class, 'show_ticket'
					])->name('show_ticket');
		
	Route::get('/mostrar-numero', 
	[App\Http\Controllers\TicketController::class, 'show_number'
		])->name('show_number');

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
	Route::resource('roles', RoleController::class);
	Route::get('/crear-usuario', 
	[App\Http\Controllers\UserController::class, 'create'
		])->name('users.create');
	Route::get('/usuarios', 
	[App\Http\Controllers\UserController::class, 'index'
		])->name('users.index');
	Route::post('/crear-usuario', 
	[App\Http\Controllers\UserController::class, 'store'
		])->name('users.store');
	Route::get('/editar-usuario/{id}', 
	[App\Http\Controllers\UserController::class, 'edit'
		])->name('users.edit');
	Route::post('/editar-usuario/{id}', 
	[App\Http\Controllers\UserController::class, 'update'
		])->name('users.update');
	Route::post('/eliminar-usuario', 
	[App\Http\Controllers\UserController::class, 'destroy'
		])->name('users.destroy');
});

