<?php

namespace App\Http\Requests\Lists;

use Illuminate\Foundation\Http\FormRequest;

class StoreListRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(auth()->user()) {
            return true;
        }
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
            "original_input"=>"required",
            "original_separator"=>"required"
        ];
    }
}
