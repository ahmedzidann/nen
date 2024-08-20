<?php
namespace App\Actions\Education;

use App\Helper\ImageHelper;
use App\Models\Education;
use App\Models\EducationFile;
use App\Models\EducationReference;
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
        }

        DB::transaction(function () use ($data, $education) {
            try {

                $education->update($data);
                $firstIterator = 1;
                if (count($data['file_title'][array_key_first($data['file_title'])]) > 0 && count($data['file'] ?? []) > 0) {

                    foreach ($data['file_title'][array_key_first($data['file_title'])] as $key => $value) {
                        if (!array_key_exists($key, $data['file_id'][array_key_first($data['file_id'])])) {
                            EducationFile::create([
                                'education_id' => $education->id,
                                'file' => $data['file'][$firstIterator],
                                'title' => $data['file_title'][array_key_first($data['file_title'])][$key],
                            ]);
                            ++$firstIterator;
                        }
                    }

                }

                if (isset($data['file_id'])) {

                    foreach ($data['file_id'][array_key_first($data['file_id'])] as $key => $file) {

                        if ($file != null) {

                            $title[array_key_first($data['file_id'])] = $data['file_title'][array_key_first($data['file_id'])][$key];
                            $e = EducationFile::find($file);

                            $e->update([
                                "title" => $title,
                            ]);
                        }
                    }
                }

                if (count($data['links_title'][array_key_first($data['links_title'])]) > 0) {

                    foreach ($data['links_title'][array_key_first($data['links_title'])] as $key => $value) {
                        if (!array_key_exists($key, $data['link_id'][array_key_first($data['link_id'])])) {
                            EducationReference::create([
                                'education_id' => $education->id,
                                'reference' => $data['links'][$key],
                                'title' => $data['links_title'][array_key_first($data['links_title'])][$key],
                            ]);
                        }
                    }

                }

                if (isset($data['link_id'])) {

                    foreach ($data['link_id'][array_key_first($data['link_id'])] as $key => $link) {
                        if ($link != null) {
                            $title[array_key_first($data['link_id'])] = $data['links_title'][array_key_first($data['link_id'])][$key];
                            $l = EducationReference::find($link);
                            $l->update([
                                // "education_id"=>$education->id,
                                "title" => $title,
                                // "reference"=>$link,
                            ]);
                        }
                    }
                }

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
