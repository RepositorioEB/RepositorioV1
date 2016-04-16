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
        $fecha1 = '1930-01-01';
        $fecha2 = '2001-01-01';
        return [
            'name' => 'min:4|max:30|required',
            'last_name' => 'max:30',
            'username' => 'min:4|max:10|required|unique:users',
            'email' => 'min:7|max:30|required|unique:users',
            'password' => 'min:8|max:60|required',
            'gender' => 'required',
            'date' => 'required|date|after:'.$fecha1.'|before:'.$fecha2.'',
            'role' => 'required',
            'photo' => 'image',
            'country' => 'required',
            'studies' => 'min:20',
            'profile_id' => 'required'
        ];
    }
}
