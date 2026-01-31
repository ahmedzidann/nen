<?php
namespace App\Actions\Testing;
use App\Helper\ImageHelper;
use App\Models\Testing;
use App\Models\TestingFile;
use App\Models\TestingReference;
use Illuminate\Support\Facades\DB;

class StoreTestingAction
{
    use ImageHelper;
    public function handle(array $data)
    {

        DB::transaction(function () use($data){
            try {
                $Testing = Testing::create($data);
                 $this->StoreImage($data,$Testing,'Testing');
                // if(isset($data['file']))
                // {

                //     // dd($data['file_title']);
                //     foreach($data['file'] as $key=>$file){
                //         if($file!=null){
                //             $title[array_key_first($data['file_title'])]= $data['file_title']['en'][$key];
                //             $fileName = time(). $key. '_' . $file->getClientOriginalName();
                //             $filePath = $file->storeAs('public/Testing', $fileName);

                //             TestingFile::create([
                //                 "testing_id"=>$Testing->id,
                //                 "title"=> $title,
                //                 "file"=>$fileName,
                //             ]);
                //         }

                //     }
                // }
                // dd($data);

                // foreach($data['links'] as $key=>$link){
                //     if($link!=null){
                //         $title[array_key_first($data['links_title'])]= $data['links_title']['en'][$key];
                //         TestingReference::create([
                //             "testing_id"=>$Testing->id,
                //             "title"=>$title,
                //             "reference"=>$link,
                //         ]);
                //     }
                // }
               

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
            return $Testing;
        });


    }
}



