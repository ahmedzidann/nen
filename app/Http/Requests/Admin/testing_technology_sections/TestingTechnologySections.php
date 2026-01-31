<?php

namespace App\Http\Requests\Admin\testing_technology_sections ;

use Illuminate\Foundation\Http\FormRequest;

class TestingTechnologySections extends FormRequest
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
        
      
       if(request()->submit2=='en' || request()->submit2=='')
       {
        $rules = [
            'title.*' => 'required',
            'main_category_id' => 'required|exists:pages,slug',
            'sub_category_id' => 'required|exists:pages,slug',
            'sort' => 'required',
            'description.*' => 'required',
            'design_section_id'=>'required',
            'status' => 'nullable',
            'image_1' => 'nullable',
            'image_2' => 'nullable',
        ];
    }else{
         $rules = [
            'title.*' => 'required',
            'description.*' => 'required',
         ];
    }
        if ($this->getMethod() == 'post') {
            return $rules;
        } else {
            return $rules + [
                'keys.*' => 'sometimes',
            ];

        }
    }
}
