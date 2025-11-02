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
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 120);
            $table->string('email', 150)->unique();
            $table->string('mot_de_passe', 255);
            $table->string('adresse', 45)->nullable();
            $table->string('telephone', 45)->nullable();
            $roles = ['admin', 'employe', 'manager'];
            $table->enum('role', $roles)->default('employe');
            $statuts = ['actif', 'inactif'];
            $table->enum('statut', $statuts)->default('actif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
