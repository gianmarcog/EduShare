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
        DB::insert("INSERT into hochschulen values (1,'HTWG Konstanz','Konstanz',50, 'https://www.htwg-konstanz.de','Lassen Sie sich anstecken von der besonderen Atmosphäre des HTWG-Campus! 
Direkt am Ufer des Seerheins im Stadtteil Paradies gelegen ist es ein Ort, an dem Sie Ideen entwickeln können und ihre Realisierung gefördert wird. Wo Sie mit Mitstudierenden und Lehrenden in einer familiären Atmosphäre Grundlagen für Ihre persönliche Karriere schaffen und die Zukunft unserer Gesellschaft mitgestalten - dank unserer praxisnahen Lehre, internationalen Ausrichtung und interdisziplinärer Angebote.', NOW(),NOW())");
        DB::insert("INSERT into hochschulen values (2,'Uni München','München',50, 'https://www.uni-muenchen.de','Die LMU ist eine der führenden Universitäten in Europa mit einer über 500-jährigen Tradition. Wir setzen auf Weltoffenheit, Phantasie und zukunftsweisende Ideen – deshalb lade ich Sie herzlich dazu ein, mit uns an der LMU zu lernen, zu lehren und zu forschen!', NOW(),NOW())");
        DB::insert("INSERT into hochschulen values (3,'Uni Hamburg','Hamburg',50, 'https://www.uni-hamburg.de','Als größte Forschungs- und Ausbildungseinrichtung Norddeutschlands und einer der größten Universitäten in Deutschland vereint die Universität Hamburg ein vielfältiges Lehrangebot mit exzellenter Forschung. Sie bietet ein breites Fächerspektrum mit zahlreichen interdisziplinären Schwerpunkten und verfügt über ein weitreichendes Kooperationsnetzwerk mit Spitzeneinrichtungen auf regionaler, nationaler und internationaler Ebene.', NOW(),NOW())");
        DB::insert("INSERT into hochschulen values (4,'Pädagogische Hochschule Freiburg','Freiburg',50, 'https://www.ph-freiburg.de','An der Pädagogischen Hochschule Freiburg studieren derzeit ca. 5.000 Studierende – betreut werden sie von 250 Dozentinnen und Dozenten. Mit einem breiten Spektrum an Bachelor- und Masterstudiengängen bietet die Hochschule eine exzellente forschungsbasierte Erstausbildung bzw. Weiterbildung, die sich durch ein hohes Maß an sinnvoll integrierten und professionell begleiteten anwendungs- und praxisorientierten Anteilen auszeichnen. Seit der Umstellung des Staatsexamens auf die Bologna-Struktur kooperiert die Pädagogische
Hochschule eng mit der Albert-Ludwigs-Universität Freiburg. Mit dem Freiburg Advanced Center of Education (FACE) hat die Lehrkräftebildung in Freiburg ein neues Gesicht bekommen. Das FACE der beiden Hochschulen bildet ein Netzwerk für die gemeinsame Arbeit an der Lehrkräftebildung und ist damit die zentrale Struktur für alle Akteur/-innen. Vier tragende Säulen sind unter dem Dach des FACE zusammengeführt: Lehre, Praxis und Weiterbildung, Bildungsforschung sowie Qualitätssicherung. FACE bietet ein Onlineportal bzw. einen Onlinecampus mit allen wichtigen Informationen, Neuerungen und Austauschmöglichkeiten für das Lehramt. Die Studierenden erhalten dadurch einen Raum für ihr Selbstverständnis als Lehramtsanwärter/-innen.
Aufgrund dieser Kooperation deckt die Pädagogische Hochschule alle Stufen des Lehramtes ab: Primarstufe, Sekundarstufe 1 und Sekundarstufe 2. Weiter ist das international-sprachliche und mathematisch-naturwissenschaftliche Profil der Hochschule immer wieder ausschlaggebend, für die Studiumswahl an der Pädagogischen Hochschule Freiburg.', NOW(),NOW())");
    }
}
