<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // Nanti kalau udah ada API, tinggal ambil data di sini pakai Http::get(...)
        return view('menu'); // file resources/views/menu.blade.php
    }
}
