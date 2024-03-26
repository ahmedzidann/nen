<?php

namespace App\Helper;
use App\Models\Setting;

class SettingHelper
{
    public static function  settings($key,$value=null)
    {
        
        $s = Setting::where('key', $key)->first();
        if($s) {
            return $s->value;
        }
        Setting::create([
            'key'=>$key,
            'value'=>$value,
        ]);
        return ($value);
    }
}
