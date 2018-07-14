<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Auth;

use App\User;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/reg';

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
        $message = [
        'same'    => 'The :attribute and :other must match.',
        'size'    => 'The :attribute must be exactly :size.',
        'between' => 'Das :attribute muss aus :min - :max Zeichen bestehen.',
        'in'      => 'The :attribute must be one of the following types: :values',
        ];
        return Validator::make($data, [
            'name' => 'max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|max:32',
            ], $message);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $Mail = $data['email'];
        $Password = bcrypt($data['password']);

        return User::create([
            'email' => $Mail,
            'password' => $Password
            ]);

    }

}
