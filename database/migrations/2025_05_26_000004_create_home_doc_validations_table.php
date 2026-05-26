<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_doc_validations', function (Blueprint $table) {
            $table->id();
            $table->json('title')->nullable();
            $table->json('description')->nullable();
            $table->json('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });

        Schema::create('home_doc_validation_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('home_doc_validation_id');
            $table->foreign('home_doc_validation_id')->references('id')->on('home_doc_validations')->onDelete('cascade');
            $table->json('title')->nullable();
            $table->string('image')->nullable();
            $table->integer('sort')->default(0);
            $table->timestamps();
        });

        Schema::create('home_doc_validation_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('home_doc_validation_item_id');
            $table->foreign('home_doc_validation_item_id')->references('id')->on('home_doc_validation_items')->onDelete('cascade');
            $table->json('title')->nullable();
            $table->integer('sort')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_doc_validation_details');
        Schema::dropIfExists('home_doc_validation_items');
        Schema::dropIfExists('home_doc_validations');
    }
};
