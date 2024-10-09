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
        });

        $locations = (clone $contacts)->whereNotNull('lat')
            ->whereNotNull('lng')
            ->get()
            ->map(function ($contact) {
                return [
                    'latitude' => (float) $contact->lat,
                    'longitude' => (float) $contact->lng,
                    "color" => OfficeType::getColor($contact->type) ?? "#33C1FF",
                    'title' => $contact?->name ?? "",
                    'email' => $contact?->email ?? "",
                    'phone' => $contact?->phone ?? "",
                ];
            });

        return view('user.contact_us.index', [
            'countries' => $countries,
            'services' => $services,
            'contacts' => $contacts->get()->groupBy('type'),
            'locations' => $locations->toArray(),
        ]);
    }

}
