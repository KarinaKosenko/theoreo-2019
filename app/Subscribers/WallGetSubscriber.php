<?php
/**
 * Created by PhpStorm.
 * User: komp
 * Date: 29.03.2019
 * Time: 19:18
 */

namespace App\Subscribers;

use ATehnix\LaravelVkRequester\Contracts\Subscriber;
use ATehnix\LaravelVkRequester\Models\VkRequest;
use Illuminate\Support\Facades\Log;

class WallGetSubscriber extends Subscriber
{
    /** @var string  Метод API запроса */
    protected $apiMethod = 'wall.get';

    /** @var string  Тэг запроса */
    protected $tag = 'default';

    public function onSuccess(VkRequest $request, $response)
    {
        foreach ($response['items'] as $item) {
            // do something...
        }
    }

    public function onFail(VkRequest $request, array $error)
    {
        Log::alert('Request failed!');
    }
}