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
        Schema::create('identity_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('identity_id');
            $table->foreign('identity_id')->on('static_tables')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->mediumText('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identity_attributes');
    }
};
