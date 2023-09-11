<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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
Route::get('/gallery', function () {
    return view('gallery');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group([
    'namespace' => 'App\Http\Controllers',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::resource('computer', 'ComputerController');
    Route::resource('joystick', 'JoystickController');
    Route::resource('monitor', 'MonitorController');
    Route::resource('keyboard', 'KeyboardController');
    Route::resource('mouse', 'MouseController');
    Route::resource('peripheral', 'PeripheralController');
    Route::resource('terminal', 'TerminalController');
    Route::resource('cable', 'CableController');
    Route::resource('newsletter', 'NewsletterController');
});

require __DIR__.'/auth.php';
