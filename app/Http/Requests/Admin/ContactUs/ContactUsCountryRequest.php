<?php

namespace App\Http\Requests\Admin\ContactUs;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsCountryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->isMethod('post')) {
            return [
                'country.*' => 'required_without:name',
                'name.*' => 'required_without:country',
                'lat' => 'nullable',
                'lng' => 'nullable',
                'address.*' => 'required_without:name',
                'phone' => 'required|max:255',
                'image' => 'required|image',
                'from_at' => 'required_without:name|date_format:Y-m-d\TH:i',
                'to_at' => 'required_without:name|date_format:Y-m-d\TH:i',
            ];
        } else {
            return [
                'country.*' => 'required_without:name',
                'name.*' => 'required_without:country',
                'lat' => 'nullable',
                'lng' => 'nullable',
                'address.*' => 'required',
                'phone' => 'nullable|max:255',
                'image' => 'sometimes|image',
                'from_at' => 'nullable|date_format:Y-m-d\TH:i',
                'to_at' => 'nullable|date_format:Y-m-d\TH:i',
            ];

        }
    }
}
