<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SidebarResourceRequest extends FormRequest
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
        $rules = [
            'title.*' => 'required',
            'sub_title.*' => 'required',
            'main_category' => 'required|exists:pages,slug',
            'sub_category' => 'required|exists:pages,slug',
            'type.*' => 'required|in:1,2',
            'image.*' => 'required|image',
            'url.*' => 'required|url',
            'status' => 'nullable',
        ];
        if ($this->getMethod() == 'post') {
            return $rules;
        } else {
            return $rules + [
                'keys.*' => 'sometimes',
            ];

        }
    }
}
