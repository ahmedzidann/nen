<?php
namespace App\Actions\Technology;
use App\Helper\ImageHelper;
use App\Models\Technology;
use App\Models\Testing;
use App\Models\TestingFile;
use App\Models\TestingReference;
use Illuminate\Support\Facades\DB;

class UpdateTechnologyAction
{
    use ImageHelper;
    public function handle(Technology $Testing,$data)
    {



        DB::transaction(function () use($data,$Testing){
            try {
                $this->UpdateImage($data,$Testing,'Technology');
                $Testing->update($data);
                if(isset($data['file_id']))
                {
                    // $Testing->files()->delete();

                    foreach($data['file_id'][array_key_first($data['file_id'])] as $key=>$file){
                        if($file!=null){

                            // $fileName = time(). $key. '_' . $file->getClientOriginalName();
                            // $filePath = $file->storeAs('Testing', $fileName);
                            $title[array_key_first($data['file_id'])]= $data['file_title'][array_key_first($data['file_id'])][$key];
                            // dd($title);
                            $e = TestingFile::find($file);

                            $e->update([

                                "title"=>$title,
                                // "file"=>$fileName,
                            ]);
                        }

                    }
                }

                if(isset($data['link_id']))
                {
                    foreach($data['link_id'][array_key_first($data['link_id'])] as $key=>$link){
                        if($link!=null){

                            $title[array_key_first($data['link_id'])]= $data['links_title'][array_key_first($data['link_id'])][$key];
                            $l =TestingReference::find($link);
                            $l->update([
                                // "Testing_id"=>$Testing->id,
                                "title"=>$title,
                                // "reference"=>$link,
                            ]);
                        }
                    }
                }

                if(isset($data['video'])) {
                    $video = $data['video'];
                    $path = $video->store('Technology/videos', 'public'); // Store video in the 'videos' directory within the 'public' disk
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
