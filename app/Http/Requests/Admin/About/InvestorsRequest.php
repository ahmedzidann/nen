<?php
namespace App\Http\Requests\Admin\About;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class InvestorsRequest extends FormRequest
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
            'image'=>['required'],
            'item' => ['required'],
            'pages_id' => ['required'],
            'sort' => ['nullable'],
            'status' => ['nullable'],
            'category' => ['nullable','in:1,2'],
        ]);
    }

    public function validationStoreOne()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.*' => ['required','max:255','min:2'],
            'image'=>['required','mimes:png,jpg,jpeg'],
            'item' => ['required'],
            'pages_id' => ['required'],
            'status' => ['nullable'],
            'description' => ['required'],
        ]);
    }

    public function validationStoreTwo()
    {
        $request= Request();
        return Validator::make($request->all(), [
            // 'icon' => ['required','max:255','min:2'],
            'image'=>['required'],
            'title.*' => ['required','max:255','min:2'],
            'subtitle.*' => ['required','max:255','min:2'],
            'item' => ['required'],
            'pages_id' => ['required'],
            'status' => ['nullable'],
        ]);
    }

    public function validationStoreThree()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'image'=>['required','mimes:png,jpg,jpeg'],
            'item' => ['required'],
            'pages_id' => ['required'],
            'status' => ['nullable'],
        ]);
    }

    public function validationStoreFoure()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.*' => ['nullable','max:255','min:2'],
            'url.*' => ['required','max:255','min:2'],
            'attributes.*' => ['required'],
            'image'=>['required','mimes:png,jpg,jpeg'],
            'item' => ['required'],
            'pages_id' => ['required'],
            'status' => ['nullable'],
        ]);
    }

    public function validationUpdateOneEn()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.'.$request->submit2 => ['required','max:255','min:2'],
            'image'=>['nullable','mimes:png,jpg,jpeg'],
            'item' => ['required'],
            'pages_id' => ['required'],
            'status' => ['nullable'],
            'description' => ['required'],
        ]);
    }

    public function validationUpdateTwoEn()
    {
        $request= Request();
        return Validator::make($request->all(), [
            // 'icon'=>['required','max:255','min:2'],
           // 'image'=>['required'],
            'subtitle.'.$request->submit2 => ['required','max:255','min:2'],
            'title.'.$request->submit2 => ['required','max:255','min:2'],
            'item' => ['required'],
            'pages_id' => ['required'],
            'status' => ['nullable'],
        ]);
    }

    public function validationUpdateThreeEn()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'image'=>['nullable','mimes:png,jpg,jpeg'],
            'item' => ['required'],
            'pages_id' => ['required'],
            'status' => ['nullable'],
        ]);
    }
    public function validationUpdateFoureEn()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.'.$request->submit2 => ['nullable','max:255','min:2'],
            'url' => ['nullable','max:900','min:2'],
            'image'=>['nullable','mimes:png,jpg,jpeg'],
            'item' => ['required'],
            'pages_id' => ['required'],
            'status' => ['nullable'],
            'sort' => ['nullable'],
            'category' => ['nullable','in:1,2'],
        ]);
    }
    public function validationUpdateOneAr()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.'.$request->submit2 => ['required','max:255','min:2'],
            'item' => ['required'],
            'pages_id' => ['required'],
            'status' => ['nullable'],
        ]);
    }

    public function validationUpdateTwoAr()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.'.$request->submit2 => ['required','max:255','min:2'],
            'subtitle.'.$request->submit2 => ['required','max:255','min:2'],
            'item' => ['required'],
            'pages_id' => ['required'],
            'status' => ['nullable'],
        ]);
    }

    public function validationUpdateThreeAr()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'item' => ['required'],
            'pages_id' => ['required'],
            'status' => ['nullable'],
        ]);
    }

    public function validationUpdateFoureAr()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.'.$request->submit2 => ['nullable','max:255','min:2'],
            'item' => ['required'],
            'pages_id' => ['required'],
        ]);
    }

    public function validationUpdateEn()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.'.$request->submit2 => ['required','max:255','min:2'],
            'description.'.$request->submit2 => ['required','min:2'],
            'image'=>['nullable','mimes:png,jpg,jpeg'],
            'item' => ['required'],
            'pages_id' => ['required'],
            'status' => ['required'],
            'sort' => ['nullable'],
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
