<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/timeline', 'TimelineController')->layout('layouts.app')->name('timeline')->middleware('auth');
    Route::livewire('status/{hash}/edit', 'status.edit')->layout('layouts.app')->name('status.edit');
    Route::livewire('status/{hash}/delete', 'status.delete')->layout('layouts.modal')->name('status.delete');
});


Route::livewire('settings', 'accounts.edit')->layout('layouts.app', ['title' => 'Settings'])->name('setting')->middleware('auth');
Route::livewire('user/{identifier}', 'accounts.show')->layout('layouts.app')->name('show');
Route::livewire('status/{hash}', 'status.show')->layout('layouts.app')->name('status.show');
Route::get('user/{identifier}/{follow}', 'FollowController')->name('follow.index');

Route::layout('layouts.auth')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::livewire('login', 'auth.login')
            ->name('login');

        Route::livewire('register', 'auth.register')
            ->name('register');
    });

    Route::livewire('password/reset', 'auth.passwords.email')
        ->name('password.request');

    Route::livewire('password/reset/{token}', 'auth.passwords.reset')
        ->name('password.reset');

    Route::middleware('auth')->group(function () {
        Route::livewire('email/verify', 'auth.verify')
            ->middleware('throttle:6,1')
            ->name('verification.notice');

        Route::livewire('password/confirm', 'auth.passwords.confirm')
            ->name('password.confirm');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', 'Auth\EmailVerificationController')
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', 'Auth\LogoutController')
        ->name('logout');
});
