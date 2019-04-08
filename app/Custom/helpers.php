<?php

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
    $url = 'https://geocode-maps.yandex.ru/1.x/?geocode=' . Str::ascii($address);
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
