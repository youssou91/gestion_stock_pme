<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
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
            // Foreign key constraint
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
