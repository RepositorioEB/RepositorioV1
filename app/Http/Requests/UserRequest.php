<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;

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
        $fecha1 = '1936-'.Carbon::now()->format('m').'-'.Carbon::now()->format('d');
        $fecha2 = '2001-'.Carbon::now()->format('m').'-'.Carbon::now()->format('d');
        return [
            'name' => 'min:4|max:30|alpha|required',
            'last_name' => 'max:30|alpha',
            //'username' => 'min:4|max:10|alpha_num|required|unique:users',
            //'email' => 'min:7|max:30|required|unique:users',
            //'password' => 'min:8|max:60|required',
            'gender' => 'required',
            'date' => 'required|date|after:'.$fecha1.'|before:'.$fecha2.'',
            //'role' => 'required',
            'photo' => 'image',
            'country' => 'required',
            'studies' => 'min:20',
            'profile_id' => 'required'
        ];
    }
}
