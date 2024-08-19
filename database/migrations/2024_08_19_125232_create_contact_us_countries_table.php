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
        Schema::create('contact_us_countries', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('name')->nullable();
            $table->decimal('lat', 10, 7)->nullable(); // Latitude
            $table->decimal('lng', 10, 7)->nullable(); // Longitude
            $table->string('address')->nullable();
            $table->string('phone');
            $table->tinyInteger('type');
            $table->dateTime('from_at');
            $table->dateTime('to_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_us_countries');
    }
};
