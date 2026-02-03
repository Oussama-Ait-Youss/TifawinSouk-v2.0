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
        Schema::create('produit', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('nom');
            $table->float('prix_achat');
            $table->float('prix_vente');
            $table->integer('stock');
            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('produit_id')->references('id')->on('produit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit');
    }
};
