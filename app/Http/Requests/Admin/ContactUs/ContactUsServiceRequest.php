<?php

namespace App\Http\Requests\Admin\ContactUs;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsServiceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->isMethod('post')) {
            return [
                'title.*' => 'required',
                'email' => 'required|email',
                'image' => 'required|image',
            ];
        } else {
            return [
                'title.*' => 'required',
                'email' => 'sometimes|email',
                'image' => 'sometimes|image',
            ];

        }

    }
}
