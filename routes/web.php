<?php

use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Billing;
use App\Livewire\BookAppointment;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\UserManagement;
use App\Livewire\UserProfile;
use App\Livewire\Landing;
use App\Livewire\Notifications;
use App\Livewire\Profile;
use App\Livewire\RTL;
use App\Livewire\SetupAccount;
use App\Livewire\StaticSignIn;
use App\Livewire\StaticSignUp;
use App\Livewire\Tables;
use App\Livewire\VirtualReality;

Route::get('/', Landing::class)->middleware('guest')->name('landing');

Route::get('forgot-password', ForgotPassword::class)->middleware('guest')->name('password.forgot');
Route::get('reset-password/{id}', ResetPassword::class)->middleware('signed')->name('reset-password');

Route::get('sign-up', Register::class)->middleware('guest')->name('register');
Route::get('sign-in', Login::class)->middleware('guest')->name('login');

Route::get('user-profile', UserProfile::class)->middleware('auth')->name('user-profile');
Route::get('user-management', UserManagement::class)->middleware('auth')->name('user-management');

Route::group(['middleware' => 'auth'], function () {
Route::get('setup-account', SetupAccount::class)->name('setup-account');
Route::get('book-appointment', BookAppointment::class)->name('book-appointment');
Route::get('dashboard', Dashboard::class)->name('dashboard');
Route::get('billing', Billing::class)->name('billing');
Route::get('profile', Profile::class)->name('profile');
Route::get('tables', Tables::class)->name('tables');
Route::get('notifications', Notifications::class)->name("notifications");
Route::get('virtual-reality', VirtualReality::class)->name('virtual-reality');
Route::get('static-sign-in', StaticSignIn::class)->name('static-sign-in');
Route::get('static-sign-up', StaticSignUp::class)->name('static-sign-up');
Route::get('rtl', RTL::class)->name('rtl');
});