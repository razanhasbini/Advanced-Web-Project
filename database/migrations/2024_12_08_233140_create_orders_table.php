<?php
// database/migrations/YYYY_MM_DD_create_orders_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');  // Foreign key to users table
            $table->string('shipping_address');  // Shipping address for the order
            $table->string('payment_method');  // Payment method (e.g., Credit Card, PayPal)
            $table->timestamps();

            // Foreign key constraint (optional, if you have a users table)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
