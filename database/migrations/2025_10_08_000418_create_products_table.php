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
         Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->nullable()->constrained('shops')->onDelete('cascade');
            $table->string('item_name');
            $table->string('brand');
            $table->enum('status', ['Available', 'Low Stock', 'Out of Stock'])->default('Available');
            $table->integer('stocks')->default(0);
            $table->decimal('price', 10, 2);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
