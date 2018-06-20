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
        DB::insert("INSERT into categories values (1,'Allgemein', NOW(),NOW())");
        DB::insert("INSERT into categories values (2,'Studium', NOW(),NOW())");
        DB::insert("INSERT into categories values (3,'Freizeit', NOW(),NOW())");
        DB::insert("INSERT into categories values (4,'Vorlesung', NOW(),NOW())");
    }
}
