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
        DB::insert("INSERT into aktivitaeten values (2,'Fußballplatz','Konstanz',57,'Der Fußballplatz mitten in Konstanz. Der perfekte Ort um Turniere zu halten und Tag und Nacht Fußball zu spielen', NOW(),NOW())");
        DB::insert("INSERT into aktivitaeten values (3,'Berrys Club','Konstanz',90,'Der Club Berrys Konstanz bietet alles, was zu einer aufregenden Partynacht gehört. Feiert im Berrys Konstanz die fettesten Parties in stylischem Ambiente mit topaktueller Musik und allen Partykrachern!', NOW(),NOW())");
        DB::insert("INSERT into aktivitaeten values (4,'Wandertouren in und um Zürich','Zürich',50,'Die besten Wanderungen in Zürich und Umgebung. Hier bekommen Sie Geheimtipps von einheimischen Guides und erleben ein unvergleichliches Abenteuer.', NOW(),NOW())");


    }
}
