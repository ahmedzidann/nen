<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class TechnologyPagesSeeder extends Seeder
{
    public function run(): void
    {
        $parent = Page::where('slug', 'technology')->first();

        if (!$parent) {
            $this->command->warn('Parent page with slug "technology" not found. Skipping.');
            return;
        }

        $parent->update([
            'home_description' => [
                'en' => 'Discover cutting-edge technologies that drive the future of AI and digital transformation.',
                'ar' => 'اكتشف أحدث التقنيات التي تقود مستقبل الذكاء الاصطناعي والتحول الرقمي.',
            ],
        ]);

        $items = [
            [
                'name'             => ['en' => 'Machine Learning', 'ar' => 'تعلم الآلة'],
                'home_description' => ['en' => 'Build intelligent systems that learn from data and improve over time without being explicitly programmed.', 'ar' => 'بناء أنظمة ذكية تتعلم من البيانات وتتحسن مع مرور الوقت دون الحاجة إلى برمجة صريحة.'],
                'slug'             => 'machine-learning-demo',
                'sort'             => 1,
            ],
            [
                'name'             => ['en' => 'Natural Language Processing', 'ar' => 'معالجة اللغة الطبيعية'],
                'home_description' => ['en' => 'Enable machines to read, understand, and generate human language with high accuracy and fluency.', 'ar' => 'تمكين الآلات من قراءة اللغة البشرية وفهمها وتوليدها بدقة وطلاقة عاليتين.'],
                'slug'             => 'nlp-demo',
                'sort'             => 2,
            ],
            [
                'name'             => ['en' => 'Computer Vision', 'ar' => 'رؤية الحاسوب'],
                'home_description' => ['en' => 'Empower applications to interpret and understand visual information from images and video streams.', 'ar' => 'تمكين التطبيقات من تفسير المعلومات المرئية وفهمها من الصور وتدفقات الفيديو.'],
                'slug'             => 'computer-vision-demo',
                'sort'             => 3,
            ],
        ];

        foreach ($items as $item) {
            Page::updateOrCreate(
                ['slug' => $item['slug'], 'parent_id' => $parent->id],
                [
                    'name'             => $item['name'],
                    'home_description' => $item['home_description'],
                    'description'      => $item['home_description'],
                    'status'           => 'Active',
                    'navbar'           => 'Not Active',
                    'footer'           => 'Not Active',
                    'sort'             => $item['sort'],
                    'parent_id'        => $parent->id,
                ]
            );
        }

        $this->command->info('Technology pages seeded successfully (' . count($items) . ' items).');
    }
}
