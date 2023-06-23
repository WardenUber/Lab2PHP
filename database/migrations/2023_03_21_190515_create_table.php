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
        Schema::create('category', function (Blueprint $category) {
            $category->id();
            $category->string('name')->unique();
            $category->string('slug')->unique();
            $category->boolean('activity')->default(0);
            $category->timestamps();
            $category->foreignId('category_id')->nullable();
        });
        Schema::create('product', function (Blueprint $product) {
            $product->id();
            $product->string('name')->unique();
            $product->string('slug')->unique();
            $product->text('description');
            $product->timestamps();
            $product->biginteger('cost');
            $product->string('photo')->nullable();
            $product->biginteger('count')->unsigned()->default(0);
            $product->foreignId('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
        Schema::dropIfExists('category');
        
    }
};
