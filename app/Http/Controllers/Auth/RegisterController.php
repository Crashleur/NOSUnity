<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'lastname' => 'max:255',
            'firstname' => 'max:255',
            'age' => 'required|numeric',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|max:255',
            'login' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
            'twitch' => 'max:255',
            'youtube' => 'max:255',
            'facebook' => 'max:255',
            'twitter' => 'max:255',
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
        $datas = array();
        if($data['lastname'] != null || $data['lastname'] != '')
            $datas['lastname'] = $data['lastname'];

        if($data['firstname'] != null || $data['firstname'] != '')
            $datas['firstname'] = $data['firstname'];

        $datas['age'] = $data['age'];
        $datas['email'] = $data['email'];
        $datas['username'] = $data['username'];
        $datas['login'] = $data['login'];
        $datas['password'] = $data['password'];

        if($data['twitch'] != null || $data['twitch'] != '')
            $datas['twitch'] = $data['twitch'];

        if($data['youtube'] != null || $data['youtube'] != '')
            $datas['youtube'] = $data['youtube'];

        if($data['facebook'] != null || $data['facebook'] != '')
            $datas['facebook'] = $data['facebook'];

        if($data['twitter'] != null || $data['twitter'] != '')
            $datas['twitter'] = $data['twitter'];

        return User::create($datas);
    }
}
