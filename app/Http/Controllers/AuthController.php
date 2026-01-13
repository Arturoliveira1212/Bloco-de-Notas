<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller {
    public function login() {
        return view('login');
    }

    public function loginSubmit(Request $request) {
        $request->validate([
            'text_username' => ['required', 'email'],
            'text_password' => ['required', 'string', 'min:6', 'max:16'],
        ], [
            'text_username.required' => 'O usuário é obrigatório',
            'text_username.email' => 'O usuário deve ser um endereço de email válido',
            'text_password.required' => 'A senha é obrigatória',
            'text_password.string' => 'A senha deve ser uma string válida',
            'text_password.min' => 'A senha deve ter pelo menos :min caracteres',
            'text_password.max' => 'A senha não deve exceder :max caracteres',
        ]);

        $username = $request->input('text_username');
        $password = $request->input('text_password');

        $user = User::where('username', $username)
            ->where('deleted_at', null)
            ->first();

        if (!$user) {
            return redirect()
                ->back()
                ->withInput()
                ->with('loginError', 'Usuário ou senha incorretos.');
        }

        if (!password_verify($password, $user->password)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('loginError', 'Usuário ou senha incorretos.');
        }

        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        session([
            'user' => [
                'id' => $user->id,
                'username' => $user->username,
            ],
        ]);

        return redirect()->to('/');
    }

    public function logout() {
        session()->forget('user');

        return redirect()->to('/login');
    }
}
