USE kuenstler_DB;
SET NAMES utf8;



INSERT INTO `kunde` (`kunden_ID`, `anrede`, `titel`, `vorname`, `nachname`, `adresse`, `plz`, `ort`, `geburtstag`, `email`, `telefon`, `reg_IP`, `reg_datum`, `status`) 
VALUES	(0701, 'Herr','Dr.',   'Paul', 'Gustav','Informastraße 9','65784','Dethausen', '1930-01-01', 'Gusta1@t-online.de', '0161 151 282 373', '99.122.97.5','2016-12-06 19:34:30', 'aktiv'),
(0702, 'Frau', NULL, 'Niza', 'Schulz','Prima Str. 56', '31547','Rodos','1945-10-14', 'nschulz@gmx.de', '0172 2 88 65 35',    '121.46.173.14', '2016-02-18 08:18:05', 'aktiv'), 
	   	(0703, 'Herr', NULL, 'Gerhard', 'Schmidt','Hoeherstr. 43','10123','Berlin', '1959-01-13','guschmidt@web.de', '030 9 32 99 12',    '217.71.111.12', '2017-05-02 19:06:23', 'aktiv'),
	   	(0704, 'Herr',NULL, 'Christian', 'Bodo', 'Alt-Großwitz 98','12247','Berlin','1971-05-12', 'bodo1971@web.de', '030 80 20 58 29',    '201.58.137.163', '2016-04-29 10:23:54', 'aktiv');

INSERT INTO `login` (`kunden_ID`, `login`, `password`) VALUES
(0701, 'PGusta',         SHA2("Gusta1234",256)  ),
(0702, 'Nitzara', SHA2("__nschulz!",256) ),
(0703, 'Aquamaler', SHA2("GerSchm1959",256)   ),
(0704, 'ChrisBOB',    SHA2("1209348756!",256) );


INSERT INTO `kuenstler` (`kuenstler_ID`,`kunden_ID`,`avatar`, `portrait`, `pseudonym`, `IBAN`, `BIC` ) VALUES
(0711, 0701,'0701.png', 'Auf dem Flohmarkt bin ich der absolute King.', 'PinselToll',
        'DE25 7601 0043 2988 4766 45', 'PBTZDEFF380' ),
(0712, 0702,'0702.png',  'Meine Begeisterung fürs Malen schlägt alles!','Niza', 
        'DE58 1331 0210 0072 7894 57', 'TZNKDEFFXXX' );




INSERT INTO `bild` 
(`bild_ID`, `kunden_ID`,`kuenstler_ID`, `titel`,`Beschreibung`,`bild`,`bild_hoehe`,`bild_breite`, `preis`, `erscheinungsjahr`, `upload_ip`,`upload_datum`,`kauf_ip`,`kauf_datum`
       ) VALUES
(0721,NULL,0711, 'Wale','Gemälde Wale ',"WaleFam.png", 1500, 1691,  '250.00',
        
       '2017-01-12',  '217.84.133.127', '2017-02-28 17:26:15', 
       NULL, NULL),
(0722,NULL,0711, 'Blumen','Gemälde - Aquarell - Blumen', "Blumen_1.png", 490, 544,  '190.00' ,
       
       '2014-03-13',  '217.81.33.12', '2017-02-12 11:12:43',
       NULL, NULL),
(0723,NULL,0711, 'Blumen','Gemälde Blumen Aquarell',"Blumen_2.png", 594, 460,    '150.00',
       
       '2014-06-00',  '217.81.43.12', '2017-03-03 11:42:41',
       NULL, NULL),
(0724,0703,0712, 'Kaffee', 'Gemälde Aquarell Kaffee in Paris',"Kaffee_001.png", 460, 594,   '180.00',
      
       '2015-08-24',  '217.81.55.61', '2017-03-28 14:40:05',
       '217.84.193.157', '2017-05-28 16:55:05'),
(0725,NULL,0712, 'Kaffee', 'Gemälde Aquarell Kaffee in Koblenz Aquarell',"Kaffee_002.png", 592, 428,   '130.00',
       
       '2015-08-24',  '217.81.12.21', '2017-05-11 13:21:16',
       NULL, NULL),
(0726,0704,0712, 'Selbstportrait','Zeichnung Marker Selbstportrait',"Selbstportrait.png",   240, 237,  '110.00',
       
       '2016-11-09',  '201.88.107.123', '2017-01-03 04:21:16',
       '217.84.173.177', '2017-11-08 08:02:05');


INSERT INTO `eingeordnet` (`bild_ID`, `kategorie_ID`) VALUES
(0721, 109),
(0722, 109),
(0723, 109),
(0724, 109),
(0725, 109),
(0726, 119);
