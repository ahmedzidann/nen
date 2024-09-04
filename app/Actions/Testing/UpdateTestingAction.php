<?php
namespace App\Actions\Testing;

use App\Helper\ImageHelper;
use App\Models\Testing;
use App\Models\TestingFile;
use App\Models\TestingReference;
use Illuminate\Support\Facades\DB;

class UpdateTestingAction
{
    use ImageHelper;
    public function handle(Testing $Testing, $data)
    {
        if (array_key_exists('link_id', $data)) {
            $data['link_id'][array_key_first($data['link_id'])] = array_unique($data['link_id'][array_key_first($data['link_id'])]);

        }
        DB::transaction(function () use ($data, $Testing) {
            try {
                $this->UpdateImage($data, $Testing, 'Testing');
                $Testing->update($data);   
                if (isset($data['file_id'])) {
                    foreach ($data['file_id'][array_key_first($data['file_id'])] as $key => $file) {
                        if ($file != null) {
                            $title = $data['file_title'][array_key_first($data['file_title'])][$key];
                            $e = TestingFile::where('id', $file)->update([
                                "title->" . $data['submit2'] => $title,
                            ]);
                        }

                    }
                }
                if (isset($data['file'])) {
                    foreach ($data['file'] as $key => $file) {
                        $fileName = time() . $key . '_' . $file->getClientOriginalName();
                        $path = $file->storeAs('Testing', $fileName);
                        TestingFile::create([
                            'testing_id' => $Testing->id,
                            'title' => $data['file_title'][array_key_first($data['file_title'])][$key],
                            'file' => $path,
                        ]);

                    }
                }
                if (isset($data['link_id'])) {
                    foreach ($data['links'] as $key => $link) {
                        if (array_key_exists($key, $data['link_id'][array_key_first($data['link_id'])])) {
                            TestingReference::where('id', $data['link_id'][array_key_first($data['link_id'])][$key])->update([
                                // "Testing_id"=>$Testing->id,
                                "title->" . $data['submit2'] => $data['links_title'][array_key_first($data['links_title'])][$key],
                                "reference" => $data['links'][$key],
                            ]);
                        } else {
                            TestingReference::create([
                                "testing_id" => $Testing->id,
                                "title" => $data['links_title'][array_key_first($data['links_title'])][$key],
                                "reference" => $data['links'][$key],
                            ]);
                        }

                    }
                } elseif (!isset($data['link_id']) && isset($data['links'])) {
                    foreach ($data['links'] as $key => $link) {
                        TestingReference::create([
                            "testing_id" => $Testing->id,
                            "title" => $data['links_title'][$key],
                            "reference" => $link,

                        ]);
                    }

                }

                if (isset($data['video'])) {
                    $video = $data['video'];
                    $path = $video->store('videos', 'public'); // Store video in the 'videos' directory within the 'public' disk
                    $Testing->video = $path;
                }
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
            DB::commit();
            return $Testing;
        });
    }
}
