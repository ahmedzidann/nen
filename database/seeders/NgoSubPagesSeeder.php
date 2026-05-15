<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class NgoSubPagesSeeder extends Seeder
{
    public function run(): void
    {
        $ngoPage = Page::where('slug', 'ngo')->first();

        if (!$ngoPage) {
            $ngoPage = Page::create([
                'name'   => ['en' => 'NGO', 'ar' => 'المنظمات غير الحكومية'],
                'slug'   => 'ngo',
                'status' => 'Active',
                'navbar' => 'Active',
                'sort'   => 11,
            ]);
            $this->command->info('Created parent NGO page.');
        }

        $lastSort = Page::where('parent_id', $ngoPage->id)->max('sort') ?? 0;

        $subPages = [
            [
                'name'      => ['en' => 'Service Activities', 'ar' => 'الأنشطة الخدمية'],
                'slug'      => 'service-activities',
                'parent_id' => $ngoPage->id,
                'status'    => 'Active',
                'navbar'    => 'Active',
                'sort'      => $lastSort + 1,
            ],
            [
                'name'      => ['en' => 'Support Us', 'ar' => 'ادعمنا'],
                'slug'      => 'support-us',
                'parent_id' => $ngoPage->id,
                'status'    => 'Active',
                'navbar'    => 'Active',
                'sort'      => $lastSort + 2,
            ],
        ];

        foreach ($subPages as $subPage) {
            $exists = Page::where('slug', $subPage['slug'])
                          ->where('parent_id', $ngoPage->id)
                          ->exists();

            if (!$exists) {
                Page::create($subPage);
                $this->command->info('Created: ' . $subPage['slug']);
            } else {
                $this->command->warn('Already exists: ' . $subPage['slug']);
            }
        }

        $this->command->info('NGO sub-pages seeder completed.');
    }
}
