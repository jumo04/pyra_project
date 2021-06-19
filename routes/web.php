<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('users', UserController::class);
	Route::get('/boleto', [App\Http\Controllers\TicketController::class, 'createForm'])->name('ticket.form');
    Route::post('/boleto', [App\Http\Controllers\TicketController::class, 'TicketForm'])->name('ticket.store');

    Route::post('/loterias', [App\Http\Controllers\LotteryController::class, 'store'])->name('lottery.store');

    Route::get('/lugar', [App\Http\Controllers\PlaceController::class, 'createForm'])->name('place.form');
    Route::post('/lugar', [App\Http\Controllers\PlaceController::class, 'PlaceForm'])->name('place.store');

	Route::get('/historia', [App\Http\Controllers\HistoryController::class, 'createForm'])->name('history.form');
    Route::post('/historia', [App\Http\Controllers\HistoryController::class, 'HistoryForm'])->name('history.store');
	Route::post('/bloqueo', [App\Http\Controllers\BlockNumberController::class, 'block_number'])->name('block');
    Route::post('/desbloqueo', [App\Http\Controllers\BlockNumberController::class, 'deblock_number'])->name('deblock');
	
	Route::get('/bloqueo', [App\Http\Controllers\BlockNumberController::class, 'block'])->name('block');
	Route::get('/desbloqueo', [App\Http\Controllers\BlockNumberController::class, 'deblock'])->name('deblock');

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
	Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
	Route::get('/usuarios/crear', 
		[App\Http\Controllers\UserController::class, 'create'
			])->name('users.create');
	Route::post('/crear-usuario', 
		[App\Http\Controllers\UserController::class, 'store'
			])->name('users.store');
	Route::get('/loterias', 
	[App\Http\Controllers\LotteryController::class, 'index'
		])->name('lotteries.index');
	Route::get('/crear-loteria', 
	[App\Http\Controllers\LotteryController::class, 'create'
		])->name('lotteries.create');
	Route::get('/editar-loteria', 
	[App\Http\Controllers\LotteryController::class, 'edit'
		])->name('lotteries.edit');
	Route::post('/editar-loteria/{id}', 
	[App\Http\Controllers\LotteryController::class, 'update'
		])->name('lotteries.update');
	Route::get('/roles', 
	[App\Http\Controllers\RoleController::class, 'index'
		])->name('roles.index');
	Route::get('/roles-mostrar/{id}', 
	[App\Http\Controllers\RoleController::class, 'show'
		])->name('roles.show');
	Route::get('/crear-rol', 
	[App\Http\Controllers\RoleController::class, 'create'
		])->name('roles.create');
	Route::get('/editar-rol/{id}', 
	[App\Http\Controllers\RoleController::class, 'edit'
		])->name('roles.edit');
	Route::post('/crear-rol', 
	[App\Http\Controllers\RoleController::class, 'store'
		])->name('roles.store');
	Route::post('/editar-rol/{id}', 
	[App\Http\Controllers\RoleController::class, 'update'
		])->name('roles.update');
	Route::get('/usuarios', 
	[App\Http\Controllers\UserController::class, 'index'
		])->name('users.index');
	Route::get('/editar-usuario/{id}', 
	[App\Http\Controllers\UserController::class, 'edit'
		])->name('users.edit');
	Route::post('/editar-usuario/{id}', 
	[App\Http\Controllers\UserController::class, 'update'
		])->name('users.update');
	Route::post('/eliminar-usuario/{id}', 
	[App\Http\Controllers\UserController::class, 'destroy'
		])->name('users.destroy');
	Route::post('/eliminar-rol/{id}', 
	[App\Http\Controllers\RoleController::class, 'destroy'
		])->name('roles.destroy');
});

