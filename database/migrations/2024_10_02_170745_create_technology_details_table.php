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
        Schema::create('technology_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('technology_id')->nullable();
            $table->foreign('technology_id')->on('technologies')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->mediumText('subtitle')->nullable();
            $table->mediumText('description')->nullable();
            $table->integer('sort')->nullable();
            $table->enum('status',['Active','Not Active'])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technology_details');
    }
};
