= Aufgabe 5 Beschreiben Sie die User Interaktinoen beim optimistischen locking. Als welche Fälle können auftreten und wie soll die Softwware daraug reagieren. Legen Sie die Antworten entweder beschreibend als Textfile ab oder implementieren Sie dieses. 

Die grundsätzliche Idee ist, eine geänderte Ressource nur dann zu speichern, wenn ihr Zustand in der Datenbank noch derselbe ist wie vor dem Start der Transaktion (sprich beim Lesen).
Dies wird typischerweise gelöst, indem die Ressource während dem Speichern mit ihrem Ursprungszustand verglichen wird (oder etwas anderem Repräsentativen, beispielsweise einem Timestamp,
der sich bei jedem Speichern ändert.

== Fall 1

- User 1 liest Ressource. Timestamp ist T1.
- User 2 liest Ressource. Timestamp ist T1.
- User 1 will Ressource speichern. Originaler Timestamp ist T1, Timestamp in der DB ist ebenfalls T1. Ressource kann gespeichert werden. Neuer Timestamp ist T2.
- User 2 vergisst, was er vorher tun wollte.

== Fall 2
- User 1 liest Ressource. Timestamp ist T1.
- User 2 liest Ressource. Timestamp ist T1.
- User 1 will Ressource speichern. Originaler Timestamp ist T1, Timestamp in der DB ist ebenfalls T1. Ressource kann gespeichert werden. Neuer Timestamp ist T2.
- User 2 will Ressource speichern. Originaler Timestamp ist T1, Timestamp in der DB ist T2. Ressource kann nicht gespeichert werden.
Entweder beginnt User 2 mit seiner Änderung von vorne, oder clientseitig findet ein Merging statt.

= Aufgabe 6 Beschreiben Sie einen Deadlock

Bei einem Deadlock warten (mindestens) zwei Prozesse auf den/die jeweils anderen (und darum wird keiner je fertig). In Datenbanken tritt dieses Szenario typischerweise bei exklusiven Locks
auf mehr als ein Objekt auf.

Beispiel:

- Prozess 1 updated Objekt X und hat darum einen exclusive Lock.
- Zeitgleich updated Prozess 2 Objekt Y und hat darum darauf einen exclusive Lock.
- Danach will Prozess 1 Objekt Y updaten und wartet auf einen exclusive Lock von Objekt Y (den momentan Prozess 2 hält).
- Zeitgleich will Prozess 2 Objekt X updaten und wartet auf einen exclusive Lock von Objekt X (den momentan Prozess 1 hält).

Damit warten beide Prozesse auf den jeweils anderen.

= Aufgabe 7 Welche probleme durch mangelnde Transaktionsisolation können durch ein optimistisches locking behoben werden? 

Nur Lost Update.