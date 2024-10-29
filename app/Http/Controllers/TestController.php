<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\App;

class TestController extends Controller
{
    public function lang()
    {
        dd(App::currentLocale());
    }
   public function check () {
        dd(auth()->user());
    }
}
