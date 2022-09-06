<?php

use App\Http\Controllers\backend\backendController;
use App\Http\Controllers\Frontend\accountController;
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

Route::get('/dashboard', function () {
    return view('frontend.index');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('backend.index');
})->middleware(['myauth'])->name('admin');

Route::group(['prefix'=>'/admin'],function(){
    Route::group(['prefix'=>'/view'],function(){
        Route::get('/userinfo',[backendController::class,'index'])->name('userinfo')->middleware(['myauth']);
    
    });

});


Route::group(['prefix'=>'/dashboard'],function(){
    Route::group(['prefix'=>'/view'],function(){
        Route::get('/accountview',[accountController::class,'index'])->name('view')->middleware(['auth']);
        Route::get('/accountdeposite',[accountController::class,'deposite'])->name('deposite')->middleware(['auth']);
        Route::post('/adddeposite',[accountController::class,'adddeposite'])->name('adddeposite')->middleware(['auth']);
        Route::get('/transfer',[accountController::class,'transfer'])->name('transfer')->middleware(['auth']);
        Route::post('/fundtransfer',[accountController::class,'fundtransfer'])->name('fundtransfer')->middleware(['auth']);
        Route::get('/transectionhistory',[accountController::class,'transectionhistory'])->name('transectionhistory')->middleware(['auth']);
    });

});

// Route::group(['prefix'=>'/admin'],function(){
//     Route::group(['prefix'=>'/categories'],function(){
//         Route::get('/categoriesview',[categoriesController::class,'index'])->name('categoriesview')->middleware(['myauth']);
//     });

// });

require __DIR__.'/auth.php';
