<?php


use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::resource('users', UserController::class);
Route::resource('families', \App\Http\Controllers\FamilyController::class);
Route::resource('relatives', \App\Http\Controllers\RelativeController::class);
Route::resource('tasks', \App\Http\Controllers\TaskController::class);
Route::resource('rewards', \App\Http\Controllers\RewardController::class);
