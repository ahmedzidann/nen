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
        Schema::create('summaries', function (Blueprint $table) {
            $table->id();
            $table->mediumText('title')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('pages_id')->references('id')->on('pages')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('childe_pages_id')->references('id')->on('pages')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('summaries');
    }
};
