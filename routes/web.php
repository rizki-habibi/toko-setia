<?php

use App\Http\Controllers\AiAssistantController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::post('/ai/chat', AiAssistantController::class)->middleware('throttle:15,1')->name('ai.chat');
