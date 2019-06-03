DROP DATABASE IF EXISTS kuenstler_DB;
CREATE DATABASE kuenstler_DB DEFAULT CHARACTER SET "utf8";
  
USE kuenstler_DB;

CREATE TABLE kunde (
  kunden_ID   BIGINT        UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL UNIQUE,
  anrede      ENUM          ( "Frau", "Herr"),
  titel       VARCHAR(40)   NULL,
  vorname     VARCHAR(80)   NOT NULL,
  nachname    VARCHAR(80)   NOT NULL,
  adresse     VARCHAR(80)   NOT NULL,
  plz         VARCHAR(10)   NOT NULL,
  ort         VARCHAR(80)   NOT NULL,
  geburtstag  DATE          NOT NULL,
  email       VARCHAR(128)  NULL DEFAULT NULL,
  telefon     VARCHAR(20)   NULL DEFAULT NULL,
  reg_IP      VARCHAR(40)   NOT NULL,
  reg_datum   TIMESTAMP     NOT NULL,
  status      ENUM          ("aktiv", "inaktiv", "gesperrt", "gelöscht") NOT NULL DEFAULT "inaktiv"
)ENGINE = InnoDB;

CREATE TABLE kuenstler (
  kuenstler_ID BIGINT       UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL UNIQUE,
  kunden_ID   BIGINT        UNSIGNED NOT NULL,
  avatar      BLOB          NULL DEFAULT NULL,
  portrait    TEXT          NULL DEFAULT NULL,
  pseudonym   VARCHAR(50)   NOT NULL UNIQUE,
  iban        VARCHAR(22)   NOT NULL,
  bic         VARCHAR(12)   NOT NULL, 
  FOREIGN KEY (kunden_ID) REFERENCES kunde (kunden_ID)
)ENGINE = InnoDB;

CREATE TABLE login (
  kunden_ID   BIGINT        UNSIGNED NOT NULL UNIQUE,
  login       VARCHAR(64)   NOT NULL UNIQUE,
  password    VARCHAR(128)  NOT NULL,
  FOREIGN KEY (kunden_ID) REFERENCES kunde (kunden_ID)
)ENGINE = InnoDB;

CREATE TABLE bild (
  bild_ID       BIGINT        UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL UNIQUE,
  kunden_ID     BIGINT        UNSIGNED NULL DEFAULT NULL,
  kuenstler_ID  BIGINT        UNSIGNED NOT NULL,
  Titel         VARCHAR(80)   NOT NULL,
  Beschreibung  TEXT          NOT NULL,
  bild          VARCHAR(34)   NOT NULL,
  bild_hoehe    INT           UNSIGNED NOT NULL,
  bild_breite   INT           UNSIGNED NOT NULL,
  preis         DECIMAL(10,2) UNSIGNED NOT NULL,
  erscheinungsjahr YEAR(4)    UNSIGNED NOT NULL,
  upload_ip     VARCHAR(40)   NOT NULL,
  upload_datum  TIMESTAMP     NOT NULL,
  kauf_ip       VARCHAR(40)   DEFAULT NULL,
  kauf_datum    DATETIME      DEFAULT NULL,
  FOREIGN KEY (kunden_ID)    REFERENCES kunde (kunden_ID),
  FOREIGN KEY (kuenstler_ID) REFERENCES kuenstler (kuenstler_ID)
)ENGINE = InnoDB;

CREATE TABLE kategorie (
  kategorie_ID  INT           UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL UNIQUE,
  Bezeichung    VARCHAR(80)   NOT NULL UNIQUE,  
  Beschreibung  TEXT          NOT NULL

)ENGINE = InnoDB;

CREATE TABLE eingeordnet (
  bild_ID       BIGINT        UNSIGNED NOT NULL,
  kategorie_ID  INT           UNSIGNED NOT NULL,
  
  FOREIGN KEY (bild_ID)      REFERENCES bild ( bild_ID),  
  FOREIGN KEY (kategorie_ID) REFERENCES kategorie ( kategorie_ID)

)ENGINE = InnoDB;

CREATE TABLE message (
  message_ID    INT           UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL UNIQUE,
  von_ID        BIGINT        UNSIGNED NOT NULL,
  an_ID         BIGINT        UNSIGNED NOT NULL,
  gelesen       BOOLEAN       NOT NULL DEFAULT '0',
  geloescht     BOOLEAN       NOT NULL DEFAULT '0',
  msg_text      TEXT          NOT NULL,
  FOREIGN KEY (von_ID) REFERENCES kunde (kunden_ID),
  FOREIGN KEY (an_ID)  REFERENCES kunde (kunden_ID)  
)ENGINE = InnoDB;


