<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    private $users = [
        [
            'name' => 'Иван',
            'surname' => 'Корнеев',
            'email' => 'ivan@korneev.ru'
        ],
        [
            'name' => 'Кирилл',
            'surname' => 'Иванов',
            'email' => 'kirill@site.ru'
        ],
        [
            'name' => 'Мария',
            'surname' => 'Попова',
            'email' => 'masha@nasha.com'
        ]
    ];

    public function index()
    {
        return view('form', ['status' => true]);
    }


    public function form(Request $req)
    {
        $request = [];

        $data = $req->all();

        $request = $this->myValidate($data);

        if (empty($request)){
            $contents = Storage::disk('local')->get('log.txt');
            if (array_search($data['email'], array_column($this->users, 'email'))) {
                $request = [
                    'type' => 'error',
                    'message' => 'Пользователь с такой почтой уже есть'
                ];
                $email = $data['email'];
                Storage::disk('local')->put('log.txt', $contents . "$email - error\n");
            } else {
                $this->users[] = [
                    'name' => $data['name'],
                    'surname' => $data['surname'],
                    'email' => $data['email']
                ];
                $request = [
                    'type' => 'success',
                    'message' => 'Пользователь успешно добавлен'
                ];
                $email = $data['email'];
                Storage::disk('local')->put('log.txt', $contents . "$email - success\n");
            }
        }

        return response()->json($request);
    }

    private function myValidate($data)
    {
        $request = [];

        if (strlen($data['name']) < 2) {
            $request = [
                'type' => 'error',
                'message' => 'Имя должно быть больше 1 буквы'
            ];
        }

        if (strlen($data['surname']) < 2) {
            $request = [
                'type' => 'error',
                'message' => 'Фамилия должна быть больше 1 буквы'
            ];
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $request = [
                'type' => 'error',
                'message' => 'Email заполнен неверно'
            ];
        }

        if (strlen($data['password']) < 6 ) {
            $request = [
                'type' => 'error',
                'message' => 'Пароль должен быть больше 6 символов'
            ];
        }

        if ($data['password'] != $data['repeat_password']) {
            $request = [
                'type' => 'error',
                'message' => 'Пароли должны совпадать'
            ];
        }

        return $request;
    }
}
