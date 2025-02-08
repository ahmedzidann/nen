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
        Schema::create('summary_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('summary_id')->references('id')->on('summaries')->cascadeOnUpdate()->cascadeOnDelete();
            $table->mediumText('title')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('summary_details');
    }
};
