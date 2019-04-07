<?php

namespace App\Http\Controllers\Site;

use App\Models\{
    Action, Category
};
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

    public function action(Request $request)
    {
        $geo = [];
        if ($action = Action::where('code', '=', $request->action_alias)->first()) {
            if (get_geoposition($action->address)) {
                $geo[] = get_geoposition($action->address);
            } elseif ($action->brand->sell_addres) {
                $geo[] = get_geoposition($action->brand->sell_addres);
            } elseif ($action->cities->first()) {
                $geo[] = get_geoposition($action->cities->first()->name);
            }
            return view('pages.action', ['action' => $action, 'geo' => $geo]);
        } else {
            return view('pages.404');
        }
    }

    public function brand()
    {
        return view('pages.brand');
    }
}
