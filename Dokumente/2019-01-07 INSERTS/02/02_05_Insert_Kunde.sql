USE kuenstler_DB;
SET NAMES utf8;

-- Erst einmal doppelte IDs vermeiden; ergo: aufräumen
DELETE FROM eingeordnet 	WHERE `bild_ID` 	  BETWEEN 200 AND 299;
DELETE FROM bild     		WHERE `bild_ID`       BETWEEN 200 AND 299;
DELETE FROM kuenstler 		WHERE `kuenstler_ID`  BETWEEN 200 AND 299;
DELETE FROM login     		WHERE `kunden_ID`     BETWEEN 200 AND 299;
DELETE FROM kunde      		WHERE `kunden_ID`     BETWEEN 200 AND 299;

-- Kundendaten anlegen
INSERT INTO kunde ( kunden_ID, anrede, titel, vorname, nachname, adresse, plz, ort, geburtstag, email, telefon, reg_IP, reg_datum, status)
VALUES
(						201, 'Herr', NULL, 'Alfred', 'Zitterbacke', 'Am Mundwinkel 32','17034', 'Berlin', '1955-11-30', 'mundwinkel@gmx.com','030357354','10.10.45.211','2018-12-30 18:33:45','inaktiv'),
(						202, 'Frau', 'Dr.', 'Mareike', 'Musterfrau', 'Bahnhofstr. 143','13187', 'Berlin', '2000-05-25', 'dr.musterfrau@gmail.com','0306689132','20.100.27.78','2017-05-01 15:24:06','aktiv'),
(						203, 'Herr', NULL, 'David', 'Hasselhorst', 'Freedomweg 60','50667', 'Bremen', '1951-03-05', 'baywatch69@baywatch.com','01621245678','56.80.67.122','2017-08-25 12:41:30','gelöscht'),
(						204, 'Herr', 'Prof', 'Bernd', 'Bratfisch', 'Leistenweg 223','10543', 'Senftenberg', '1987-02-23', 'bernd.bratfisch@yahoo.com','03327654845','192.168.132.201','2017-10-22 11:32:30','aktiv');

-- Logindaten anlegen
INSERT INTO login ( kunden_ID, login, password)
VALUES
(						201,'AlfredZitterbacke',SHA2("PiFre1234",  256)),
(						202,'Mustermann',SHA2("PiFre1234",  256)),
(						203,'DavidFreiheit',SHA2("PiFre1234",  256)),
(						204,'Fisch',SHA2("PiFre1234",  256));


-- Künstlerdaten anlegen
INSERT INTO kuenstler ( kuenstler_ID,kunden_ID,avatar,portrait,pseudonym,iban,bic)			
VALUES
(						211,201,NULL,'Ich zeiche gerne Nachts, da bin ich am Krativsten','Mr. Zitter','DE34100223412370209299','BELADEBEXXX'),
(						212,202,NULL,'Malen nach Zahlen ist was für Anfänger','M.M','DE11520223735120715431','BEKADEFDXXX'),
(						213,203,NULL,NULL,'Freedom','DE11520223735120715431','BEKADEFDXXX'),
(						214,204,NULL,'Die Kunst ist eine Lebenseinstellung','Prof.Bratfisch','DE11520234735120715631','BEEADEPPXXX');

