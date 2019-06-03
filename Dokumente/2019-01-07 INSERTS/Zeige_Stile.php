<?php
/* 
  @file Modul zur Datenbankanbindung des Projektes PMG-Intranet
*/
define( "__INC_DBFUNCS__", true );

define( "KWS_HOST", "localhost" );
define( "KWS_DB",   "ws18_kws_db" );
define( "KWS_ROOT", "__kws_root__" );
define( "KWS_ROOT_PW", "ws18_AEDK7_#!" );


/* ******************************************************************
  Connect_KWS( string $user )

  @brief Liefert eine DB-Verbindung als Objekt vom Typ mysqli

  @function Baut eine Verbindung zum Sérver KWS_HOST und der
    DB KWS_DB auf. Benutzt wird die PHP-API mysqli.

  @param $user ein username als String. erlaubt sind z.Z. admin
  @return ein Objekt der Klasse mysqli im Erfolgsfall
          sonst wird das Script verlassen
******************************************************************* */
function Connect_KWS( $user )
{
  // bekannte user sind: admin, Stile, gast
  switch ( $user )
  {
    case "admin": $login  = KWS_ROOT;
                  $passwd = "ws18_AEDK7_#!";
                  break;
    default     : $login  = "NOBODY";
                  $passwd = NULL;
  }

  // 1. DB-Verbindung aufbauen
  $dbconn = new mysqli( KWS_HOST, $login, $passwd, KWS_DB );
  // Verbindung vorhanden?
  if ( $dbconn->connect_error ) 
  {
    die('Verbindungsfehler (' . $dbconn->connect_errno . ') '
              . $dbconn->connect_error);
    /* Das ist die Brechstange!
       Besser:
       Fehlermeldung aufheben (z.B. ein eigenes Logfile )
       und Umlenken auf eine eigene Fehlerseite
    */
  }

  $dbconn->query("SET NAMES utf8");
  return $dbconn;
}



/* ******************************************************************
  GetAlleStile($dbconn)

  @brief Liefert ein 2-dim Array aller Stile aus der pmg-DB

  @function Holt ein 2-dim Array aller Stile. Für jeden Stile
            existieren min. folgende Felder:
            StilID, Name, Beschreibung

  @param $dbconn Eine Datenbankverbindung als Objekt der Klasse mysqli

  @return ein gültiges 2-dim Array
******************************************************************* */
function GetAlleStile($dbconn)
{
  // 2. SQL-Abfrage zusammenbasteln
  $SQLstring = "SELECT StilID, Name, Beschreibung FROM stil";

  // 3. Abfrage abschicken und Ergebnis entgegennehmen
  $dberg = $dbconn->query( $SQLstring );
  // Abfrage fehlerhaft
  if ( $dberg === false )
  {
     echo "\n<div>Fehlerhafte Abfrage: ".$SQLstring."<br />(".
          $dbconn->errno.") ".$dbconn->error."</div>\n";
     die( "und tschüß");
  }

  // 4. Ergebnis vorhanden? Datensätze fetchen ...
  while (  $ds = $dberg->fetch_assoc() )
  { // ... und an ein Array anhängen
    $Stilearr[]=$ds;
  }

  return $Stilearr; // komplettes Array zurückgeben
}


function HTML_Stil_Liste( $StilArr )
{
  $stil_dd = "\n    <dl>";
    
  foreach ( $StilArr AS $Stil )
    $stil_dd .= 
      "\n      <dt>".$Stil['Name']." (StilID: ".$Stil['StilID'].")</dt>".
      "\n      <dd>".$Stil['Beschreibung']."</dd>";
  $stil_dd .= "\n    </dl>";
  return $stil_dd;
}

$dbconn = Connect_KWS( "admin" );
$html_stildl = HTML_Stil_Liste( GetAlleStile($dbconn) );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
  <meta http-equiv="content-type" 
        content="text/html; charset=utf-8" />
  <title>Stil-Liste</title>
<style type="text/css" title="">
  <!--
  dt { margin: 1em 0 0 2em; font-size: 150%; font-weight: bold; }
  dd { border: thin solid #E0E0E0; border-radius: 0.5em; padding: 0.5em;}
  -->
</style>
</head>
<body>
  <h1>Übersicht aller Stile der Künstler-DB</h1>

<?php  echo $html_stildl; ?>

</body>
</html>