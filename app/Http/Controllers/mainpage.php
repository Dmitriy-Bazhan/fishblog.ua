<?php

namespace App\Http\Controllers;

use App\fish;
use Illuminate\Http\Request;

class mainpage extends Controller
{
    private function on_display($mainPageParam = [])
    {
        $loyoutParam = app()->call(['App\Http\Controllers\Loyout','main']);//Вызываем метод из другого конртролера
        return \view('templates.mainpage', compact('loyoutParam','mainPageParam'));
    }

    public function show_mainpage()
    {
        $mainPageParam = [];

        $fishes = fish::all();
//        echo '<pre>';
//        var_dump($fishes);
//        die();
        foreach ($fishes as $key => $value)
        {
            $mainPageParam[$key]['id'] = $value->id;
            $mainPageParam[$key]['name_fish'] = $value->name_fish;
            $mainPageParam[$key]['description'] = $value->description;
            $mainPageParam[$key]['foto_fish'] = $value->foto_fish;
        }

        return $this->on_display($mainPageParam);
    }
}
