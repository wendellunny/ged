<?php

use App\Http\Controllers\StructuresController;
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

Route::get('/', [StructuresController::class,'viewFolder'])->name('folder.root');



Route::resource('structure', StructuresController::class);

Route::post('/make-directory/{uuid}',[StructuresController::class,'createFolder'])->name('folder.create');
Route::get('folder/{uuid}',[StructuresController::class,'viewFolder'])->name('folder.view');
Route::delete('folder/{id}',[StructuresController::class,'deleteFolder'])->name('folder.delete');
