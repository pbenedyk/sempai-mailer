<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MailerController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [MailerController::class, 'index'])->name('mailerListHome');
    Route::get('/', [MailerController::class, 'index'])->name('mailerList');
    Route::get('/mailer/add', function () {
        return view('mailer.add');
    });
    Route::get('/mailer/show/{id}', [MailerController::class, 'show'])->name('mailerShow');

    Route::post('/mailer/save', [MailerController::class, 'save'])->name('mailerSave');
    Route::post('/mailer/delete', [MailerController::class, 'delete'])->name('mailerDelete');

    Route::get('/generateAPIToken', [MailerController::class, 'generateAPIToken'])->name('APIToken');
});
