<?php

use Illuminate\Database\Seeder;

class vorlesungen extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT into vorlesungen values (1,'Betriebssysteme','Müller Rainer',0, 1, NOW(),NOW())");
        DB::insert("INSERT into vorlesungen values (2,'Rechner und Kommunikationssysteme','Schnell Ralph',80,1, NOW(),NOW())");
    }
}
