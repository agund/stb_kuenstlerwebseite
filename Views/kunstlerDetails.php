<?php

    include "konfig.php";
    require_once("Model/DBCon.php");
    $dbc = new MysqliDb($config);

    $kuenstler = $dbc->rawQuery("Call GetKuenstlerDetails(?)", array($_GET['kuenstlerid']));
    $kb = $dbc->rawQuery("Call GetKuenstlerBilder(?)",array($_GET['kuenstlerid']));
    //var_dump($kb);
    //var_dump($kuenstler);
    $html ='';
    $html .='<h1> Künstler-Details: '.$kuenstler[0]['pseudonym'].' </h1>';

    $html .= '<div class="row">';
    $html .= '<div class="col-6">';
    $html .= '<img src="data:image/jpeg;base64,'.base64_encode($kuenstler[0]['avatar']).'" alt="" title="" style="width:100%;height:100%;" />';
    $html .= '</div>';
    $html .= '<div class="col-6">';
    $html .= '<label style="font-weight:bold;">Portrait</label>';
    $html .=  '<div>'.$kuenstler[0]['portrait'].'</div>';
    $html .= '<label style="font-weight:bold;">Geburtstag</label>';
    $html .=  '<div>'.$kuenstler[0]['geburtstag'].'</div>';
    $html .= '<label style="font-weight:bold;">Künstlername</label>';
    $html .=  '<div>'.$kuenstler[0]['pseudonym'].'</div>';
    $html .= '<label style="font-weight:bold;">Registriert seit</label>';
    $html .=  '<div>'.$kuenstler[0]['reg_datum'].'</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '<h2>Bilder vom Künstler</h2>';
    $html .= '<table class="table table-striped">';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<th>';
    $html .='Vorschau';
    $html .= '</th>';
    $html .= '<th>';
    $html .='Beschreibung';
    $html .= '</th>';
    $html .= '<th>';
    $html .='';
    $html .= '</th>';
    $html .= '</thead>';
    $html .= '<tbody>';

    for ($i=0; $i < count($kb); $i++) { 
        $html .= '<tr>';
        $html .= '<td>';
        $html .= '<img src="Bilder/small/'.$kb[$i]['bild'].'" title="" alt="" />';
        $html .= '</td>';
        $html .= '<td>';
        $html .= $kb[$i]['Beschreibung'];
        $html .= '</td>';
        $html .= '<td>';
        $html .= '<form method="GET" action="index.php?alink=bilddetail"><input type="hidden" value="bilddetail" name="alink" /><input type="hidden" value="'.$kb[$i]['bild_ID'].'" name="bildid" /><input type="submit" value="Details" class="btn btn-primary" /></form>';
        $html .= '</td>';
        
        $html .= '</tr>';
    }

    $html .= '</tbody>';
    $html .= '</table>';

    echo $html;
?>