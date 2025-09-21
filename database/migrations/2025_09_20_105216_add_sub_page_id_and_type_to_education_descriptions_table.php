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
        Schema::table('education_descriptions', function (Blueprint $table) {
            $table->enum('type', ['main', 'sub'])->default('main')->after('id');
            $table->unsignedBigInteger('sub_page_id')->nullable()->after('page_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('education_descriptions', function (Blueprint $table) {
            //
        });
    }
};
