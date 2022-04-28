<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;

class RegisterController extends Controller
{
    private $formValidation = [
        'username' => 'required | max: 40 | string | unique:users',
        'name' => 'required | max: 40 | string',
        'surname' => 'required | max: 40 | string',
        'password' => 'required | min: 8 | string',
    ];

    public function create()
    {
        return view('register');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate($this->formValidation);

        $data['password'] = Hash::make($data['password']);

        $newUser = new User();
        $newUser->fill($data)->save();

        return redirect()
        ->route('login')
        ->with('message', 'La registrazione è avvenuta con successo. Accedi con le tue credenziali');
    }

}
