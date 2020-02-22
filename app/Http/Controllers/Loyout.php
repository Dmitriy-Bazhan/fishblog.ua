<?php

namespace App\Http\Controllers;

use App\users;
use http\Env\Response;
use Illuminate\Http\Request;

class Loyout extends Controller
{
    public function main($param = '')
    {
        if (!session()->has('username')) {
            session()->put('username', '');
        }
        if (!session()->has('role')) {
            session()->put('role', 'not_login');
        }
        if (!session()->has('user_id')) {
            session()->put('user_id', '');
        }
        if (!session()->has('user_not_exists')) {
            session()->put('user_not_exists', 'he exists');
        }
        $loyoutParam = [];
        return \view('common.loyout', compact('loyoutParam'));
    }

    public function loginInSite(Request $request)
    {
        $rules = [
            'login' => 'required|string|alpha_num|max:50',
            'password' => 'required|string|alpha_num|max:50'];

        $check = \Validator::make($request->post(), $rules);

        if ($check->fails()) {
            return $this->main()->withInput($request->input('login'), $request->input('password'))->withErrors($check);
        } else {
            $user = users::where([['login', $request->post()['login']], ['password', $request->post()['password']]])->get();
            //В нашей таблице есть поля: ['id','login','password','email','role','ban','profile_foto'];
            if (count($user) > 0) {
                foreach ($user as $value) {
                    session()->put('username', $value->login);
                    session()->put('role', $value->role);
                    session()->put('user_id', $value->id);
                    session()->put('user_not_exists', 'he exists');
                }
                return $this->main();
            } else {
                session()->put('user_not_exists', 'yep');
                return $this->main();
            }
        }
    }

    public function loginOut()
    {
        session()->put('username', '');
        session()->put('role', 'not_login');
        session()->put('user_id', '');
        return $this->main();
    }

//    public function ajaxLoginPost(Request $request)  //Ответ на Ajax. Пока это лишнее
//    {
//        $post[$request->test[1]['name']] = $request->test[1]['value'];
//        $post[$request->test[2]['name']] = $request->test[2]['value'];
//
//        $rules = [
//            'login' => 'required|string|alpha_num',
//            'password' => 'required|string|alpha_num'];
//
//        $check = \Validator::make($post, $rules);
//
//        if($check->fails())
//        {
//            $errors = $check->invalid();
//            var_dump($errors);
//            die();
//        }
//        else {
//            $result = [];
//            $user = users::where([['login', $post['login']], ['password', $post['password']]])->get();
//            //В нашей таблице есть поля: ['id','login','password','email','role','ban','profile_foto'];
//            foreach ($user as $value) {
//                session('username', $value->login);
//                session('role', $value->role);
//                session('user_id', $value->id);
//            }
//            }
//            var_dump($result);
//            die();
//        }
}
