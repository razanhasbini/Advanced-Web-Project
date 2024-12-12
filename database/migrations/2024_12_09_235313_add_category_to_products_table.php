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
        Schema::table('products', function (Blueprint $table) {
            // Add a new 'category' column
            $table->string('category')->nullable()->after('description'); // Adjust the position if needed

            // You can add more columns if required
            // Example: $table->string('brand')->nullable()->after('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop the 'category' column
            $table->dropColumn('category');

            // Drop other columns if you added them
            // Example: $table->dropColumn('brand');
        });
    }
};