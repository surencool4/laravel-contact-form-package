<?php
  
  use Illuminate\Support\Facades\Route;
  use Owc\Contact\Http\Controllers\ContactController;

  Route::middleware(['guest','web'])->group(function(){
    Route::get('/contact', [ContactController::class, 'create']);
    Route::post('/submit/message', [ContactController::class, 'store']);
  });