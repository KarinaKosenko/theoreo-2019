<?php

namespace App\Http\Controllers\Site;

use App\Models\{Action, Category};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ActionController extends Controller
{
    public function index()
    {
        $actions = Action::where('date_end', '>=', date('Y-m-d'))
            ->where('date_start', '<=', date('Y-m-d H:i:s'))
            ->paginate(10);
        return view('pages.home', ['actions' => $actions]);
    }

    public function show()
    {
        return view('pages.category');
    }

    public function action()
    {
        return view('pages.action');
    }

    public function brand()
    {
        return view('pages.brand');
    }
}
