<?php

namespace App\Http\Requests\Admin\Education;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class EducationRequest extends FormRequest
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
                'title.*' => ['required', 'max:255', 'min:2'],
                'mini_desc.*' => ['nullable', 'max:1000'],
                'description.*' => ['required', 'min:2'],
                'image' => ['nullable', 'mimes:png,jpg,jpeg'],
                'pages_id' => ['nullable'],
                'childe_pages_id' => ['nullable'],
                'status' => ['nullable'],
                "links" => ['nullable', 'array'],
                "links.*" => ['nullable', 'url'],
                'links_title.en.*' => ['nullable', 'string', 'required_with:links.*'],
                'links_title.ar.*' => ['nullable', 'string', 'required_with:links.*'],
                "file" => ['nullable', 'array'],
                "file.*" => ['nullable', 'file'],
                "file_title.en.*" => ['nullable', 'string', 'required_with:file.*'],
                'show_in_home' => 'required|in:1,0',
                "country" => ['nullable', 'array'],
                "url" => ['nullable', 'array'],
                'submit2' => 'required',
            ];
        } elseif ($this->isMethod('put') && $this->submit2 == 'en') {
            return [
                'title.' . $this->submit2 => ['required', 'max:255', 'min:2'],
                'mini_desc.*' => ['nullable', 'max:1000'],
                'description.' . $this->submit2 => ['required', 'min:2'],
                'image' => ['nullable', 'mimes:png,jpg,jpeg'],
                'pages_id' => ['nullable'],
                'childe_pages_id' => ['nullable'],
                'status' => ['nullable'],
                "links" => ['nullable', 'array'],
                "links.*" => ['nullable', 'url'],
                'links_title.en.*' => ['nullable', 'string', 'required_with:links.*'],
                'links_title.ar.*' => ['nullable', 'string', 'required_with:links.*'],
                "link_id.en.*" => ['nullable'],

                "file" => ['nullable', 'array'],
                "file.*" => ['nullable', 'file'],
                "file_title.en.*" => ['nullable', 'string', 'required_with:file.*'],
                "file_title.ar.*" => ['nullable', 'string', 'required_with:file.*'],
                "file_id" => ['nullable', 'array'],
                'show_in_home' => 'required|in:1,0',
                "country" => ['nullable', 'array'],
                "url" => ['nullable', 'array'],
                'submit2' => 'required',

            ];
        } elseif ($this->isMethod('put') && $this->submit2 != 'en') {
            return [
                'title.' . $this->submit2 => ['required', 'max:255', 'min:2'],
                'mini_desc.' . $this->submit2 => ['nullable', 'max:1000'],
                'description.' . $this->submit2 => ['required', 'min:2'],
                'image' => ['nullable', 'mimes:png,jpg,jpeg'],
                'childe_pages_id' => ['nullable'],
                'status' => ['nullable'],
                "links" => ['nullable', 'array'],
                "links.*" => ['nullable', 'url'],
                'links_title.*.*' => ['nullable', 'string', 'required_with:links.*'],
                'links_title.en.*' => ['nullable', 'string', 'required_with:links.*'],
                'links_title.ar.*' => ['nullable', 'string', 'required_with:links.*'],
                "links_title.{$this->submit2}.*" => ['nullable', 'string', 'required_with:links.*'],
                "link_id.*.*" => ['nullable'],

                "file" => ['nullable', 'array'],
                "file.*" => ['nullable', 'file'],
                "file_title.en.*" => ['nullable', 'string', 'required_with:file.*'],
                "file_title.ar.*" => ['nullable', 'string', 'required_with:file.*'],
                "file_title.{$this->submit2}.*" => ['nullable', 'string', 'required_with:file.*'],
                "file_id" => ['nullable', 'array'],
                // 'show_in_home' => 'required|in:1,0',
                "country" => ['nullable', 'array'],
                "url" => ['nullable', 'array'],
                'submit2' => 'required',
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
