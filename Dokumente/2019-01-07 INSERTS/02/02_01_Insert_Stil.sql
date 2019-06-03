USE kuenstler_DB;
SET NAMES utf8;

DELETE FROM kategorie WHERE kategorie_ID BETWEEN 200 AND 299;

INSERT INTO kategorie (kategorie_ID, Bezeichung, Beschreibung)
VALUE
(						201,'Grafiti','Moderne Kunst der 2000er'),
(						202,'Moderne Kunst','Die Zukunft gehört uns'),
(						203,'Städte','Veranschaulicht wie schön Städte sein können'),
(						204,'Das antike Griechenland','das Zeitalter der Griechen');

