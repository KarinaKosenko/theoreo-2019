<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
   public function index()
   {

       return view('posts.home');
   }

    public function show()
    {
        return view('posts.category');
    }

    public function action()
    {
        return view('posts.action');
    }

    public function brand()
    {
        return view('posts.brand');
    }
}
