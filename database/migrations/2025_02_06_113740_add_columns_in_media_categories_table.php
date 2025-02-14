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
        Schema::table('media_categories', function (Blueprint $table) {
            $table->string('mini_desc')->nullable()->after('title');
            $table->string('image')->nullable()->after('mini_desc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('media_categories', function (Blueprint $table) {
            $table->dropColumn(['mini_desc', 'image']);
        });
    }
};
