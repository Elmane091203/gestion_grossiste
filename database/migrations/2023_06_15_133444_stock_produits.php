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
        Schema::create('stock_fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');//id fournisseur
            $table->foreignId('produit_id')->constrained('produits');
            $table->integer('quantite');
            $table->integer('prixUnitaire');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_fournisseurs');
    }
};
