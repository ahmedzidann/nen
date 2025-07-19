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
        Schema::table('joinuses', function (Blueprint $table) {
          $table->enum('type', ['main', 'sub_main'])->default('sub_main')->after('parent_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('joinuses', function (Blueprint $table) {
             Schema::table('joinuses', function (Blueprint $table) {
            $table->dropColumn('type');
        });
        });
    }
};
