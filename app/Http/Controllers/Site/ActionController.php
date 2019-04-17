<?php

namespace App\Http\Controllers\Site;

use App\Custom\Classes\ActionFilter;
use App\Custom\Classes\Similar;
use App\Models\{
    Action, Brand, Category
};
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ActionController extends Controller
{
    public function index(Request $request)
    {
        $actions = Action::indate()
            ->sort($request->sort ?? 'age')
            ->paginate(10);
        return view('pages.home', ['actions' => $actions, 'sort' => $request->sort ?? 'age']);
    }

    public function category(Request $request)
    {
        try {
            $actions = Category::where('code', '=', $request->category_code)->firstOrFail()
                ->actions()->indate()
                ->sort($request->sort ?? 'age')
                ->get();
            return view('pages.category', [
                'actions' => $actions,
                'category' => $request->category_code,
                'sort' => $request->sort ?? 'age',
            ]);
        } catch (ModelNotFoundException $e) {
            return view('pages.404');
        }
    }

    public function show(Request $request)
    {
        $geo = [];
        $point = null;
        $addresses = [];
        if ($action = Action::with(['tags', 'brand'])
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
            $similars=(new Similar($action))->get();
            return view('pages.action',
                [
                    'action' => $action,
                    'geo' => $geo,
                    'addresses' => $addresses,
                    'similars' => $similars,
                ]);
        } else {
            return view('pages.404');
        }
    }

    public function brand(Request $request)
    {
        try {
            $brand = Brand::where('code', '=', $request->code)
                ->firstOrFail();
            $actions = Brand::where('code', '=', $request->code)->firstOrFail()
                ->actions()
                ->indate()
                ->sort($request->sort ?? 'age')
                ->get();
            return view('pages.brand', [
                'actions' => $actions,
                'brand' => $brand,
                'sort' => $request->sort ?? 'age',
            ]);

        } catch (ModelNotFoundException $e) {
            return view('pages.404');
        }
    }

    public function search(Request $request)
    {
        $search_text = $request->input('text');
        $actions = (new ActionFilter($search_text))->find();
        return view('pages.search', ['actions' => $actions, 'search_text' => $search_text]);
    }
}
