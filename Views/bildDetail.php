<?php
    include "konfig.php";
    require_once("Model/DBCon.php");
    $dbc = new MysqliDb($config);

    $logedIn = (!empty($_SESSION['kid'])? true : false);
    $pic = array();
    if(!empty($_GET['bildid']))
        $pic = $dbc->rawQuery("Call GetBildDetail(?)", array($_GET['bildid']));

    //var_dump($pic);

    $html ='';
    $html .='<h1> Bild-Details: '.$pic[0]['Titel'].' </h1>';
    
    $html .='<section class="bg-light" style="padding:1em;">';
    $html .='<div class="row">';
    $html .='<div class="col-6">';
    $html .='<img src="Bilder/big/'.$pic[0]['bild'].'" alt="" style="width:100%;;height:60%;">';
    $html .='</div>';
    $html .='<div class="col-6">';
    $html .='<div><label style="font-weight:bold;">Künstler:</label> '.$pic[0]['pseudonym'].' </div>';
    $html .='<div><label style="font-weight:bold;">Erscheinungsdatum: </label>'.$pic[0]['erscheinungsjahr'].'</div>';
    $html .='<div><label style="font-weight:bold;">Beschreibung:</label> '.$pic[0]['Beschreibung'].' </div>';
    if($logedIn)
    {
        $html .='<div style="float:right;padding:1em;" >';
        $html .= '<form method="GET" action="index.php?alink=kaufen">
        <input type="hidden" value="kaufen" name="alink" />
        <input type="submit" value="kaufen" class="btn btn-primary" />
        <input type="hidden" value="'.$pic[0]['bild_ID'].'" name="bildid" />
        </form>';
        $html .= '</div>';
    }
    $html .='<div style="margin-top:5em;"><label>Discussion:  <label></div>';
    

    $html .= '<table class="table">';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<th>';
    $html .= 'Nachricht';
    $html .= '</th>';
    $html .= '<th>';
    $html .= 'Von';
    $html .= '</th>';
    $html .= '<th>';
    $html .= 'Datum';
    $html .= '</th>';
    $html .= '</tr>';
    $html .= '</thead>';
    $html .= '</tbody>';
    $html .= '</tbody>';
    
    $chat = $dbc->rawQuery("Call GetBildChat(?)", array($_GET['bildid']));
    //var_dump($chat);
    for ($i=0; $i < count($chat); $i++) { 
        $html .= '<tr>';
        $html .= '<td>';
        $html .= $chat[$i]['msg_text'];
        $html .= '</td>';
        $html .= '<td>';
        $html .= $chat[$i]['nachname'];
        $html .= '</td>';
        $html .= '<td>';
        $html .= $chat[$i]['zeit'];
        $html .= '</td>';
        $html .= '</tr>';    
    }
    


    if($logedIn)
    {
        $html .= '<tr>';
        $html .= '<form method="post" action="Controller/bildChat.php">';
        $html .= '<td colspan="2">';
        $html .= '<input type="text" placeholder="Nachricht" name="msg" class="form-control" style="width:100%;" />
                  <input type="hidden" value="'.$pic[0]['bild_ID'].'" name="bildid" />';
        $html .= '</td>';
        $html .= '<td>';
        $html .= '<input type="submit" value="Senden" class="btn btn-primary"/>';
        $html .= '</td>';
        $html .= '</form>';
        $html .= '</tr>';

        $html .= '</table>';
    }

    $html .='</div>';
    $html .='</div>';
    $html .='</section>';
    echo $html;

?>