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
        Schema::create('static_tables', function (Blueprint $table) {

            $table->id();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('subsubtitle')->nullable();
            $table->integer('years')->nullable();
            $table->string('years_text')->nullable();
            $table->integer('month')->nullable();
            $table->string('button')->nullable();
            $table->string('button_two')->nullable();
            $table->string('url')->nullable();
            $table->string('url_two')->nullable();
            $table->string('icon')->nullable();
            $table->longText('description')->nullable();
            $table->enum('status', StaticTable::STATUS)->default('Active');
            $table->foreignId('pages_id')->references('id')->on('pages')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('childe_pages_id')->nullable()->references('id')->on('pages')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('item');
            $table->integer('sort')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('static_tables');
    }
};
