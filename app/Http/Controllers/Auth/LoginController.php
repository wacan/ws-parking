<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use App\providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller

{
    use AuthenticatesUsers;

    public function __contruct()
    {
        $this->middleware('gest', ['only' => 'showLoginForm']);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login()
    {
        $credentials = $this->validate(request(), [
            $this->username()=>'required|string',
            'password'=> 'required|string'
        ]);
            
        //return $credentials;
        
        if(Auth::attempt($credentials))
        {
            return redirect('/');
        }

        return back()
        ->withErrors(['username' => trans('auth.failed')])
        ->withInput(request(['username']));
    }

    function username()
    {
        return 'username';
    }


}