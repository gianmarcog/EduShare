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
    }
}
