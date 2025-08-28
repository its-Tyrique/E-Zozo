<?php

use App\Jobs\TranslateJob;
use App\Mail\JobPosted;
use App\Models\Job;
use App\Http\Controllers\{JobController, RegisteredUserController, SessionController};
use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    $job = Job::first();

    TranslateJob::dispatch();

    return 'Done';
});

Route::view('/', 'home');
Route::view('/contact', 'contact');

// region Jobs
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create'])
    ->middleware('auth');

Route::post('/jobs', [JobController::class, 'store'])
    ->middleware('auth');

Route::get('/jobs/{job}', [JobController::class, 'show']);

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit','job');

Route::patch('/jobs/{job}', [JobController::class, 'update'])
    ->middleware('auth')
    ->can('edit-job','job');

Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
// endregion Jobs

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
