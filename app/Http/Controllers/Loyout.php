<?php

namespace App\Http\Controllers;

use App\users;
use http\Env\Response;
use Illuminate\Http\Request;

class Loyout extends Controller
{
    public static function main()
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
        $loyoutParam = [
            'background_image' => 'image/Lake01.jpg',
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

        foreach ($loyoutParam as $key => $value) {
            $loyoutParam[$key] = str_replace('\\/', $ds, $value);
        }
        return $loyoutParam;
        //return \view('common.loyout', compact('loyoutParam'));
    }

    public function loginInSite(Request $request)
    {
        ########################################################################
         ##Что может request :

//        echo '<pre>';
//        var_dump($request->path());                                     //возращает путь запроса
//        var_dump($request->url());                                      //url запроса
//        var_dump($request->fullUrl());
//        var_dump($request->fullUrlWithQuery(['name' => 5]));            //к url можно прицепить переменную
//        var_dump($request->method());
//        var_dump($request->all());
//        var_dump($request->input());                                    //возвращает все переданные Post, Get
//        echo '<hr>';
//        var_dump($request->has('login'));                               //проверяет наличие переменной в запросе
//        var_dump($request->only('login'));                              //возвращает конкретную переменную из запроса
//        var_dump($request->only('products.0.name'));                    //тоже самое для массива
//        var_dump($request->except('login'));                            //антипод only, возвращет все, кроме указаной переменной

//        echo '<hr>';
//        var_dump($request->flash());                                    //одноразовая запись последнего запроса в сессию
//        var_dump($request->flashExcept('login'));                       //тоже самое, но все кроме 'login'
//        var_dump($request->flashOnly('login'));                         //тоже самое, но только 'login'

//        var_dump($request->old());                                      //получить данные переданный в сессию ранее
//        var_dump($request->old('login'));
//        //$oldLogin = $request->old('login');                            //получим старое значение ввода из сессии(пример)

//        echo '<hr>';
//        var_dump($request->cookie());
//        echo '<hr>';
//        $cookie = cookie('login', 'Dima', 5);                           //работа с куками
//        $cookie = cookie()->forever('login', 'Dima');                   //тоже самое, только срок куки 5 лет
//        echo \response(var_dump($request->input()))->cookie($cookie);   //как пользоваться set_cookie с помощью Laravel спросить
//        echo '<hr>';
//        //Работа с файлами
//        //$request->hasFile('foto');                                       //проверка сушествования переменной с сылкой на файл
//        //if($request->file('foto')->isValid())                            //проверка файла на отсутствие проблем загрузки
//        //$file = $request->file('foto');                                  //возвращает файл из запроса в переменную
//        //$file = $request->foto;                                          //тоже самое
//
//        //$path = $request->file('foto')->path();                          //возвращает путь
//        //$extension = $request->file('foto')->extension();                //возвращает расширение
//        //$request->file('foto')->move($newStorage);                        //перемещение файла в новое хранилище
//          $request->file('foto')->move($newStorage,$newName);               //тоже самое, с новым именем
//          $request->file('foto')->store($storage, $nameDisk);                       //сохранение файла на диск
//          $request->file('foto')->storeAs($storage, $newFileName, $nameDisk);       //сохранение с новым именем

        ##########################################################################################################
        ########    RULES:



        $rules = [
            'login' => 'required|string|alpha_dash|max:50',
            'password' => 'required|string|alpha_dash|max:50'];

        $check = \Validator::make($request->post(), $rules);
        if ($check->fails()) {
            return redirect('/')->withInput($request->flashOnly('login'))->withErrors($check);
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
                return redirect('/');
            } else {
                session()->put('user_not_exists', 'yep');
                return redirect('/');
            }
        }
    }

    public function loginOut()
    {
        session()->put('username', '');
        session()->put('role', 'not_login');
        session()->put('user_id', '');
        return redirect('/');
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
