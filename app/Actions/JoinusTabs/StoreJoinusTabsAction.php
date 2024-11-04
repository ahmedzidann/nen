<?php
namespace App\Actions\JoinusTabs;

use App\Helper\ImageHelper;
use App\Models\JoinusTabs;
use App\Models\Tabs;

class StoreJoinusTabsAction
{
    use ImageHelper;

    public function handle(array $data)
    {
        $tab = Tabs::where('slug', $data['tabs_id'])->first();

        if (array_key_exists('register_attributes', $data)) {
            foreach ($data['register_attributes'] as $key => $value) {
                $JoinusTabs = JoinusTabs::create([
                    'status' => $data['status'],
                    'project_id' => request('project_id'),
                    'tabs_id' => $tab->id,
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
                    'tabs_id' => $tab->id,
                    'description' => $value,
                    'type' => 'terms',
                ]);
            }

        }

        return $JoinusTabs;
    }
}
