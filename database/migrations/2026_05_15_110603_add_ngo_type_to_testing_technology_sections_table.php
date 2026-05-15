<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE testing_technology_sections MODIFY COLUMN type ENUM('testing', 'technology', 'ngo')");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE testing_technology_sections MODIFY COLUMN type ENUM('testing', 'technology')");
    }
};
