<?php

namespace App\Http\Requests\Admin\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class MediaCategoryRequest extends FormRequest
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
        if ($this->getMethod() == 'POST') {
            return [
                'title.*' => 'required|max:255',
                'mini_desc.*' => 'required|max:600',
                'image' => 'required|image',
                'is_active' => 'required|in:0,1',
            ];
        } else {
            return [
                'title.*' => 'sometimes|max:255',
                'mini_desc.*' => 'sometimes|max:600',
                'image' => 'sometimes|image',
                'is_active' => 'sometimes|in:0,1',
            ];
        }
    }


    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 400,
            'errors' => $validator->errors()
        ], 400));
    }
}
