
/*kunden anlegen*/
INSERT INTO `kunde` (`kunden_ID`, 
		     `anrede`, `titel`, `vorname`, `nachname`, 
		     `adresse`, `plz`, `ort`, 
		     `geburtstag`, 
		     `email`, 
		     `telefon`, 
		     `reg_IP`, `reg_datum`, `status`)
VALUES  (601, 'Herr', 'Prof.', 'Martin', 'Fagott', 
		     'Schlichtweg 3', '30625', 'Hannover', 
		     '1964-05-02', 
		     'fagott@freenet.de', 
		     '051108154711-10', 
		     '', '2018-11-04 16:46:59', 'inaktiv'),
		    (602, 'Herr', NULL, 'Carsten', 'Vöglin', 
		     'Ammerstr. 29', '80336', 'München', 
		     '1998-08-15', 
		     '', 
		     '08946859264', 
		     '', '2018-11-07 17:46:59', 'inaktiv'),
		    (603, 'Frau', 
		     NULL, 
		     'Birthe', 'Lohne', 
		     'Postallee 301', '13224', 'Berlin', 
		     '2000-03-27', 
		     'nokunst@gmx.de', 
		     '', 
		     '', '2018-12-10 17:01:59', 'inaktiv'),
		    (604, 'Frau', 
		     'Dr.', 
		     'Mindra', 'Drudas', 
		     'Postallee 301', '15403', 'Berlin', 
		     '1977-12-01', 
		     '', 
		     '', 
		     '', '2019-01-04 17:01:59', 'inaktiv');

/*Logindaten anlegen*/
INSERT INTO login (kunden_ID, login, password)
VALUES  (0601, "Musikfreund", SHA2("frmu23_45", 256)),
        (0602, "keinerkanns", SHA2("3659_764", 256)),
        (0603, "metalwoman", SHA2("1k2u3n4s5t7l8o9s10", 256)),
        (0604, "Zirkusclown", SHA2("zum/heulen", 256));

/*kuenstler anlegen*/
INSERT INTO `kuenstler` (`kuenstler_ID`, 
			 `kunden_ID`, 
			 `avatar`, 
			 `portrait`, 
			 `pseudonym`, 
			 `iban`, `bic`) 
VALUES  (0601, 
        0601, 
        'fagott_avatar.jpg', 
        NULL, 
        'Mr. Fagott', 
        'DE85100500002367549821', 'DEUTDEHNXXX'),
        (602, 
        603, 
        'woman_avatar.jpg', 
        NULL, 
        'norsk jente', 
        'NO97300306149854216734', 'NDEANOKKXXX');

/*bilder einfügen*/
INSERT INTO `bild` (`bild_ID`, `kunden_ID`, `kuenstler_ID`, 
		    `Titel`, `Beschreibung`, 
		    `bild`, 
		    `bild_hoehe`, `bild_breite`, 
		    `preis`, 
		    `erscheinungsjahr`, 
		    `upload_ip`, `upload_datum`, 
		    `kauf_ip`, `kauf_datum`)
	VALUES(1, NULL, 0601, 
        'Die Frau und das Meer', 'Frauengesicht kombiniert mit Meer', 
        'frau_mit_meer_0601.png', 
        40, 80, 
        '120.00', 
        2018, 
        '172.5.9.8', '2019-01-04 19:10:49', 
        '0.0.0.0', '0000-00-00 00:00:00'),
        (2, 603, 602, 
        'schweigen', 'Mädchen für sich allein auf Metall gemalt', 
        'schweigen_0602.png', 
        80, 50, 
        '935.00', 
        2018, 
        '196.168.20.10', '2019-01-04 19:21:49', 
        '192.168.47.1', '2019-01-05 15:12:00'),
        (3, NULL, 602, 
        'auf den Flügeln', 'Adler in der Luft auf Metall gemalt', 
        'fluegel_0603.png', 
        53, 26, 
        '386.41', 
        2018, 
        '196.168.20.10', '2019-01-04 21:51:20', 
        '0.0.0.0', '0000-00-00 00:00:00'),
        (4, NULL, 601, 
        'Federn im Rausch von Farben', 'Bunte Federn', 
        'federn_0604.png', 
        60, 90, 
        '70.00', 
        2018, 
        '172.5.9.8', '2019-01-04 21:51:20', 
        '0.0.0.0', '0000-00-00 00:00:00'),
        (5, NULL, 601, 
        'verschmierter Tropfen', 'verschmierter Tropfen in Gelb und schwarz', 
        'tropfen_0605.png', 
        90, 120, 
        '367.90', 
        2016, 
        '172.5.9.8', '2019-01-06 05:49:20', 
        '0.0.0.0', '0000-00-00 00:00:00'),
        (6, 601, 601, 
        'Paar am Strand', 'Paar am Strand . Er in Auflösung.', 
        'verlust_0606.png', 
        90, 120, 
        '387.90', 
        2017, 
        '172.5.9.8', '2019-01-06 05:56:04', 
        '10.10.10.10', '2019-01-06 23:04:06'),
        (7, NUll, 601, 
        'Bier', 'Bier in verschiedenen Gläsern', 
        'bier_0607.png', 
        30, 60, 
        '29.90', 
        2018, 
        '172.5.9.8', '2019-01-06 06:10:24', 
        '0.0.0.0', '0000-00-00 00:00:00'),
        (8, NULL, 602, 
        'mondbschienen', 'Boot unter Mond auf Metall gemalt.', 
        'mondbeschienen_0608.png', 
        60, 30, 
        '559.28', 
        2017, 
        '196.168.20.10', '2019-01-06 15:27:41', 
        '0.0.0.0', '0000-00-00 00:00:00');

/*kategorie zuweisen*/
INSERT INTO `eingeordnet` (`bild_ID`, 
            `kategorie_ID`) 
VALUES ('601', '101'),
       ('602', '115'),
       ('603', '101'),
       ('604', '101'),
       ('605', '115'),
       ('606', '115'),
       ('607', '115'),
       ('608', '115');
