<?php

use App\Http\Controllers\AgentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterLoginController;

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

// Route::get('/' );

Route::get('/', [HomeController::class, 'redo']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/login', [RegisterLoginController::class, 'login'])->name('login');
Route::post('/login', [RegisterLoginController::class, 'login_action'])->name('login.login_action');
Route::get('/register', [RegisterLoginController::class, 'register'])->name('register');
Route::post('/register', [RegisterLoginController::class, 'register_action'])->name('register.register_action');
Route::get('/logout', [RegisterLoginController::class, 'logout'])->name('logout');
Route::get('/agents', [AgentsController::class, 'agents'])->name('agents');
Route::get('/agents/create', [AgentsController::class, 'addAgent'])->name('addAgent');
Route::post('/agents/create', [AgentsController::class, 'addAgent_action'])->name('agent.addAgent_action');
Route::get('/agents/edit/{id}', [AgentsController::class, 'editAgent'])->name('editAgent');
Route::post('/agents/edit', [AgentsController::class, 'editAgent_action'])->name('agent.editAgent_action');
Route::get('/agents/deleteatk/{id}', [AgentsController::class, 'deleteAtk_action'])->name('agent.deleteAtk_action');
Route::get('/agents/deletesr/{id}', [AgentsController::class, 'deleteSr_action'])->name('agent.deleteSr_action');
Route::get('/agents/deleteinv/{id}', [AgentsController::class, 'deleteInv_action'])->name('agent.deleteInv_action');
