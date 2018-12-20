<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
            'name' => ['required', 'string', 'max:100'],
            'nickname' => ['required', 'string', 'max:15'],
            'country' => ['required'],
            'state' => ['required_if:country,==,Argentina'],
            'email' => ['required', 'string', 'email', 'max:190', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'avatar' => ['required', 'image', 'max:2048']
        ],
        [
            'required' => 'Este campo es obligatorio',
            'name.max' => 'Máximo: 100 caracteres',
            'nickname.max' => 'Máximo: 15 caracteres',
            'state.required_if' => 'Si eres de Argentina, elige tu provincia',
            'unique' => 'Este correo electrónico ya está registrado',
            'email' => 'Formato de correo inválido',
            'email.max' => 'Máximo: 190 caracteres',
            'password.min' => 'La contraseña debe tener al menos 4 caracteres',
            'confirmed' => 'Las contraseñas no coinciden',
            'image' => 'Formato inválido',
            'avatar.max' => 'Tamaño máximo: 2MB'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $request = app('request');

        $archivoAvatar = $request->file('avatar');
        $nombreAvatar = uniqid("avatar_") . "." . $archivoAvatar->extension();
        $archivoAvatar->storePubliclyAs("public/avatars", $nombreAvatar);

        if (isset($data['state'])) {
          return User::create([
              'name' => $data['name'],
              'nickname' => $data['nickname'],
              'country' => $data['country'],
              'state' => $data['state'],
              'email' => $data['email'],
              'password' => Hash::make($data['password']),
              'avatar' => $nombreAvatar
          ]);
        } else {
          return User::create([
              'name' => $data['name'],
              'nickname' => $data['nickname'],
              'country' => $data['country'],
              'email' => $data['email'],
              'password' => Hash::make($data['password']),
              'avatar' => $nombreAvatar
          ]);
      }
    }
}
