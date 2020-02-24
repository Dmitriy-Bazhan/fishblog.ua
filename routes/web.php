<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

#главная страница
Route::get('/','mainpage@show_mainpage');


#операции с loyout
Route::post('autorize','Loyout@loginInSite');
Route::get('loginout', 'Loyout@loginOut');


#регистрация
Route::get('registration' , 'Registration@main');
Route::post('registration_form', 'Registration@we_got_forms');


#вернуться на главную из регистрации
Route::get('Back_to_mainpage',function(){
    session()->forget('this_errors');
    session()->forget('different_passwords');
    session()->forget('login_exists');
    session()->forget('email_exists');
    return redirect('/');
});


//Route::post('ajaxLoginPost','Loyout@ajaxLoginPost');  Тренировка Ajax;



