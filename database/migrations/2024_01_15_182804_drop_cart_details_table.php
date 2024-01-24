<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::dropIfExists('cart_details');
}


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::create('cart_details', function (Blueprint $table) {
            // Define the structure of the table if needed
            $table->id();
            $table->string('column1');
            // Add other columns as needed
            $table->timestamps();
        });
    }
    
};
