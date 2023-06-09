<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\GamesController;

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

Route::get('login', function () {
    return redirect('admin/login');
})->name('login');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/scan', function () {
    return view('scan');
});

Route::get('/scan/{code}', function ($code) {
    $ticket = App\Models\Ticket::where('code', $code)->first();
    return response()->json($ticket);
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    // Tickets
    Route::get('/games/{game}/tickets/', [GamesController::class, 'tickets_index'])->name('games.tickets.index');
    Route::get('/games/{game}/tickets/print/{id?}', [GamesController::class, 'tickets_print'])->name('games.tickets.print');
    Route::post('/games/{game}/tickets/generate', [GamesController::class, 'tickets_generate'])->name('games.tickets.generate');
});

// Clear cache
Route::get('/admin/clear-cache', function() {
    Artisan::call('optimize:clear');
    return redirect('/admin/profile')->with(['message' => 'Cache eliminada.', 'alert-type' => 'success']);
})->name('clear.cache');
