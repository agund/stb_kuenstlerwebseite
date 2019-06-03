USE kuenstler_DB;
SET NAMES utf8;

-- Erst einmal doppelte IDs vermeiden; ergo: aufräumen
DELETE FROM kuenstler WHERE `kuenstler_ID` BETWEEN 300 AND 399;
DELETE FROM login     WHERE `kunden_ID`    BETWEEN 300 AND 399;
DELETE FROM kunde     WHERE `kunden_ID`    BETWEEN 300 AND 399;

-- Kundendaten anlegen
INSERT INTO kunde (kunden_ID, anrede, titel, vorname, nachname, adresse, plz, ort, geburtstag, email, telefon, reg_IP, reg_datum, status)
VALUES
(						0301, 'Herr', 
						'Dr.', 
						'John', 
						'Longhorse', 
						'Grauammerpfad 32',
						'12555', 
						'Berlin', 
						'1955-12-30', 
						'john.longhorse@ownmxsrv.com',
						'030 / 6897354',
						'10.10.231.248',
						'2018-12-30 18:33:45',
						'aktiv'
),
(						0302, 
						'Frau', 
						'', 
						'Jaina', 
						'Proudmoore', 
						'Winterfeldstr. 712',
						'13187', 
						'Berlin', 
						'2003-05-25', 
						'jaina.proudmoore@blizzard.com',
						'030 / 5689132',
						'12.15.27.78',
						'2018-01-01 16:24:06',
						'aktiv'
),
(						0303, 
						'Herr', 
						'Dr. Prof.', 
						'Harry', 
						'Dreckig', 
						'Brehmestraße 60',
						'50667', 
						'Köln', 
						'1968-03-05', 
						'dirtyharry@gmx.de',
						'0221 / 1245678',
						'56.122.28.253',
						'2018-06-25 12:31:30',
						'aktiv'
),
(						0304, 
						'Frau', 
						'Prof. Dr. Dr.', 
						'Sabine', 
						'Langenfeldt', 
						'Dorfstraße 22',
						'04600', 
						'Altenburg', 
						'1996-02-23', 
						'sabine.l@email.com',
						'03447 / 27659845',
						'15.127.132.201',
						'2017-12-05 18:32:30',
						'aktiv'
);

-- Logindaten anlegen
INSERT INTO login ( kunden_ID, login, password)
VALUES
(						0301, 
						'longhorse', 
						SHA2("long12345", 256)
),
(						0302, 
						'proudmoore', 
						SHA2("proud1989", 256)
),
(						0303, 
						'harry', 
						SHA2("dirtyharry", 256)
),
(						0304, 
						'sabi4711', 
						SHA2("47114711", 256)
);


-- Künstlerdaten anlegen
INSERT INTO kuenstler (kuenstler_ID,kunden_ID, avatar, portrait, pseudonym, iban, bic)			
VALUES
(						0301,
						0301,
						NULL,
						'Ich bin JCool und male gerne Bilder von außergewöhnlichen Wänden.',
						'JCool',
						'DE27100777770209299700',
						'BELADEBEXXX'
),
(						0304,
						0304,
						NULL,
						'Ich die Sabine, bin meiner Meinung nach die beste Künstlerin der Welt!',
						'Sabse4711',
						'DE11520513735120710131',
						'BELADEBEXXX'
);
