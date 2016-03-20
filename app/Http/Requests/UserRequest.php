<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'name' => 'min:4|max:30|required',
            'last_name' => 'max:30',
            'username' => 'min:4|max:10|required|unique:users',
            'email' => 'min:7|max:30|required|unique:users',
            'password' => 'min:8|max:60|required',
            'gender' => 'required',
            'date' => 'required',
            'state' => 'required',
            'role' => 'required',
            'profile_id' => 'required'
        ];
    }
}
