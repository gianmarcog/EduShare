<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(hochschulen::class);
        $this->call(aktivitaeten::class);
        $this->call(vorlesungen::class);
        $this->call(kategorien::class);
    }
}
