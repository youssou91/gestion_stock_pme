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
        Schema::create('mouvements_stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produit_id');
            $types = ['entree', 'sortie', 'ajustement'];
            $table->enum('type', $types);
            $table->integer('quantite');
            $table->string('reference_source', 50)->nullable();
            $table->text('commentaire')->nullable();
            // Foreign key constraint
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade')->onUpdate('cascade');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mouvements_stocks');
    }
};
