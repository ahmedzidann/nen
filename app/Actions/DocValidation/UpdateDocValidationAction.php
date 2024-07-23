<?php
namespace App\Actions\DocValidation;
use App\Helper\ImageHelper;
use App\Models\DocValidation;
use App\Models\DocValidationDetails;
use App\Models\Testing;
use App\Models\TestingFile;
use App\Models\TestingReference;
use Illuminate\Support\Facades\DB;

class UpdateDocValidationAction
{
    use ImageHelper;
    public function handle(DocValidation $docValidation,$data)
    {



        DB::transaction(function () use($data,$docValidation){
            try {
                $this->UpdateImage($data,$docValidation,'DocValidation');
                $doc_validation_id=$docValidation->id;
                $docValidation->update($data);

                $key=$data['submit2'];
                $exists_details_ides=[];



                if(isset($data['old_details_id'][$key])) {

                     foreach ($data['old_details_id'][$key] as $index=>$old_details_id) {


                     $docValidationDetails= DocValidationDetails::find($old_details_id);

                         $docValidationDetails->setTranslation('title',$key,$data['old_details_title'][$key][$index] );


                         $docValidationDetails->save();
                     }

                }

                if(isset($data['details_title'][$key])) {

                    foreach ($data['details_title'][$key] as $index=>$detail_title) {

                        $docValidationDetails=   DocValidationDetails::create([
                            'doc_validation_id'=>$doc_validation_id,
                            'title'=>$data['details_title'][$key][$index],
                        ]);

                        $docValidationDetails->setTranslation('title',$key,$data['details_title'][$key][$index] );
                        $docValidationDetails->save();

                    }

                }



                } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
            DB::commit();
            return $docValidation;
        });
    }
}
