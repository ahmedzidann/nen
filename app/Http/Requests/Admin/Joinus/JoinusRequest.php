<?php
namespace App\Http\Requests\Admin\Joinus;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class JoinusRequest extends FormRequest
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
            'video' => ['nullable'],
            'sort' => ['nullable'],
            'pages_id' => ['nullable'],
            'status' => ['nullable'],
            'parent_id' => ['nullable'],

        ]);
    }
    public function validationUpdateEn()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.'.$request->submit2 => ['required','max:255','min:2'],
            'description.'.$request->submit2 => ['required','min:2'],
            'image'=>['nullable','mimes:png,jpg,jpeg'],
            'video' => ['nullable'],
            'sort' => ['nullable'],
            'pages_id' => ['nullable'],
            'status' => ['nullable'],
            'parent_id' => ['nullable'],
        ]);
    }
    public function validationUpdateAr()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.'.$request->submit2 => ['required','max:255','min:2'],
            'description.'.$request->submit2 => ['required','min:2'],
        ]);
    }
}
