<?php


namespace App\Http\Controllers\Site;


use App\Models\Vk_action;
use App\Models\Vk_action_photo;
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
use Illuminate\Support\Str;

class ParserController extends Controller
{
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

    /*public function vkWallGet(Vk $vk)
    {
        $wallGetMethod = new WallGet();
        $wallGetMethod->setOwnerId(-5408278)
            ->setOffset(0)
            ->setCount(2)
            ->setFilter(WallGet::FILTER_ALL)
            ->setExtended(WallGet::EXTENDED_YES);
        dump($wallGetMethod);
        $vk::setAccessToken('348fc45fddf139215da1ea73ba69c5a44be89e0e0f1d2ae22ab07bcf94cea162a9bea7548cd019923434d');
        $response = $vk::api($wallGetMethod);

        return view('pages.vk_wall')->with('response', $response);
    }*/

    /*public function vkGroupsGet(Vk $vk)
    {
        $groupsGetMethod = new GroupsGet();
        $groupsGetMethod->setUserId(303789940)
            ->setExtended(GroupsGet::EXTENDED_EXTENDED)
            ->setFilter(GroupsGet::FILTER_GROUPS)
            ->setFields(['city','description'])
            ->setOffset(0)
            ->setCount(100);

        $vk::setAccessToken('348fc45fddf139215da1ea73ba69c5a44be89e0e0f1d2ae22ab07bcf94cea162a9bea7548cd019923434d');
        $response = $vk::api($groupsGetMethod);
        dump($response);
        return view('pages.vk_groups')->with('response', $response);
    }*/

    public function vkNewsfeedGet(Vk $vk)
    {
       if($date_max = Vk_action::get()->max('date_unix')){
           $date_max = $date_max + 1;
       }else{
           $date_max = time() - 3*24*60*60;
       }

        $newsfeedGetMethod = new NewsfeedGet();

        $fields = [];
        $fields[] = Group::FIELD_CITY;
        $fields[] = Group::FIELD_PHOTO_50;

        $newsfeedGetMethod->setFilters('post','photo')
            ->setStartTime($date_max)
            ->setSourceIds(config('vk_parser.vk_owner_ids'))
            ->setCount(10)
            ->setFields($fields);

        $vk::setAccessToken(config('vk_parser.vk_default.access_token'));

        $response = $vk::api($newsfeedGetMethod);

        $str_stop = config('vk_parser.vk_stop_text');
        $str = config('vk_parser.vk_text');

        foreach($response['response']['items'] as $value){
        $content_stop = Str::contains($value['text'], $str_stop);
        $content = Str::contains($value['text'], $str);

        if(!$content_stop && $content){
             Vk_action::create(['context' => $value['text'], 'date_unix' => $value['date']]);

            foreach($value['attachments'] as $photo){
                if($photo['type'] == 'photo'){
                    foreach($photo['photo']['sizes'] as $photos){
                        if($photos['type'] == 'q')

                          Vk_action_photo::create(['photo' => $photos['url']]);
                    }
                }
            }
          }else{
              continue;
          }
        }

        return redirect()->route('home');
    }

}