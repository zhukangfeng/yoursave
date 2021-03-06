<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

require_once(dirname(__FILE__) . '/UserTableSeeder.php');
require_once(dirname(__FILE__) . '/ShopTableSeeder.php');
require_once(dirname(__FILE__) . '/ShopUserTableSeeder.php');
require_once(dirname(__FILE__) . '/ProduceCompanyTableSeeder.php');
require_once(dirname(__FILE__) . '/ProduceCompanyUserTableSeeder.php');
require_once(dirname(__FILE__) . '/GoodKindTableSeeder.php');
require_once(dirname(__FILE__) . '/ConsumeTableSeeder.php');
require_once(dirname(__FILE__) . '/GoodTableSeeder.php');
require_once(dirname(__FILE__) . '/ShopGoodTableSeeder.php');

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(ShopTableSeeder::class);
        $this->call(ShopUserTableSeeder::class);
        $this->call(ProduceCompanyTableSeeder::class);
        $this->call(ProduceCompanyUserTableSeeder::class);
        $this->call(GoodKindTableSeeder::class);
        $this->call(ConsumeTableSeeder::class);
        $this->call(GoodTableSeeder::class);
        $this->call(ShopGoodTableSeeder::class);

        Model::reguard();
    }
}
