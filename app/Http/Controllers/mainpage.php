<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mainpage extends Controller
{
    private function on_display()
    {
        $loyoutParam = app()->call(['App\Http\Controllers\Loyout','main']);//Вызываем метод из другого конртролера
        return \view('templates.mainpage', compact('loyoutParam'));
    }

    public function show_mainpage()
    {

        return $this->on_display();
    }
}
