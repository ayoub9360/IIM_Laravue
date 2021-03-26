<?php

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\ProjectsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('/customers', [CustomersController::class, 'index'])->name('customers');
    Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');

    Route::get('/customers/add', [CustomersController::class, 'add'])->name('customers.add');
    Route::post('/customers/create', [CustomersController::class, 'create'])->name('customers.create');
    Route::get('/customers/edit/{id}', [CustomersController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/edit/{id}/save', [CustomersController::class, 'save'])->name('customers.save');
    Route::delete('/customers/edit/{id}/delete', [CustomersController::class, 'delete'])->name('customers.delete');

    Route::get('/projects/add', [ProjectsController::class, 'add'])->name('projects.add');
    Route::post('/projects/create', [ProjectsController::class, 'create'])->name('projects.create');
    Route::get('/projects/edit/{id}', [ProjectsController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/edit/{id}/save', [ProjectsController::class, 'save'])->name('projects.save');
    Route::delete('/projects/edit/{id}/delete', [ProjectsController::class, 'delete'])->name('projects.delete');

});
