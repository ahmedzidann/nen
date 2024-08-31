<?php

namespace App\Actions\ContactUs\Services;

use App\Helper\ImageHelper;
use Illuminate\Support\Arr;
use App\Models\ContactUsService;

class UpdateContactUsServiceAction
{
    use ImageHelper;
    public function handle(ContactUsService  $item,array $data)
    {
        $item->update((Arr::except($data, 'image')));
        $this->UpdateImage($data,$item,'image');
        return $item;
    }
}
