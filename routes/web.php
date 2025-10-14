<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MangaController;

Route::get('/', function () { return view('welcome'); });

Route::get('/listerMangas', [MangaController::class,'listMangas'])->name('listMangas');
Route::get('/ajouterManga', [MangaController::class, 'addManga'])->name('addManga');
Route::post('/validManga', [MangaController::class, 'validManga'])->name('listMangas');
Route::get('/editManga/{id}', [MangaController::class, 'editManga'])->name('editManga');
Route::get('/suppimerManga/{id}', [MangaController::class, 'removeManga'])->name('listMangas');


