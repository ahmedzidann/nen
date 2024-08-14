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
        Schema::create('doc_validation_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doc_validation_id')->nullable();
            $table->foreign('doc_validation_id')->references('id')->on('doc_validations')->ondelete('cascade');
            $table->string('title')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doc_validation_details');
    }
};
