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
            $table->dropColumn(['cardholder_name', 'card_number', 'cvc', 'expiry_month', 'expiry_date', 'payment_method']);
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->string('cardholder_name');
            $table->string('card_number');
            $table->string('cvc');
            $table->string('expiry_month');
            $table->date('expiry_date');
            $table->string('payment_method');
        });
    }
    
};
