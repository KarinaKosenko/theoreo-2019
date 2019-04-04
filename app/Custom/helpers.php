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
