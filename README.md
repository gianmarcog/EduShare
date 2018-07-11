[![N|Solid](https://edusharehtwg.herokuapp.com/image/EduShare.png)](https://edusharehtwg.herokuapp.com)
## 1. Beschreibung der Funktionalität
* 1.1 Use Cases
* 1.2 Wow-Faktor
* 1.3 Visual Design

## 2. Technische Implementierung
* 2.1 Design / CSS
* 2.2 MVC Umsetzung
* 2.3 Zweistufiger Geschäftsprozess (Session Handling)
* 2.4 Suche mit Parametern Geschäftsprozess (AJAX)
* 2.5 LaravelMix
* 2.6 SEO Kriterien
* 2.7 Security
* 2.8 Sonstige technische Umsetzungen: 
    *  Bewerten Funktionalität
    *  Ranking Ansicht
    *  Adminsitrator Interface
    *  Forum

---
### 1.1 Use Cases

**Nicht angemeldete Nutzer:**  
Nicht angemeldete Nutzer können z. B. Schüler sein, welche sich dann Dank der EduShare Plattform in der Ranking Rubrik über verschiedene Hochschulen, Vorlesungen und Aktivitäten des Studienortes, inklusiv Bewertung, informieren können.  
Weiterhin gibt es zu jeder Hochschule und Aktivität eine Informationsseite, in der immer ein Bild mit Beschreibung hinterlegt ist und auch die Bewertung nochmal graphisch dargestellt wird. Bei Hochschulen ist auf der Informationsseite zusätzlich der Standort auf Google Maps und die angebotenen Vorlesungen mit Bewertung hinterlegt.
Außerdem können sie natürlich die universelle Suche mit Filterfunktion benutzen, um z.B. alle Aktivitäten eines Ortes zu sehen.

**Angemeldeter Student:**  
Als angemeldeter Student hat man alle Funktionen die auch ein nicht angemeldeter Nutzer hat, allerdings auch noch einige Funktionen die exklusiv für angemeldete Studenten vorhanden sind.
Unter der Bewerten Rubrik können die eigene Hochschule inkl. den Vorlesungen und die Aktivitäten des Studienortes in Prozent einmalig bewertet werden.  
Das Forum bietet die Möglichkeit Fragen in verschiedenen Kategorien zu erstellen und Antworten zu schreiben.
Nach der Anmeldung können Account Daten noch bearbeitet werden und ein neues Profilbild hinzugefügt werden. Außerdem ist es möglich den eigenen Account inklusiv aller Forum Beiträge zu löschen.

**Administrator:**  
Der Adminstrator kann auf das Admin Interface zugreifen und dort alle Daten von Nutzern, Hochschulen, Vorlesungen und Aktivitäten ändern und löschen.
Außerdem dient er als Moderator des Forums und kann daher alle Beiträge und Fragen löschen.

### 1.2 Wow-Faktor

Die EduShare Plattform sticht aus der Menge der Internet Plattformen hervor, indem sie alle Bedürfnisse für Studenten und Studieninteressierte erfüllt.
Besonders ist vor allem das umfangreiche Ranking System, das Forum und die universelle, in Kategorien aufgeteilte, Suche.

### 1.3 Visual Design

Die EduShare Plattform nutzt ein modernes und einheitliches Design, welches es ermöglicht schnell und übersichtlich die gewünschten Funktionen zu erreichen.
Alle Seiten der Plattform sind durch das responsive Design mit jeder Art von Gerät gleich gut benutzbar.

---

### 2.1 Design / CSS
Für die Umsetzung des Designs/Layouts, haben wir das Bootstrap Framework genutzt und auf Grund unseres Style Tiles angepasst.
Die Farben haben wir gewählt um eine positive Ausstrahlung zu erzielen.

### 2.2 MVC Umsetzung

Für jede View existiert mindestens eine zugehörige Route, diese leitet dann i.d.R. auf einen Controller weiter, welcher dann Models nutzen kann um mit Tabellen zu interagieren. Die View wird dann mit den benötigten Parametern vom Controller zurück geliefert.
Die Routen sind dabei teilweise durch die Auth Middleware oder unsere eigene Admin Middleware geschützt (siehe Administrator Interface Umsetzung).
Außerdem nutzen wir Migrations und Seeder für eine einfache Wiederherstellung der Datenbank.

### 2.3 Zweistufiger Geschäftsprozess (Session Handling)
Den zweistufigen Geschäftsprozess haben wir im Forum, wenn einer neuer Beitrag erstellt wird, umgesetzt.
Wenn ein User einen neuen Beitrag erstellen will, muss er zuerst die Kategorie des Beitrags auswählen.  
Bei der Auswahl der Kategorie (in der forumCategory View) wird eine Post Request an den FourmController geschickt, dieser speichert dann die Kategorie durch die write_post Funktion in der Session ab.
```php
$request->session()->put("category", $request->get('category'));
```
Danach muss der User auf der nächsten Seite noch den Titel und Text des Beitrages schreiben. Nachdem er dies bestätigt, wird ein Forums Beitrag in der postQuestion Funktion erstellt und der ForumController ruft die davor gewählte Kategorie wieder aus der Session ab, um den Beitrag in der Datenbank zu speichern.
```php
$post->category_id = $request->session()->get("category");
```

### 2.4 Suche mit Parametern Geschäftsprozess (AJAX)
Die Suche mit Parametern ist als universelle Suche in den Kategorien Hochschulen, Vorlesungen und Aktivitäten umgesetzt.
Ein User gibt einen Such String ein und nach jedem 'keydown Event' wird eine XMLHttpRequest per POST an den SearchController gesendet.
```javascript
$('#search').on('keydown', function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/live',
        type: 'POST',
        dataType: 'html',
        data: {
            'value': $(this).val(),
            'filter': $('#filter').find(":selected").text()
        },
        success: function (data) {
            $('#searchOutput').html(data);
        }
    })
});
```
Der SearchController sucht dann in der Datenbank nach dem Such String und liefert die Ergebnisse als HTML zurück. Das div mit der ID searchOutput wird daraufhin durch diesen
HTML Code ersetzt.  
Außerdem ist es möglich durch einen ausgewählten Parmeter nur bestimmte Ergebnisse, wie z. B. Hochschulen, zu erhalten.
Dies funktioniert indem die in der searchresults View ausgewählte option im SearchController wieder aus der Request gelesen wird und dann mittels IF Anweisungen nur bestimmter
HTML Code erstellt wird.

### 2.5 LaravelMix

Mit Laravel-Mix haben wir sowohl von den CSS Dateien, als auch von den JS Dateien jeweils eine komprimierte Datei (combinedCss und combinedJS) erstellt (analog zur Vorlesung).
Im App Layout werden dann nur noch diese Datein geladen. Somit hat sich die Geschwindigkeit der Website deutlich verbessert.  
Die genauen Operationen stehen im webpack.mix.js.

### 2.6 SEO Kriterien

Für die SEO haben wir die EduShare Website in die Google Search Console eingetragen und eine Beschreibung für die Google Ergebnisse eingetragen.
```html
<meta name="google-site-verification" content="EthldYoBjtVdmUeCcbk_ZndULxHL11PKIvrd9T82GL0" />
<meta name="description" content="EduShare - Die Studenten Plattform von Studenten für Studenten!"/>
```
Die Website ist daher bei einer Google Suche z. B. nach "EduShare Konstanz" auf dem 1.Platz der Suchergebnisse und hat auch einen Eintrag als Google Business.  
Außerdem haben wir die Website komplett für mobile Geräte optimiert (mit dem Google Tool search.google.com/test/mobile-friendly), wodurch sich wieder eine deutlich
bessere Google Indexierung ergeben hat.

### 2.7 Security
Die komplette Website ist mit HTTPS verschlüsselt und jede Post Request ist CSRF geschützt. Aufgrund der CSRF-Funktion funktioniert die Anmeldung auch nur, wenn die
HTTPS Version der Website benutzt wird.
Das Nutzerpasswort wird auch in einen Hash umgewandelt und nur so in der Datenbank abgelegt.  
Das Administrator Interface ist außerdem durch eine Middleware geschützt und wenn ein User ohne Admin Rechte versucht auf den Link zuzugreifen bekommt er eine entsprechende Meldung, dass er nicht
autorisiert ist.

### 2.8 Sonstige technische Umsetzungen

**Account Seite:**  
Für einen angemeldeten User ist es möglich die E-Mail Adresse und die Hochschule zu verändern. Dies geschieht in dem UserController durch die update Funktion.
Außerdem kann er sein Profilbild durch die update_avatar Funktion verändern.  
Die Profilbild Funktion haben wir umgesetzt indem wir in der filesystems.php config Datei einen neuen Pfad unter disks hinzugefügt haben.
```php
'public_uploads' => [
            'driver' => 'local',
            'root'   => public_path() . '/image/ProfilePics',
        ],
```
In dem Controller UserController in der Funktion update_avatar, wird das vom User ausgewählte Bild verarbeitet, ein Dateiname mit dem Zeitstempel erstellt und dann in dem oben beschriebenen Pfad gespeichert. Danach wird noch der Dateiname
dem User als Avatar in der User Tabelle hinterlegt.
```php
Storage::disk('public_uploads')->putFileAs('/', $avatar, $filename)
```

**Bewerten Funktionalität:**  
Jeder angemeldete Nutzer kann für seine Hochschule, die Vorlesungen der Hochschule und die Aktivitäten seines Studienortes Bewertungen abgeben.
Nachdem er eine Bewertung abgegeben hat kann diese nicht mehr verändert werden.  
Das haben wir durch eine Bewertungen Tabelle umgesetzt, in der nach jeder neuen Bewertung ein neuer Eintrag mit dieser Bewertung und dem User erstellt wird. 
Gleichzeitig ruft der BewertenController in der store Funktion noch die refresh Funktion auf, welche dann dafür sorgt, dass die neue Durchschnittsbewertung für Hochschulen, 
Vorlesungen und Aktivitäten direkt berechnet wird und in die jeweiligen Rankings eingetragen wird.

**Ranking:**  
In der Ranking Ansicht sind alle vorhandenen Hochschulen, Aktivitäten und Vorlesungen mit ihrer Bewertung gelistet.
Alle Nutzer (auch nicht angemeldete) können sich so über Hochschulen etc. informieren und kommen dann jeweils auf eine Übersichtsseite.  
Auf den Hochschul Übersichtsseiten werden auch die dort angebotenen Vorlesungen mit ihrer Bewertung und eine Google Maps Karte mit dem Standort der Hochschule angezeigt.  
Für die Google Maps Umsetzung haben wir in der Developer Api Konsole von Google ein neues Projekt erstellt und dann einen Api Schlüssel mit den Diensten Maps JavaScript API
und Geocoding API erstellt. Dadurch ist es möglich zu jedem Hochschul-Namen die genau Adresse herauszufinden (Geocoding) und dann in einer Karte anzuzeigen.

**Administrator Interface:**  
Das Administrator Interface erreicht man, indem bei dem Dropdown Menü des Nutzernamens, auf den obersten Link ("admin") klickt.
Auf das Administrator Interface können nur Nutzer zugreifen, welche in der Rollen Tabelle als Administrator (role => 1) hinterlegt sind.  
Im Administrator Interface können alle Daten von Nutzern, Hochschulen, Vorlesungen und Aktivitäten bearbeitet und gelöscht werden.
Außerdem ist es möglich gleichzeitig mehrere Daten zu aktualisieren, wenn z. B. von mehreren Benutzern die Hochschule auf eine andere geändert werden soll.
Wenn ein Nutzer gelöscht wird, werden auch automatisch alle Forum Beiträge und Antworten von diesem Nutzer gelöscht. Dies haben wir mit den Model Relationships und Foreign Keys 
mit dem Constraint onDelete Cascade umgesetzt.  
Weiterhin haben alle Administratoren das Recht, alle Forum Beiträge zu löschen.
Die Kontrolle ob jemand ein Administrator ist, findet für Routen über die Middleware AdminCheck statt. In Views kann mit 
```php
@if(Auth::user()->isAdmin())
```
überprüft werden, ob ein Nutzer Admin Rechte besitzt. Über die isAdmin Funktion aus dem User Modell wird z. B. geregelt ob der Knopf für das Admin Interface dem User in seinen Account Funktionen angezeigt wird.

**Forum:**  
Im Forum können angemeldete Nutzer Beiträge erstellen und auf Beiträge Antworten.
Die Beiträge sind mit den Antworten über eine Model Relationship und den zugehörigen Foreign Keys verknüpft.  
Beim löschen eines Beitrages werden automatisch auch alle Antworten zu diesem Post über den Constraint onDelete Cascade mitgelöscht.
Jeder Beitrag hat einen Zeitstempel welcher mit 'diffforhumans' in eine verständliche zeitliche Differenz umgewandelt wird.
Zu jedem Beitrag wird außerdem der Ersteller, die Anzahl der Antworten und die Kategorie des Posts angezeigt.  
Ein normaler Nutzer kann nur seine eigenen Beiträge und Antworten löschen.
