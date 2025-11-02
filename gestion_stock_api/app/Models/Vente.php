<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vente extends Model
{
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
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('ventes');
    }
}
