<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountriesTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(ActionsTableSeeder::class);

        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(UserRoleTableSeeder::class);

        $this->call(UserInfosTableSeeder::class);
        $this->call(ActionCityTableSeeder::class);
        $this->call(ActionTagTableSeeder::class);
        $this->call(BrandCategoryTableSeeder::class);
        $this->call(BrandCityTableSeeder::class);

    }
}
