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
            $table->dropColumn(['label1', 'label2', 'label3', 'label4'])->change();
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
