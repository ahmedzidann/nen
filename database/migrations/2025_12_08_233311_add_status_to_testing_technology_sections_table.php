<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\StaticTable;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('testing_technology_sections', function (Blueprint $table) {
            $table->integer('design_section_id')->after('sub_category_id');
            $table->enum('status', StaticTable::STATUS)->default('Active')->after('sort');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('testing_technology_sections', function (Blueprint $table) {
            //
        });
    }
};
