<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\terminalController;

//root
Route::get('/', [HomeController::class, 'redirect']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

//account management
Route::get('/register', [ProfileController::class, 'register'])->name('register');
Route::post('/register', [ProfileController::class, 'registerAction'])->name('register.registerAction');
Route::get('/login', [ProfileController::class, 'login'])->name('login');
Route::post('/login', [ProfileController::class, 'loginAction'])->name('login.loginAction');
Route::get('/logout', [ProfileController::class, 'logout'])->name('logout');

//profile
Route::get('/profile/{id}', [ProfileController::class, 'profile'])->name('profile');
Route::post('/profile/{id}', [ProfileController::class, 'updateProfile'])->name('profile.updateProfile');

//agent index
Route::get('/agents', [AgentsController::class, 'index'])->name('agent');

//add agent
Route::get('/agents/create', [AgentsController::class, 'add'])->name('addAgent');
Route::post('/agents/create', [AgentsController::class, 'addAgent'])->name('agent.addAgent');

//edit agent
Route::get('/agents/edit/{id}', [AgentsController::class, 'update'])->name('updateAgent');
Route::post('/agents/edit', [AgentsController::class, 'updateAgent'])->name('agent.updateAgent');

//delete agent
Route::get('/agents/deleteagent/{id}', [AgentsController::class, 'deleteAgent'])->name('agent.deleteAgent');
Route::get('/agents/deleteatk/{id}', [AgentsController::class, 'deleteAtk'])->name('agent.deleteAtk');
Route::get('/agents/deletesr/{id}', [AgentsController::class, 'deleteSr'])->name('agent.deleteSr');
Route::get('/agents/deleteinv/{id}', [AgentsController::class, 'deleteInv'])->name('agent.deleteInv');

//terminal - ARG, rpg
Route::get('/terminal', [terminalController::class, 'index'])->name('terminal');
Route::post('/terminal', [terminalController::class, 'access'])->name('terminal.access');
Route::get('/terminal/petrov', [terminalController::class, 'petrov'])->name('petrov');
