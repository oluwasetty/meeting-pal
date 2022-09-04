<?php

use App\Http\Controllers\EventController;
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

Route::get('/dashboard', [EventController::class, 'index'])->name('dashboard');

Route::get('/meeting-list/{event_id}', [EventController::class, 'getMeetings'])->name('meeting-list');

Route::get('/{username}/{link}', [EventController::class, 'getEvent']);

Route::get('/add-event', function () {
    return view('add-event');
})->middleware(['auth'])->name('add-event');

Route::post('/add-event', [EventController::class, 'create'])->middleware(['auth']);
Route::post('/join-event', "App\Http\Controllers\MeetingController@joinEvent")->middleware(['auth'])->name('join-event');


// Route::get('cal', "App\Http\Controllers\GoogleCalendarController@index")->name('cal.index');
Route::get('/oauth', "App\Http\Controllers\MeetingController@oauth")->name('oauthCallback');

require __DIR__.'/auth.php';
