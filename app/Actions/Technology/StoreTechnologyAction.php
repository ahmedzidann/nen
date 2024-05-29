<?php
namespace App\Actions\Technology;
use App\Helper\ImageHelper;
use App\Models\Technology;
use App\Models\Testing;
use App\Models\TestingFile;
use App\Models\TestingReference;
use Illuminate\Support\Facades\DB;

class StoreTechnologyAction
{
    use ImageHelper;
    public function handle(array $data)
    {

        DB::transaction(function () use($data){
            try {
                $Testing = Technology::create($data);
                if(isset($data['file']))
                {

                    // dd($data['file_title']);
                    foreach($data['file'] as $key=>$file){
                        if($file!=null){
                            $title[array_key_first($data['file_title'])]= $data['file_title']['en'][$key];
                            $fileName = time(). $key. '_' . $file->getClientOriginalName();
                            $filePath = $file->storeAs('public/Testing', $fileName);

                            TestingFile::create([
                                "testing_id"=>$Testing->id,
                                "title"=> $title,
                                "file"=>$fileName,
                            ]);
                        }

                    }
                }
                // dd($data);
                if(isset($data['links']))
                foreach($data['links'] as $key=>$link){
                    if($link!=null){
                        $title[array_key_first($data['links_title'])]= $data['links_title']['en'][$key];
                        TestingReference::create([
                            "testing_id"=>$Testing->id,
                            "title"=>$title,
                            "reference"=>$link,
                        ]);
                    }
                }
                $this->StoreImage($data,$Testing,'Technology');

                if(isset($data['video'])) {
                    $video = $data['video'];
                    $path = $video->store('Technology/videos', 'public'); // Store video in the 'videos' directory within the 'public' disk
                    $Testing->video = $path;
                    $Testing->save();
                }

            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
            DB::commit();
            // dd('d');
            return $Testing;
        });


    }
}



