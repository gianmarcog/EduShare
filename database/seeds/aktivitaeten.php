<?php

use Illuminate\Database\Seeder;

class aktivitaeten extends Seeder
{
    /**
     * php artisan db:seed --class=vorlesungen
     */
    public function run()
    {
        DB::insert("INSERT into aktivitaeten values (1,'Kletterwald','Konstanz',98,'Alles draußen, Alles drin! Der Kletterwald befindet sich ca. zwei Gehminuten vom Biergarten St. Katharina entfernt und ist während der Saison von Beginn der Osterferien bis zum Ende der Herbstferien täglich geöffnet. 
', NOW(),NOW())");
        DB::insert("INSERT into aktivitaeten values (2,'Fußballplatz','Konstanz',57,'Der Fußballplatz mitten in Konstanz. Der perfekte Ort um Tuniere zu halten und Tag und Nacht Fußball zu spielen', NOW(),NOW())");
    }
}
