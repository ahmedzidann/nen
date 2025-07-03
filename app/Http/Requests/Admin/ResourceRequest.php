<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ResourceRequest extends FormRequest
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
            'main_category' => 'required|exists:pages,slug',
            'sub_category' => 'required|exists:pages,slug',
            'type.*' => 'required|in:image,file,url,comp,word',
            'resource.*' => 'required',
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
