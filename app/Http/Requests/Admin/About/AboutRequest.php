<?php

namespace App\Http\Requests\Admin\About;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
                'text.*' => 'required|max:700',
                'facebook_link' => 'required|url',
                'facebook' => 'required|image',
                'twitter_link' => 'required|url',
                'twitter' => 'required|image',
                'instagram_link' => 'required|url',
                'instagram' => 'required|image',
                'youtube_link' => 'required|url',
                'youtube' => 'required|image',
            ];
        } else {
            return [
                'text.*' => 'required|max:700',
                'facebook_link' => 'sometimes|url',
                'facebook' => 'sometimes|image',
                'twitter_link' => 'sometimes|url',
                'twitter' => 'sometimes|image',
                'instagram_link' => 'sometimes|url',
                'instagram' => 'sometimes|image',
                'youtube_link' => 'sometimes|url',
                'youtube' => 'sometimes|image',
            ];
        }
    }
}
