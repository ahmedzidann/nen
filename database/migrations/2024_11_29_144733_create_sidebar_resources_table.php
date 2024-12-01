<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\StaticTable;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sidebar_resources', function (Blueprint $table) {
            $table->id();
            $table->string('main_category');
            $table->string('sub_category');
            $table->mediumText('title');
            $table->string('type');
            $table->string('resource');
            $table->enum('status', StaticTable::STATUS)->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sidebar_resources');
    }
};
