<?php
namespace App\Http\Requests\Admin\Solution;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class SolutionRequest extends FormRequest
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
            'description.*' => ['required','max:8000','min:2'],
            'image'=>['nullable','mimes:png,jpg,jpeg'],
            'pages_id' => ['nullable'],
            'tabs_id' => ['nullable'],
            'email' => ['nullable'],
            'address' => ['nullable'],
            'phone' => ['nullable'],
            'phone2' => ['nullable'],
            'fax' => ['nullable'],
            'whatsapp' => ['nullable'],
            'status' => ['nullable'],
        ]);
    }
    public function validationUpdateEn()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.'.$request->submit2 => ['required','max:255','min:2'],
            'description.'.$request->submit2 => ['required','max:8000','min:2'],
            'image'=>['nullable','mimes:png,jpg,jpeg'],
            'pages_id' => ['nullable'],
            'tabs_id' => ['nullable'],
            'email' => ['nullable'],
            'address' => ['nullable'],
            'phone' => ['nullable'],
            'phone2' => ['nullable'],
            'fax' => ['nullable'],
            'whatsapp' => ['nullable'],
            'status' => ['nullable'],
        ]);
    }
    public function validationUpdateAr()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.'.$request->submit2 => ['required','max:255','min:2'],
            'description.'.$request->submit2 => ['required','max:8000','min:2'],
        ]);
    }
}
