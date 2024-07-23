<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\StaticTable;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doc_validations', function (Blueprint $table) {
            $table->id();
            $table->string('title',500)->nullable();
            $table->text('description')->nullable();
            $table->enum('status',StaticTable::STATUS)->default('Active');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('pages_id')->nullable();
            $table->foreign('pages_id')->references('id')->on('pages')->onDelete('cascade');
            $table->unsignedBigInteger('childe_pages_id')->nullable();
            $table->foreign('childe_pages_id')->references('id')->on('pages')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doc_validations');
    }
};
