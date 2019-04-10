<?php

namespace App\Http\Controllers\Site;

use App\Models\Action;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ActionController extends Controller
{
    public function index()
    {
        $actions = Action::with(['tags','brand'])
        ->where('date_end', '>=', date('Y-m-d'))
            ->where('date_start', '<=', date('Y-m-d H:i:s'))
            ->paginate(10);
        return view('pages.home', ['actions' => $actions]);
    }

    public function category()
    {
        return view('pages.category');
    }

    public function show(Request $request)
    {
        $geo = [];
        $point = null;
        $addresses=[];
        if ($action = Action::with(['tags','brand'])
            ->where('code', '=', $request->action_alias)
            ->first()) {
            if (!$action->address == null) {
                $address = $action->address;
                $point = get_geoposition($address);
            } elseif (!$action->brand->sell_addres == null) {
                $address = $action->brand->sell_addres;
                $point = get_geoposition($address);
            } elseif (!$action->cities->first()->name == null) {
                $address = $action->cities->first()->name;
                $point = get_geoposition($address);
            }
            $addresses[] = $address;
            if ($point) {
                $geo[] = $point;
            }
            return view('pages.action',
                ['action' => $action, 'geo' => $geo, 'addresses' => $addresses]);
        } else {
            return view('pages.404');
        }
    }

    public function brand()
    {
        return view('pages.brand');
    }
}
