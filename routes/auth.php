<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\AiProviderController;
use App\Http\Controllers\Auth\KkController;
use App\Http\Controllers\Auth\MeliController;
use App\Http\Controllers\Auth\KiniseisController;
use App\Http\Controllers\Auth\StatisticsController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');

});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    
     Route::post('promptgetpromptsbycategory', [PromptController::class, 'getpromptsbycategory'])->name('prompt.getpromptsbycategory');  
     Route::get('prompt/edit/{id}', [PromptController::class, 'edit'])->name('prompt.edit');
    Route::post('prompt/update', [PromptController::class, 'update'])->name('prompt.update');

     Route::get('aiprovider', [AiProviderController::class, 'show'])->name('aiprovider.show');  
     Route::get('aiprovider/edit/{id}', [AiProviderController::class, 'edit'])->name('aiprovider.edit');  
    Route::post('aiprovider/update', [AiProviderController::class, 'update'])->name('aiprovider.update');

    Route::get('kk', [KkController::class, 'show'])->name('kk.show');
    Route::get('kk/edit/{id}', [KkController::class, 'edit'])->name('kk.edit');
    Route::post('kk/update', [KkController::class, 'update'])->name('kk.update');

    Route::get('meli', [MeliController::class, 'show'])->name('meli.show');
    Route::get('meli/edit/{id}', [MeliController::class, 'edit'])->name('meli.edit');
    Route::get('meli/insert1/{id}', [MeliController::class, 'insert1'])->name('meli.insert1');
    Route::post('meli/insert2', [MeliController::class, 'insert2'])->name('meli.insert2');
    Route::post('meli/updatenew', [MeliController::class, 'updatenew'])->name('meli.updatenew');


    Route::get('meli/delete1', [MeliController::class, 'delete1'])->name('meli.delete1');
    Route::post('meli/delete2', [MeliController::class, 'delete2'])->name('meli.delete2');
    Route::post('meli/delete3', [MeliController::class, 'delete3'])->name('meli.delete3');

    Route::get('meli/analysi/{id}', [MeliController::class, 'analysi'])->name('meli.analysi');
    Route::get('meli/destroy/{id}', [MeliController::class, 'destroy'])->name('meli.destroy');
   Route::post('meli/update', [MeliController::class, 'update'])->name('meli.update');

   Route::get('meli/mitroo', [MeliController::class, 'mitroo'])->name('meli.mitroo');

   Route::get('kiniseis', [KiniseisController::class, 'show'])->name('kiniseis.show');
   Route::get('kiniseis/edit/{id}', [KiniseisController::class, 'edit'])->name('kiniseis.edit');
   Route::get('kiniseis/insert/{id}', [KiniseisController::class, 'insert'])->name('kiniseis.insert');
   Route::get('kiniseis/destroy/{id}', [KiniseisController::class, 'destroy'])->name('kiniseis.destroy');
  Route::post('kiniseis/update', [KiniseisController::class, 'update'])->name('kiniseis.update');


  Route::get('statistics', [StatisticsController::class, 'statistics'])->name('statistics.statistics');
  Route::get('maziki', [StatisticsController::class, 'maziki'])->name('statistics.maziki');
  Route::get('maziki2', [StatisticsController::class, 'maziki2'])->name('statistics.maziki2');
  Route::get('maziki3', [StatisticsController::class, 'maziki3'])->name('statistics.maziki3');

  Route::get('meli/remains', [MeliController::class, 'remains'])->name('meli.remains');
  Route::get('meli/remains0', [MeliController::class, 'remains0'])->name('meli.remains0');
  Route::get('remains2years', [StatisticsController::class, 'remains2years'])->name('statistics.2years');


});
