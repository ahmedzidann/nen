<?php
namespace App\Actions\Education;
use App\Helper\ImageHelper;
use App\Models\Education;
use App\Models\EducationFile;
use App\Models\EducationReference;
use Illuminate\Support\Facades\DB;

class StoreEducationAction
{
    use ImageHelper;
    public function handle(array $data)
    {

        DB::transaction(function () use($data){
            try {
                $Education = Education::create($data);
                if(isset($data['file']))
                {

                    // dd($data['file_title']);
                    foreach($data['file'] as $key=>$file){
                        if($file!=null){
                            $title[array_key_first($data['file_title'])]= $data['file_title']['en'][$key];
                            $fileName = time(). $key. '_' . $file->getClientOriginalName();
                            $filePath = $file->storeAs('public/education', $fileName);

                            EducationFile::create([
                                "education_id"=>$Education->id,
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
                        EducationReference::create([
                            "education_id"=>$Education->id,
                            "title"=>$title,
                            "reference"=>$link,
                        ]);
                    }
                }
                $this->StoreImage($data,$Education,'Education');

            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
            DB::commit();
            // dd('d');
            return $Education;
        });


    }
}



