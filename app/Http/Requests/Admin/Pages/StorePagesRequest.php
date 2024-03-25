<?php

namespace App\Http\Requests\Admin\Pages;

use Illuminate\Foundation\Http\FormRequest;

class StorePagesRequest extends FormRequest
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
        return [
            'name.*' => ['required','max:255','min:2'],
            'description.*' => ['nullable','max:255','min:2'],
            'link' => ['nullable'],
            'sort' => ['nullable'],
            'navbar' => ['nullable'],
            'footer' => ['nullable'],
            'status' => ['nullable'],
            'parent_id' => ['nullable'],
        ];
    }
}
