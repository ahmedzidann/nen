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
        Schema::create('feature_advantages_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('feature_advantage_id')->nullable();
            $table->foreign('feature_advantage_id')->on('feature_advantages')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_advantages_details');
    }
};
