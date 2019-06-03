<?php

  if(empty($_SESSION['kid']))
  {
      header('Location: index.php');
      exit;
  }

    $html = '';
    $html .= '<h1>Bild Upload</h1>';
    
    $html .= '<section class="bg-light" style="padding:2em;">';
    $html .= '<form>';
    $html .= '<label>Titel</label>';
    $html .= '<div><input type="text" value="" name="" id="" class="form-control" /></div>';

    $html .= '<label>Beschreibung</label>';
    $html .= '<div><textarea class="form-control"></textarea></div>';


    $html .= '<label>Preis</label>';
    $html .= '<div><input type="number" value="" name="" id="" class="form-control col-2" /></div>';

    $html .= '<label>Erscheinungsjahr</label>';
    $html .= '<div><input type="number" value="" name="" id="" class="form-control col-1" /></div>';

    $html .= '<div><label>Bild</label></div>';
    $html .= '<div class="custom-file col-3">
    <input type="file" class="custom-file-input" id="customFileLang" lang="es">
    <label class="custom-file-label" for="customFileLang"></label>
  </div>';

    $html .= '<div style="margin-top:1em;"><input type="submit" value="Speichern" name="" id="" class="btn btn-primary" /></div>';

    $html .= '</form>';
    $html .= '</section>';

    echo $html;

?>