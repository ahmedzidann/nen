<?php
namespace App\Http\Requests\Admin\Ngo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class NgoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }

    public function validationStore()
    {
        $request = Request();
        return Validator::make($request->all(), [
            'title.*'             => ['required', 'max:255', 'min:2'],
            'description.*'       => ['required', 'min:2'],
            'home_description.*'  => ['nullable'],
            'image'               => ['nullable', 'mimes:png,jpg,jpeg'],
            'pages_id'            => ['required'],
            'childe_pages_id'     => ['nullable'],
            'status'              => ['nullable'],
            'show_in_home'        => 'required|in:0,1',
            'item'                => ['required'],
            'subcategory'         => ['required'],
            'video'               => 'nullable|mimetypes:video/mp4,video/quicktime',
            'first_button.*'      => ['nullable'],
            'second_button.*'     => ['nullable'],
            'section_id'          => ['required'],
            'url_first_button'    => ['nullable'],
            'url_second_button'   => ['nullable'],
        ]);
    }

    public function validationStoretwo()
    {
        $request = Request();
        return Validator::make($request->all(), [
            'title.*'         => ['required', 'max:255', 'min:2'],
            'subtitle.*'      => ['required', 'max:255', 'min:2'],
            'image'           => ['required', 'mimes:png,jpg,jpeg'],
            'pages_id'        => ['required'],
            'childe_pages_id' => ['nullable'],
            'status'          => ['nullable'],
            'show_in_home'    => 'required|in:0,1',
            'item'            => ['required'],
            'subcategory'     => ['required'],
            'video'           => 'nullable|mimetypes:video/mp4,video/quicktime',
        ]);
    }

    public function validationUpdateEn()
    {
        $request = Request();
        return Validator::make($request->all(), [
            'title.*'           => ['required', 'max:255', 'min:2'],
            'description.*'     => ['required', 'min:2'],
            'home_description.*'=> ['nullable'],
            'image'             => ['nullable', 'mimes:png,jpg,jpeg'],
            'pages_id'          => ['required'],
            'childe_pages_id'   => ['nullable'],
            'status'            => ['nullable'],
            'item'              => ['required'],
            'subcategory'       => ['required'],
            'show_in_home'      => 'required|in:0,1',
            'first_button.*'    => ['nullable'],
            'second_button.*'   => ['nullable'],
            'section_id'        => ['required'],
            'url_first_button'  => ['nullable'],
            'url_second_button' => ['nullable'],
        ]);
    }

    public function validationUpdateTwoEn()
    {
        $request = Request();
        return Validator::make($request->all(), [
            'title.*'         => ['required', 'max:255', 'min:2'],
            'subtitle.*'      => ['required', 'max:255', 'min:2'],
            'image'           => ['nullable', 'mimes:png,jpg,jpeg'],
            'pages_id'        => ['required'],
            'childe_pages_id' => ['nullable'],
            'status'          => ['nullable'],
            'item'            => ['required'],
            'subcategory'     => ['required'],
            'show_in_home'    => 'required|in:0,1',
        ]);
    }

    public function validationUpdateAr()
    {
        $request = Request();
        return Validator::make($request->all(), [
            'title.*'           => ['required', 'max:255', 'min:2'],
            'description.*'     => ['required', 'min:2'],
            'home_description.*'=> ['nullable'],
            'image'             => ['nullable', 'mimes:png,jpg,jpeg'],
            'pages_id'          => ['required'],
            'childe_pages_id'   => ['nullable'],
            'status'            => ['nullable'],
            'item'              => ['required'],
            'subcategory'       => ['required'],
            'first_button.*'    => ['nullable'],
            'second_button.*'   => ['nullable'],
        ]);
    }

    public function validationUpdateTwoAr()
    {
        $request = Request();
        return Validator::make($request->all(), [
            'title.*'         => ['required', 'max:255', 'min:2'],
            'subtitle.*'      => ['required', 'max:255', 'min:2'],
            'image'           => ['nullable', 'mimes:png,jpg,jpeg'],
            'pages_id'        => ['required'],
            'childe_pages_id' => ['nullable'],
            'status'          => ['nullable'],
            'item'            => ['required'],
            'subcategory'     => ['required'],
            'show_in_home'    => 'required|in:0,1',
        ]);
    }
}
