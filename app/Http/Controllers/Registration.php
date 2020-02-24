<?php

namespace App\Http\Controllers;

use App\users;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Registration extends Controller
{

    public function main(Request $request)
    {

        $reg_param = [
            'background_image' => 'image/Lake02.jpg',
            'css_app' => 'css/app.css',
            'css_bootstrap' => 'css/bootstrap.min.css',
            'css_myStyle' => 'css/myStyle.css',
            'js_app' => 'js/app.js',
            'js_bootstrap' => 'js/bootstrap.min.js',
            'js_jquery' => 'js/jquery-3.4.1.js',
            'js_popper' => 'js/popper.min.js',
            'my_jquery_script' => 'js/my_js/my_jquery_script.js'
        ];

        $ds = DIRECTORY_SEPARATOR;

        foreach ($reg_param as $key => $value) {
            $reg_param[$key] = str_replace('\\/', $ds, $value);
        }

        $reg_param['errors'] = session()->get('this_errors');

        return \view('templates.registration', compact('reg_param'));
    }

    public function we_got_forms(Request $request)
    {

        //https://laravel.ru/docs/v3/validation#validation-rules
        $rules = [
            'login' => 'required|string|alpha_dash|max:50',
            'password' => 'required|string|alpha_dash|max:50',
            'password2' => 'required|string|alpha_dash|max:50',
            'email' => 'required|email|max:150'
        ];

        $check = \Validator::make($request->post(), $rules);
        $errors = [];

        if ($check->fails()) {
            return redirect('registration')->withInput($request->flash())->withErrors($check);
        } else {
            if ($request->post('password') !== $request->post('password2')) {
                $errors[] = 'Different passwords';
            }

            $temporary1 = users::where('login', $request->post()['login'])->get();
            $temporary2 = users::where('email', $request->post()['email'])->get();

            if (count($temporary1) > 0) {
                $errors[] = 'Логин сушествует, выберите другой';
            }
            if (count($temporary2) > 0) {
                $errors[] = 'Почта сушествует, выберите другую';
            }
        }
        if (count($errors) > 0) {
            session()->put('this_errors', $errors);
            return redirect('registration')->withInput($request->flash())->withErrors($check);
        } else {
            session()->put('this_errors', '');
            ## В базу юзерз
            $password = md5($request->post('password'));
            users::insertGetId(
                [
                    'login' => $request->post('login'),
                    'password' => $password,
                    'email' => $request->post('email'),
                    'role' => 'user'
                ]
            );
            session()->put('username', $request->post('login'));
            session()->put('role', 'user');
            $user_id = users::where('email', $request->post()['email'])->get('id');
            session()->put('user_id', $user_id[0]['id']);
            session()->put('user_not_exists', 'he exists');
            return redirect('registration');
        }
    }
}


