<?php

use App\Http\Controllers\MPendidikanTerakhirController;
use App\Http\Controllers\MUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['jwt.verify']], function () {
    
    // Route::controller(MPendidikanTerakhirController::class)->prefix('m_pendidikan_terakhir')->group(function () {
    //     Route::get('/', 'index');
    //     Route::post('/', 'store');
    //     Route::get('{id}', 'show');
    //     Route::put('{id}', 'update');
    //     Route::delete('{id}', 'destroy');
    // });
    Route::controller(MUserController::class)->prefix('m_user')->group(function () {
        Route::post('/logout', 'logout');
    });
    Route::middleware(['role:' . config('env.role.admin') . ',' . config('env.role.kabid') . ',' . config('env.role.subkord')])->group(function () {
        Route::controller(MPendidikanTerakhirController::class)->prefix('m_pendidikan_terakhir')->group(function () {
            Route::get('/', 'index');
            Route::post('/', 'store');
            Route::get('{id}', 'show');
            Route::put('{id}', 'update');
            Route::delete('{id}', 'destroy');
        });
    });   
});


Route::controller(MUserController::class)->prefix('m_user')->group(function () {
    Route::post('/login', 'login');
    Route::get('/getuserbyrole', 'getUserbyRole');
});

