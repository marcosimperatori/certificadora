<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function addUser()
    {
        $user = new User();

        $data = [
            'email' => 'email@google.com.br',
            'senha' => '12'
        ];

        $user->insert($data);
    }

    public function store()
    {
        $validated = $this->validate(
            [
                'email' => 'required|valid_email',
                'senha' => 'required'
            ],
            [
                'email' => [
                    'required' => 'O email é obrigatório',
                    'valid_email' => 'Informe um email válido'
                ],
                'senha' => [
                    'required' => 'A senha é obrigatória'
                ]
            ]
        );

        if (!$validated) {
            return redirect()->route('login')->with('erros', $this->validator->getErrors());
        }

        $user = new User();
        $userFound = $user->select('id,nome,email,senha')->where('email', $this->request->getPost('email'))->first();

        if (!$userFound) {
            return redirect()->route('login')->with('error', 'Usuário ou senha incorretos!');
        }

        if (!password_verify($this->request->getPost('senha'), $userFound->senha)) {
            return redirect()->route('login')->with('error', 'Usuário ou senha incorretos!');
        }

        unset($userFound->senha);
        session()->set('user', $userFound);
        return redirect()->route('home');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->route('login');
    }
}
