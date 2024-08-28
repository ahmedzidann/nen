<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(ContactRequest $request)
    {
        Contact::create($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Message Sent Successfully',
        ]);

    }
}
