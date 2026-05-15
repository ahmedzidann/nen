<?php
namespace App\Actions\Ngo;
use App\Helper\ImageHelper;
use App\Models\Ngo;
use Illuminate\Support\Facades\DB;

class UpdateNgoAction
{
    use ImageHelper;
    public function handle(Ngo $ngo, $data)
    {
        DB::transaction(function () use($data, $ngo){
            try {
                if(isset($data['image']))
                {
                    $image = $data['image'];
                    $fileName = time() . '_' . $image->getClientOriginalName();
                    $image->storeAs('public/ngo', $fileName);
                    $data['image']=$fileName;
                }
                $ngo->update($data);
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
            DB::commit();
            return $ngo;
        });
    }
}
