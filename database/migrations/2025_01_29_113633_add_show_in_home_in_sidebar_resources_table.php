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
        Schema::table('sidebar_resources', function (Blueprint $table) {
            $table->boolean('show_in_home')->default(0)->after('sub_category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sidebar_resources', function (Blueprint $table) {
            $table->dropColumn('show_in_home');
        });
    }
};
