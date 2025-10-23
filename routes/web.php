<?php

use App\Http\Controllers\BoutiqueController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BoutiqueController::class, 'index'])->name('boutique.index');
