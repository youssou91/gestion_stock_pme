<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategorieController;
use App\Http\Controllers\Api\CommandeController;
use App\Http\Controllers\Api\FournisseurController;
use App\Http\Controllers\Api\ProduitController;
use App\Http\Controllers\Api\VenteController;
use Illuminate\Support\Facades\Route;
// 
// Route::apiResource('produits', ProduitController::class);
Route::apiResource('categories', CategorieController::class);
Route::apiResource('fournisseurs', FournisseurController::class);
Route::apiResource('commandes', CommandeController::class);
Route::apiResource('ventes', VenteController::class);

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);



Route::get('/', function () {
    return view('welcome');
});

//API Routes

// Routes protégées (exemple futur avec Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('produits', ProduitController::class);
    Route::apiResource('categories', CategorieController::class);
    Route::apiResource('fournisseurs', FournisseurController::class);
    Route::apiResource('commandes', CommandeController::class);
    Route::apiResource('ventes', VenteController::class);
});