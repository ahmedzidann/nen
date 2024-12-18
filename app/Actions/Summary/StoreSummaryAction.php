<?php
namespace App\Actions\Summary;
use App\Helper\ImageHelper;
use App\Models\Summary;
use App\Models\SummaryDetails;
use App\Models\SummaryReference;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class StoreSummaryAction
{
    use ImageHelper;
    public function handle(array $data)
    {

        DB::transaction(function () use($data){
            try {
                $summary = Summary::create(Arr::except($data, ['image']));
                if(isset($data['file']))
                {

                    // dd($data['file_title']);
                    foreach($data['file'] as $key=>$file){
                        if($file!=null){
                            $title[array_key_first($data['file_title'])]= $data['file_title']['en'][$key];
                            $fileName = time(). $key. '_' . $file->getClientOriginalName();
                            $filePath = $file->storeAs('public/Summary', $fileName);

                            SummaryDetails::create([
                                "summary_id"=>$summary->id,
                                "title"=> $title,
                                "file"=>$fileName,
                            ]);
                        }

                    }
                }
                // dd($data);

                foreach($data['links'] as $key=>$link){
                    if($link!=null){
                        $title[array_key_first($data['links_title'])]= $data['links_title']['en'][$key];
                        SummaryReference::create([
                            "summary_id"=>$summary->id,
                            "title"=>$title,
                            "reference"=>$link,
                        ]);
                    }
                }
                $this->StoreImage($data,$summary,'Summary');

                // if(isset($data['video'])) {
                //     $video = $data['video'];
                //     $path = $video->store('Testing/videos', 'public'); // Store video in the 'videos' directory within the 'public' disk
                //     $Testing->video = $path;
                //     $Testing->save();
                // }

            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
            DB::commit();
            // dd('d');
            return $summary;
        });


    }
}



