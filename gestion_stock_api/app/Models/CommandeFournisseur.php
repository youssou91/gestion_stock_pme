<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CommandeFournisseur extends Model
{
    public function up(): void
    {
        Schema::create('commande_fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fournisseur_id');
            $table->date('date_commande');
            $table->decimal('montant_total', 10, 2);
            $statuts = ['en_attente', 'confirmee', 'annulee'];
            $table->enum('statut', $statuts)->default('en_attente');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('commande_fournisseurs');
    }
}
