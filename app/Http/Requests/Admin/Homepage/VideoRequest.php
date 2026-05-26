<?php

namespace App\Http\Requests\Admin\Homepage;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class VideoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'youtube_url'  => ['required', 'string'],
            'title.*'      => ['nullable', 'string', 'max:255'],
            'description.*'=> ['nullable', 'string'],
            'button_text.*'=> ['nullable', 'string', 'max:255'],
            'button_url'   => ['nullable', 'url'],
            'is_active'    => ['nullable', 'boolean'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if ($this->expectsJson()) {
            $errors = (new ValidationException($validator))->errors();
            throw new HttpResponseException(
                response()->json(['status' => 400, 'errors' => $errors])
            );
        }
        parent::failedValidation($validator);
    }
}
