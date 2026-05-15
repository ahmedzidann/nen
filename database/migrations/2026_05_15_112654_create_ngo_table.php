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
        Schema::create('ngo', function (Blueprint $table) {
            $table->id();
            $table->mediumText('title')->nullable();
            $table->mediumText('subtitle')->nullable();
            $table->mediumText('description')->nullable();
            $table->mediumText('home_description')->nullable();
            $table->string('item')->nullable();
            $table->enum('status', ['Active', 'Not Active'])->default('Active');
            $table->integer('pages_id')->nullable();
            $table->integer('childe_pages_id')->nullable();
            $table->integer('sort')->nullable();
            $table->tinyInteger('show_in_home')->default(0);
            $table->string('image')->nullable();
            $table->mediumText('first_button')->nullable();
            $table->mediumText('second_button')->nullable();
            $table->integer('section_id')->nullable();
            $table->string('url_first_button')->nullable();
            $table->string('url_second_button')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ngo');
    }
};
