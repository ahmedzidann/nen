<?php
namespace App\Http\Requests\Admin\Project\Tabs\Help;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
class HelpRequest extends FormRequest
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
            'title.*' => ['nullable','max:255','min:2'],
            'description.*' => ['required','max:8000','min:2'],
            'image'=>['nullable','mimes:png,jpg,jpeg'],
            'status' => ['nullable'],
            'project_id' => ['nullable'],
            'tabs_id' => ['nullable'],
            'type' => ['nullable'],
            'email' => ['nullable'],
            'phone' => ['nullable'],
        ]);
    }
    public function validationUpdateEn()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.'.$request->submit2  => ['nullable','max:255','min:2'],
            'description.'.$request->submit2 => ['required','max:8000','min:2'],
            'image'=>['nullable','mimes:png,jpg,jpeg'],
            'status' => ['nullable'],
            'project_id' => ['nullable'],
            'tabs_id' => ['nullable'],
            'type' => ['nullable'],
            'email' => ['nullable'],
            'phone' => ['nullable'],
        ]);
    }
    public function validationUpdateAr()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.'.$request->submit2  => ['nullable','max:255','min:2'],
            'description.'.$request->submit2 => ['required','max:8000','min:2'],
        ]);
    }
}
