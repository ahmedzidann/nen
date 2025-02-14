<?php

namespace App\Actions\FeatureAdvantages;

use App\Helper\ImageHelper;
use App\Helper\FileUploadHelper;
use App\Models\FeatureAdvantages;
use Illuminate\Support\Facades\DB;
use App\Models\FeatureAdvantagesDetails;

class UpdateFeatureAdvantagesAction
{
    /**
     * Summary of unsetKeyFromArray
     * @param mixed $array
     * @param mixed $key
     * @return void
     */
    public static function unsetKeyFromArray(&$array, $key)
    {
        if (array_key_exists(0, $array[$key]) && is_null($array[$key][0])) {
            unset($array[$key][0]);
            $array[$key] = array_values($array[$key]);
        }
    }

    public function handle(FeatureAdvantages $row, $data)
    {
        $fileTitleKey = $data['title'] ?? null ? array_key_first($data['title']) : null;

        if (!is_null($fileTitleKey)) {
            self::unsetKeyFromArray($data['title'], $fileTitleKey);
        }
        DB::transaction(function () use ($data, $row) {
            try {
                $row->update($data);
                $firstIterator = 1;
                if (count($data['title'][array_key_first($data['title'])]) > 0 && count($data['image'] ?? []) > 0) {

                    foreach ($data['title'][array_key_first($data['title'])] as $key => $value) {
                        if (!array_key_exists($key, $data['file_id'][array_key_first($data['file_id'])])) {
                            $file = $data['image'][$key];
                            $instance = new FileUploadHelper();
                            $filePath = $instance->uploadFile($image, 'feature_advantages');
                            FeatureAdvantagesDetails::create([
                                'file_id' => $row->id,
                                'image' => $filePath,
                                'title' => $data['title'][array_key_first($data['title'])][$key],
                                'sub_title' => $data['sub_title'][array_key_first($data['sub_title'])][$key],
                            ]);
                            ++$firstIterator;
                        }
                    }
                }

                if (isset($data['file_id'])) {
                    foreach ($data['file_id'][array_key_first($data['file_id'])] as $key => $file) {
                        if ($file != null) {
                            $title[array_key_first($data['file_id'])] = $data['title'][array_key_first($data['file_id'])][$key];
                            $sub_title[array_key_first($data['file_id'])] = $data['sub_title'][array_key_first($data['file_id'])][$key];
                            $instance = new FileUploadHelper();
                            $e = FeatureAdvantagesDetails::find($file);
                            if (isset($data['image']) && $image = $data['image'][$key]) {
                                $image = $data['image'][$key];
                                $filePath = $instance->updateFile($image, $e->image, 'feature_advantages');
                            }

                            $e->update([
                                'image' => $filePath ?? $e->image,
                                "title" => $title,
                                "sub_title" => $sub_title,
                            ]);
                        }
                    }
                }
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
            DB::commit();
            return $row;
        });
    }
}
