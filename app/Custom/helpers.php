<?php

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
    $geo = [];
    $response = file_get_contents('https://geocode-maps.yandex.ru/1.x/?geocode=' . $address);
    preg_match('/<pos>(.*?)<\/pos>/', $response, $point);
    if (!$point) {
        return false;
    }
    $c = explode(' ', $point[1]);
    $geo['lat'] = $c[1];
    $geo['lng'] = $c[0];
    $geo['address'] = $address;
    return $geo;
}
