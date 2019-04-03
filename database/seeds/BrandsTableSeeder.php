<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandsTableSeeder extends Seeder
{
    protected $brands = [
        [
            'name' => 'UShatava',
            'img' => 'https://yt3.ggpht.com/a-/AAuE7mBJEQ4emtABYtCmln9LqFOSrFF6F8ZvW-d4Bg=s288-mo-c-c0xffffffff-rj-k-no',
            'site' => 'https://www.ushatava.com',
            'vk' => 'https://vk.com/ushatava',
            'phone' => '+78003505532',
            'type' => 'internet_shop',

        ],
        [
            'name' => 'Avgvst Jewelry',
            'img' => 'https://pp.userapi.com/c638820/v638820034/17ebc/fnym0597cKg.jpg?ava=1',
            'site' => 'http://www.jewelry-in-august.com/',
            'vk' => 'https://vk.com/bryantsevajewelry',
            'phone' => '+79292022029',
            'type' => 'federal_brand',

        ],
        [
            'name' => 'СУШИ WOK',
            'img' => 'https://p2.zoon.ru/preview/018xUGrcNeXreLNVXzgvuw/520x270x85/1/6/7/original_548a9fa0a375dd9d1c8b4591_5b3e1a2508ca8.jpg',
            'site' => 'https://sushiwok.ru/nizhnijtagil/',
            'vk' => 'https://vk.com/woksushi',
            'phone' => '+79920009038',
            'type' => 'internet_shop',

        ],
        [
            'name' => 'Техномаркет',
            'img' => 'https://tehnomarket-ural.ru/theme/technomarket/img/logo.png',
            'site' => 'https://tehnomarket-ural.ru/store/',
            'vk' => 'https://vk.com/texmark',
            'phone' => '+79045461629',
            'type' => 'internet_shop',

        ],
        [
            'name' => 'Wildberries',
            'img' => 'https://i.mycdn.me/image?id=866321440959&t=3&plc=WEB&tkn=*JbANSGb4tqed0Y0Wyk6j39gujm4',
            'site' => 'https://www.wildberries.ru',
            'vk' => 'https://vk.com/public9695053',
            'phone' => '+78001007505',
            'type' => 'internet_shop',

        ],

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->brands as $brand) {
            DB::table('brands')->insert([
                'name' => $brand['name'],
                'img' => $brand['img'],
                'site_url' => $brand['site'],
                'vk_url' => $brand['site'],
                'code' => Str::slug($brand['name']),
                'phone' => $brand['phone'],
                'type' => $brand['type'],
                'created_at' => Carbon::create(2019, 02, 01)->add(mt_rand(1, 50), 'day'),

            ]);
        }

    }
}
