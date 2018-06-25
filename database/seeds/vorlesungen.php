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
        DB::insert("INSERT into vorlesungen values (1,'Betriebssysteme','Prof Dr. Müller Rainer',0, 1, NOW(),NOW())");
        DB::insert("INSERT into vorlesungen values (2,'Informations Systeme und Neue Medien','Prof. Dr. Thomas Hess',80,2, NOW(),NOW())");
        DB::insert("INSERT into vorlesungen values (3,'Physische Geographie','Prof. Dr. Jürgen Böhner',80,3, NOW(),NOW())");
        DB::insert("INSERT into vorlesungen values (4,'Erziehungs-Wissenschaft','Prof. Dr. Bettina Fritzsche',80,4, NOW(),NOW())");
        DB::insert("INSERT into vorlesungen values (5,'Pädagogische Psychologie','Prof. Dr. Thomas Fuhr',80,4, NOW(),NOW())");


    }
}
