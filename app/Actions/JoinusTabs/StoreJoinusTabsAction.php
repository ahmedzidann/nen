<?php
namespace App\Actions\JoinusTabs;

use App\Helper\ImageHelper;
use App\Models\JoinusTabs;

class StoreJoinusTabsAction
{
    use ImageHelper;

    public function handle(array $data)
    {
        if (array_key_exists('register_attributes', $data)) {
            foreach ($data['register_attributes'] as $key => $value) {
                $JoinusTabs = JoinusTabs::create([
                    'status' => $data['status'],
                    'project_id' => $data['project_id'],
                    'tabs_id' => $data['tabs_id'],
                    'description' => $value,
                    'type' => 'register',
                ]);

                if ($key == 0) {
                    $this->StoreImage($data, $JoinusTabs, 'JoinusTabs');
                    $this->StoreImage2($data, $JoinusTabs, 'JoinusTerms');
                }
            }

        }
        if (array_key_exists('terms_attributes', $data)) {
            foreach ($data['terms_attributes'] as $key => $value) {
                $JoinusTabs = JoinusTabs::create([
                    'status' => $data['status'],
                    'project_id' => $data['project_id'],
                    'tabs_id' => $data['tabs_id'],
                    'description' => $value,
                    'type' => 'terms',
                ]);
            }

        }

        return $JoinusTabs;
    }
}
