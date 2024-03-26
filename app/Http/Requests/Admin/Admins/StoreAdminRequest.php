<?php

namespace App\Http\Requests\Admin\Admins;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
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
        'name.*' => ['nullable','max:255','min:2'],
        'status' => ['required'],
        'address' => ['required'],
        'phone' => ['required'],
        'key' => ['required'],
        'email' => ['required','max:255','min:2','email','unique:admins,email'],
        'password' => 'required|same:confirm-password|min:2|max:255',
        'roles' => ['required'],
        'image'=>['nullable','mimes:png,jpg,jpeg'],
        'image2'=>['nullable','mimes:png,jpg,jpeg'],
        ];
    }
}