<?php

function admin_asset ($path, $secure = null)
{
    return app('url')->asset('/admin-assets/' . $path);
}