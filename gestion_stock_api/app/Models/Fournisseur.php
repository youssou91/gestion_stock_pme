<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Fournisseur extends Model
{
    public function up(): void
    {
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 150);
            $table->string('contact', 50)->nullable();
            $table->string('email', 120)->nullable();
            $table->text('adresse')->nullable();
            $table->string('ville', 100)->nullable();
            $table->string('pays', 100)->nullable();
            $statuts = ['actif', 'inactif'];    
            $table->enum('statut', $statuts)->default('actif');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('fournisseurs');
    }
}
