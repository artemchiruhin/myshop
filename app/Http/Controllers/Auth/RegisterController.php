<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        if(Auth::check()) {
            return redirect('/');
        }
        return view('auth.register');
    }

    public function store(RegisterFormRequest $request)
    {
        $validatedFields = $request->validated();
        $user = User::create($validatedFields);
        if($user) {
            auth()->login($user);
            return redirect('/');
        }
        return redirect(route('register'))->withErrors([
            'formError' => 'Произошла ошибка при сохранении пользователя'
        ]);
    }
}
