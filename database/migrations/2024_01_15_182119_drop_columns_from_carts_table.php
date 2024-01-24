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
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn(['product', 'quantity', 'name', 'expiry_date']);
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->string('product');
            $table->integer('quantity');
            $table->string('name');
            $table->date('expiry_date');
        });
    }
};
