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
        Schema::dropIfExists('cart');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('cart', function ($table) {
        $table->id();
        $table->timestamps();
        $table->integer('user_id')->unsigned();
        $table->string('product_name');
        $table->integer('quantity');
        $table->float('grand_total');
        $table->foreign('user_id')->references('id')->on('users');
    });
}
};
