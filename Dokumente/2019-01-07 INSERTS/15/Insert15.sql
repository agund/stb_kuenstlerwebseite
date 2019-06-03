USE kuenstler_DB;
SET Names utf8;

INSERT INTO `kunde` VALUES
('1501', 'Herr', '0', 'Karl', 'Maier', 'Am Waldweg 2', '75173', 'Pforzheim',  '1980-012-07', 'Maier_Karl@gmx.de', '07321-5577628', '174.135.57.62', '2018-11-13 15:37:45', 'aktiv'),
('1502', 'Frau', '0', 'Simone', 'Schmidt', 'Strandpromenade 10', '18546', 'Sassnitz', '1979-03-28', 'sschmidt@yahoo.de', '0', '194.174.75.20', '2017-02-12 17:54:43', 'aktiv'),
('1503', 'Frau', '0', 'Joan', 'Rahn', 'Hauptstraße 5b', '79104', 'Freiburg', '1975-05-15', 'blondschopf@gmail.de', '0761-34973129', '120.115.71.32', '2018-05-30 06:20:01', 'aktiv'),
('1504', 'Herr', '0', 'Louis', 'Kraft', 'Reichenhaller Straße 7', '81547', 'München', '1972-05-16', 'KraftLouis@t-online.de', '0', '174.128.20.32', '2017-10-07 00:01:35', 'aktiv');


INSERT INTO `kuenstler` VALUES
('1501', '1501', '0', '0', 'MagicMaier', 'DE97 5003 0100 1449 6873 65', 'BELADEBEXXX'),
('1504', '1504', '0', '0', 'Muckiart', 'DE34 5468 2300 1452 3006 45', 'GENODEF1JEV');


INSERT INTO `login` VALUES
('1501', 'MagicMaier', SHA2("!DgCBzv2018!", 256)),
('1502', 'Schmidty', SHA2("EisHockey55", 256)),
('1503', 'Blondi', SHA2("PrimeTime007#", 256)),
('1504', 'Mucki-Louis', SHA2("MaRaThOn!!", 256));


INSERT INTO `bild` VALUES
('1501', '1504', '1504', 'Blumenbaum', 'Baum aus Blumen', 'pic_1501.jpg', '295', '295', '270', '2010', '174.128.20.15', '2015-08-25 12:17:34', '0.0.0.0', '0001-01-01 00:00:00'),
('1502', '1504', '1504', 'Bäume im Gewitter', 'Bäume im Gewitter', 'pic_1502.jpg', '115', '145', '360', '2008', '174.128.20.15', '2013-05-02 19:23:48', '194.172.52.35', '2013-10-09 07:08:23'),
('1503', '1504', '1504', 'Dynamik eines Gesichts', 'Dynamik eines Gesichts', 'pic_1503.jpg', '60', '80', '189', '2001', '174.128.20.15', '2015-12-20 23:01:38', '194.174.75.23', '2016-01-17 15:35:24'),
('1504', '1501', '1501', 'Das Boot', 'Künstler in einem Papierboot', 'pic_1504.jpg', '120', '180', '163', '1999', '174.135.57.67', '2015-07-16 16:36:24', '0.0.0.0', '0001-01-01 00:00:00'),
('1505', '1501', '1501', 'Stadtbild', 'Skyline in abstrakter Malerei', 'pic_1505.jpg', '120', '180', '250', '1990', '174.135.57.67', '2015-07-16 16:37:58', '194.178.57.41', '2015-11-24 14:25:52'),
('1506', '1501', '1501', 'Abendmahl Playmobile', 'Abendmahl mal anders', 'pic_1506.png', '90', '140', '430', '2003', '174.135.57.67','2015-08-25 12:17:34', '0.0.0.0', '0001-01-01 00:00:00'),
('1507', '1501', '1501', 'O(h)rchester', 'Gesicht und Instrumente', 'pic_1507.jpg', '70', '140', '280', '2001', '174.135.57.67', '2016-02-26 10:23:45', '0.0.0.0', '0001-01-01 00:00:00');


INSERT INTO `eingeordnet` VALUES
('1501','116'),
('1502','116'),
('1503','108'),
('1504','124'),
('1505','101'),
('1506','120'),
('1507','113');