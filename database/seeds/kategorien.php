<?php

use Illuminate\Database\Seeder;

class kategorien extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT into categories values (1,'Netflix', NOW(),NOW())");
        DB::insert("INSERT into categories values (2,'Sport', NOW(),NOW())");
        DB::insert("INSERT into categories values (3,'Chillen', NOW(),NOW())");
        DB::insert("INSERT into categories values (4,'Entspannen', NOW(),NOW())");
    }
}
