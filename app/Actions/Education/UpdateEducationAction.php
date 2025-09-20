<?php

namespace App\Actions\Education;

use App\Helper\ImageHelper;
use App\Models\Education;
use App\Models\EducationFile;
use App\Models\EducationReference;
use App\Models\EducationCountry;
use Illuminate\Support\Facades\DB;

class UpdateEducationAction
{
    use ImageHelper;

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

    public function handle(Education $education, $data)
    {
        $fileTitleKey = $data['file_title'] ?? null ? array_key_first($data['file_title']) : null;
        $linksTitleKey = $data['links_title'] ?? null ? array_key_first($data['links_title']) : null;

        if (!is_null($fileTitleKey)) {
            self::unsetKeyFromArray($data['file_title'], $fileTitleKey);
        }
        if (!is_null($linksTitleKey)) {
            self::unsetKeyFromArray($data['links_title'], $linksTitleKey);
            unset($data['links'][0]);
            $data['links'] = array_values($data['links']);
            // self::unsetKeyFromArray($data['links'], $linksTitleKey);
        }

        DB::transaction(function () use ($data, $education) {
            try {

                $education->update($data);
                $lang = $data['submit2'];
                if (isset($data['links_title'][$lang])) {
                    foreach ($data['links_title'][$lang] as $index => $linkTitle) {
                        $ref = EducationReference::find($data['link_id'][$lang][$index]);
                        if ($ref) {
                            $ref->reference = $data['links'][$index];
                            $ref->setTranslation('title', $lang, $linkTitle);
                            $ref->save();
                        }
                    }
                }


                if (isset($data['file'])) {

                    foreach ($data['file_title'][$lang] as $index => $linkTitle) {

                        $file = $data['file'][1];

                        $fileName = time() . $index . '_' . $file->getClientOriginalName();
                        $filePath = $file->storeAs('public/education', $fileName);
                        $ref = EducationFile::find($data['file_id'][0]);

                        if ($ref) {
                            $ref->file = $fileName;
                            $ref->setTranslation('title', $lang, $linkTitle);
                            $ref->save();
                        }
                    }
                }

                if (isset($data['country']) && !empty($data['country'])) {
                    EducationCountry::where('education_id', $education->id)->delete();
                    foreach ($data['country'] as $key => $link) {
                        if ($link != null) {
                            // $title[array_key_first($data['links_title'])]= $data['links_title']['en'][$key];
                            EducationCountry::create([
                                "education_id" => $education->id,
                                "country_id" => $link,
                                "url" => $data['url'][$key],
                            ]);
                        }
                    }
                }









                // if (isset($data['link_id'])) {

                //     foreach ($data['link_id'][array_key_first($data['link_id'])] as $key => $link) {
                //         if ($link != null) {
                //             $title[array_key_first($data['link_id'])] = $data['links_title'][array_key_first($data['link_id'])][$key];
                //             $l = EducationReference::find($link);
                //             $l->update([
                //                 // "education_id"=>$education->id,
                //                 "title" => $title,
                //                 // "reference"=>$link,
                //             ]);
                //         }
                //     }
                // }

                $this->UpdateImage($data, $education, 'Education');
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
            DB::commit();
            return $education;
        });
    }
}
