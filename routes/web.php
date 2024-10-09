<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminSkillController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TblDinamisController;
use App\Http\Controllers\KontenController;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'home']);
Route::get('/about', [AboutController::class, 'about']);
Route::get('/skill', [SkillController::class, 'skill']);
Route::get('/project', [ProjectController::class, 'project']);
Route::get('/certificate', [CertificateController::class, 'certificate']);
Route::get('/contact', [ContactController::class, 'contact']);
Route::get('/admin/dashboard', [AdminController::class, 'admin'])->middleware('auth', 'admin');

// Route::get('/dinamis', [TblDinamisController::class, 'index'])->name('dinamis.index');
// Route::get('/dinamis/create', [TblDinamisController::class, 'create'])->name('dinamis.create');
// Route::post('/dinamis', [TblDinamisController::class, 'store'])->name('dinamis.store');
// Route::get('/dinamis/{dinami}/edit', [TblDinamisController::class, 'edit'])->name('dinamis.edit');
// Route::put('/dinamis/{dinami}', [TblDinamisController::class, 'update'])->name('dinamis.update');
// Route::delete('/dinamis/{dinami}', [TblDinamisController::class, 'destroy'])->name('dinamis.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('konten', KontenController::class);

Route::resource('/admin/dashboard/skill', AdminSkillController::class);


require __DIR__.'/auth.php';