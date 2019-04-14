<?php

namespace App\Http\Controllers\Site;

use App\Parser\Authorise;
use App\Parser\Method\Newsfeed\Get as NewsfeedGet;
use App\Parser\Method\Groups\Get as GroupsGet;
use App\Parser\Method\Wall\Get as WallGet;
use App\Parser\Object\Group;
use App\Parser\Object\Post;
use App\Parser\Object\User;
use App\Parser\Vk;
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



}
