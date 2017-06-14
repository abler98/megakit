<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Главная страница сайта.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
