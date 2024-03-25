<?php

namespace Database\Seeders;

use App\Models\TranslationKey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TranslationKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('translation_keys')->delete();
        $slider = [
            [
                'key'=>'en' ,
                'name'=>'english' ,
                'created_at'=>now() ,
            ],
            [
                'key'=>'ar' ,
                'name'=>'arabic' ,
                'created_at'=>now() ,
            ]
        ];
        TranslationKey::insert($slider);
    }
}



