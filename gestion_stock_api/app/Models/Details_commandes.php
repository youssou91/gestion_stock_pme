<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Details_commandes extends Model
{
    public function up(): void
    {
        Schema::create('details_commandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('commande_id');
            $table->unsignedBigInteger('produit_id');
            $table->integer('quantite');
            $table->decimal('prix_unitaire', 10, 2);
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('details_commandes');
    }
    
}
