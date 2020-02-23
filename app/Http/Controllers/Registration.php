<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Registration extends Controller
{
    public function main()
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
        return \view('templates.registration', compact('reg_param'));
    }

    public function we_got_forms(Request $request)
    {
        $rules = [
            'login' => 'required|string|alpha_dash|max:50',
            'password' => 'required|string|alpha_dash|max:50',
            'password2' => 'required|string|alpha_dash|max:50',
            'email' => 'required|email|max:150'
        ];

        $check = \Validator::make($request->post(), $rules);

        if ($check->fails()) {
            return redirect('registration')->withInput($request->flash())->withErrors($check);
        } else {
            return redirect('registration');
        }


        return redirect('registration');
    }
}
