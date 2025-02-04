<?php

namespace App\Http\Requests\Admin\FeatureAdvantages;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class FeatureAdvantagesRequest extends FormRequest
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
    public function rules()
    {
        if ($this->isMethod('post')) {
            return [
                'title.*' => ['required', 'max:255', 'min:2'],
                'description.*' => ['required', 'min:2'],
                'image.*' => ['required', 'mimes:png,jpg,jpeg'],
                'sub_title.*' => ['required', 'max:255', 'min:2'],
            ];
        } elseif ($this->isMethod('put')) {
            return [
                'title.*' => ['required', 'max:255', 'min:2'],
                'description.*' => ['required', 'min:2'],
                'image.*' => ['required', 'mimes:png,jpg,jpeg'],
                'sub_title.*' => ['required', 'max:255', 'min:2'],
                'file_id.*' => ['nullable', 'max:255', 'min:2'],
            ];
        }
    }

    /**
     * Handle a failed validation attempt.
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     * @return void
     */
    protected function failedValidation(Validator $validator)
    {
        if ($this->expectsJson()) {
            $errors = (new ValidationException($validator))->errors();
            throw new HttpResponseException(
                response()->json([
                    'status' => 400,
                    'errors' => $errors,
                ])
            );
        }
        parent::failedValidation($validator);
    }
}
