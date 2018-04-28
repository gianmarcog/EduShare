<?php

use Illuminate\Database\Seeder;

class hochschulen extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT into hochschulen values ('HTWG Konstanz','Konstanz',100)");
    }
}
