<?php
  // Debuggingmechanismus ein-/ausschalten
  define( "MYDEBUG", false );
  // Standardpfad zu den Bildern ( value für input.pic_path )
  define( "PIC_DIR", '../Künstlerwebsite/FINAL/pics/orig/' );
  // Benötigte Funktionen einbinden
  require_once "./bild.inc";
  // Debug-Ausgabe der Parameter
  my_arr( $_POST, MYDEBUG );

if ( isset($_POST['submit']) ) // submit gedrückt?
{
  // ist $pdir ein Verzeichnis?
  if ( $pdir = check_picdir($_POST['pic_path']) )
  {
    // hole alle Bilder aus diesem Ordner in ein Array (mit/ohne FehlerLog)
    $pic_arr = get_pic_arr( $pdir, true );
    // bearbeite alle diese Bilder mit  den Größen aus dem Formular
    bildbearbeitung( $pic_arr, $_POST["size_s"], $_POST["size_b"], $pdir ); 
  }
  else // Fehlermeldung: kein Verzeichnis
  $error = 120;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
  <title>Bearbeitung der Originalbilder</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <style type="text/css" title="">
    <!--
    
    -->
  </style>
</head>
<body>
<h1>Bearbeitung der Originalbilder</h1>

<?php if ( isset($error) ) html_errordiv($error); ?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
  
  <fieldset><legend>Bilderordner</legend>
  <div>
    <p>Wählen Sie einen Ordner aus. Alle Bilder aus diesem Ordner 
    werden proportionsgerecht umgewandelt. Die neuen Bilder mit den unten
    angegebenen Maximalgrößen werden in diesem Ordner in Unterordner namens 'big' 
    bzw 'small' abgelegt.
    </p>

    <p>Bereits existierende Bilder in diesem Ordner werden dabei gnadenlos
    überschrieben.</p>
  </div>
  <div class="input">
    <label for="pic_path">Bilderordner : </label>
    <input type="text" name="pic_path" id="pic_path" size="80"
           value="<?php echo PIC_DIR; ?>" />
  </div>
  </fieldset>
  
  <fieldset><legend>Bildergrößen</legend>
  <div class="input">
      <label for="size_b">Größe des großen Bildes (in px) : </label>
    <input type="text" name="size_b" id="size_b" value="600" />
  </div>
  <div class="input">
      <label for="size_s">Größe des kleinen Bildes (in px) : </label>
    <input type="text" name="size_s" id="size_s" value="120" />
  </div>
  </fieldset>

  <div id="buttonrow">
    <input type="submit" name="submit" value="Submit" />
    <input type="reset" value="Reset" />
  </div>
</form>

</body>
</html>