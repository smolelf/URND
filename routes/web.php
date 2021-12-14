<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjMemberController;
use App\Http\Controllers\User as ControllersUser;
use App\Models\Client;
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

//Project Controller
Route::get('/addproject', [ProjectController::class, 'list'])->name('project');

Route::post('/projadd', [ProjectController::class, 'add']);

Route::get('/editproj/{id}', [ProjectController::class, 'view'])->name('project');

Route::post('/updateproj', [ProjectController::class, 'update']);

//ProjMember Controller
Route::get('/editmember/{id}', [ProjMemberController::class, 'view'])->name('project');

Route::post('/updatememb', [ProjMemberController::class, 'update']);

//User Controller
Route::get('/adduser', [ControllersUser::class, 'list'])->name('user');

Route::post('/useradd', [ControllersUser::class, 'add']);

Route::get('/edituser/{id}', [ControllersUser::class, 'view'])->name('user');

Route::post('/updateuser', [ControllersUser::class, 'update']);

Route::get('/deluser/{id}', [ControllersUser::class, 'deluser']);

//User Controller (User Profile)

Route::get('/editself/{id}', [ControllersUser::class, 'self'])->name('profile');

Route::post('/updateself', [ControllersUser::class, 'updateself']);

Route::post('/updateselfpw', [ControllersUser::class, 'updateselfpw']);

//Client Controller
Route::get('/addclient', [ClientController::class, 'list'])->name('client');

Route::post('/clientadd', [ClientController::class, 'add']);

Route::get('/editclient/{id}', [ClientController::class, 'view'])->name('client');

Route::post('/updateclient', [ClientController::class, 'update']);

//Navbar Controller
Route::get('/home', [Controller::class, 'home'])->name('home');

Route::get('/project', [Controller::class, 'project'])->name('project');

Route::get('/user', [Controller::class, 'user'])->name('user');

Route::get('/client', [Controller::class, 'client'])->name('client');

Route::get('/landing', [Controller::class, 'landing'])->name('landing');
