<?php

namespace App\Actions\FeatureAdvantages;

use App\Helper\ImageHelper;
use App\Models\Education;
use App\Models\EducationFile;
use App\Models\EducationReference;
use App\Models\FeatureAdvantages;
use App\Models\FeatureAdvantagesDetails;
use Illuminate\Support\Facades\DB;

class StoreFeatureAdvantagesAction
{
    use ImageHelper;
    public function handle(array $data)
    {
        DB::transaction(function () use ($data) {
            try {
                $row = FeatureAdvantages::create($data);
                if (isset($data['image'])) {
                    foreach ($data['image'] as $key => $file) {
                        if ($file != null) {
                            $title[array_key_first($data['title'])] = $data['title']['en'][$key];
                            $sub_title[array_key_first($data['sub_title'])] = $data['sub_title']['en'][$key];
                            $fileName = time() . $key . '_' . $file->getClientOriginalName();
                            $filePath = $file->storeAs('feature_advantages', $fileName);

                            FeatureAdvantagesDetails::create([
                                "feature_advantage_id" => $row->id,
                                "title" => $title,
                                "sub_title" => $sub_title,
                                "image" => $filePath,
                            ]);
                        }
                    }
                }
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
            DB::commit();
            return $row;
        });
    }
}
