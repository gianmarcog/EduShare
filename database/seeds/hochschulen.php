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
        DB::insert("INSERT into hochschulen values (1,'HTWG Konstanz','Konstanz',95, 'https://www.htwg-konstanz.de','Lassen Sie sich anstecken von der besonderen Atmosphäre des HTWG-Campus! 
Direkt am Ufer des Seerheins im Stadtteil Paradies gelegen ist es ein Ort, an dem Sie Ideen entwickeln können und ihre Realisierung gefördert wird. Wo Sie mit Mitstudierenden und Lehrenden in einer familiären Atmosphäre Grundlagen für Ihre persönliche Karriere schaffen und die Zukunft unserer Gesellschaft mitgestalten - dank unserer praxisnahen Lehre, internationalen Ausrichtung und interdisziplinärer Angebote.', NOW(),NOW())");
        DB::insert("INSERT into hochschulen values (2,'Uni München','München',80, 'https://www.uni-muenchen.de/index.html','Die LMU ist eine der führenden Universitäten in Europa mit einer über 500-jährigen Tradition. Wir setzen auf Weltoffenheit, Phantasie und zukunftsweisende Ideen – deshalb lade ich Sie herzlich dazu ein, mit uns an der LMU zu lernen, zu lehren und zu forschen!', NOW(),NOW())");
        DB::insert("INSERT into hochschulen values (3,'Uni Hamburg','Hamburg',90, 'https://www.uni-hamburg.de','Als größte Forschungs- und Ausbildungseinrichtung Norddeutschlands und einer der größten Universitäten in Deutschland vereint die Universität Hamburg ein vielfältiges Lehrangebot mit exzellenter Forschung.

Sie bietet ein breites Fächerspektrum mit zahlreichen interdisziplinären Schwerpunkten und verfügt über ein weitreichendes Kooperationsnetzwerk mit Spitzeneinrichtungen auf regionaler, nationaler und internationaler Ebene.', NOW(),NOW())");
    }
}
