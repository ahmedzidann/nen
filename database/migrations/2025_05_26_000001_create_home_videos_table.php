<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_videos', function (Blueprint $table) {
            $table->id();
            $table->string('youtube_url');
            $table->json('title')->nullable();
            $table->json('description')->nullable();
            $table->json('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_videos');
    }
};
