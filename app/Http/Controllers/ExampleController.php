<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Http\Request;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //demo测试
    public function demo( Request $request)
    {
        echo "eeeee";
    }
}
