<?php
namespace App\Http\Requests\Admin\About;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class AchievementsRequest extends FormRequest
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
            'image'=>['required','mimes:png,jpg,jpeg'],
            'item' => ['required'],
            'pages_id' => ['required'],
            'status' => ['nullable'],
        ]);
    }

    public function validationStoreTwo()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.*' => ['required','max:255','min:2'],
            'description.*' => ['required','min:2'],
            'years' => ['required','max:255','min:2'],
            'month' => ['required','max:255','min:1'],
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
            'description.'.$request->submit2 => ['required','min:2'],
            'years' => ['required','max:255','min:2'],
            'month' => ['required','max:255','min:1'],
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
            'description.'.$request->submit2 => ['required','min:2'],
            'image'=>['nullable','mimes:png,jpg,jpeg'],
            'item' => ['required'],
            'pages_id' => ['required'],
            'status' => ['required'],
        ]);
    }

    public function validationUpdateTwoAr()
    {
        $request= Request();
        return Validator::make($request->all(), [
            'title.'.$request->submit2 => ['required','max:255','min:2'],
            'description.'.$request->submit2 => ['required','min:2'],
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
