<?php

namespace App\Http\Requests\Admin\Project\Tabs\Archive;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class ArchiveRequest extends FormRequest {
    /**
    * Determine if the user is authorized to make this request.
    */

    public function authorize(): bool {
        return true;
    }

    /**
    * Get the validation rules that apply to the request.
    *
    * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
    */

    public function rules(): array {
        return [
            //
        ];
    }

    public function validationStore() {
        $request = Request();
        return Validator::make( $request->all(), [
            // 'title.*' => [ 'required', 'max:255' ],
            // 'description.*' => [ 'nullable' ],
            'project_id' => [ 'nullable' ],
            'tabs_id' => [ 'nullable' ],
            // 'type' => [ 'required' ],
            'body' => [ 'required' ],
            // 'url' => [ 'required_if:type,url', 'nullable' ],
            // 'image'=>[ 'nullable',  'required_if:type,image,pdf' ],
        ] );
    }

    public function validationUpdateEn() {
        $request = Request();
        return Validator::make( $request->all(), [
            'description.'.$request->submit2 => [ 'nullable' ],
            'project_id' => [ 'nullable' ],
            'tabs_id' => [ 'nullable' ],
            'title.'.$request->submit2  => [ 'required', 'max:255' ],
            'type' => [ 'required' ],
            'url' => [ 'required_if:type,url', 'nullable' ],
            'image'=>[ 'nullable', 'required_if:type,image,pdf' ],

        ] );
    }

     public function validationUpdateAr() {
        $request = Request();
        return Validator::make( $request->all(), [
            'title.'.$request->submit2  => [ 'required', 'max:255' ],
            'description.'.$request->submit2 => [ 'nullable' ],
            'type' => [ 'required' ],
            'project_id' => [ 'nullable' ],
            'tabs_id' => [ 'nullable' ],
            'url' => [ 'required_if:type,url', 'nullable' ],
            'image'=>[ 'nullable',  'required_if:type,image,pdf' ],

        ] );
    }

}
