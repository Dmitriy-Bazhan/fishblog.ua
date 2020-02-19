<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Loyout extends Controller
{
    public function main(Request $request)
    {
        if(!session()->has('username'))
        {
            session()->put('username', '');
        }
        if(!session()->has('role'))
        {
            session()->put('role', 'not_login');
        }
        if(!session()->has('user_id'))
        {
            session()->put('user_id', '');
        }
        $loyoutParam = [
            'username' => session('username'),
            'role' => session('role'),
            'user_id' => session('user_id')
        ];
    return \view ('common.loyout', compact('loyoutParam'));
    }
    public function loginInSite(Request $request)
    {
         echo 'WE IN FUNCTION <br>';
         var_dump($request->post());
    }
    public function ajaxLoginPost(Request $request)
    {
        dd($request->all());

    }
}
