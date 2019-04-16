<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ActionsTableSeeder extends Seeder
{
    protected $types = ['discount', 'sale'];
    protected $actions = [
        [
            'title' => 'Подарок на День рождения',
            'text' => 'Дарим вам 1000 рублей на новый образ от USHATÁVA к торжеству. Бонусы начисляются за 7 дней до Дня рождения.
Бонусы на День рождения активны в течение 2 месяцев. Воспользоваться бонусами можно в наших шоурумах.',
            'img' => 'https://peopletalk.ru/wp-content/uploads/2018/03/123123-1024x718.jpg',
            'brand' => '1',
            'cat' => '1',
            'address' => 'ул. Хохрякова, 41, Екатеринбург, Свердловская обл., 620000',
            'phone' => '8 (800) 350-55-32',
        ],
        [
            'title' => 'Распродажа украшений Avgvst',
            'text' => 'Скидки действуют и на сайте ювелирного бренда Avgvst, основанного местным дизайнером Натальей Брянцевой. Так, серьги с орнаментом теперь стоят 5 500 вместо 7 500 рублей, асимметричные серебряные — 4 800 вместо стартовых 6 тысяч рублей, а пуссеты с васильковым халцедоном — 5 600 вместо 7 тысяч рублей.',
            'img' => 'http://www.jewelry-in-august.com/u/lookbook/16/5e456edf1ed2092371e600b583782dfc.jpg',
            'brand' => '2',
            'cat' => '2',
            'address' => '',
            'phone' => '+7 (499) 322-45-13',
        ],
        [
            'title' => 'ПОДАРОК ИМЕНИННИКУ',
            'text' => 'Отмечаешь День Рождения? Устрой домашнюю вечеринку для друзей. Наших роллов хватит, чтобы накормить всех и каждого! Только подумай – два килограмма роллов по супернизкой цене, всего за 1199 рублей!',
            'img' => 'https://sushiwok.ru/img/d21b5d03020bd4edae862d5e7d3c3161/1024x1024',
            'brand' => '3',
            'cat' => '3',
            'address' => 'Екатеринбург, пр-т. Космонавтов, д.72',
            'phone' => '8 (343) 224-11-11',
        ],
        [
            'title' => 'Ликвидация техники модельного ряда 2018 г.',
            'text' => 'Ликвидация техники модельного ряда 2018 г. Скидки до 40%. Рассрочка на весь ассортимени. Бесплатная всех холодильников, смитральных машин и газовых плит.',
            'img' => 'http://tehnomarket.ru/upload/resize_cache/iblock/63c/175_120_2/63c7bd5a34ca34b39ab7d8d8183542ef.jpg',
            'brand' => '4',
            'cat' => '4',
            'address' => '623400, Свердловская обл., г. Каменск-Уральский, ул. Каменская, д. 82',
            'phone' => '+7 900 200-77-44',
        ],
        [
            'title' => 'Косметика из Азии со скидкой до 50%',
            'text' => 'Мыло, кремы для рук, маски, пилинги и скрабы, подарочные наборы, зубные пасты, кремы для лица, подгузники, кондиционеры для волос, ВВ кремы, детские масла и лосьоны, средства для мытья посуды, для уборки кухни, для стирки от брендов Clover, KAO, Labocare, Lioele, Lion, Japan Gals, Meishoku, Sana, Shabondama, Skin79, TonyMoly. 
Ждем вас за покупками!',
            'img' => 'https://images.wbstatic.net/poster/ru/action2/c660x210/470090566.jpg',
            'brand' => '5',
            'cat' => '5',
            'address' => 'г. Каменск-Уральский (Свердловская область), улица 4-й Пятилетки',
            'phone' => '8 (495) 775-55-05',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->actions as $action) {
            $date_start = Date::create('2019', '3', '1')
                ->getTimestamp()+mt_rand(0,40)*24*3600;
            $date_end = $date_start +mt_rand(60,80)*24*3600;
            DB::table('actions')->insert([
                'title' => $action['title'],
                'text' => $action['text'],
                'code' => Str::slug($action['title']),
                'date_start' => date('Y-m-d H:i:s',$date_start),
                'date_end' => date('Y-m-d H:i:s',$date_end),
                'rating' => mt_rand(100, 1000) / 100,
                'is_paid' => mt_rand(0, 1),
                'brand_id' => $action['brand'],
                'img' => $action['img'],
                'category_id' => $action['cat'],
                'address' => $action['address'],
                'phone' => $action['phone'],
                'created_at' => date('Y-m-d H:i:s',$date_start + mt_rand(-10,-5)*24*3600)
            ]);
        }
    }
}
