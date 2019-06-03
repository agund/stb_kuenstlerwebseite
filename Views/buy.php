<?php
    if(empty($_SESSION['kid']))
    {
        header('Location: index.php');
        exit;
    }

    include "konfig.php";
    require_once("Model/DBCon.php");
    $dbc = new MysqliDb($config);

    $res = $dbc->rawQuery("Call BildKaufDetails(?)",array($_GET['bildid']));

    //BildKaufDetails


    //var_dump($res);
    $html = '';
    $html .= '<section class="bg-light" style="padding:4em;">';

    $html .= '<div class="row" style="margin-bottom:1em;">';
    $html .= '<div class="col-6">';
    $html .= '<label style="font-weight:bold;">Titel</label>';
    $html .= '<div>'.$res[0]['Titel'].'</div>';
    $html .= '<label style="font-weight:bold;">Preis</label>';
    $html .= '<div>'.$res[0]['preis'].'</div>';
    $html .= '<label style="font-weight:bold;">Beschreibung</label>';
    $html .= '<div>'.$res[0]['Beschreibung'].'</div>';
    $html .= '<label style="font-weight:bold;">Autor</label>';
    $html .= '<div>'.$res[0]['Titel'].'</div>';

    $html .= '<label style="font-weight:bold;"l>Bild Höhe</label>';
    $html .= '<div>'.$res[0]['bild_hoehe'].' cm</div>';
    $html .= '<label style="font-weight:bold;">Bild Breite</label>';
    $html .= '<div>'.$res[0]['bild_breite'].' cm</div>';

    $html .= '</div>';

    $html .= '<div class="col-6">';
    $html .= '<img style="width:100%;" src="Bilder/big/'.$res[0]['bild'].'" alt="" title="" />';
    $html .= '</div>';
    $html .= '</div>';

   if($res[0]['kauf_datum'] == null)
   {
    $html .= '<div style="float:right;">
    <form method="post" action="Controller/buy.php">
    <input type="hidden" value="'.$res[0]['bild_ID'].'" name="bildid" />
    <input type="submit" value="Verbindlich kaufen" class="btn btn-primary " />
    </form>
    </div>';
    $html .= '</section>';
   } else {
       $html .= '<div style="float:right;" class="btn btn-danger disabled" >Bild wurde bereits verkauft</div>';
   }

    echo $html;
?>