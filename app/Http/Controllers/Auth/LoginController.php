<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginFormRequest $request)
    {
        $validatedFields = $request->validated();
        if(auth()->attempt($validatedFields)) {
            if(auth()->user()->role === 'user') {
                return redirect(route('index'));
            } else if(auth()->user()->role === 'admin') {
                return redirect(route('admin.index'));
            }
        }
        return back()->withErrors(['incorrect_user' => 'Пользователь не найден.'])->withInput();
    }

    public function logout()
    {
        auth()->logout();
        return redirect(route('index'));
    }
}
