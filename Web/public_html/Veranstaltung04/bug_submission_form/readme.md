Uebung/Selbststudium Veranstaltung04
===============

HTML5/CSS/PHP-Form für Bugfiling


* bild/screenshot -> upload
* prio -> slider
* bugtype -> dropdown
* rueckruf erforderlich -> 1 checkbox
* reproduzierbar -> radio
* datum -> datetime
* re-captcha -> ext. library
* password -> wird php-seitig validiert (reicht, wenn als Var im Script abgelegt)

* required values: alle :) -> html5 - optional auch mit JS-Fallbacks

* validate:
* mail -> html5 - optional auch mit JS-Fallbacks
* website (http/s) -> html5 mit pattern - optional auch mit JS-Fallbacks
-> alles was client-seitig validiert wird, muss natürlich auch serverseitig validiert werden

* mail auslösen mit uploaded file als attachment -> swift / phpmailer

* speichern auf server FS -> inhalte des forms in datei + uploaded file (ev. mit einer sinnvollen ordner-struktur)

advanced++:
anbindung an dropbox API mit (credentials folgen per mail):
https://www.dropbox.com/developers/core/start/php
soll Ordner erstellen mit timestamp und mail-Adresse des Bug-Filers, sowie Files darin ablegen