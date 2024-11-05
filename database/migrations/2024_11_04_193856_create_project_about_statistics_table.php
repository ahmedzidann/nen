<?php

use App\Models\StaticTable;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('project_about_statistics', function (Blueprint $table) {
            $table->id();
            $table->mediumText('title')->nullable();
            $table->mediumInteger('value')->nullable();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('tab_id')->nullable();
            $table->foreign('tab_id')->references('id')->on('tabs')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('sort')->nullable();
            $table->enum('status', StaticTable::STATUS)->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_about_statistics');
    }
};
