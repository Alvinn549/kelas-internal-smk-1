<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function dataPost()
    {
        return view('data-post');
    }

    public function create()
    {
        return view('tambah-post');
    }
}
