<?php

namespace App\Actions\ContactUs\Services;

use App\Helper\ImageHelper;
use Illuminate\Support\Arr;
use App\Models\ContactUsService;

class StoreContactUsServiceAction
{
    use ImageHelper;

    public function handle(array $data)
    {
        $path = 'app/public/contacts/';
        $contact = ContactUsService::create(array_merge(Arr::except($data, ['image'])));

        $this->StoreImage($data, $contact, 'image');
        return $contact;

    }
}
