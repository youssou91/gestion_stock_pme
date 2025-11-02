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
        Schema::create('ventes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('utilisateur_id');
            $table->string('client_id', 120)->nullable();
            $table->string('client_contact', 50)->nullable();
            $table->decimal('total', 12, 2);
            $modesPaiement = ['espece', 'carte', 'virement', 'autre'];
            $table->enum('mode_paiement', $modesPaiement)->default('espece');
            $statuts = ['terminee', 'annulee'];
            $table->enum('statut', $statuts)->default('terminee');
            // Foreign key constraint
            $table->foreign('utilisateur_id')->references('id')->on('utilisateurs')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventes');
    }
};
