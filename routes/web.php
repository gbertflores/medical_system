<?php

use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\UserManagement;
use App\Livewire\UserProfile;
use App\Livewire\Landing;
use App\Livewire\MedicalLookup;
use App\Livewire\MedicalRecords;
use App\Livewire\MedicalStatus;
use App\Livewire\Notifications;
use App\Livewire\Profile;
use App\Livewire\SetupAccount;
use App\Livewire\StaticSignIn;
use App\Livewire\StaticSignUp;
use App\Livewire\StudentList;
use App\Livewire\NewMedicalResult;

Route::get('/', Landing::class)->middleware('guest')->name('landing');

Route::get('forgot-password', ForgotPassword::class)->middleware('guest')->name('password.forgot');
Route::get('reset-password/{id}', ResetPassword::class)->middleware('signed')->name('reset-password');

Route::get('medical-lookup', MedicalLookup::class)->name('medical-lookup');
Route::get('medical-status/{encryptedId}', MedicalStatus::class)->name('medical-status');
Route::get('sign-up', Register::class)->middleware('guest')->name('register');
Route::get('sign-in', Login::class)->middleware('guest')->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('setup-account', SetupAccount::class)->name('setup-account');
    
    Route::group(['middleware' => function ($request, $next) {
        if (auth()->check() && is_null(auth()->user()->username)) {
            return redirect()->route('setup-account');
        }

        return $next($request);
    }], function () {
        Route::get('user-profile', UserProfile::class)->name('user-profile');
        Route::get('user-management', UserManagement::class)->name('user-management');
        Route::get('student-list', StudentList::class)->name('student-list');
        Route::get('student-list/new-medical-result', NewMedicalResult::class)->name('student-list/new-medical-result');
        Route::get('student-list/medical-records', MedicalRecords::class)->name('student-list/medical-records');
        Route::get('medical-records', MedicalRecords::class)->name('medical-records');
        Route::get('dashboard', Dashboard::class)->name('dashboard');
        Route::get('profile', Profile::class)->name('profile');
        Route::get('notifications', Notifications::class)->name("notifications");
        Route::get('static-sign-in', StaticSignIn::class)->name('static-sign-in');
        Route::get('static-sign-up', StaticSignUp::class)->name('static-sign-up');
    });
});