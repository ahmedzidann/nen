<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $permissions = [
            'dashboard_view',
            'home_controller_view',
            'contact_us_homePage_view',
            'contact_us_homePage_update',
            'contact_us_homePage_delete',
            'apply_for_job_view',
            'apply_for_job_update',
            'apply_for_job_delete',
            'apply_for_job_download',
            'item_view',
            'item_update',
            'item_delete',
            'orchidia_controller_view',
            'product_controller_view',
            'contact_us_product_view',
            'contact_us_product_update',
            'contact_us_product_delete',
            'product_view',
            'product_create',
            'product_update',
            'product_delete',
            'cme_controller_view',
            'investors_controller_view',
            'careers_controller_view',
            'contact_us_controller_view',
            'country_view',
            'country_create',
            'country_update',
            'country_delete',
            'hr_view',
            'admin_view',
            'admin_create',
            'admin_update',
            'admin_delete',
            'roles_view',
            'roles_create',
            'roles_update',
            'roles_delete',
            'openinghours_view',
            'openinghours_create',
            'openinghours_update',
            'openinghours_delete',
            'settings_view',
            'settings_update',
            'settings_delete',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission,'guard_name'=> 'admin']);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newrole');
    }
};
