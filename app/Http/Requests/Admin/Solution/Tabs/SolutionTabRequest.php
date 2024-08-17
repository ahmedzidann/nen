<?php
namespace App\Http\Requests\Admin\Solution\Tabs;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class SolutionTabRequest extends FormRequest
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
        if ($this->isMethod('post') && $this->tab == 'about_section_2') {
            return $this->validationStoreSec2();
        } elseif ($this->isMethod('post') && $this->tab == 'contacts') {
            return $this->validationStoreContact();
        } elseif ($this->isMethod('post') && $this->tab != 'contacts' && $this->tab != 'about_section_2') {
            return $this->validationStore();
        } elseif ($this->isMethod('put') && $this->submit2 == 'en') {
            if ($this->tab == 'about_section_2') {
                return $this->validationUpdateEnSec2();
                
            } elseif ($this->tab == 'contacts') {
                
                return $this->validationUpdateContacts();

            } else {
                return $this->validationUpdateEn();
            }
        } elseif ($this->isMethod('put') && $this->submit2 != 'en') {
            if ($this->tab == 'about_section_2') {
                return $this->validationUpdateArSec2();

            } else {
                return $this->validationUpdateAr();
            }

        }
    }

    /*
    'title.*' => ['nullable','max:255','min:2'],
    'label1.*' => ['nullable','max:255','min:2'],
    'label2.*' => ['nullable','max:255','min:2'],
    'label3.*' => ['nullable','max:255','min:2'],
    'label4.*' => ['nullable','max:255','min:2'],
    'description.*' => ['required','max:8000','min:2'],
    'image'=>['nullable','mimes:png,jpg,jpeg'],
    'status' => ['nullable'],
    'project_id' => ['nullable'],
    'tabs_id' => ['nullable'],
    'type' => ['nullable'],
     */
    public function validationStore()
    {
        return [
            'title.*' => ['required', 'max:255', 'min:2'],
            'description.*' => ['required', 'max:8000', 'min:2'],
            'image' => ['required', 'mimes:png,jpg,jpeg'],
            // 'childe_pages_id' => ['required'],
            // 'item' => ['required'],
            // 'pages_id' => ['required'],
            'status' => ['nullable'],
            'tabs_id' => ['nullable'],
            'solution_id' => ['nullable'],
            "links" => ['nullable', 'array'],
            "links.*" => ['nullable', 'url'],
            'links_title.en.*' => ['nullable', 'string', 'required_with:links.*'],
            'links_title.ar.*' => ['nullable', 'string', 'required_with:links.*'],
            "file" => ['nullable', 'array'],
            "file.*" => ['nullable', 'file'],
            "file_title.en.*" => ['nullable', 'string', 'required_with:file.*'],
        ];
    }

    public function validationStoreContact()
    {
        return [
            'title.*' => ['required', 'max:255', 'min:2'],
            'subtitle.*' => ['required', 'max:255', 'min:2'],
            'subsubtitle' => ['required'],
            'image' => ['required', 'mimes:png,jpg,jpeg,svg,webp'],
            // 'childe_pages_id' => ['required'],
            // 'item' => ['required'],
            // 'pages_id' => ['required'],
            'status' => ['nullable'],
            'tabs_id' => ['nullable'],
            'solution_id' => ['nullable'],

        ];
    }
    public function validationStoreSec2()
    {
        return [
            'title.*' => ['required', 'max:255', 'min:2'],
            'subtitle.*' => ['required', 'max:255', 'min:2'],
            'image' => ['nullable', 'mimes:png,jpg,jpeg'],
            // 'childe_pages_id' => ['required'],
            // 'item' => ['required'],
            'icon' => ['required'],
            'status' => ['nullable'],
            'tabs_id' => ['nullable'],
            'solution_id' => ['nullable'],
            // "links" =>['nullable','array'],
            // "links.*" =>['nullable','url'],
            // 'links_title.en.*' =>['nullable','string','required_with:links.*'],
            // 'links_title.ar.*' =>['nullable','string','required_with:links.*'],
            // "file" =>['nullable','array'],
            // "file.*" =>['nullable','file'],
            // "file_title.en.*" =>['nullable','string','required_with:file.*'],
        ];
    }

    public function validationUpdateTwoEn()
    {
        return [
            'title.' . $this->submit2 => ['required', 'max:255', 'min:2'],
            'description.' . $this->submit2 => ['required', 'max:8000', 'min:2'],
            'subtitle.' . $this->submit2 => ['required', 'max:255', 'min:2'],
            'subsubtitle.' . $this->submit2 => ['nullable', 'max:255', 'min:2'],
            'years_text.' . $this->submit2 => ['required', 'max:8000', 'min:2'],
            'url.' . $this->submit2 => ['required', 'max:8000', 'min:2'],
            'image' => ['nullable', 'mimes:png,jpg,jpeg'],
            'image2' => ['nullable'],
            'item' => ['required'],
            'pages_id' => ['required'],
            'status' => ['required'],
            'sort' => ['nullable'],
        ];
    }
    public function validationUpdateEn()
    {
        return [
            'title.' . $this->submit2 => ['required', 'max:255', 'min:2'],
            'description.' . $this->submit2 => ['required', 'max:8000', 'min:2'],
            'image' => ['nullable', 'mimes:png,jpg,jpeg'],
            // 'item' => ['required'],
            // 'pages_id' => ['required'],
            'status' => ['required'],
            "links" => ['nullable', 'array'],
            "links.*" => ['nullable', 'url'],
            'links_title.en.*' => ['nullable', 'string', 'required_with:links.*'],
            'links_title.ar.*' => ['nullable', 'string', 'required_with:links.*'],
            "link_id.en.*" => ['nullable'],

            "file" => ['nullable', 'array'],
            "file.*" => ['nullable', 'file'],
            "file_title.en.*" => ['nullable', 'string', 'required_with:file.*'],
            "file_title.ar.*" => ['nullable', 'string', 'required_with:file.*'],
            "file_id.en.*" => ['nullable'],
        ];
    }

    public function validationUpdateContacts()
    {
        return [
            'title.*' => ['required', 'max:255', 'min:2'],
            'subtitle.*' => ['required', 'max:255', 'min:2'],
            'subsubtitle' => ['required'],
            'image' => ['nullable', 'mimes:png,jpg,jpeg,svg,webp'],
            // 'childe_pages_id' => ['required'],
            // 'item' => ['required'],
            // 'pages_id' => ['required'],
            'status' => ['nullable'],
            // 'tabs_id' => ['nullable'],
            // 'solution_id' => ['nullable'],

        ];
    }
    public function validationUpdateEnSec2()
    {
        return [
            'title.' . $this->submit2 => ['required', 'max:255', 'min:2'],
            'subtitle.' . $this->submit2 => ['required', 'max:8000', 'min:2'],
            'image' => ['nullable', 'mimes:png,jpg,jpeg'],
            // 'item' => ['required'],
            // 'pages_id' => ['required'],
            'icon' => ['required'],
            'status' => ['required'],
            // "links" =>['nullable','array'],
            // "links.*" =>['nullable','url'],
            // 'links_title.en.*' =>['nullable','string','required_with:links.*'],
            // 'links_title.ar.*' =>['nullable','string','required_with:links.*'],
            // "link_id.en.*"    =>['nullable'],

            // "file" =>['nullable','array'],
            // "file.*" =>['nullable','file'],
            // "file_title.en.*" =>['nullable','string','required_with:file.*'],
            // "file_title.ar.*" =>['nullable','string','required_with:file.*'],
            // "file_id.en.*"    =>['nullable'],
        ];
    }

    public function validationUpdateArSec2()
    {
        return [
            'title.' . $this->submit2 => ['required', 'max:255', 'min:2'],
            'subtitle.' . $this->submit2 => ['required', 'max:8000', 'min:2'],
            'image' => ['nullable', 'mimes:png,jpg,jpeg'],
            // 'item' => ['required'],
            // 'pages_id' => ['required'],
            'icon' => ['required'],
            'status' => ['required'],
            // "links" =>['nullable','array'],
            // "links.*" =>['nullable','url'],
            // 'links_title.en.*' =>['nullable','string','required_with:links.*'],
            // 'links_title.ar.*' =>['nullable','string','required_with:links.*'],
            // "link_id.en.*"    =>['nullable'],

            // "file" =>['nullable','array'],
            // "file.*" =>['nullable','file'],
            // "file_title.en.*" =>['nullable','string','required_with:file.*'],
            // "file_title.ar.*" =>['nullable','string','required_with:file.*'],
            // "file_id.en.*"    =>['nullable'],
        ];
    }

    public function validationUpdateTwoAr()
    {
        return [
            'title.' . $this->submit2 => ['required', 'max:255', 'min:2'],
            'description.' . $this->submit2 => ['required', 'max:8000', 'min:2'],
            'subsubtitle.' . $this->submit2 => ['nullable', 'max:255', 'min:2'],
            'subtitle.' . $this->submit2 => ['required', 'max:255', 'min:2'],
            'description.' . $this->submit2 => ['required', 'max:8000', 'min:2'],
            'years_text.' . $this->submit2 => ['required', 'max:8000', 'min:2'],
            'url.' . $this->submit2 => ['required', 'max:8000', 'min:2'],
        ];
    }
    public function validationUpdateAr()
    {
        return [
            'title.' . $this->submit2 => ['required', 'max:255', 'min:2'],
            'description.' . $this->submit2 => ['required', 'max:8000', 'min:2'],
            "links" => ['nullable', 'array'],
            "links.*" => ['nullable', 'url'],
            'links_title.en.*' => ['nullable', 'string', 'required_with:links.*'],
            'links_title.ar.*' => ['nullable', 'string', 'required_with:links.*'],
            "links_title.{$this->submit2}.*" => ['nullable', 'string', 'required_with:links.*'],
            "link_id.ar.*" => ['nullable'],
            "link_id.{$this->submit2}.*" => ['nullable'],

            "file_title.ar.*" => ['nullable', 'string', 'required_with:file.*'],
            "file_title.{$this->submit2}.*" => ['nullable', 'string', 'required_with:file.*'],
            "file_id.ar.*" => ['nullable'],
            "file_id.{$this->submit2}.*" => ['nullable'],
        ];
    }

    /**
     * Handle a failed validation attempt.
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     * @return void
     */
    protected function failedValidation(Validator $validator)
    {
        if ($this->expectsJson()) {
            $errors = (new ValidationException($validator))->errors();
            throw new HttpResponseException(
                response()->json([
                    'status' => 400,
                    'errors' => $errors,
                ])
            );
        }
        // parent::failedValidation($validator);
    }
}
