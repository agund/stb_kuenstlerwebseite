USE kuenstler_DB;
SET NAMES utf8;

-- Erst einmal doppelte IDs vermeiden; ergo: aufräumen
DELETE FROM kategorie WHERE kategorie_ID=135;
DELETE FROM kuenstler WHERE `kuenstler_ID` BETWEEN 1700 AND 1799;
DELETE FROM login     WHERE `kunden_ID`    BETWEEN 1700 AND 1799;
DELETE FROM kunde     WHERE `kunden_ID`    BETWEEN 1700 AND 1799;
DELETE FROM eingeordnet WHERE bild_ID BETWEEN 1700 AND 1799;
DELETE FROM bild   WHERE Kuenstler_ID BETWEEN 1700 AND 1799;

INSERT INTO kategorie ( kategorie_ID, Beschreibung, Bezeichung ) VALUES 
  (135,
   "<p>2010 maßgeblich vom innovativen Künstler badboynele geprägte Stilrichtung der Malerei.</p> <p>Durch Übertreibung des Aspektes der kindlichen Malerei wird der handwerkliche Anspruch von Kunst als Voraussetzung für künstlerische Arbeiten, wie es vor allem bis ins Ende des 20. Jahrhunderts von ewig Gestrigen gefordert wird, ad absurdum geführt.</p> <p>Nicht zu verwechseln mit naiver Malerei, ist ein Anspruch an den Kindermimikry, dass Kunstwerke dieser Richtung nicht von Bildern solcher von Kindern zu unterscheiden sind, die noch nicht vom verheerenden Einfluss des Kunstunterrichts herkömmlicher sogenannter Kunstlehrer verdorben wurden.</p> <p>In Holland wurde diese Kunstrichtung 2012 mit dem hochdotiertem Kunstpreis 'vernieuwende kunststromingen 2012' ausgezeichnet. Mehr zu diesem Malstil unter: www.badboynele.art/kindermimikry</p>",
   "Kindermimikry");

-- Kundendaten anlegen
INSERT INTO Kunde 
   (kunden_ID, vorname, nachname,    anrede,
    email,               status,     reg_IP,         reg_datum,
    plz,    adresse,           ort,
    telefon,
    geburtstag
    ) 
VALUES
   (1701, "Fred",    "Pinsel",  "Herr", 
    "maler1@meister.de", "gesperrt", "99.102.37.55", "2017-11-06 11:05:30", 
    "9999", "Infoweg 9",       "Datenhausen",
    "0151 151 262 373", "1977-08-21"),
   (1702, "Natascha","Schulze", "Frau", 
    "nasch@gmx.de",      "aktiv",  "121.66.103.124", "2017-12-18 07:06:05",
    "31547", "Gerade Str. 14", "Rehburg-Loccum",
    "0172 2 88 35 35", "1982-05-12"),
   (1703, "Gunnar",  "Schmidt", "Herr",
    "guschmidt@web.de",  "aktiv",  "217.81.113.1",   "2018-01-02 21:22:23",
    "10123", "Hoepnerstr. 4",  "Berlin",
    "030 9 02 99 92", "1985-12-06"),
   (1704, "Charles", "Boyz",    "Herr", 
    "badboynele@web.de", "aktiv", "201.88.107.123",  "2017-12-29 12:33:54",
    "12247", "Alt-Lankwitz 98","Berlin",
    "0176 80 20 80 20", "1961-06-16");

-- Logindaten anlegen
INSERT INTO login 
   (kunden_ID, login,      password) 
VALUES
   (1701, "PiFre",         SHA2("PiFre1234",  256)   ),
   (1702, "NataschaKatze", SHA2("__nasch__",  256)  ),
   (1703, "Aquarellmaler", SHA2("AQ's PW!",   256)   ),
   (1704, "badboynele",    SHA2("1ggPWn4KWS", 256) );

-- Künstlerdaten anlegen
INSERT INTO kuenstler 
   (kuenstler_ID, kunden_ID, pseudonym,
    portrait,
    iban, bic) 
VALUES
   ("1701", "1701", "PinselFred", 
    "Ich bin der Pinselfred und seit 8 Jahren der ungeschlagene King auf allen Berliner Flomärckten. Jetz könnt ihr zum ersten mal meine begerten Bilder auch online kaufen. Aber achtung: was hier nich in 2 wochen weg geht ist dann garantiert auf einem Flohmarkt verkauft. Also zugreifen!<br />Mehr unter \"www.flohmarktking-berlin.com\"",
    "DE25360100430988776655", "PBNKDEFF360"),
   ("1702", "1702", "Nasch", 
    NULL, 
    "DE58100100100022786457", "PBNKDEFFXXX"),
   ("1703", "1703", "Günsch", 
    "Ich male seit 30 Jahren Aquarelle und bin jetzt neu hier. Ich weiß nicht so recht, was ich schreiben soll. Aber wenn Ihr mehr über mich wissen wollt, besucht doch meine Webseite: \"http://www.guensch_aquarelle.berlin\"",
    "DE18120965970101010101", "GENODEF1S10"),
   ("1704", "1704", "badboynele", 
    "Abschluss an der UdK VIII 2011 - Preise in Holland und Old Britain für innovative Kunst - 12 Ausstellungen in 3 Jahren - Ausgezeichnet in Finnland als \"Innovative Artist 2012\". Alles weitere und Weiteres unter www.badboynele.art", 
    "DE21120965971234440012", "GENODEF1S10");

INSERT INTO bild
( bild_ID, kuenstler_ID,
  erscheinungsjahr, upload_ip, upload_datum, kauf_ip, kauf_datum, 
  bild_hoehe, bild_breite, preis, kunden_ID, titel, bild,
  Beschreibung )
VALUES
( 1701, 1702,
  2014, "217.84.133.127", "2018-03-03 18:54:12", NULL, NULL, 
  1200, 1593, 25000, NULL, "Walfamilie",  "Wale_3.png",
  "Eine Walfamilie in Ölpastellfarben auf Karton gemalt und auf einen Aquarellhintergrund gesetzt."),
( 1702, 1703, 
  2014, "217.81.33.12",   "2018-02-16 12:56:54", NULL, NULL,  
  420,  594, 15000, NULL, "Blumen",  "Blumen_001.png", 
  "Blumen - Aquarell"),
(1703, 1703, 
  2014, "217.81.43.12",   "2018-02-22 09:14:07", NULL, NULL,  
  594,  420, 15000, NULL, "Blumen", "Blumen_002.png", 
  "Blumen am Seeufer - Aquarell"),
(1704, 1703, 
  2014, "217.81.55.61",   "2018-03-08 16:21:33", NULL, NULL,  
  420,  594, 15000, NULL, "Lietzensee",  "Lietzensee_001.png",
  "Café am Lietzensee, Hinteransicht - Aquarell"),
(1705, 1703, 
  2014, "217.81.12.21",   "2018-03-19 01:38_17", NULL, NULL,  
  594,  420, 15000, NULL, "Lietzensee", "Lietzensee_002.png",
  "Café am Lietzensee - Aquarell"),
(1706, 1704, 
  2014, "201.88.107.123", "2018-02-28 22:22:22", NULL, NULL,  
  210,  297, 12000, NULL, "Selbstportrait", "Selbstportrait.png",
  "Selbstportrait"),
(1707, 1704, 
  2014, "201.88.107.123", "2018-06-02 17:17:17", NULL, NULL,  
  210,  297, 12000, NULL, "Spiegelapfel",  "Spiegelapfel.png", 
  "Baum, Apfel, erste Schreibversuche - nicht alle gelungen"),
(1708, 1704,  
  2014, "201.88.107.123", "2018-09-21 08:04:00", NULL, NULL,  
  148,  210, 17500, NULL, "Gummibären", "Gummibaeren.png",  
  "Drei Tüten Gummibären auf einer Unterlage angeordnet"),
(1709, 1704, 
  2015, "201.88.107.123", "2019-01-02 11:22:33", NULL, NULL,  
  148,  210, 17500, NULL, "Tieraltar", "Tiere.png",    
  "Tiere als Pentychon - 4 kleine Zeichnungen um eine große angeordnet");

INSERT INTO eingeordnet ( bild_ID, kategorie_ID ) VALUES
( 1701, 109 ),
( 1702, 109 ),
( 1703, 109 ),
( 1704, 109 ),
( 1705, 109 ),
( 1706, 135 ),
( 1707, 135 ),
( 1708, 135 ),
( 1709, 135 );
