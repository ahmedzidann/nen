<?php
namespace App\Helper;

class TranslationHelper
{
    public static function translate($key)
    {
        
        $local = app()->getLocale();
        app()->setLocale($local);
        $lang_array = include(base_path('lang/en/dashboard.php'));
        $processed_key = ucfirst(str_replace('_', ' ', TranslationHelper::remove_invalid_charcaters($key)));

        if (!array_key_exists($key, $lang_array)) {
            $lang_array[$key] = $processed_key;
            $str = "<?php return " . var_export($lang_array, true) . ";";
            file_put_contents(base_path('lang/en/dashboard.php'), $str);
            $result = $processed_key;
        } else {
            $result = __('dashboard.' . $key);
        }

        $lang_array = include(base_path('lang/ar/dashboard.php'));
        $processed_key = ucfirst(str_replace('_', ' ', TranslationHelper::remove_invalid_charcaters($key)));

        if (!array_key_exists($key, $lang_array)) {
            $lang_array[$key] = $processed_key;
            $str = "<?php return " . var_export($lang_array, true) . ";";
            file_put_contents(base_path('lang/ar/dashboard.php'), $str);
            $result = $processed_key;
        } else {
            $result = __('dashboard.' . $key);
        }

        $result = __('dashboard.' . $key);
        return $result;
    }

    public static function remove_invalid_charcaters($str)
    {
        return str_ireplace(['\'', '"', ',', ';', '<', '>', '?'], ' ', $str);
    }
    public static function translateWeb($key)
    {
        
        $local = app()->getLocale();
        app()->setLocale($local);
        $lang_array = include(base_path('lang/en/web.php'));
        $processed_key = ucfirst(str_replace('_', ' ', TranslationHelper::remove_invalid_charcaters($key)));

        if (!array_key_exists($key, $lang_array)) {
            $lang_array[$key] = $processed_key;
            $str = "<?php return " . var_export($lang_array, true) . ";";
            file_put_contents(base_path('lang/en/web.php'), $str);
            $result = $processed_key;
        } else {
            $result = __('web.' . $key);
        }

        $lang_array = include(base_path('lang/ar/web.php'));
        $processed_key = ucfirst(str_replace('_', ' ', TranslationHelper::remove_invalid_charcaters($key)));

        if (!array_key_exists($key, $lang_array)) {
            $lang_array[$key] = $processed_key;
            $str = "<?php return " . var_export($lang_array, true) . ";";
            file_put_contents(base_path('lang/ar/web.php'), $str);
            $result = $processed_key;
        } else {
            $result = __('web.' . $key);
        }

        $result = __('web.' . $key);
        return $result;
    }
}
