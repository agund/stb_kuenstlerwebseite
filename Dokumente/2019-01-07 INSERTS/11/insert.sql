USE kuenstler_DB;
SET NAMES utf8;

INSERT INTO kunde
VALUES 
(1101, 'Frau', , 'Dora', 'Huppertz', 'Rosenstr. 3', '85346', 'Dottlsdorf', 12.09.1984, 'dora.h@gmx.de', '08342-3478', '123.123.123.123', 1546881566,'aktiv'),
(1102, 'Herr', 'Dr.', 'Ivan', 'Nonnendorfer', 'Gartenweg 7', '10117', 'Berlin', 01.03.1997, 'nonnendorfer@udk-berlin.de', '030-23659321', '123.123.123.123', 1546449551,'aktiv'),
(1103, 'Frau', 'Prof. Dr.', 'Akedoria','Sliwovitz-Peigel', 'Bochumer Str. 26', '13555', 'Berlin', 28.02.1981, 'Sliwovitz-Peigel@udk-berlin.de', '030-739642407', '123.123.123.123', 1546103951,'aktiv'),
(1142, 'Frau', , 'Nelly', 'Kupferberg', 'Kleinbottwarer Str. 16', '71723', 'Großbottwar', 05.12.1999, 'nelly@wired.com', '07148-67987', '123.123.123.123', 1545671701,'aktiv')


INSERT INTO kuenstler
VALUES
(1191, 1102, , 'Als Mitarbeiter an der Universität der Künste zu Berlin sehr an Weiterentwicklung modernster Kunstformen interessiert.', 'Ivan', 'DE12500105170648489890', 'INGDDEFFXXX'),
(1192, 1103, , 'Als Professoring an der Universität der Künste zu Berlin sehr an Bewertung und Weiterentwicklung modernster Kunstformen interessiert.', 'Schnucki', 'DE12500105170648489890', 'INGDDEFFXXX')


INSERT INTO login
VALUES
(1101, 'dori', SHA('dori', 256)),
(1102, 'ivan', SHA('ivan', 256)),
(1103, 'slivi', SHA('slivi', 256)),
(1142, 'nelly', SHA('nelly', 256))


INSERT INTO bild
VALUES
(1131, 1102, 1191, 'Ohne Titel 7', 'Exemplarische Darstellung der Ästhetischen Ansichten in der Wüpfanzperiode bis 1973.', 'Bilder/pic_1131.png', 648, 1152, 34000.84, 2019, 1546883963, , ,),
(1132, 1103, 1192,), 'Marianne lebt', 'Impression eines Gefühls beim Gedenken an die Tochter von Heinz.', 'Bilder/pic_1132.png', 1000, 2000, 280000.90, 2019, 1546884386, , ,)


INSERT INTO eingeordnet
VALUES
(1131, 101),
(1131, 106),
(1132, 101),
(1132, 106)