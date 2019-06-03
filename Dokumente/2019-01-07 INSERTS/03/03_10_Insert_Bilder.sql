USE kuenstler_DB;
SET NAMES utf8;

-- Erst einmal doppelte IDs vermeiden; ergo: aufräumen
DELETE FROM eingeordnet WHERE bild_ID BETWEEN 300 AND 399;
DELETE FROM bild   WHERE Kuenstler_ID BETWEEN 300 AND 399;


INSERT INTO bild (bild_ID, kunden_ID, kuenstler_ID, Titel, Beschreibung, bild, bild_hoehe, bild_breite, preis, erscheinungsjahr,upload_ip, upload_datum, kauf_ip, kauf_datum)					
VALUES
(						0301,
						0301,
						0301,
						'Die fliegende Ratte',
						'Eine Ratte die so gemalt ist als würde sie durch den Raum fliegen.',
						'pic_201.png',
						500,
						800,
						1230.00,
						1956,
						'10.10.45.211',
						'2015-04-10 18:00:45',
						'NULL',
						'NULL'
),
(						0302,
						0301,
						0301,
						'Aktbild von Erik',
						'Ihr wisst was auf euch zukommt.',
						'pic_202.png',
						1000,
						1000,
						5000.00,
						2018,
						'11.13.251.21',
						'2018-06-12 18:00:45',
						'NULL',
						'NULL'
),
(						0303,
						0304,
						0304,
						'Der Nullbock',
						'Ein Bock auf einer Wiese der einfach keine Lust mehr hat.',
						'pic_203.png',
						1250,
						2000,
						3500.00,
						2010,
						'215.50.15.12',
						'2010-05-11 17:00:45',
						'NULL',
						'NULL'
),
(						0304,
						0304,
						0304,
						'Ein Haus bei Nacht',
						'Es ist Dunkel und da steht ein Haus.',
						'pic_204.png',
						800,
						600,
						100.00,
						2015,
						'84.64.23.18',
						'2015-12-31 15:00:45',
						'NULL',
						'NULL'
);

INSERT INTO eingeordnet(bild_ID, kategorie_ID)
VALUES
(						301,
						302
),
(						302,
						303
),
(						303,
						303
),
(						304,
						304
);