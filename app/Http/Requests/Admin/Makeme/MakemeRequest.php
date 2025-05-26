<?php

namespace App\Http\Requests\Admin\Makeme;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class MakemeRequest extends FormRequest
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
            //
        ];
    }

    public function validationStore()
    {
        $request = request();
        return Validator::make($request->all(), [
            'title.*' => ['required', 'max:255', 'min:2'],
            'description.*' => ['required', 'min:2'],
            'image' => ['nullable', 'mimes:png,jpg,jpeg'],
            'video' => ['nullable'],
            'sort' => ['nullable'],
            // 'pages_id' => ['nullable'],
            'status' => ['nullable'],
            'url' => ['nullable'],
        ]);
    }

    public function validationUpdateEn()
    {
        $request = request();

        return Validator::make($request->all(), [
            'title.' . $request->submit2 => ['required', 'max:255', 'min:2'],
            'description.' . $request->submit2 => ['required', 'min:2'],
            'image' => ['nullable', 'mimes:png,jpg,jpeg'],
            'video' => ['nullable'],
            'url' => ['nullable'],
            'sort' => ['nullable'],
            // 'pages_id' => ['nullable'],
            'status' => ['nullable'],
        ]);
    }

    public function validationUpdateAr()
    {
        $request = request();

        return Validator::make($request->all(), [
            'title.' . $request->submit2 => ['required', 'max:255', 'min:2'],
            'description.' . $request->submit2 => ['required', 'min:2'],
        ]);
    }
}
