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
        Schema::table('our_teams', function (Blueprint $table) {
            $table->unsignedBigInteger('management_id')->nullable()->after('name');
            $table->foreign('management_id')->on('managements')->references('id')->cascadeOnUpdate()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('our_teams', function (Blueprint $table) {
            $table->dropColumn('management_id');
        });
    }
};
