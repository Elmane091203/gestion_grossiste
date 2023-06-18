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
        Schema::create('panierGs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');//id gestionnaire
            $table->foreignId('stock_fournisseur_id')->constrained('stock_fournisseurs');
            $table->integer('quantite')->default(1);
            $table->boolean('etatG')->default(false);
            $table->boolean('etatF')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panierGs');
    }
};
