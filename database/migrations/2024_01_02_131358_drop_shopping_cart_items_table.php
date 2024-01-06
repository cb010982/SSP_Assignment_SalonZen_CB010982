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
        Schema::dropIfExists('shopping_cart_items');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('shopping_cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cartID')->constrained('shopping_carts');
            $table->foreignId('itemID')->constrained('items'); // Assuming you have an items table
            $table->integer('itemQuantity');
            $table->decimal('itemPrice', 8, 2);
            $table->timestamps();
        });
    }
};
