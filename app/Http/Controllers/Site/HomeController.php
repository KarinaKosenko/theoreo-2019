<?php

namespace App\Http\Controllers\Site;

use App\Parser\Authorise;
use App\Parser\Method\Newsfeed\Get as NewsfeedGet;
use App\Parser\Method\Groups\Get as GroupsGet;
use App\Parser\Method\Wall\Get as WallGet;
use App\Parser\Object\Group;
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

    public function generateToken()
    {
        $vkAuht = new Authorise();
        $vkAuht->setClientId('6919459')
            ->setDisplay(Authorise::DISPLAY_PAGE)
            ->setRedirectUri(Authorise::REDIRECT_URI_BLANK)
            ->setResponseType(Authorise::RESPONSE_TYPE_TOKEN)
            ->setScope(
                [
                    Authorise::SCOPE_GROUPS,
                    Authorise::SCOPE_WALL,
                    Authorise::SCOPE_FRIENDS,
                    Authorise::SCOPE_DOCS,
                    Authorise::SCOPE_PHOTOS,
                    Authorise::SCOPE_AUDIO,
                    Authorise::SCOPE_OFFLINE
                ]
            )
            ->setV(5.92);

        $str = $vkAuht->getAuthorizeUrl();

        return view('pages.vk_token')->with('str', $str);
    }

    public function vkWallGet(Vk $vk)
    {
        $wallGetMethod = new WallGet();
        $wallGetMethod->setOwnerId(-1551919)
            ->setOffset(0)
            ->setCount(2)
            ->setFilter(WallGet::FILTER_ALL)
            ->setExtended(WallGet::EXTENDED_YES);
dump($wallGetMethod);
        $vk::setAccessToken('348fc45fddf139215da1ea73ba69c5a44be89e0e0f1d2ae22ab07bcf94cea162a9bea7548cd019923434d');
        $response = $vk::api($wallGetMethod);

        return view('pages.vk_wall')->with('response', $response);
    }

    public function vkGroupsGet(Vk $vk)
    {
        $groupsGetMethod = new GroupsGet();
        $groupsGetMethod->setUserId(303789940)
            ->setExtended(GroupsGet::EXTENDED_EXTENDED)
            ->setFilter(GroupsGet::FILTER_GROUPS)
            ->setFields(['city','description'])
            ->setOffset(0)
            ->setCount(50);
        dump($groupsGetMethod);
        $vk::setAccessToken('348fc45fddf139215da1ea73ba69c5a44be89e0e0f1d2ae22ab07bcf94cea162a9bea7548cd019923434d');
        $response = $vk::api($groupsGetMethod);

       /* if(isset($_GET['offset'])){
            $prevPageOffset = $_GET['offset'] - 10;
            $prevPageOffset = $prevPageOffset < 0 ? 0 : $prevPageOffset;
            $nextPageOffset = $_GET['offset'] + 10;
        }else{
            $prevPageOffset = 0;
            $nextPageOffset = 10;
		}*/

        return view('pages.vk_groups')->with('response', $response);
    }

    public function vkNewsfeedGet(Vk $vk)
    {
        $newsfeedGetMethod = new NewsfeedGet();

       /* $filters = [];
        $filters[NewsfeedGet::FILTERS_POST];*/

        $fields = [];
        $fields[] = User::FIELD_CITY;
        $fields[] = User::FIELD_PHOTO_50;


        $newsfeedGetMethod->setFilters('post')
            ->setStartTime(1522769143)
            ->setCount(3)
            ->setFields($fields);

        dump($newsfeedGetMethod);
        $vk::setAccessToken('348fc45fddf139215da1ea73ba69c5a44be89e0e0f1d2ae22ab07bcf94cea162a9bea7548cd019923434d');

        $response = $vk::api($newsfeedGetMethod);

        return view('pages.vk_newsfeed')->with('response', $response);
    }
}
