<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVioletRequest extends FormRequest
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
            "name" => ["required", "unique:App\Models\Violet"],
            "price" => ["required","numeric" ],
            "description" => ["required", "string"],
            "images[].*" => ['required|image|mimes:jpg,jpeg,png,gif,svg|max:4096'],
            "selectioner_id" => ["required","numeric" ]
        ];
    }
}
