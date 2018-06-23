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

**Angemeldeter Student**
Als Student kann man Hochschulen und Vorlesungen bewerten, sich über Aktivitäten in dem jeweiligem Studienort informieren und diese ebenso bewerten. 
Das Forum bietet die Möglichkeit Fragen und Antworten zu schreiben oder sonstige Beiträge zu erstellen.

**Nicht angemeldete Nutzer**
Nicht angemeldete Nutzer können z. B. Schüler bzw. Studieninteressierte sein, welche sich dann Dank der EduShare Plattform über verschiedene Hochschulen und die Aktivitäten des Studienortes informieren können.
Durch das Ranking System können Nutzer direkt einen Überblick über die Vorlesungen und Aktivitäten erhalten.

**Administrator**
Der Adminstrator kann auf das Admin Interface zugreifen und dort alle Daten von Nutzern, Hochschulen, Vorlesungen und Aktivitäten bearbeiten und löschen. 
Außerdem dient er als Moderator in dem Forum und kann daher das Recht alle Beiträge zu löschen.

### 1.2 Wow-Faktor

Die EduShare Plattform sticht aus der Menge der Internet Plattformen hervor, indem sie alle Bedürfnisse für Studenten und Studieninteressierte erfüllt.
Besonders ist vor allem das umfangreiche Ranking System, das Forum und die universelle, in Kategorien aufgeteilte, Suche.

### 1.3 Visual Design

Die EduShare Plattform nutzt ein modernes und einheitliches Design, welches es ermöglicht schnell und übersichtlich die gewünschten Funktionen zu erreichen.
Alle Seiten der Plattform sind durch das responsive Design mit jeder Art von Gerät gleich gut benutzbar.

---

### 2.1 Design / CSS
Für die Umsetzung des Designs/Layouts, haben wir das Bootstrap Framework genutzt und auf Grund unseres Style Tiles verändert.
Die Farben haben wir gewählt um eine positive Ausstrahlung zu erzielen.

### 2.2 MVC Umsetzung
Für jede View existiert mindestens eine zugehörige Route, diese leitet, wenn ein Datenbank Zugriff stattfinden soll, auf einen Controller weiter, welcher dann ein Model nutzt um mit Tabellen zu interagieren. Die View wird dann mit den benötigten Parametern vom Controller zurück geliefert.

### 2.3 Zweistufiger Geschäftsprozess (Session Handling)
Den zweistufigen Geschäftsprozess haben wir im Forum, bei einer neuen Beitrags-Erstellung, umgesetzt.
Wenn ein User einen neuen Beitrag erstellen will, muss er zuerst die Kategorie des Beitrags auswählen.
Bei der Azswahl der Kategorie wird eine Post Request an den Controller geschickt, dieser speichert dann die Kategorie in der Session ab.
```php
$request->session()->put("category",$request->get('category'));
```
Danach muss der User auf der nächsten Seite noch den Titel und Text des Beitrages schreiben. Nachdem er dies bestätigt, wird ein Forums Beitrag erstellt und der Controller ruft die davor gewählte Kategorie wieder aus der Session ab, um den Beitrag in der Datenbank zu speichern.
```php
$post->category_id = $request->session()->get("category");
```

### 2.4 Suche mit Parametern Geschäftsprozess (AJAX)
Die Suche mit Parametern ist als universelle Suche in den Kategorien Hochschulen, Vorlesungen und Aktivitäten umgesetzt.
Ein User gibt einen Such String ein und sofort wird eine XMLHttpRequest per POST gesendet.
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
Der Controller sucht dann in der Datenbank nach dem Such String und liefert die Ergebnisse als HTML zurück. 
Außerdem ist es möglich durch einen ausgewählten Parmeter nur bestimmte Ergebnisse, wie z. B. Hochschulen, zu erhalten.

### 2.5 LaravelMix

//ToDO

### 2.6 SEO Kriterien

Für die SEO haben wir die EduShare Website in die Google Search Console eingetragen und eine Beschreibung für die Google Ergebnisse eingetragen.
```html
<meta name="google-site-verification" content="EthldYoBjtVdmUeCcbk_ZndULxHL11PKIvrd9T82GL0" />
<meta name="description" content="EduShare - Die Studenten Plattform von Studenten für Studenten!"/>
```
Die Website ist daher bei einer Google Suche z. B. nach "EduShare Konstanz" auf dem 1.Platz der Suchergebnisse und hat auch einen Eintrag als Google Business.

### 2.7 Security
Die komplette Website ist mit HTTPS verschlüsselt und jede Post Request ist CSRF geschützt.
Das Nutzerpasswort wird auch in einen Hash umgewandelt und nur so in der Datenbank abgelegt.

### 2.8 Sonstige technische Umsetzungen

**Bewerten Funktionalität**
Jeder angemeldete Nutzer kann für seine Hochschule, die Vorlesungen der Hochschule und die Aktivitäten seines Studienortes Bewertungen abgeben.
Nachdem er eine Bewertung abgegeben hat kann diese nicht mehr verändert werden und wird automatisch mit allen bisher abgegebenen Bewertungen für diese Entität verrechnet und die neue Durchschnittsbewertung wird automatisch in den Datenbankeintrag der Entität hinzugefügt.

**Ranking**
In der Ranking Ansicht sind alle vorhandenen Hochschulen, Aktivitäten und Vorlesungen mit ihrer Bewertung gelistet.
Alle Nutzer (auch nicht angemeldete) können sich so über Hochschulen etc. informieren und kommen dann jeweils auf eine Übersichtsseite.
Auf den Hochschul Übersichtsseiten werden auch die zugehörigen Vorlesungen mit ihrer Bewertung angezeigt.

**Administrator Interface**
Auf das Administrator Interface können nur Nutzer zugreifen, welche in der Rollen Tabelle als Administrator hinterlegt sind.
Im Administrator Interface können alle Daten von Nutzern, Hochschulen, Vorlesungen und Aktivitäten bearbeitet und gelöscht werden. 
Wenn ein Nutzer gelöscht wird, werden auch automatisch alle Forums Beiträge und Antworten von diesem Nuter gelöscht. Dies haben wir mit den Model Relationships und Foreign Keys mit dem Constraint onDelete Cascade umgesetzt.
Weiterhin haben alle Administratoren das Recht, alle Forums Beiträge zu löschen.
Die Kontrolle ob jemand ein Administrator ist und somit auf eine Route zugreifen darf, findet über die Middleware AdminCheck statt.

**Forum**
Im Forum können angemeldete Nutzer Beiträge erstellen und auf Beiträge Antworten.
Die Beiträge sind mit den Antworten über eine Model Relationship und den zugehörigen Foreign Keys verknüpft.
Beim löschen eines Beitrages werden automatisch auch alle Antworten zu diesem Post über den Constraint onDelete Cascade mitgelöscht.
Jeder Beitrag hat einen Zeitstempel welcher mit 'diffforhumans' in eine verständliche zeitliche Differenz umgewandelt wird.
Zu jedem Beitrag wird außerdem der Ersteller, die Anzahl der Antworten und die Kategorie des Posts angezeigt.
Ein normaler Nutzer kann nur seine eigenen Beiträge und Antworten löschen.
