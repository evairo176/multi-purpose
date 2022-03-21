<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Livewire\Admin\Appointments\CreateAppointmentForm;
use App\Http\Livewire\Admin\Appointments\ListAppointments;
use App\Http\Livewire\Admin\Appointments\UpdateAppointmentForm;
use App\Http\Livewire\Admin\Users\ListUsers;
use App\Http\Livewire\Desa\ListDesa;
use App\Http\Livewire\Kecamatan\ListKecamatan;
use App\Http\Livewire\MovingAverage;
use App\Http\Livewire\Posyandu\CreatePosyanduForm;
use App\Http\Livewire\Posyandu\ListPosyandu;
use App\Http\Livewire\Posyandu\MapLocation;
use App\Http\Livewire\Posyandu\UpdatePosyanduForm;
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


Route::get('/moving-average', MovingAverage::class);


Route::get('/kecamatan', ListKecamatan::class)->name('kecamatan');
Route::get('/desa', ListDesa::class)->name('desa');
Route::get('/posyandu', ListPosyandu::class)->name('posyandu');
Route::get('/posyandu/create', CreatePosyanduForm::class)->name('posyandu.create');
Route::get('/posyandu/{id}/edit', UpdatePosyanduForm::class)->name('posyandu.edit');
