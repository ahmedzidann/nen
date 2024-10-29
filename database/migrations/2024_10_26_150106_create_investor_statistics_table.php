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
        Schema::create('investor_statistics', function (Blueprint $table) {
            $table->id();
            $table->double('capital_value')->default(0);
            $table->double('revenue_value')->default(0);
            $table->double('profit_value')->default(0);
            $table->integer('year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investor_statistics');
    }
};
