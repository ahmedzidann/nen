<?php
namespace App\Actions\Solution\Tabs;
use App\Helper\ImageHelper;
use App\Models\Education;
use App\Models\EducationFile;
use App\Models\EducationReference;
use App\Models\Solution;
use App\Models\SolutionTab;
use App\Models\SolutionTabFile;
use App\Models\SolutionTabReference;
use Illuminate\Support\Facades\DB;

class UpdateSolutionTabAction
{
    use ImageHelper;
    public function handle(SolutionTab $education,$data)
    {



        DB::transaction(function () use($data,$education){
            try {

                $education->update($data);
                if(isset($data['file_id']))
                {
                    // $education->files()->delete();
                    dd($data);
                    foreach($data['file_id'][array_key_first($data['file_id'])] as $key=>$file){
                        if($file!=null){

                            // $fileName = time(). $key. '_' . $file->getClientOriginalName();
                            // $filePath = $file->storeAs('education', $fileName);
                            $title[array_key_first($data['file_id'])]= $data['file_title'][array_key_first($data['file_id'])][$key];
                            // dd($title);
                            $e = SolutionTabFile::find($file);

                            $e->update([

                                "title"=>$title,
                                // "file"=>$fileName,
                            ]);
                        }

                    }
                }
                // $education->links()->delete();

                if(isset($data['link_id']))
                {
                    foreach($data['link_id'][array_key_first($data['link_id'])] as $key=>$link){
                        if($link!=null){

                            $title[array_key_first($data['link_id'])]= $data['links_title'][array_key_first($data['link_id'])][$key];
                            $l =SolutionTabReference::find($link);
                            $l->update([
                                // "education_id"=>$education->id,
                                "title"=>$title,
                                // "reference"=>$link,
                            ]);
                        }
                    }
                }
                $this->UpdateImage($data,$education,'solutionTabs');

            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
            DB::commit();

            return $education;
        });
    }
}
