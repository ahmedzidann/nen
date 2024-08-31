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
        Schema::create('investor_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('investor_id');
            $table->foreign('investor_id')->on('static_tables')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->tinyInteger('category')->default(1);
            $table->integer('since');
            $table->integer('percent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investor_attributes');
    }
};
