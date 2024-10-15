<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductRequest extends FormRequest
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
                'name.*' => 'required|max:255',
                'vendor_id' => 'required|exists:find_us,id',
                'product_category_id' => 'required|exists:product_categories,id',
                'description.*' => 'required|max:1000',
                'price' => 'required|numeric',
                'main_image' => 'required|image',
                'images' => 'nullable|array',
                'images.*' => 'image',
                'titles.*' => 'nullable',
                'is_active' => 'nullable|boolean',
                'sort' => 'nullable|numeric',
            ];
        } else {
            return [
                'name.*' => 'sometimes|max:255',
                'vendor_id' => 'required|exists:find_us,id',
                'product_category_id' => 'required|exists:product_categories,id',
                'description.*' => 'required|max:1000',
                'price' => 'required|numeric',
                'main_image' => 'sometimes|image',
                'images' => 'nullable|array',
                'images.*' => 'image',
                'titles.*' => 'nullable',
                'is_active' => 'nullable|boolean',
                'sort' => 'nullable|numeric',
                'keys' => 'nullable|array',
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
            'errors' => $validator->errors(),
        ], 400));
    }
}
