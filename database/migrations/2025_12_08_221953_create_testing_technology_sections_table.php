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
        Schema::create('testing_technology_sections', function (Blueprint $table) {
            $table->id();
           $table->enum('type', ['testing', 'technology']);
            $table->string('main_category_id');
            $table->string('sub_category_id');
            $table->mediumText('title');
             $table->integer('sort');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testing_technology_sections');
    }
};
