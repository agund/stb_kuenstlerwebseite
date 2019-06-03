INSERT INTO kunde (
    kunden_ID
    ,anrede
    ,titel
    ,vorname
    ,nachname
    ,adresse
    ,plz
    ,ort
    ,geburtstag
    ,email
    ,telefon
    ,reg_IP
    ,reg_datum
    ,status
) VALUES
(1001,'Frau','Dr.','Vanessa','Mulmel','Kleinstr. 5','12345','Berlin','1990-02-02','v@test.de','030 4567890','127.0.0.1','2019-01-01','aktiv'),
(1002,'Herr','Dr.','Max','Summer','Tiefstr. 5','13009','Berlin','1990-01-02','m@test.de','030 4562330','127.0.0.1','2019-01-01','aktiv'),
(1003,'Frau','','Lulu','Klein','Tickstr. 5','12399','Berlin','1990-02-02','lulu@test.de','030 4567999','127.0.0.1','2019-01-01','aktiv'),
(1004,'Frau','','Tile','Voss','MyStr. 5','12899','Berlin','1990-02-20','my@test.de','030 4597999','127.0.0.1','2019-01-01','aktiv');


INSERT INTO  kuenstler(
      kuenstler_ID,
  kunden_ID,
  avatar,
  portrait,
  pseudonym,
  iban,
  bic)
  VALUES 
  (1001,1001,'','keins','PictureDragon','DE1231231212123',''),
  (1002,1002,'','keins','MyPic','DE11214567689','');


INSERT INTO login(
    kunden_ID ,
  login,
  password
)
VALUES 
(1001,'test1', md5('test')),
(1002,'test2', md5('test')),
(1003,'test3', md5('test')),
(1004,'test4', md5('test'));


 INSERT INTO bild (
  bild_ID       ,
  kunden_ID     ,
  kuenstler_ID  ,
  Titel         ,
  Beschreibung  ,
  bild          ,
  bild_hoehe    ,
  bild_breite   ,
  preis         ,
  erscheinungsjahr ,
  upload_ip     ,
  upload_datum  ,
  kauf_ip       ,
  kauf_datum    
) VALUES
(1011,1001,1001,'Familie','Familie gemeinsam','pic_1011.jpg',20,20,100.50,2019,'','','123.123.123.123','2019-01-01'),
(1012,1002,1002,'Gummibaeren','Gummibaeren Tüte ','pic_1012.jpg',20,20,150.99,2019,'','','123.123.123.253','2019-01-01'),
(1013,1002,1002,'Tiere','Wilde Tiere ','pic_1013.jpg',20,20,1500.0,2019,'','','','');


INSERT INTO eingeordnet (
  bild_ID,
  kategorie_ID   
)
VALUES 
(1011,135),
(1012,135),
(1013,135)