<?php
namespace App\Http\Requests\Admin\Project\Tabs\Joinus;

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
        $request = Request();

        return Validator::make($request->all(), [
            'register_attributes.*' => ['required'],
            'terms_attributes.*' => ['required'],
            'image' => ['nullable', 'mimes:png,jpg,jpeg'],
            'image2' => ['nullable', 'mimes:png,jpg,jpeg'],
            'status' => ['nullable'],
            'project_id' => ['nullable'],
            'tabs_id' => ['nullable'],
            'type' => ['nullable'],
        ]);
    }

    public function validationUpdateEn()
    {
        $request = Request();
        return Validator::make($request->all(), [
            'register_attributes.*' => ['required'],
            'terms_attributes.*' => ['required'],
            'image' => ['nullable', 'mimes:png,jpg,jpeg'],
            'image2' => ['nullable', 'mimes:png,jpg,jpeg'],
            'status' => ['nullable'],
            'project_id' => ['nullable'],
            'tabs_id' => ['nullable'],
            'type' => ['nullable'],
            'terms_keys.*' => ['nullable'],
            'register_keys.*' => ['nullable'],
            'submit2' => ['nullable'],
        ]);
    }

    public function validationUpdateAr()
    {
        $request = Request();
        return Validator::make($request->all(), [
            'register_attributes.*' => ['required'],
            'terms_attributes.*' => ['required'],
            'terms_keys.*' => ['nullable'],
            'register_keys.*' => ['nullable'],
            'submit2' => ['nullable'],
        ]);
    }
}
