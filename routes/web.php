<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MangaController;

Route::get('/', function () { return view('welcome'); });

Route::get('/listerMangas', [MangaController::class,'listMangas'])->name('listMangas');
Route::get('/ajouterManga', [MangaController::class, 'addManga']);
