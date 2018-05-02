<?php

use Illuminate\Database\Seeder;

class aktivitaeten extends Seeder
{
    /**
    php artisan db:seed --class=vorlesungen

     */
    public function run()
    {
        DB::insert("INSERT into aktivitaeten values (1,'Kletterwald','Konstanz',98, NOW(),NOW())");
        DB::insert("INSERT into aktivitaeten values (2,'Fußballplatz','Konstanz',57, NOW(),NOW())");
    }
}
