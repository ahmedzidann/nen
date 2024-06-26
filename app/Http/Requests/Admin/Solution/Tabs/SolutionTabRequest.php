<?php
namespace App\Http\Requests\Admin\Solution\Tabs;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

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
        return [
            //
        ];
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
        $request= Request();
        return Validator::make($request->all(), [
            'title.*' => ['required','max:255','min:2'],
            'description.*' => ['required','max:8000','min:2'],
            'image'=>['required','mimes:png,jpg,jpeg'],
            // 'childe_pages_id' => ['required'],
            // 'item' => ['required'],
            // 'pages_id' => ['required'],
            'status' => ['nullable'],
            'tabs_id' => ['nullable'],
            'solution_id' => ['nullable'],
            "links" =>['nullable','array'],
            "links.*" =>['nullable','url'],
            'links_title.en.*' =>['nullable','string','required_with:links.*'],
            'links_title.ar.*' =>['nullable','string','required_with:links.*'],
            "file" =>['nullable','array'],
            "file.*" =>['nullable','file'],
            "file_title.en.*" =>['nullable','string','required_with:file.*'],
        ]);
    }
    public function validationStoreContact(){
        $request= Request();
        return Validator::make($request->all(), [
            'title.*' => ['required','max:255','min:2'],
            'subtitle.*' => ['required','max:255','min:2'],
            'subsubtitle' => ['required'],
            'image'=>['required','mimes:png,jpg,jpeg,svg,webp'],
            // 'childe_pages_id' => ['required'],
            // 'item' => ['required'],
            // 'pages_id' => ['required'],
            'status' => ['nullable'],
            'tabs_id' => ['nullable'],
            'solution_id' => ['nullable'],

        ]);
    }
    public function validationStoreSec2(){
        $request= Request();
        return Validator::make($request->all(), [
            'title.*' => ['required','max:255','min:2'],
            'subtitle.*' => ['required','max:255','min:2'],
            'image'=>['nullable','mimes:png,jpg,jpeg'],
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
        ]);
    }

    public function validationStoreTwo()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.*' => ['required','max:255','min:2'],
            'subtitle.*' => ['required','max:255','min:2'],
            'subsubtitle.*' => ['nullable','max:255','min:2'],
            'description.*' => ['required','max:8000','min:2'],
            'years_text.*' => ['required','max:8000','min:2'],
            'childe_pages_id' => ['required'],
            'url.*' => ['required','max:8000','min:2'],
            'image'=>['required','mimes:png,jpg,jpeg'],
            'image2'=>['nullable'],
            'item' => ['required'],
            'pages_id' => ['required'],
            'sort' => ['nullable'],
            'status' => ['nullable'],
        ]);
    }

    public function validationUpdateTwoEn()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.'.$request->submit2 => ['required','max:255','min:2'],
            'description.'.$request->submit2 => ['required','max:8000','min:2'],
            'subtitle.'.$request->submit2 => ['required','max:255','min:2'],
            'subsubtitle.'.$request->submit2 => ['nullable','max:255','min:2'],
            'years_text.'.$request->submit2 => ['required','max:8000','min:2'],
            'url.'.$request->submit2 => ['required','max:8000','min:2'],
            'image'=>['nullable','mimes:png,jpg,jpeg'],
            'image2'=>['nullable'],
            'item' => ['required'],
            'pages_id' => ['required'],
            'status' => ['required'],
            'sort' => ['nullable'],
        ]);
    }
    public function validationUpdateEn()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.'.$request->submit2 => ['required','max:255','min:2'],
            'description.'.$request->submit2 => ['required','max:8000','min:2'],
            'image'=>['nullable','mimes:png,jpg,jpeg'],
            // 'item' => ['required'],
            // 'pages_id' => ['required'],
            'status' => ['required'],
            "links" =>['nullable','array'],
            "links.*" =>['nullable','url'],
            'links_title.en.*' =>['nullable','string','required_with:links.*'],
            'links_title.ar.*' =>['nullable','string','required_with:links.*'],
            "link_id.en.*"    =>['nullable'],

            "file" =>['nullable','array'],
            "file.*" =>['nullable','file'],
            "file_title.en.*" =>['nullable','string','required_with:file.*'],
            "file_title.ar.*" =>['nullable','string','required_with:file.*'],
            "file_id.en.*"    =>['nullable'],
        ]);
    }

    public function validationUpdateContacts()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.*' => ['required','max:255','min:2'],
            'subtitle.*' => ['required','max:255','min:2'],
            'subsubtitle' => ['required'],
            'image'=>['nullable','mimes:png,jpg,jpeg,svg,webp'],
            // 'childe_pages_id' => ['required'],
            // 'item' => ['required'],
            // 'pages_id' => ['required'],
            'status' => ['nullable'],
            // 'tabs_id' => ['nullable'],
            // 'solution_id' => ['nullable'],

        ]);
    }
    public function validationUpdateEnSec2()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.'.$request->submit2 => ['required','max:255','min:2'],
            'subtitle.'.$request->submit2 => ['required','max:8000','min:2'],
            'image'=>['nullable','mimes:png,jpg,jpeg'],
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
        ]);
    }

    public function validationUpdateArSec2()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.'.$request->submit2 => ['required','max:255','min:2'],
            'subtitle.'.$request->submit2 => ['required','max:8000','min:2'],
            'image'=>['nullable','mimes:png,jpg,jpeg'],
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
        ]);
    }

    public function validationUpdateTwoAr()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.'.$request->submit2 => ['required','max:255','min:2'],
            'description.'.$request->submit2 => ['required','max:8000','min:2'],
            'subsubtitle.'.$request->submit2 => ['nullable','max:255','min:2'],
            'subtitle.'.$request->submit2 => ['required','max:255','min:2'],
            'description.'.$request->submit2 => ['required','max:8000','min:2'],
            'years_text.'.$request->submit2 => ['required','max:8000','min:2'],
            'url.'.$request->submit2 => ['required','max:8000','min:2'],
        ]);
    }
    public function validationUpdateAr()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.'.$request->submit2 => ['required','max:255','min:2'],
            'description.'.$request->submit2 => ['required','max:8000','min:2'],
            "links" =>['nullable','array'],
            "links.*" =>['nullable','url'],
            'links_title.en.*' =>['nullable','string','required_with:links.*'],
            'links_title.ar.*' =>['nullable','string','required_with:links.*'],
            "link_id.ar.*"    =>['nullable'],

            "file_title.ar.*" =>['nullable','string','required_with:file.*'],
            'links_title.ar.*' =>['nullable','string','required_with:links.*'],
            "file_id.ar.*"    =>['nullable'],
        ]);
    }
}
