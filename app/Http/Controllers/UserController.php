<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request){
        $incomingField = $request->validate([
            'name' => ['required','min:3','max:20' , Rule::unique('users','name')],
            'email' => ['required','email' , Rule::unique('users','email')],
            'password' => ['required','min:8','max:150']
            ]
        );
        $incomingField['password'] = bcrypt($incomingField['password']);
        $user = User::create($incomingField);
        auth()->login($user); 
        return redirect('/');
    }

    public function login(Request $request)
    {
        $incomingField = $request->validate(
            [
                'loginname' => ['required'],
                'loginpassword' => ['required']
            ]
        );
        if(auth()->attempt(['name' => $incomingField['loginname'] , 'password' => $incomingField['loginpassword']])){
            $request->session()->regenerate();
        }
        return redirect('/');
    }
    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
