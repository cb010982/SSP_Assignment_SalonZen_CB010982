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
        Schema::dropIfExists('shopping_carts');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->id('cartID');
            $table->foreignId('userID')->constrained();
            $table->string('sessionID');
            $table->boolean('purchased')->default(false);
            $table->timestamps();
        });
    }
};
