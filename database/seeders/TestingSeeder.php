<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\Tabs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TestingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
       $pages = Page::where('parent_id',5)->get();
    //    $ssTesting=[];
    //    foreach($pages as $key => $page){
    //     for($i=0; $i<4; $i++)
    //     {
    //         $ssTesting[]=[
    //             'name'=>\json_encode(['en'=>$nameEn = $page->name.'sub'.$key+$i , 'ar'=>'']) ,
    //             'slug'=>Str::slug($nameEn),
    //             'parent_id'=>$page->id,
    //             'status'=>'Active',
    //             'navbar'=>'Active',
    //             'sort'=>53,
    //         ];
    //     }
    //    }

       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'About' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>33,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];

       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Description' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>33,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Objectives' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>33,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Our Value' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>33,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Our Experts' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>33,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];

       ///////////
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Technology (Microsoft)' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>34,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Artificial intelligence' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>34,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Features' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>34,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Integration' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>34,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];

       /////////////////
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Integration' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>34,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Environment' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>34,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Security' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>34,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Quality' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>34,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Monitoring' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>34,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Violations' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>34,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
       ////////
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Services' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>35,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Consulting' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>35,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Test Conversion' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>35,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Customization' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>35,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
       /////////////
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = '	Global Network' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>36,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Test Centers' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>35,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Online Proctoring' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>35,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Virtual Proctoring' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>35,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
      //////////////////////////
      $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Virtual Proctoring' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>36,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Remote Support' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>36,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Assistive Tools' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>36,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = '	Payment Gateway' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>36,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Payment Vouchers' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>36,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Certifications' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>36,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];
       $ssTesting[]=[
        'name'=>\json_encode(['en'=>$nameEn = 'Scoring & Results ' , 'ar'=>'']) ,
        'slug'=>Str::slug($nameEn),
        'parent_id'=>36,
        'status'=>'Active',
        'navbar'=>'Active',
        'sort'=>53,
       ];


        Page::insert($ssTesting);
    }
}
