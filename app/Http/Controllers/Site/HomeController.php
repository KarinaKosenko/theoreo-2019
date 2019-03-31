<?php

namespace App\Http\Controllers\Site;

use ATehnix\LaravelVkRequester\Models\VkRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
   public function index()
   {

       return view('pages.home');
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

    public function activation(\ATehnix\VkClient\Auth $auth)
    {

        $str = $auth->getUrl();

        return view('pages.vk_activation')->with('str', $str);
    }

    public function vkActivation(\ATehnix\VkClient\Auth $auth)
    {

       $params = [
            'owner_id' => '-41930339',
            'offset' => '0',
            'count' => '2',
           'fields' => 'name,photo_50',
            'v' => '5.92',
            'access_token' => '11b6d73010aa76365c01a0b5e87e5c2c3028e05e79da0ffe1663bf21a3e955d8eeb0483b248f14f27f103'
        ];

        $url = 'https://api.vk.com/method/wall.get?'. http_build_query($params);
        $response = json_decode(file_get_contents($url), true);


        return view('pages.vk_token')->with('response', $response);
    }
}
