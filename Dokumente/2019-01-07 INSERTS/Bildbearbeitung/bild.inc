<?php
/* ***************************************************************************
* function my_arr( $arr, $out = true )
*
* FUNKTION:     gibt ein Array präformatiert aus
*
* PARAMETER:    $arr : das auszugebende Array
*               $out : soll eine Ausgabe erfolgen?
*                       true  - ja
*                       false - nein
*
* RÜCKGABEWERT: keiner
*
*************************************************************************** */
function my_arr( $arr, $out = true )
{
  // soll eine Ausgabe erfolgen  und ist es ein Array?
  if( $out AND is_array($arr) )
  {
    echo "\n<pre>";
    print_r( $arr );
    echo "</pre>\n";
  }
} // end of function my_arr( $arr, $out = true )



/* ***************************************************************************
* check_picdir( $pdir )
*
* FUNKTION:     Überprüft, ob das angegebene Verzeichnis existiert und ein 
*               Verzeichnis ist. 
*               Endet der Pfad nicht mit einem '/' wird dieser hinzugefügt. 
*               In diesem Verzeichnis werden die Unterordner 'small' und 'big' 
*               angelegt. Bei einem Misserfolg, erfolgt eine Fehlerausgabe.
*
* PARAMETER:    $pdir : das Verzeichnis
*
* RÜCKGABEWERT: Der (potenziell erweiterte) Pfad
*               false - falls $pdir kein Verzeichnis ist
*
*************************************************************************** */
function check_picdir( $pdir )
{
  $ok = true;

  // ist $pdir ein Verzeichnis?
  if ( is_dir($pdir) )
  { 
    // endet der Pfad mit einem '/'?
    if ( substr($pdir, strlen($pdir)-1 != "/" )  )
    {
      $pdir .= "/";  // Pfad erweitern
    }

    // existiert das Unterveichnis 'small' noch nicht?
    if ( !file_exists($pdir."small") OR !is_dir($pdir."small") )
      if ( !mkdir($pdir."small") ) 
      {
        echo "<div>".$pdir."small"." konnte nicht angelegt werden!</div>";
        $ok = false;
      }
 
    // existiert das Unterveichnis 'small' noch nicht?   
    if ( !file_exists($pdir."big") OR !is_dir($pdir."big") )
      if ( !mkdir($pdir."big") )
      {
      // anlegen fehlgeschlagen?
        echo "<div>".$pdir."big"." konnte nicht angelegt werden!</div>";
        $ok = false;
      }
    
  }
  else // $pdir ist kein Verzeichnis
    $ok = false;

  if ( $ok )  // bereinigten Pfad zurückgeben
    return $pdir;
  else        // Fehlerfall zurückgeben
    return $ok;
} // end of function check_picdir( $pdir )



/* ***************************************************************************
* function get_pic_arr( $picdir, $log=FALSE )
*
* FUNKTION:     Liest das Verzeichnis $picdir und überprüft, bei jeder 
*               Datei, ob es sich um eine gültige Bilddatei handelt. 
*               Jede so gefundene Bilddatei wird in einem Array aufgehoben. 
*               Ist $log auf true gesetzt wird für jede Datei, die nicht in 
*               das Array aufgenommen wurde, ein Eintrag in eine Logdatei
*               misamt einer Begründung geschrieben.
*
* PARAMETER:    $picdir : das zu untersuchende Verzeichnis
*               $log    : (bool) soll eine Logdatei angelegt werden?
*
* RÜCKGABEWERT: Ein Array mit allen gefunden gültigen Bildern. 
*               
* Diese Funktion erzeugt potenziell eine Logdatei namens Error_Log.txt im 
* angegebene Verzeichnis $picdir
*
*************************************************************************** */
function get_pic_arr( $picdir, $log=FALSE )
{
  // Name der Logdatei
  $logfile = $picdir."Error_Log.txt";     
  // Verzeichnis lesen und alle Dateien in einem Array aufheben
  $file_arr = scandir( $picdir ); 

  // Kontrollausgabe vor der Bereinigung
   my_arr( $file_arr, false );

  // Soll eine Log-Datei angelegt werden?
  if ( $log )
  { // Datei zum Schreiben öffnen und Handle aufheben
    $lf_handle = fopen($picdir."Error_Log.txt","w");
    if ( !$lf_handle ) // Datei konnte nicht angelegt/geöffnet werden.
      echo "<div>Logfile ".$picdir."Error_Log.txt"." konnte <b>nicht</b> angelegt werden.</div>";

    // Dateikopf erstellen ...
    $head="IGNORIERTE Dateien bei der Bildbearbeitung\r\n".
          date("d.m.Y, H:i:s",time())."\r\n".
          "==========================================\r\n";
    // ... und in die Datei schreiben
    fwrite($lf_handle, $head);
  }

  // behandele jede Datei aus diesem Verzeichnis
  foreach ($file_arr AS $idx => $fname )
  {
    // kompletten Dateinamen wieder zusammensetzen
    $pic = $picdir.$fname;

    // Ist diese Datei ein Verzeichnis? 
    if ( filetype($pic)=='dir' )
    {
      // dann aus dem Array entfernen
      unset ($file_arr[$idx]);
      // Logdatei-Eintrag erstellen?
      if ( $log )
      { 
        fwrite($lf_handle, $fname." - DIRECTORY\r\n");
      }
      // Schleifensprung - nächste Datei
      continue;
    }
   
    // 2. Ist diese Datei kein Bild?
    if ( !$pic_arr = @GetImageSize($pic) )
    {
      // dann aus dem Array entfernen
      unset ($file_arr[$idx]);
      // Logdatei-Eintrag erstellen?
      if ( $log )
      {
        fwrite($lf_handle, $fname." - KEIN BILD\r\n");
      }
      // Schleifensprung - nächste Datei
      continue;
    }
    // 3. Ist dies kein gewünschtes Bildformat?
    switch ( $pic_arr[2] )
      {
      case 1: // gif erkannt - OK
      case 2: // jpg erkannt - OK
      case 3: // png erkannt - OK
              break;
      default:// dann aus dem Array entfernen
              unset ($file_arr[$idx]);
              // Logdatei-Eintrag erstellen?
              if ( $log )
              {
                fwrite($lf_handle, $fname." - FALSCHES BILDFORMAT\r\n");
              }
      }
  }
  // wird eine Logdatei geführt?
  if ( $log )
  { // diese schließen
    fclose($lf_handle);
  } 

  // Kontrollausgabe nach der Bereinigung
  my_arr( $file_arr, false );

  // Array aller korrekten Bilddateien zurückgeben
  return $file_arr;
} // end of get_pic_arr( $picdir, $log=FALSE )



/* ***************************************************************************
* bildbearbeitung( $pic_arr, $small_size, $big_size, $picdir )
*
* FUNKTION:     Bearbeitet Bilddateien
*               ruft für jedes Bild in $picarr die Funktion
*    create_pngFiles( $picname, $small_size, $big_size, $picdir )
*               auf.
*
* PARAMETER:    $pic_arr : ein Array mit Bilddateien
*                  ( diese müssen
*                      1. in $picdir liegen
*                      2. gültige Bilddateien sein
*                    benutze hierfür get_pic_arr()
*                   )
*               $small_size: max-Größe in px der kleinen Bilder
*               $big_size  : max-Größe in px der großen Bilder
*               $picdir    : Verzeichnis der Bilder
*
* RÜCKGABEWERT: keiner
*
*************************************************************************** */
function bildbearbeitung( $pic_arr, $small_size, $big_size, $picdir )
{
  foreach ( $pic_arr AS $picname )
    create_pngFiles( $picname, $small_size, $big_size, $picdir );

}



/* ***************************************************************************
* create_pngFiles( $picname, $small_size, $big_size, $picdir )
*
* FUNKTION:     bearbeitet die Bilddatei $picname
*               Liest diese Datei aus $picdir und erzeugt zwei neue 
*               Bilddateien in $picdir/small bzw. $picdir/big mit
*               folgenden Merkmalen:
*               - Bildtyp ist jetzt .png
*               - Die Bilder werden proportionsgerecht erzeugt
*               - Die größere Dimension in $picdir/small ist $small_size
*               - Die größere Dimension in $picdir/big ist $big_size
*
* PARAMETER:    $picname   : der Name der Bilddatei
*               $small_size: max-Größe in px der kleinen Bilder
*               $big_size  : max-Größe in px der großen Bilder
*               $picdir    : Verzeichnis der Bilder
*
* RÜCKGABEWERT: keiner
*
*************************************************************************** */
function create_pngFiles( $picname, $small_size, $big_size, $picdir )
{ // kompletten Bildnamen wieder zusammensetzen
  $pic = $picdir.$picname;
  // Bildinfos aus der Bilddatei holen
  $pic_arr = GetImageSize($pic);

  // Überprüfung des Bild-Typs und Rohbild (image) erzeugen
  switch ( $pic_arr[2] )
  {
  case 1: // gif erkannt
          $img_orig = ImageCreateFromGIF( $pic);
          break;
  case 2: // jpg erkannt
          $img_orig = ImageCreateFromJPEG( $pic);
          break;
  case 3: // png erkannt
          $img_orig = ImageCreateFromPNG( $pic);
          break;
  default : 
          // Sollte nicht passieren
          return false;
  }
  // Variable und Konstanten vorbereiten
  // Größenverhältnis berechnen
  $format = $pic_arr[0]/$pic_arr[1]; //  breite / hoehe ;
  // Zielgrößen in px berechnen
  if ( $format > 1 )
  { // Landscape
    $s_pic['width']  = $small_size;
    $s_pic['height'] = round($small_size / $format);
    $b_pic['width']  = $big_size;
    $b_pic['height'] = round($big_size / $format, 0 );
  }
  else
  { // Portrait
    $s_pic['width']  = round($small_size * $format);
    $s_pic['height'] = $small_size;
    $b_pic['width']  = round($big_size * $format);
    $b_pic['height'] = $big_size;
  }
  // Namen zerlegen
  $fileparts = pathinfo($pic);
  // neuen Bildnamen setzen
  $pic_name = $fileparts['filename'].".png";

  // komplette Dateinamen für das Abspeichern erzeugen
  $s_pic['fname']=$picdir."small/".$pic_name;
  $b_pic['fname']=$picdir."big/".$pic_name;

  // neue (leere!) images (Rohbilder) in den gewünschten Größen erzeugen
  $img_small = ImageCreateTrueColor( $s_pic['width'], $s_pic['height']);
  $img_big   = ImageCreateTrueColor( $b_pic['width'], $b_pic['height']);

  // umkopieren in die richtige Größe in die Rohbilder
  ImageCopyResized( $img_small,                 $img_orig,
                    0, 0,                       0, 0,
                    $s_pic['width'], $s_pic['height'],
                    $pic_arr[0]    ,$pic_arr[1]            );
  ImageCopyResized( $img_big,                   $img_orig,
                    0, 0,                       0, 0,
                    $b_pic['width'], $b_pic['height'],
                    $pic_arr[0]    ,$pic_arr[1]            );
  // Rohbilder abspeichern als png-Dateien
  ImagePNG( $img_small, $s_pic['fname'] );
  ImagePNG( $img_big,   $b_pic['fname'] );
}  // end of function create_pngFiles( $picname, $small_size, $big_size, $picdir )



/* ***************************************************************************
* function html_errordiv( $errno )
*
* FUNKTION:     erzeugt aus einer Fehlernummer ein html-div der Klasse error
*               mit Fehlertitel und Fehlerbeschreibung
*
* PARAMETER:    $errno : Die Fehlernummer
*
* RÜCKGABEWERT: keiner
*
*************************************************************************** */
function html_errordiv( $errno )
{
  switch ( $errno )
  {
   case  1 :  
   case  2 : 
     $err_title = "Datei zu groß";  
     $err_desc = "Ihre Datei überschreitet die maximale Größe von 30MB.".
        " Bitte laden Sie eine kleinere Datei hoch.";
     break;  
   case  3 : 
     $err_title = "Datei nicht vollständig geladen";  
     $err_desc = "Bitte laden Sie Ihre Datei erneut hoch.";
     break;
   case  4 : 
     $err_title = "Keine Datei ausgewählt";  
     $err_desc = "Bitte wählen Sie über den Button \"Durchsuchen ...\" ".
       "eine Datei aus.";
     break;
   case 10 : 
     $err_title = "Datei ist kein Bild";  
     $err_desc = "Bitte wählen Sie ein Bild aus.";
     break;
   case 20 : 
     $err_title = "Falsches Bildformat";  
     $err_desc = "Bitte laden Sie nur .jpg, .gif oder .png Bilder hoch.";
     break;
   case 120: 
     $err_title = "Bildordner falsch";  
     $err_desc = "Der angegebene Pfad ist kein Ordner.";
     break; 

   default :  
     $err_title = "Unbekannter Fehler";  
     $err_desc = "Sorry - das hätte nicht passieren dürfen.";
     break;
  }
  echo "\n<div class=\"error\">\n".
       "<h3>".$err_title."</h3>\n".
       "<p>".$err_desc."</p></div>\n";
} // end of function html_errordiv( $errno )

?>