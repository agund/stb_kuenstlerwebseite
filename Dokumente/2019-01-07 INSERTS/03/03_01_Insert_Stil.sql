USE kuenstler_DB;
SET NAMES utf8;

DELETE FROM kategorie WHERE kategorie_ID BETWEEN 300 AND 399;

INSERT INTO kategorie (kategorie_ID, Bezeichung, Beschreibung)
VALUE
(						301,
						'Grafiti',
						'Moderne Kunst der 2000er'
),
(						302,
						'Moderne Kunst',
						'Die Zukunft gehört uns'
),
(						303,
						'Städte',
						'Veranschaulicht wie schön Städte sein können'
),
(						304,
						'Das antike Griechenland',
						'das Zeitalter der Griechen'
);

