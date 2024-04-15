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
        Schema::table('static_tables', function (Blueprint $table) {
            $table->string('city')->nullable();
            $table->string('job_type')->nullable();
            $table->string('salary')->nullable();

        });
        Schema::table('our_teams', function (Blueprint $table) {
            $table->string('description')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('static_tables', function (Blueprint $table) {
            $table->dropColumn('city');
            $table->dropColumn('job_type');
            $table->dropColumn('salary');
        });

        Schema::table('our_teams', function (Blueprint $table) {
            $table->dropColumn('description');

        });
    }
};
