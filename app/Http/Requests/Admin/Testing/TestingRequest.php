<?php

namespace App\Http\Requests\Admin\Testing;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class TestingRequest extends FormRequest
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
        $request = Request();
        return Validator::make($request->all(), [
            'title.*' => ['required', 'max:255', 'min:2'],
            'mini_desc.*' => ['nullable', 'max:500'],
            'description.*' => ['required',  'min:2'],
            'image' => ['nullable', 'mimes:png,jpg,jpeg'],
            'pages_id' => ['nullable'],
            'childe_pages_id' => ['nullable'],
            'status' => ['nullable'],
            "links" => ['nullable', 'array'],
            "links.*" => ['nullable', 'url'],
            'links_title.en.*' => ['nullable', 'required_with:links.*'],
            'links_title.ar.*' => ['nullable', 'required_with:links.*'],
            "file" => ['nullable', 'array'],
            "file.*" => ['nullable', 'file'],
            "file_title.en.*" => ['nullable', 'required_with:file.*'],
            "video" => 'nullable|mimetypes:video/mp4,video/quicktime',
            'submit2' => 'nullable',
            'show_in_home' => 'required|in:1,0',

        ]);
    }
    public function validationUpdateEn()
    {
        // dd(Request()->all());
        $request = Request();
        return Validator::make($request->all(), [
            'title.' . $request->submit2 => ['required', 'max:255', 'min:2'],
            'mini_desc.*' => ['nullable', 'max:500'],
            'description.' . $request->submit2 => ['required', 'min:2'],
            'image' => ['nullable', 'mimes:png,jpg,jpeg'],
            'pages_id' => ['nullable'],
            'childe_pages_id' => ['nullable'],
            'status' => ['nullable'],
            "links" => ['nullable', 'array'],
            "links.*" => ['nullable', 'url'],
            'links_title.*' => ['nullable', 'required_with:links.*'],
            "link_id.*" => ['nullable'],

            "file" => ['nullable', 'array'],
            "file.*" => ['nullable', 'file'],
            "file_title.en.*" => ['nullable', 'required_with:file.*'],
            "file_title.ar.*" => ['nullable', 'required_with:file.*'],
            "file_id.*" => ['nullable'],
            'submit2' => 'nullable',
            'show_in_home' => 'required|in:1,0',
        ]);
    }
    public function validationUpdateAr()
    {
        $request = Request();
        return Validator::make($request->all(), [
            'title.' . $request->submit2 => ['required', 'max:255', 'min:2'],
            'mini_desc.*' => ['nullable', 'max:500'],
            'description.' . $request->submit2 => ['required', 'min:2'],
            "links" => ['nullable', 'array'],
            "links.*" => ['nullable', 'url'],
            'links_title.en.*' => ['nullable', 'required_with:links.*'],
            'links_title.*' => ['nullable', 'required_with:links.*'],
            "link_id.*" => ['nullable'],

            "file_title.ar.*" => ['nullable', 'required_with:file.*'],
            'links_title.ar.*' => ['nullable', 'required_with:links.*'],
            "file_id.ar.*" => ['nullable'],
            'submit2' => 'nullable',
           // 'show_in_home' => 'required|in:1,0',

        ]);
    }
}
