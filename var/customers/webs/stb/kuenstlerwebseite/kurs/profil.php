<?php

    include "konfig.php";
	require_once("db.php");
	$dbc = new MysqliDb($config);

	$res = $dbc->rawQuery("Call getProfil()");

    //var_dump($res);

    $html  ='';
    $html .='<script src="jquery-3.4.0.min.js"></script>';
    $html .= '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">';
    
    $html .='<div style="padding:3em;">';
    $html .='<label>Name</label>';
    $html .='<div>'.$res[0]['name'].'</div>';
    $html .='<label>Passwort</label>';
    $html .='<div><input type="password" value="'.$res[0]['passwort'].'" id="" name="" class="form-control"/></div>';
    $html .='<label>Guthaben</label>';
    $html .='<div><input type="number" value="'.$res[0]['guthaben'].'" id="" name="" class="form-control"/></div>';

    $html .='<div><input type="submit" value="Speichern" id="" name="" class="btn btn-primary"/></div>';
    $html .='</div>';
    echo $html;


?>