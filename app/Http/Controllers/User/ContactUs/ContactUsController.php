<?php

namespace App\Http\Controllers\User\ContactUs;

use App\Enums\OfficeType;
use App\Http\Controllers\Controller;
use App\Models\ContactUsCountry;
use App\Models\ContactUsService;
use App\Models\Country;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(Request $request): View
    {
        $countries = Country::has('offices')->get();
        $services = ContactUsService::with('media')->get();
        $contacts = ContactUsCountry::with(['media', 'country'])->when($request->country, function ($query) use ($request) {
            return $query->where('country_id', $request->country);
        })->when($request->contact_offices, function ($query) use ($request) {
            return $query->where('type', OfficeType::getValue($request->contact_offices));
        })->get();

        $locations = $contacts->map(function ($contact) {
            if ($contact->lat && $contact->lng) {
                return [
                    'lat' => $contact->lat,
                    'lng' => $contact->lng,
                ];
            }
        });

        return view('user.contact_us.index', [
            'countries' => $countries,
            'services' => $services,
            'contacts' => $contacts->groupBy('type'),
            'locations' => $locations->toArray(),
        ]);
    }

}
