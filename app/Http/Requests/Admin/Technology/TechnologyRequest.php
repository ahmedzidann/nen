<?php
namespace App\Http\Requests\Admin\Technology;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class TechnologyRequest extends FormRequest
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
            'pages_id' => ['required'],
            'childe_pages_id' => ['nullable'],
            'status' => ['nullable'],
            "item"  =>['required'],
            "subcategory"  =>['required'],
            // "links" =>['nullable','array'],
            // "links.*" =>['nullable','url'],
            // 'links_title.en.*' =>['nullable','string','required_with:links.*'],
            // 'links_title.ar.*' =>['nullable','string','required_with:links.*'],
            // "file" =>['nullable','array'],
            // "file.*" =>['nullable','file'],
            // "file_title.en.*" =>['nullable','string','required_with:file.*'],
            "video"=>'nullable|mimetypes:video/mp4,video/quicktime'
        ]);
    }
    public function validationStoretwo()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.*' => ['required','max:255','min:2'],
            'subtitle.*' => ['required','max:255','min:2'],
            'image'=>['required','mimes:png,jpg,jpeg'],
            'pages_id' => ['required'],
            'childe_pages_id' => ['nullable'],
            'status' => ['nullable'],
            "item"  =>['required'],
            "subcategory"  =>['required'],
            // "links" =>['nullable','array'],
            // "links.*" =>['nullable','url'],
            // 'links_title.en.*' =>['nullable','string','required_with:links.*'],
            // 'links_title.ar.*' =>['nullable','string','required_with:links.*'],
            // "file" =>['nullable','array'],
            // "file.*" =>['nullable','file'],
            // "file_title.en.*" =>['nullable','string','required_with:file.*'],
            "video"=>'nullable|mimetypes:video/mp4,video/quicktime'
        ]);
    }



    public function validationUpdateEn()
    {

        $request= Request();
        return Validator::make($request->all(), [
            'title.*' => ['required','max:255','min:2'],
            'description.*' => ['required','max:8000','min:2'],
            'image'=>['nullable','mimes:png,jpg,jpeg'],
            'pages_id' => ['required'],
            'childe_pages_id' => ['nullable'],
            'status' => ['nullable'],
            "item"  =>['required'],
            "subcategory"  =>['required'],
        ]);
    }

    public function validationUpdateTwoEn()
    {

        $request= Request();
        return Validator::make($request->all(), [
            'title.*' => ['required','max:255','min:2'],
            'subtitle.*' => ['required','max:255','min:2'],
            'image'=>['nullable','mimes:png,jpg,jpeg'],
            'pages_id' => ['required'],
            'childe_pages_id' => ['nullable'],
            'status' => ['nullable'],
            "item"  =>['required'],
            "subcategory"  =>['required'],
        ]);
    }

    public function validationUpdateAr()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.*' => ['required','max:255','min:2'],
            'description.*' => ['required','max:8000','min:2'],
            'image'=>['nullable','mimes:png,jpg,jpeg'],
            'pages_id' => ['required'],
            'childe_pages_id' => ['nullable'],
            'status' => ['nullable'],
            "item"  =>['required'],
            "subcategory"  =>['required'],

        ]);
    }

    public function validationUpdateTwoAr()
    {

        $request= Request();
        return Validator::make($request->all(), [
            'title.*' => ['required','max:255','min:2'],
            'subtitle.*' => ['required','max:255','min:2'],
            'image'=>['nullable','mimes:png,jpg,jpeg'],
            'pages_id' => ['required'],
            'childe_pages_id' => ['nullable'],
            'status' => ['nullable'],
            "item"  =>['required'],
            "subcategory"  =>['required'],
        ]);
    }
}
