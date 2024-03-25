<?php

use App\Models\Item;
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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('name_two')->nullable();
            $table->string('title')->nullable();
            $table->string('title_two')->nullable();
            $table->string('label')->nullable();
            $table->string('label_two')->nullable();
            $table->string('button')->nullable();
            $table->string('link')->nullable();
            $table->text('description')->nullable();
            $table->text('bref')->nullable();
            $table->integer('sort')->nullable();
            $table->enum('status', Item::STATUS)->default('Active');
            $table->string('type');
            $table->foreignId('pages_id')->references('id')->on('pages')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
