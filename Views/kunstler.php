<?php
    include "konfig.php";
    require_once("Model/DBCon.php");
    $dbc = new MysqliDb($config);
 
    $res = $dbc->rawQuery("Call GetAllKuenstler()");

    //var_dump($res);

    $html ='';
    $html .= '<div>';
    $html .= '<table class="table table-striped">';

    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<th>Künstler</th>';
    $html .= '<th>Name</th>';
    
    $html .= '<th>Portrait</th>';

    $html .= '<th></th>';
    
    $html .= '</tr>';
    $html .= '</thead>';
    
    $html .= '<tbody>';
    for ($i=0; $i < count($res); $i++) { 
        $html .= '<tr>';
        $html .='<td><img src="data:image/jpeg;base64,'.base64_encode($res[$i]['avatar']).'" alt="" /></td>';
        $html .= '<td>'.$res[$i]['pseudonym'].'</td>';
        $html .= '<td>'.$res[$i]['portrait'].'</td>';
        $html .= '<td><form method="GET" action="index.php?alink=bilddetail"><input type="hidden" value="kunstlerDetails" name="alink" /><input type="hidden" value="'.$res[$i]['kuenstler_ID'].'" name="kuenstlerid" /><input type="submit" value="mehr über den Künstler" style="border: 0;" class="btn-link"></form></td>';
        
        //kunstlerDetails
        $html .= '</tr>';
    }
    $html .= '</tbody>';
    

    $html .= '</table>';
    

    $html .= '</div>';

    echo $html;
    //var_dump($res);


?>