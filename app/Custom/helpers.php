<?php

use App\Models\Tag;
use \GuzzleHttp\Client;
use Illuminate\Support\Str;

function admin_asset($path, $secure = null)
{
    return app('url')->asset('/admin-assets/' . $path);
}

function my_date_format($date = null)
{
    if (!$date) {
        $date = date('d.m.Y');
    }
    return date('d.m.Y', strtotime($date));
}

function get_geoposition($address)
{
    $geo = null;
    $point = [];
    $response = null;
    $url = "https://geocode-maps.yandex.ru/1.x/?apikey=f112f3e4-d246-486d-80e2-0c171bc8d004&geocode=" . Str::ascii($address);
    try {
        $client = new Client();
        $response = $client->request('GET', $url);
        $body_response = $response->getBody();
    } catch (\GuzzleHttp\Exception\GuzzleException $e) {
        return false;
    }

    preg_match('/<pos>(.*?)<\/pos>/', $body_response, $point);
    if (!$point) {
        return false;
    }
    $c = explode(' ', $point[1]);
    $geo['lat'] = $c[1];
    $geo['lng'] = $c[0];
    $geo['address'] = $address;
    return $geo;
}

function tags_from_string($tag_string)
{
    $tags = explode(',', $tag_string);
    $tags_id = [];
    foreach ($tags as $name) {
        if (trim($name) != '') {
            try {
                $tag = Tag::where('name', trim($name))->firstOrFail();
                $tags_id[] = $tag->id;
            } catch (\Exception $e) {
                $tag = Tag::create(['name' => trim($name), 'code' => trim($name)]);
                $tags_id[] = $tag->id;
            }
        }
    }
    return $tags_id;
}

function tags_to_string(Illuminate\Support\Collection $tags)
{
    $tag_names = [];
    foreach ($tags as $tag) {
        $tag_names[] = $tag->name;
    }
    return implode(", ", $tag_names);
}

