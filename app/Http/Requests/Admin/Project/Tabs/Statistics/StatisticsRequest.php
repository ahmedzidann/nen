<?php

namespace App\Http\Requests\Admin\Project\Tabs\Statistics;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class StatisticsRequest extends FormRequest
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
            'value' => ['required'],
            'image' => ['required', 'mimes:png,jpg,jpeg'],
            'status' => ['nullable'],
            'sort' => ['nullable'],
            'project_id' => ['nullable'],
            'tab_id' => ['nullable'],
        ]);
    }

    public function validationUpdateEn()
    {
        $request = Request();
        return Validator::make($request->all(), [
            'title.*' => ['required', 'max:255', 'min:2'],
            'value' => ['nullable'],
            'image' => ['nullable', 'mimes:png,jpg,jpeg'],
            'status' => ['nullable'],
            'sort' => ['nullable'],
        ]);
    }

    public function validationUpdateAr()
    {
        $request = Request();
        return Validator::make($request->all(), [
            'title.' . $request->submit2 => ['nullable', 'max:255', 'min:2'],
        ]);
    }
}
