<?php

use App\Models\StaticTable;
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
        Schema::table('management', function (Blueprint $table) {
            $table->integer('sort')->nullable()->after('title');
            $table->enum('status', StaticTable::STATUS)->default('Active')->after('sort');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('management', function (Blueprint $table) {
            $table->dropColumn(['sort', 'status']);
        });
    }
};
