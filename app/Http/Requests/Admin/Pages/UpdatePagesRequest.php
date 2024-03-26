<?php

namespace App\Http\Requests\Admin\Pages;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePagesRequest extends FormRequest
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
       if($this->submit2=='en'){
            return [
                'name.'.$this->submit2 => ['required','max:255','min:2'],
                'description.'.$this->submit2 => ['nullable','max:4000','min:2'],
                'link' => ['required'],
                'sort' => ['nullable'],
                'navbar' => ['nullable'],
                'footer' => ['nullable'],
                'status' => ['required'],
                'parent_id' => ['nullable'],
            ];
       }else{
            return [
                'name.'.$this->submit2 => ['required','max:255','min:2'],
                'description.'.$this->submit2 => ['nullable','max:4000','min:2'],
            ];
       }
    }
}
