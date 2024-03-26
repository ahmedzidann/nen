<?php

use App\Models\ManyTables;
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
        Schema::create('many_tables', function (Blueprint $table) {
            $table->id();
            $table->string('since')->nullable();
            $table->string('sharing')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->longText('description')->nullable();
            $table->enum('status', ManyTables::STATUS)->default('Active');
            $table->foreignId('pages_id')->references('id')->on('pages')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('item');
            $table->foreignId('static_tables_id')->references('id')->on('static_tables')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('sort')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('many_tables');
    }
};
