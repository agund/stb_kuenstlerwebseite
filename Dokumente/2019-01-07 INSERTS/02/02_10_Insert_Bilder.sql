USE kuenstler_DB;
SET NAMES utf8;

-- Erst einmal doppelte IDs vermeiden; ergo: aufräumen
DELETE FROM eingeordnet WHERE bild_ID BETWEEN 200 AND 299;
DELETE FROM bild   WHERE Kuenstler_ID BETWEEN 200 AND 299;


INSERT INTO bild ( bild_ID, kunden_ID, kuenstler_ID, Titel,Beschreibung, bild ,bild_hoehe, bild_breite, preis, erscheinungsjahr, upload_ip, upload_datum, kauf_ip, kauf_datum)					
VALUES
(						201,201,211,'Es Zittert sehr','Schaut man länger hin denkt man das Bild zittert vor sich hin','pic_201.png',1980,1020,1230.00,2015,'10.10.45.211','2015-04-10 18:00:45',NULL,NULL),
(						202,202,212,'Obstschale 2.0','So farbenfroh kann Obst sein und zugleich Gesund','pic_202.png',1980,1020,10.00,1990,'20.100.27.78','2000-02-14 11:22:45','10.55.32.120','2017-10-12 12:12:12'),
(						203,203,213,'Freiheit ist alles','Dieses Bild soll ausdrücken wie wichtig Freiheit für jeden Menschen ist.','pic_203.png',800,600,5000.00,2011,'56.80.67.122','2011-04-10 11:33:45',NULL,NULL),
(						204,204,214,'Hamburger Hafen bei Tag','So wunderschön kann der Hambuger bei Tag sein, er erstrahlt in seiner vollen farbpracht. ','pic_204.png',1980,1020,160.80,2015,'192.168.132.201','2018-04-10 10:12:52',NULL,NULL);


INSERT INTO eingeordnet(bild_ID, kategorie_ID)
VALUES
(						201,202),
(						201,202),
(						201,203),
(						201,202);