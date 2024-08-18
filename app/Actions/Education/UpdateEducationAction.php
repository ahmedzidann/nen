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
    public function handle(Education $education, $data)
    {
        if (array_key_exists(0, $data['links_title']['en']) && is_null($data['links_title']['en'][0])) {
            unset($data['links_title']['en'][0]);
            $data['links_title']['en'] = array_values($data['links_title']['en']);
        }

        if (array_key_exists(0, $data['file_title']['en']) && is_null($data['file_title']['en'][0])) {
            unset($data['file_title']['en'][0]);
            $data['file_title']['en'] = array_values($data['file_title']['en']);
        }

        DB::transaction(function () use ($data, $education) {
            try {

                $education->update($data);
                $firstIterator = 0;
                if (count($data['file_title'][array_key_first($data['file_title'])]) > 0) {
                    foreach ($data['file_title'][array_key_first($data['file_title'])] as $key => $value) {
                        if (!array_key_exists($key, $data['file_id'][array_key_first($data['file_id'])])) {
                            EducationFile::create([
                                'education_id' => $education->id,
                                'file' => $data['file'][array_key_first($data['file']) + $firstIterator],
                                'title' => $data['file_title'][array_key_first($data['file_id'])][$key],
                            ]);
                            ++$firstIterator;
                        }
                    }

                }

                if (isset($data['file_id'])) {
                    // $education->files()->delete();
                    foreach ($data['file_id'][array_key_first($data['file_id'])] as $key => $file) {

                        if ($file != null) {

                            // $fileName = time(). $key. '_' . $file->getClientOriginalName();
                            // $filePath = $file->storeAs('education', $fileName);
                            $title[array_key_first($data['file_id'])] = $data['file_title'][array_key_first($data['file_id'])][$key];
                            // dd($title);
                            $e = EducationFile::find($file);

                            $e->update([
                                "title" => $title,
                                // "file"=>$fileName,
                            ]);
                        }

                    }
                }

                // $education->links()->delete();
                $secondIterator = 0;
                if (count($data['links_title'][array_key_first($data['links_title'])]) > 0) {
                    foreach ($data['links_title'][array_key_first($data['links_title'])] as $key => $value) {
                        if (!array_key_exists($key, $data['link_id'][array_key_first($data['link_id'])])) {
                            EducationReference::create([
                                'education_id' => $education->id,
                                'reference' => $data['links'][$key],
                                'title' => $data['links_title'][array_key_first($data['link_id'])][$key],
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
