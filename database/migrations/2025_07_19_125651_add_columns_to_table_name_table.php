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
          Schema::table('abouts', function (Blueprint $table) {
            $table->string('vk_link')->nullable()->after('youtube_link');
            $table->string('email')->nullable()->after('vk_link');
            $table->string('telegram_number')->nullable()->after('email');
            $table->string('whats_number')->nullable()->after('telegram_number');
            $table->string('image_1')->nullable()->after('whats_number');
            $table->string('image_2')->nullable()->after('image_1');
            $table->string('image_3')->nullable()->after('image_2');
            $table->string('image_4')->nullable()->after('image_3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            //
        });
    }
};
