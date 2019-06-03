<?php

include "konfig.php";
include "Model/DBCon.php";
$dbc = new MysqliDb($config);
$res = $dbc->rawQuery("Call GetStartPagePictures()");
$logedIn = (!empty($_SESSION['kid'])? true : false); 
//var_dump($res);

$html ='';
$html .= '<h2>Künstlerdatenbank der AEDK8 im Sommersemester 2019</h2>';

$html .= '<section class="bg-light" style="padding:2em;">';
$html .= '<div>';

$html .= '<div class ="row mr-3 ml-3 " >';

for ($i=0; $i < count($res); $i++) { 
    $html .= '<div class="card" style="width: 18rem;margin:1em;">';
    $html .= '<img class="card-img-top" src="Bilder/big/'.$res[$i]['bild'].'" style="height:10em;" title="" alt="Card image cap" />';
    $html .= '<div class="card-body" style="position:relative;padding:3em;">';
    $html .= '<h5 class="card-title">'.$res[$i]['Titel'].'</h5>';

    $html .= '<h6 class="card-title"> Erstellt am: '.$res[$i]['erscheinungsjahr'].'</h6>';
    $html .= '<h6 class="card-title"> Künstler: '.$res[$i]['nachname'].'</h6>';
    $html .= '<p class="card-text" style="">'.$res[$i]['Beschreibung'].'</p>';
    $html .= '<a href="index.php?alink=bilddetail&bildid='.$res[$i]['bild_ID'].'" class="btn btn-primary" style="position:absolute;bottom:10;left:20;">Details</a>
    <div style=" float:right;font-size:0.8em;position:absolute;bottom:1.5em;right:2em;font-weight:bold;">Views: '.($res[$i]['views'] == ''?'0':$res[$i]['views']).'</div>';

    if($logedIn)
        $html .= '<h6 style=" float:right;font-size:0.8em;position:absolute;bottom:3em;right:2em;font-weight:bold;"> Preis: '. $res[$i]["preis"].' €'.'</h6>';

    $html .= '</div>';
    $html .= '</div>';
}

$html .= '</div>';
$html .= '</div>'; 
$html .= '</section>';

$html .= '<script>

    $(document).ready(function()
    {
        
    });

    </script>
    ';
echo $html;

?>