<?php

namespace App\Http\Requests\Admin\DocValidation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class DocValidationRequest extends FormRequest
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
        $request= Request();
        return Validator::make($request->all(), [
            'title.*' => ['required','max:255','min:2'],
            'description.*' => ['required','min:2'],
            'image'=>['nullable','mimes:png,jpg,jpeg'],
            'pages_id' => ['required'],
            'status' => ['nullable'],
            'details_title.en' =>['nullable','array'],
            'details_title.en.*' =>['nullable','string'],

        ]);
    }
    public function validationUpdateEn()
    {
        // dd(Request()->all());
        $request= Request();
        return Validator::make($request->all(), [
            'title.'.$request->submit2 => ['required','max:255','min:2'],
            'description.'.$request->submit2 => ['required','min:2'],
            "old_details_id.{$request->submit2}.*" => 'required|exists:doc_validation_details,id',
            "old_details_title.{$request->submit2}.*" => 'required|string',
            "details_title.{$request->submit2}.*" => 'required|string',
            'image'=>['nullable','mimes:png,jpg,jpeg'],
            'pages_id' => ['nullable'],
            'status' => ['nullable'],
            'submit2'=>'required',


        ]);
    }
    public function validationUpdateAr()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.'.$request->submit2 => ['required','max:255','min:2'],
            'description.'.$request->submit2 => ['required','min:2'],
            "old_details_id.{$request->submit2}.*" => 'required|exists:doc_validation_details,id',
            "old_details_title.{$request->submit2}.*" => 'required|string',
            "details_title.{$request->submit2}.*" => 'required|string',
            'submit2'=>'required',
        ]);
    }
}
