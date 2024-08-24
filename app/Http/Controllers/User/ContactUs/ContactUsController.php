<?php

namespace App\Http\Controllers\User\ContactUs;

use App\Http\Controllers\Controller;
use App\Models\ContactUsCountry;
use App\Models\ContactUsService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(Request $request): View
    {
        $countriesGrouped = ContactUsCountry::selectRaw('JSON_EXTRACT(country, "$.en") as country_name, MIN(id) as id')
            ->groupBy('country_name')
            ->get('id')->toArray();
        $countries = ContactUsCountry::whereIn('id', array_column($countriesGrouped, 'id'))->with('media')->get();
        $services = ContactUsService::with('media')->get();
        $contacts = ContactUsCountry::with('media')->when($request->country, function ($query) use ($request) {
            return $query->filterByLanguage(app()->getLocale(), $request->country);
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
