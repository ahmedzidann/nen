<?php
namespace App\Actions\Solution\Tabs;
use App\Helper\ImageHelper;
use App\Models\AboutTabs;
use App\Models\SolutionTab;
use App\Models\SolutionTabFile;
use App\Models\SolutionTabReference;
use Illuminate\Support\Facades\DB;

class StoreSolutionTabAction
{
    use ImageHelper;
    public function handle(array $data)
    {
        // $tab = SolutionTab::create($data);


        DB::transaction(function () use($data){
            try {
                $tab = SolutionTab::create($data);
                $this->StoreImage($data,$tab,'solutionTabs');
                if(isset($data['file']))
                {

                    // dd($data['file_title']);
                    foreach($data['file'] as $key=>$file){
                        if($file!=null){
                            $title[array_key_first($data['file_title'])]= $data['file_title']['en'][$key];
                            $fileName = time(). $key. '_' . $file->getClientOriginalName();
                            $filePath = $file->storeAs('public/education', $fileName);

                            SolutionTabFile::create([
                                "tab_id"=>$tab->id,
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
                        SolutionTabReference::create([
                            "tab_id"=>$tab->id,
                            "title"=>$title,
                            "reference"=>$link,
                        ]);
                    }
                }


            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
            DB::commit();

            return $tab;
        });


    }
}



