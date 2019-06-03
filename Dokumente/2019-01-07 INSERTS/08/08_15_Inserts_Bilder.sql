USE kuenstler_DB;
SET NAMES utf8;



INSERT INTO `bild` (`bild_ID`, `kunden_ID`, `kuenstler_ID`, `Titel`, `Beschreibung`, `bild`, `bild_hoehe`, `bild_breite`, `preis`, `erscheinungsjahr`, `upload_ip`, `upload_datum`, `kauf_ip`, `kauf_datum`) VALUES
(801, 801, 811, 'Vögel', 'Vogelgruppe im Wasser. Baden verspielt in der Mittagssonne - Druck', 'vogel1_0801_.png', 450, 873, '150.00', 2016, '179.32.1.234', '2016-11-11 10:22:15', NULL, NULL),
(802, 801, 811, 'Katzen', 'Druck - Katze hat Vogel - Druck', 'vogel2_0801.png', 590, 394, '120.00', 2017, '191.23.111.123', '2017-01-12 10:22:15', NULL, NULL),
(803, 802, 812, 'Blumen', 'Gemälde - Aquarell - Blumen am Straßenrad', 'blume01_0802.png', 450, 450, '50.00', 2017, '212.81.43.12', '2017-03-03 10:42:41', NULL, NULL),
(804, 802, 812, 'Blumen', 'Gemälde - Aquarell - Klatschmohn in der Pampa', 'blume02_0802.png', 380, 284, '50.00', 2017, '212.81.43.12', '2017-03-03 10:42:41', NULL, NULL);



INSERT INTO `eingeordnet` (`bild_ID`, `kategorie_ID`) VALUES
(0801, 106),
(0802, 106),
(0803, 111),
(0804, 111);
