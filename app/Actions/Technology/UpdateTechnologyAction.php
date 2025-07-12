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
    public function handle(Technology $technology,$data)
    {



        DB::transaction(function () use($data , $technology){
            try {
              
               
                if(isset($data['image']))
                {
                    $image = $data['image'];
                    $fileName = time() . '_' . $image->getClientOriginalName();
                    $image->storeAs('public/technology', $fileName);
                   $data['image']=$fileName;  
                }
                 
                $technology->update($data);

               
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
            DB::commit();
            return $technology;
        });
    }
}
