
USE kuenstler_DB;

INSERT INTO kunde ( kunden_ID, anrede, titel, vorname, nachname, adresse, plz, ort, geburtstag, email, telefon, reg_IP, reg_datum, status)
VALUES
(						0401, 'Frau', NULL, 'Andrea', 'Mueller', 'Berliner Allee 75','12435', 'Hamburg', '1957-09-12', 'mueller@gmx.com','030758445','192.10.89.2','2018-01-27 16:48:45','aktiv'),
(						0402, 'Herr', 'Dr.', 'Steffen', 'Haase', 'Bochumerstraße 101','10417', 'Berlin', '1995-07-01', 's.haase@aol.com','0309809576','8.171.134.66','2013-10-19 12:55:18','inaktiv'),
(						0403, 'Frau', NULL, 'Helene', 'Mangold', 'Landsberger Allee 3','13066', 'Aachen', '1934-02-25', 'mangold@goldmail.com','05064777','193.122.67.124','2014-10-18 07:56:30','gelöscht'),
(						0404, 'Herr', 'Prof', 'Horst', 'Apfelbaum', 'Straße 3','14687', 'München', '1996-12-01', 'horsti.aplletree@yahoo.com','03323577852','192.168.1.2','2012-05-17 14:45:25','aktiv');

INSERT INTO kuenstler ( kuenstler_ID,kunden_ID,avatar,portrait,pseudonym,iban,bic)			
VALUES
(						0411,0401,NULL,'Kunst ist eine Frage des Geschmacks','A.M','DE341002234123702786958','BELADECEXXX'),
(						0412,0402,NULL,'Meine Werke sind einmalig auf der Welt','hAAse','DE11520223735120869402','BEKADENDXXX'),
(						0413,0403,NULL,NULL,'Die Porträt-Zeichnerin Ihres vertrauens','DE11520223735120491547','BEKADEFDUXX'),
(						0414,0404,NULL,'Nur wer bei mir kauft der kauft Qualität','Appletree','DE11520234735120378516','BEEADEPRTXX');

INSERT INTO bild ( bild_ID, kunden_ID, kuenstler_ID, Titel,Beschreibung, bild ,bild_hoehe, bild_breite, preis, erscheinungsjahr, upload_ip, upload_datum, kauf_ip, kauf_datum)					
VALUES
(						0401,0401,0411,'Der Flug','Ein Fallschirmspringer während des freien Falls','der_flug.png',1980,1020,1475.00,2014,'192.10.89.2','2014-03-12 18:45:45','0.0.0.0','0000-00-00 00:00:00'),
(						0402,0402,0412,'Amsterdam unter Sternen','Zeigt die wunderschöne Stadt Amsterdam bei Nacht','amsterdamByNight.png',1980,1020,16764.00,2015,'8.171.134.66','2015-01-01 00:03:45','10.55.32.120','2016-11-25 13:12:26'),
(						0403,0403,0413,'Die arme Armut','Ein Obdachloser der nach Geld bettelt','arme_armut.png',800,600,78679.99,2001,'193.122.67.124','2001-06-04 10:35:03','0.0.0.0','0000-00-00 00:00:00'),
(						0404,0404,0414,'Ein neuer Tag','Wundervolle und kräftige Farben beim Sonnenaufgang auf Hawaii','hawaii.png',1980,1020,160.80,2018,'192.168.1.2','2018-08-12 07:12:35','0.0.0.0','0000-00-00 00:00:00');

INSERT INTO login ( kunden_ID, login, password)
VALUES
(						0401,'A.Mueller','Muellerisbest'),
(						0402,'Haaze','bestermaler'),
(						0403,'Goldi','goldilocke'),
(						0404,'iloveApple','applesaregood');

INSERT INTO kategorie (kategorie_ID, Bezeichung, Beschreibung)
VALUE
(						0401,'zeitgenössische Kunst','Kunst, die von Zeitgenossen hergestellt und von anderen Zeitgenossen als bedeutend wahrgenommen wird.'),
(						0402,'Barock','Der Barock umfasst in der Kunstgeschichte die Zeit zwischen der Renaissance und dem Klassizismus.'),
(						0403,'Romantik','Die Romantik ist nicht durch eine besondere Mal- oder Stilart geprägt, vielmehr geht es in dieser Epoche um das Brechen klassischer Normen und die Rückbesinnung auf die Natur, Geschichte und Religion.'),
(						0404,'Rokoko','Der Übergang vom Barock zum Rokoko (franz. rocaille-Muschel) ist fließend, weswegen das Rokoko auch als Spätbarock bezeichnet wird.');

INSERT INTO eingeordnet(bild_ID, kategorie_ID)
VALUES
(						0401,0402),
(						0401,0402),
(						0401,0403),
(						0401,0402);