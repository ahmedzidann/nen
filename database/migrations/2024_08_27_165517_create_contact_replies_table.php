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
        Schema::create('contact_replies', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('contact_id'); 
            $table->foreign('contact_id')->on('contacts')->references('id')->cascadeOnUpdate()->cascadeOnDelete();  
            $table->mediumText('reply')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_replies');
    }
};
