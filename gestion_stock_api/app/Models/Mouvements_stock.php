<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mouvements_stock extends Model
{
    public function up(): void
    {
        Schema::create('mouvements_stock', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produit_id');
            $types = ['entree', 'sortie', 'ajustement'];
            $table->enum('type', $types);
            $table->integer('quantite');
            $table->string('reference_source', 50)->nullable();
            $table->text('commentaire')->nullable();
            $table->timestamps();

        });
    }
    public function down(): void
    {
        Schema::dropIfExists('mouvements_stock');
    }
}
