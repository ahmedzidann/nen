<?php
namespace App\Actions\Summary;

use App\Helper\ImageHelper;
use App\Models\Summary;
use App\Models\SummaryDetails;
use App\Models\SummaryReference;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UpdateSummaryAction
{
    use ImageHelper;
    public function handle(Summary $summary, $data)
    {
        if (array_key_exists('link_id', $data)) {
            $data['link_id'][array_key_first($data['link_id'])] = array_unique($data['link_id'][array_key_first($data['link_id'])]);

        }
        DB::transaction(function () use ($data, $summary) {
            try {
                $this->UpdateImage($data, $summary, 'Summary');
                $summary->update(Arr::except($data, ['image']));
                if (isset($data['file_id'])) {
                    foreach ($data['file_id'][array_key_first($data['file_id'])] as $key => $file) {
                        if ($file != null) {
                            $title = $data['file_title'][array_key_first($data['file_title'])][$key];
                            $e = SummaryDetails::where('id', $file)->update([
                                "title->" . $data['submit2'] => $title,
                            ]);
                        }
                    }
                }
                if (isset($data['file'])) {
                    foreach ($data['file'] as $key => $file) {
                        $fileName = time() . $key . '_' . $file->getClientOriginalName();
                        $path = $file->storeAs('Summary', $fileName);
                        SummaryDetails::create([
                            'summary_id' => $summary->id,
                            'title' => $data['file_title'][array_key_first($data['file_title'])][$key],
                            'file' => $path,
                        ]);

                    }
                }
                if (isset($data['link_id'])) {
                    foreach ($data['links'] as $key => $link) {
                        if (array_key_exists($key, $data['link_id'][array_key_first($data['link_id'])])) {
                            SummaryReference::where('id', $data['link_id'][array_key_first($data['link_id'])][$key])->update([
                                // "summary_id"=>$summary->id,
                                "title->" . $data['submit2'] => $data['links_title'][array_key_first($data['links_title'])][$key],
                                "reference" => $data['links'][$key],
                            ]);
                        } else {
                            SummaryReference::create([
                                "summary_id" => $summary->id,
                                "title" => $data['links_title'][array_key_first($data['links_title'])][$key],
                                "reference" => $data['links'][$key],
                            ]);
                        }

                    }
                } elseif (!isset($data['link_id']) && isset($data['links'])) {
                    foreach ($data['links'] as $key => $link) {
                       if($link)
                        SummaryReference::create([
                            "summary_id" => $summary->id,
                            "title" => $data['links_title'][$key],
                            "reference" => $link,

                        ]);
                    }

                }

                // if (isset($data['video'])) {
                //     $video = $data['video'];
                //     $path = $video->store('videos', 'public'); // Store video in the 'videos' directory within the 'public' disk
                //     $summary->video = $path;
                // }
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
            DB::commit();
            return $summary;
        });
    }

}
