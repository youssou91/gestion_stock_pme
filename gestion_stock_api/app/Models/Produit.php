<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produit extends Model
{
    public function up(): void
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('reference', 50)->unique();
            $table->string('nom', 150);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('categorie_id');
            $table->decimal('prix_achat', 10, 2);
            $table->decimal('prix_vente', 10, 2);
            $table->integer('quantite_stock')->default(0);
            $table->integer('seuil_minimum')->default(5);
            $table->string('unite_mesure', 50)->default('unité');
            $statuts = ['actif', 'inactif'];
            $table->enum('statut', $statuts)->default('actif');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
}
