<?php
// database/migrations/YYYY_MM_DD_create_order_items_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');  // Foreign key to the orders table
            $table->unsignedBigInteger('product_id');  // Foreign key to products table (optional if you have a products table)
            $table->integer('quantity');  // Quantity of the product
            $table->decimal('price', 8, 2);  // Price of the product at the time of order
            $table->timestamps();

            // Foreign key constraints (optional, if you have a products table)
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
