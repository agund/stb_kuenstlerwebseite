<?php
$html ='';
$html .= '<h2>Bildsuche</h2>

<div class="card bg-light" style="">
 
  <div class="card-body">
    <p class="card-text">In der Suche ist es möglich, schnell nach Bildern zu suchen, oder durch Filter die Suche einzugrenzen.</p>
    <form class="form-inline" action="index.php" method="GET">
      <div class="input-group mb-3 col-2">
      <input type="hidden"  name="alink" value="bildsuche" />
          <input type="text" class="form-control" name="suchtext" placeholder="Suche" value="'.(!empty($_GET['suchtext'])? $_GET['suchtext']:'').'">
      </div>
      <div class="input-group mb-3 col-2">
          <input type="submit" class="btn btn-primary" >
      </div>
    </form>
  </div>
</div>';

if(!empty($_GET['suchtext']) && $_GET['suchtext'] != '')
{
  include "konfig.php";
  include "Model/DBCon.php";
  $db = new MysqliDb($config);
  $res = $db->rawQuery("Call Suche(?)",array($_GET['suchtext']));

  $html .='<table class="table table-striped">';
  $html .='<thead>';
  $html .='<tr>';
  $html .='<th>Bild</th>';
  $html .='<th>Titel</th>';
  $html .='<th>Beschreibung</th>';  
  $html .='<th></th>';  
  $html .='</tr>';
  $html .='</thead>';
  $html .='<tbody>';
  //var_dump($res);
  for ($i=0; $i < count( $res); $i++) { 
    $html .='<tr>';
    $html .='<td>';
    $html .='<img src="Bilder/small/'.$res[$i]['bild'].'" alt="" />';
    $html .='</td>';
    $html .='<td>';
    $html .=$res[$i]['Titel'];
    $html .='</td>';
    $html .='<td>';
    $html .= $res[$i]['Beschreibung'];
    $html .='</td>';
    
    $html .='<td>';
    if(!empty($_SESSION['kid']))
    {
      $html .= '<form method="GET" action="index.php"><input type="hidden" value="kaufen" name="alink" /> <input type="submit" value="kaufen" class="btn btn-primary" /></form>';
    }
    $html .='</td>';
    $html .='</tr>';  
  }
  $html .='</tbody>';
  $html .='</table>';
}


echo $html;

?>