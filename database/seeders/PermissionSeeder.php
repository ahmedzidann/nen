<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $controllers = [
            'Admins'=>1,
            'Roles'=>1,
            'Users'=>1,
            'About'=>1,
            'Projects'=>1,
            'Settings'=>1,
            'Education'=>1,
            'Blogs'=>1,
            'products'=>1,
            'Doc Validation'=>1,
            'Testing'=>1,
            'Technology'=>1,
            'Find Us'=>1,
            'Contact Us'=>1,
            'Forms'=>1,
            'Tables'=>1,
            'Hr'=>1,
            'Pages'=>1,
            'Faq'=>1,
            'Pricing'=>1,
            'Charts'=>1,
            'Maps'=>1,
            'Menu Levels'=>1,
            'Documentation'=>1,
            'Support'=>1,
        ];

        $actions = ['show', 'edit', 'delete', 'create'];

        foreach ($controllers as $controller => $actionCount) {
            // Ensure actionCount is valid (between 1 and 5)
            $actionCount = max(1, min(4, $actionCount));

            // Get only the specified number of actions
            $controllerActions = array_slice($actions, 0, $actionCount);

            foreach ($controllerActions as $action) {
                Permission::updateOrCreate(
                    ['name' => "{$action} {$controller}"],
                    [
                        'name' => "{$action} {$controller}",
                        'group' => $controller,
                        'guard_name' => 'admin',
                    ]
                );
            }
        }

    }
}
