<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class TestingPagesSeeder extends Seeder
{
    public function run(): void
    {
        $parent = Page::where('slug', 'testing')->first();

        if (!$parent) {
            $this->command->warn('Parent page with slug "testing" not found. Skipping.');
            return;
        }

        $parent->update([
            'home_description' => [
                'en' => 'The test proctor is authorized to end the test, hide test results, or block the candidate\'s account if the test taker fails to follow the instructions below.',
                'ar' => 'يحق للمراقب إنهاء الاختبار أو إخفاء النتائج أو حظر حساب المتقدم في حال عدم الالتزام بالتعليمات التالية.',
            ],
            'description' => [
                'en' => 'In case of technical problems or power cuts, the test will be resumed where it stopped while safely keeping the remaining time, and test takers are not allowed to leave the room unless they have waited for at least 30 minutes. Then the proctor will fill out the status report and then the test taker shall decide whether to resume the test or repeat.',
                'ar' => 'في حال وجود مشاكل تقنية أو انقطاع في الكهرباء، سيُستأنف الاختبار من حيث توقف مع الحفاظ على الوقت المتبقي، ولا يُسمح لمتقدمي الاختبار بمغادرة القاعة إلا بعد انتظار 30 دقيقة على الأقل. بعدها يقوم المراقب بملء تقرير الحالة ويقرر المتقدم إما استئناف الاختبار أو إعادته.',
            ],
        ]);

        $children = Page::where('parent_id', $parent->id)->get();

        if ($children->isEmpty()) {
            $this->command->warn('No child pages found under "testing". Nothing to update.');
            return;
        }

        $descriptions = [
            'en' => [
                'Cooperating with the proctor during the inspection process.',
                'Bring the original Valid National ID or Passport.',
                'Sitting properly in front of the camera, avoid wearing stuff that may hide your face.',
                'Using banned stuff such as test preparation material or mobile phones is prohibited.',
                'Eating, drinking, or side-talking during the test, or leaving the room before ending.',
                'All attempts of copying questions or answers are strictly prohibited.',
            ],
            'ar' => [
                'التعاون مع المراقب أثناء عملية التفتيش.',
                'إحضار بطاقة الهوية الوطنية الأصلية السارية أو جواز السفر.',
                'الجلوس بشكل صحيح أمام الكاميرا وعدم ارتداء ما يخفي الوجه.',
                'يُحظر استخدام المواد المحظورة كمواد التحضير للاختبار والهواتف المحمولة.',
                'الأكل أو الشرب أو التحدث الجانبي أثناء الاختبار أو مغادرة القاعة قبل انتهائه.',
                'جميع محاولات نسخ الأسئلة أو الإجابات ممنوعة منعاً باتاً.',
            ],
        ];

        foreach ($children as $index => $child) {
            $en = $descriptions['en'][$index] ?? $child->getTranslation('description', 'en') ?? '';
            $ar = $descriptions['ar'][$index] ?? $child->getTranslation('description', 'ar') ?? '';

            $child->update([
                'home_description' => ['en' => $en, 'ar' => $ar],
            ]);
        }

        $this->command->info('Testing child pages home_description updated (' . $children->count() . ' items).');
    }
}
