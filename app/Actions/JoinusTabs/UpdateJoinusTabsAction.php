<?php
namespace App\Actions\JoinusTabs;

use App\Helper\ImageHelper;
use App\Models\JoinusTabs;

class UpdateJoinusTabsAction
{
    use ImageHelper;
    public function handle(JoinusTabs $JoinusTabs, $data)
    {
        if (array_key_exists('register_attributes', $data)) {
            foreach ($data['register_attributes'] as $key => $value) {
                if (array_key_exists('register_keys', $data) && array_key_exists($key, $data['register_keys'])) {
                    JoinusTabs::where('id', $data['register_keys'][$key])->update([
                        'description->' . $data['submit2'] => $value[$data['submit2']],
                    ]);
                } else {
                    if ($value[array_key_first($value)] != null) {
                        JoinusTabs::create([
                            'status' => $JoinusTabs->status,
                            'project_id' => request('project_id'),
                            'tabs_id' => $JoinusTabs->tabs_id,
                            'description' => $value,
                            'type' => 'register',
                        ]);

                    }

                }

                if ($key == 0) {
                    $this->StoreImage($data, $JoinusTabs, 'JoinusTabs');
                    $this->StoreImage2($data, $JoinusTabs, 'JoinusTerms');
                }
            }

        }

        if (array_key_exists('terms_attributes', $data)) {
            foreach ($data['terms_attributes'] as $key => $value) {
                if (array_key_exists('terms_keys', $data) && array_key_exists($key, $data['terms_keys'])) {
                    JoinusTabs::where('id', $data['terms_keys'][$key])->update([
                        'description->' . $data['submit2'] => $value[$data['submit2']],
                    ]);
                } else {
                    if ($value[array_key_first($value)] != null) {
                        JoinusTabs::create([
                            'status' => $JoinusTabs->status,
                            'project_id' => $JoinusTabs->project_id,
                            'tabs_id' => $JoinusTabs->tabs_id,
                            'description' => $value,
                            'type' => 'terms',
                        ]);
                    }
                }
            }

        }

    }
}
