<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
        DB::table('pages')->delete();
        $category = [
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Home' , 'ar'=>'الصفحة الرئيسية']) ,
            'slug'=>Str::slug($nameEn),
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>1,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'About' , 'ar'=>'عن']) ,
            'slug'=>Str::slug($nameEn),
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>2,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Projects' , 'ar'=>'المشاريع']) ,
            'slug'=>Str::slug($nameEn),
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>3,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Education' , 'ar'=>'Education']) ,
            'slug'=>Str::slug($nameEn),
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>4,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Testing' , 'ar'=>'اختبارات']) ,
            'slug'=>Str::slug($nameEn),
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>5,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Solutions' , 'ar'=>'حلول']) ,
            'slug'=>Str::slug($nameEn),
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>6,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Technology' , 'ar'=>'تكنولوجيا']) ,
            'slug'=>Str::slug($nameEn),
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>7,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Doc Validation' , 'ar'=>'التحقق من صحة الوثيقة']) ,
            'slug'=>Str::slug($nameEn),
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>8,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Join Us' , 'ar'=>'انضم إلينا']) ,
            'slug'=>Str::slug($nameEn),
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>9,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Find Us' , 'ar'=>'ابحث عنا']) ,
            'slug'=>Str::slug($nameEn),
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>10,
        ],
        ];
        Page::insert($category);
        // end category
        // start subcategory
        $subcategory = [
        // start about
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Identity' , 'ar'=>'هوية']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>2,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>1,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Investors' , 'ar'=>'المستثمرين']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>2,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>2,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Achievements' , 'ar'=>'الإنجازات']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>2,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>3,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Awards' , 'ar'=>'الجوائز']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>2,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>4,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Certificates' , 'ar'=>'الشهادات']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>2,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>5,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Partners' , 'ar'=>'الشركاء']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>2,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>6,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Clients' , 'ar'=>'العملاء']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>2,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>8,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Our Team' , 'ar'=>'فريقنا']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>2,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>9,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Careers' , 'ar'=>'وظائف']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>2,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>10,
        ],
        // end about
        // start projects
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Education' , 'ar'=>'تعليم']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>3,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>11,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Recruitment' , 'ar'=>'توظيف']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>3,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>12,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Government' , 'ar'=>'حكومة']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>3,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>13,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Entrepreneurship' , 'ar'=>'ريادة الأعمال']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>3,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>14,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Subsidized Programs' , 'ar'=>'البرامج المدعومة']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>3,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>15,
        ],
        // end projects
        // start Education
        [
            'name'=>\json_encode(['en'=>$nameEn = 'International Certificates' , 'ar'=>'الشهادات الدولية']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>4,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>16,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'International Exams' , 'ar'=>'الامتحانات الدولية']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>4,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>17,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Postgraduate' , 'ar'=>'دراسات عليا']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>4,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>18,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Study Abroad' , 'ar'=>'الدراسة في الخارج']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>4,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>19,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Tqs' , 'ar'=>'تيك اس']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>4,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>20,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Alumni' , 'ar'=>'الخريجون']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>4,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>21,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Tourism' , 'ar'=>'السياحة']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>4,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>22,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Virtual Academy' , 'ar'=>'الأكاديمية الافتراضية']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>4,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>23,
        ],
        // end Education
        // start Testing
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Why Choose Us?' , 'ar'=>'لماذا أخترتنا؟']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>5,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>24,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Examination Platform' , 'ar'=>'منصة الامتحانات']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>5,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>25,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Security & Quality' , 'ar'=>'الأمن والجودة']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>5,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>26,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Test Development' , 'ar'=>'تطوير الاختبار']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>5,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>27,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Test Delivery' , 'ar'=>'تسليم الاختبار']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>5,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>28,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Test Taker' , 'ar'=>'متقدم لاختبار']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>5,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>29,
        ],
        // end Testing
        // start Solutions
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Education' , 'ar'=>'تعليم']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>6,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>30,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Business' , 'ar'=>'عمل']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>6,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>31,
        ],
        // end Solutions
        // start Technology
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Microsoft Technology' , 'ar'=>'تكنولوجيا مايكروسوفت']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>7,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>32,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Cloud Computing' , 'ar'=>'حوسبة سحابية']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>7,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>33,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Cyber Security' , 'ar'=>'الأمن الإلكتروني']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>7,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>34,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Smart Systems' , 'ar'=>'الأنظمة الذكية']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>7,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>35,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Software Development' , 'ar'=>'تطوير البرمجيات']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>7,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>36,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Digital Marketing' , 'ar'=>'التسويق الرقمي']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>7,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>37,
        ],
        // end Technology
        // start DocValidation
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Our Network' , 'ar'=>'شبكتنا']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>8,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>38,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Our Services' , 'ar'=>'خدماتنا']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>8,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>39,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Distinguee Features' , 'ar'=>'الميزات المميزة']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>8,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>40,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'How Do We Work?' , 'ar'=>'كيف نعمل؟']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>8,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>41,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Why Had To Trust?' , 'ar'=>'لماذا كان يجب الثقة؟']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>8,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>42,
        ],
        // end DocValidation
        // start Join Us
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Academic' , 'ar'=>'أكاديمي']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>9,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>43,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Professional' , 'ar'=>'احترافي']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>9,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>44,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Centers' , 'ar'=>'المراكز']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>9,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>45,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Agents' , 'ar'=>'عملاء']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>9,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>46,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'International Cards' , 'ar'=>'البطاقات الدولية']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>9,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>47,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'ELITE Membership' , 'ar'=>'عضوية النخبة']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>9,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>48,
        ],
        // end Join Us
        // start Find Us
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Certified Trainers' , 'ar'=>'المدربين المعتمدين']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>10,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>49,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Training Centers' , 'ar'=>'مراكز التدريب']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>10,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>50,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Testing Centers' , 'ar'=>'مراكز الاختبار']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>10,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>51,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'Recruitment Centers' , 'ar'=>'مراكز التوظيف']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>10,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>52,
        ],
        // end Find Us
        ];
        // end subcategory
        Page::insert($subcategory);
        
        // start subsubcategory
        $subsubcategory = [
        [
            'name'=>\json_encode(['en'=>$nameEn = 'strategic' , 'ar'=>'استراتيجي']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>16,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>52,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'technology' , 'ar'=>'تكنولوجيا']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>16,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>52,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'education' , 'ar'=>'تعليم']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>16,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>52,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'testing' , 'ar'=>'اختبارات']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>16,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>52,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'business' , 'ar'=>'عمل']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>16,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>52,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'technology' , 'ar'=>'تكنولوجيا']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>17,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>52,
        ],
        [
            'name'=>\json_encode(['en'=>$nameEn = 'education' , 'ar'=>'تعليم']) ,
            'slug'=>Str::slug($nameEn),
            'parent_id'=>17,
            'status'=>'Active',
            'navbar'=>'Active',
            'sort'=>52,
        ],
        ];
        Page::insert($subsubcategory);
        // end subsubcategory
        
    }
}