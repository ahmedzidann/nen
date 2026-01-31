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
        Schema::table('technologies', function (Blueprint $table) {
             $table->integer('section_id')->nullable()->after('childe_pages_id');
              $table->string('first_button')->nullable()->after('section_id');
              $table->string('url_first_button')->nullable()->after('first_button');
               $table->string('second_button')->nullable()->after('url_first_button');
              $table->string('url_second_button')->nullable()->after('second_button');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('technologies', function (Blueprint $table) {
             $table->dropColumn(['section_id', 'first_button','url_first_button','second_button','url_second_button']);
        });
    }
};
