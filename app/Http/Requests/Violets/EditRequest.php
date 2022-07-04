<?php

namespace App\Http\Requests\Violets;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(\Auth::user()->is_admin) return true;
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => ["required", "string"],
            "price" => ["required","numeric" ],
            "description" => ["required", "string"],
            "image" => ["required", "file"],
            "selectioner_id" => ["required","numeric" ]
        ];
    }
}
