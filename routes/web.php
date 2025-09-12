<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
Route::get('/',[Home::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

Route::get('/projects', [ProjectController::class, 'create'])->name('project.create');
Route::post('/projects', [ProjectController::class, 'store'])->name('project.store');



Route::get('/view-project/{id}', [ProjectController::class, 'view_edit'])->name('project.view');

Route::post('/edit-project/{id}', [ProjectController::class, 'edit'])->name('project.edit');


Route::get('/delete/{id}', [ProjectController::class, 'delete'])->name('project.delete');

