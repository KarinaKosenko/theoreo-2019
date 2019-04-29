<?php


namespace App\Http\Controllers\Site;
use App\Models\{Vk_action,Vk_action_photo};
use App\Parser\Authorise;
use App\Parser\Method\Newsfeed\Get as NewsfeedGet;
use App\Parser\Object\User;
use App\Parser\Vk;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ParserController extends Controller
{
    public function generateToken()
    {
        $vkAuht = new Authorise();
        $vkAuht->setClientId(config('vk_parser.vk_default.client_id'))
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
            ->setVersion(5.92);

        $str = $vkAuht->getAuthorizeUrl();

        return view('pages.vk_token')->with('str', $str);
    }


    public function vkNewsfeedGet(Vk $vk)
    {
       if($date_max = Vk_action::get()->max('date_unix')){
           $date_max = $date_max + 1;

       }else{
           $date_max = time() - 3*24*60*60;
       }

        $newsfeedGetMethod = new NewsfeedGet();

        $fields = [];
        $fields[] = User::FIELD_CITY;
        $fields[] = User::FIELD_PHOTO_50;

        $newsfeedGetMethod->setFilters('post','photo')
            ->setStartTime($date_max)
            ->setSourceIds(config('vk_parser.vk_owner_ids'))
            ->setCount(50)
            ->setFields($fields);

        $vk::setAccessToken(config('vk_parser.vk_default.access_token'));

        if (is_null($response = $vk::api($newsfeedGetMethod))) {
            throw new \Exception('No connection to API!');
        }

        $str_stop = config('vk_parser.vk_stop_text');
        $str = config('vk_parser.vk_text');

        foreach($response['response']['items'] as $value){
            $content_stop = Str::contains($value['text'], $str_stop);
            $content = Str::contains($value['text'], $str);

            if(!$content_stop && $content) {
                $vk_model = Vk_action::create(['context' => $value['text'], 'date_unix' => $value['date']]);

                foreach ($value['attachments'] as $photo) {

                    if ($photo['type'] == 'photo') {
                        foreach ($photo['photo']['sizes'] as $photos) {
                            if ($photos['type'] == 'q' || $photos['type'] == 'm') {
                           $vk_model->vk_action_photos()->save(new Vk_action_photo(['photo' => $photos['url']]));                            }

                        }
                    }
                }
            }
        }


     return redirect()->route('site.action.index');

    }

}