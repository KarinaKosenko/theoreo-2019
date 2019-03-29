<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    protected $categories = [
        'Одежда',
        'Ювелирные украшения',
        'Продукты питания',
        'Бытовая техника',
        'Парфюмерия',
        'Услуги',
        'Компьютеры',
        'Авто',
        'Телефоны',
        'Все для офиса',
        'Аптека',
        'Все для дома',
        'Детский мир',
        'Досуг и развлечения',
        'Животные и растения',
        'Книги',
        'Красота и здоровье',
        'Музыка, видеофильмы',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->categories as $category){
            DB::table('categories')->insert([
                'name' => $category,
                'code' => Str::slug($category,'_'),
                'created_at' => Carbon::create('2019','3','1'),
            ]);
        }
    }
}
