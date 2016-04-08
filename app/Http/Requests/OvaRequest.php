<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class OvaRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'min:5|max:255|required',
            'language' => 'max:15',
            'description' => 'min:20',
            //'archive' => 'max:255|required',
            'type_id' => 'required',
            'category_id' => 'required'
        ];
    }
}
