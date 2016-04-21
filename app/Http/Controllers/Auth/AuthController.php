<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Mail;
use Session;
use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Carbon\Carbon;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $loginPath = '/login';
    protected $redirectTo = '/admin';
    protected $redirectPath = '/admin';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $fecha1 = '1930-01-01';
        $fecha2 = '2001-01-01';
        return Validator::make($data, [
            'name' => 'min:4|required|max:255|alpha',
            'username' => 'min:4|required|max:255|alpha_num|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'gender' => 'required',
            'date' => 'required|date|after:'.$fecha1.'|before:'.$fecha2.'',
            'country' => 'required',
            'profile_id' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        
        /*Mail::send('emails.contact', ['data' => $data], function ($m) use ($data) {
            $m->from('repositorioovas@gmail.com', 'Repositorio de OVAS');
            $m->to($data['email'],$data['name'])->subject('Código de usuario:');
        });*/
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'gender' => $data['gender'],
            'date' => $data['date'],
            'country' => $data['country'],
            'profile_id' => $data['profile_id'],
        ]);
    }
}
