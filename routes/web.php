<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\User as ControllersUser;
use App\Models\User;
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

Route::get('/home', [Controller::class, 'index']);

//Route::get('/landing', [Controller::class, 'landing']);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/addproject', [ProjectController::class, 'list']);

Route::post('/projadd', [ProjectController::class, 'add']);

Route::get('/edituser/{id}', [ControllersUser::class, 'view']);

Route::post('/updateuser', [ControllersUser::class, 'update']);

Route::middleware(['auth:sanctum', 'verified'])->get('/home', [Controller::class, 'home'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/project', [Controller::class, 'project'])->name('project');

Route::middleware(['auth:sanctum', 'verified'])->get('/user', [Controller::class, 'user'])->name('user');

Route::middleware(['auth:sanctum', 'verified'])->get('/client', [Controller::class, 'client'])->name('client');

Route::middleware(['auth:sanctum', 'verified'])->get('/landing', [Controller::class, 'landing'])->name('landing');
