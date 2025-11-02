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
        Schema::create('details_ventes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vente_id');
            $table->unsignedBigInteger('produit_id');
            $table->integer('quantite');
            $table->decimal('prix_unitaire', 10, 2);
            $table->decimal('sous_total', 10, 2);
            // Foreign key constraints
            $table->foreign('vente_id')->references('id')->on('ventes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details_ventes');
    }
};
