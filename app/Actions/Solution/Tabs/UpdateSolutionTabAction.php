<?php
namespace App\Actions\Solution\Tabs;

use App\Helper\ImageHelper;
use App\Models\SolutionTab;
use App\Models\SolutionTabFile;
use App\Models\SolutionTabReference;
use Illuminate\Support\Facades\DB;

class UpdateSolutionTabAction
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
    public function handle(SolutionTab $solutionTab, $data)
    {
        $fileTitleKey = $data['file_title'] ?? null ? array_key_first($data['file_title']) : null;
        $linksTitleKey = $data['links_title'] ?? null ? array_key_first($data['links_title']) : null;

        if (!is_null($fileTitleKey)) {
            self::unsetKeyFromArray($data['file_title'], $fileTitleKey);
        }
        if (!is_null($linksTitleKey)) {
            self::unsetKeyFromArray($data['links_title'], $linksTitleKey);
        }
        DB::transaction(function () use ($data, $solutionTab) {
            try {

                $solutionTab->update($data);
                $firstIterator = 1;
                if (count($data['file_title'][array_key_first($data['file_title'])]) > 0 && count($data['file'] ?? []) > 0) {

                    foreach ($data['file_title'][array_key_first($data['file_title'])] as $key => $value) {
                        if (!array_key_exists($key, $data['file_id'][array_key_first($data['file_id'])])) {
                            SolutionTabFile::create([
                                'tab_id' => $solutionTab->id,
                                'file' => $data['file'][$firstIterator],
                                'title' => $data['file_title'][array_key_first($data['file_title'])][$key],
                            ]);
                            ++$firstIterator;
                        }
                    }

                }

                if (isset($data['file_id'])) {
                    // $solutionTab->files()->delete();
                    foreach ($data['file_id'][array_key_first($data['file_id'])] as $key => $file) {
                        if ($file != null) {

                            // $fileName = time(). $key. '_' . $file->getClientOriginalName();
                            // $filePath = $file->storeAs('education', $fileName);
                            $title[array_key_first($data['file_id'])] = $data['file_title'][array_key_first($data['file_id'])][$key];
                            // dd($title);
                            $e = SolutionTabFile::find($file);

                            $e->update([

                                "title" => $title,
                                // "file"=>$fileName,
                            ]);
                        }

                    }
                }

                // $solutionTab->links()->delete();
                if (count($data['links_title'][array_key_first($data['links_title'])]) > 0) {

                    foreach ($data['links_title'][array_key_first($data['links_title'])] as $key => $value) {
                        if (!array_key_exists($key, $data['link_id'][array_key_first($data['link_id'])])) {
                            SolutionTabReference::create([
                                'tab_id' => $solutionTab->id,
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
                            $l = SolutionTabReference::find($link);
                            $l->update([
                                // "education_id"=>$solutionTab->id,
                                "title" => $title,
                                // "reference"=>$link,
                            ]);
                        }
                    }
                }
                $this->UpdateImage($data, $solutionTab, 'solutionTabs');

            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
            DB::commit();

            return $solutionTab;
        });
    }
}
