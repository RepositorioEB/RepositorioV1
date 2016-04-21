<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AccountRequest extends Request
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
            'username' => 'min:4|max:10|alpha_num|required',
            'email' => 'min:7|max:30|required',
            'gender' => 'required',
            'date' => 'required',
            'photo' => 'image',
            'profile_id' => 'required'
        ];
    }
}
