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
            $table->mediumText('name');
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->on('find_us')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('product_category_id');
            $table->foreign('product_category_id')->on('product_categories')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->mediumText('description');
            $table->double('price')->default(0);
            $table->string('main_image')->nullable();
            $table->integer('sort')->nullable();
            $table->boolean('is_active')->default(1);
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
