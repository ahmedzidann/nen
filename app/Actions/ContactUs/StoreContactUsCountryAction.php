<?php

namespace App\Actions\ContactUs;

use App\Helper\ImageHelper;
use Illuminate\Support\Arr;
use App\Models\ContactUsCountry;

class StoreContactUsCountryAction
{
    use ImageHelper;

    public function handle(array $data)
    {
        $path = 'app/public/contacts/';
        $contact = ContactUsCountry::create(array_merge(Arr::except($data, ['image'])));

        $this->StoreImage($data, $contact, 'image');
        return $contact;

    }
}
