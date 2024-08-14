<?php
namespace App\Actions\DocValidation;
use App\Helper\ImageHelper;
use App\Models\DocValidation;
use App\Models\DocValidationDetails;
use App\Models\Testing;
use App\Models\TestingFile;
use App\Models\TestingReference;
use Illuminate\Support\Facades\DB;

class StoreDocValidationAction
{
    use ImageHelper;
    public function handle(array $data)
    {

        DB::transaction(function () use($data){
            try {
                $docValidation = DocValidation::create($data);

                $this->StoreImage($data,$docValidation,'DocValidation');


                if(isset($data['details_title']))
                {

                    for ($i=0;$i<count($data['details_title']['en']);$i++) {

                        $title[array_key_first($data['details_title'])]= $data['details_title']['en'][$i];


                        DocValidationDetails::create([
                            "doc_validation_id"=>$docValidation->id,
                            "title"=> $title,
                        ]);
                    }



                }


            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
            DB::commit();
            // dd('d');
            return $docValidation;
        });


    }
}



