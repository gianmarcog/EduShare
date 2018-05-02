<?php

use Illuminate\Database\Seeder;
// php artisan db:seed --class=hochschulen
class hochschulen extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT into hochschulen values (1,'HTWG Konstanz','Konstanz',100, NOW(),NOW())");
        DB::insert("INSERT into hochschulen values (2,'Uni München','München',80, NOW(),NOW())");
        DB::insert("INSERT into hochschulen values (3,'Uni Hamburg','Hamburg',90, NOW(),NOW())");
    }
}
