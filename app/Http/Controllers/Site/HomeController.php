<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
   public function index()
   {

       return view('blocks.home');
   }

    public function show()
    {
        return view('blocks.category');
    }

    public function action()
    {
        return view('blocks.action');
    }

    public function brand()
    {
        return view('blocks.brand');
    }
}
