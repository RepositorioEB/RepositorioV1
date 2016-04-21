<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class User1Request extends Request
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
            'name' => 'min:4|max:30|alpha|required',
            'last_name' => 'max:30|alpha',
            'gender' => 'required',
            'country' => 'required',
            'studies' => 'min:20',
            'profile_id' => 'required'
        ];
    }
}
