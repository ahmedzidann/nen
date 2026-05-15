<?php
namespace App\Actions\Ngo;
use App\Helper\ImageHelper;
use App\Models\Ngo;
use Illuminate\Support\Facades\DB;

class StoreNgoAction
{
    use ImageHelper;
    public function handle(array $data)
    {
        DB::transaction(function () use($data){
            try {
                if(isset($data['image']))
                {
                    $image = $data['image'];
                    $fileName = time() . '_' . $image->getClientOriginalName();
                    $image->storeAs('public/ngo', $fileName);
                    $data['image']=$fileName;
                }
                $ngo = Ngo::create($data);
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
            DB::commit();
            return $ngo;
        });
    }
}
