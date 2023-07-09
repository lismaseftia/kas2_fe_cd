<?php

use App\Http\Controllers\IncomeController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('mahasiswa', [MahasiswaController::class, 'index']);


Route::get('/income/create', [IncomeController::class, 'create'])->name('income.create');
Route::post('/income', [IncomeController::class, 'store'])->name('income.store');
Route::get('/expenses/create', 'ExpenseController@create')->name('expenses.create');
Route::post('/expenses', 'ExpenseController@store')->name('expenses.store');


// Route untuk menampilkan form register
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
// Route untuk menangani submit form register
Route::post('/register', [AuthController::class, 'register']);

// Route untuk menampilkan form login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route untuk menangani submit form login
Route::post('/login', [AuthController::class, 'login']);




