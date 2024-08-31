<?php

namespace App\Actions\ContactUs;

use App\Helper\ImageHelper;
use Illuminate\Support\Arr;
use App\Models\ContactUsCountry;

class UpdateContactUsCountryAction
{
    use ImageHelper;
    public function handle(ContactUsCountry  $item,array $data)
    {
        $item->update((Arr::except($data, 'image')));
        $this->UpdateImage($data,$item,'image');
        return $item;
    }
}
