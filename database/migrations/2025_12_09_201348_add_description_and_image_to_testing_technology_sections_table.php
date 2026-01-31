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
        Schema::table('testing_technology_sections', function (Blueprint $table) {
            $table->text('description')->nullable()->after('title');
           $table->string('image_1')->nullable()->after('description');
            $table->string('image_2')->nullable()->after('image_1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('testing_technology_sections', function (Blueprint $table) {
            $table->dropColumn(['description', 'image_1','image_2']);
        });
    }
};
