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
        Schema::table('about_tabs', function (Blueprint $table) {
            $table->Longtext('challenge');
            $table->Longtext('result');
            $table->Longtext('solution');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_tabs', function (Blueprint $table) {
            //
        });
    }
};
