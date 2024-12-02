<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('sidebar_resources', function (Blueprint $table) {
            $table->tinyInteger('type')->change();
            $table->mediumText('sub_title')->nullable()->after('title');
            $table->string('url')->nullable()->after('sub_title');
        });

    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::table('sidebar_resources', function (Blueprint $table) {
            $table->string('type')->change();
            $table->dropColumn(['sub_title', 'url']);
        });

    }
};
