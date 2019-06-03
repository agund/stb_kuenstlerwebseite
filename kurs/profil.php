<?php

    include "konfig.php";
	require_once("db.php");
    $dbc = new MysqliDb($config);
    
    $u = '';
	if(!empty($_GET['u']))
		$u =$_GET['u'];

	$res = $dbc->rawQuery("Call getProfil()");

    //var_dump($res);

    $html  ='';
    $html .='<script src="jquery-3.4.0.min.js"></script>';
    $html .= '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">';
    
    $html .='<h1>Profil bearbeiten</h1>';
    $html .='<section style="margin:1em;">';
    $html .= '<div class="card bg-light">';
    $html .='<div style="padding:3em;">';
    $html .='<label>Name</label>';
    $html .='<div style="font-weight:bold">'.$res[0]['name'].'</div>';
    $html .='<label>Passwort</label>';
    $html .='<div><input type="password" value="'.$res[0]['passwort'].'" id="" name="" class="form-control col-3"/></div>';
    $html .='<label>Guthaben</label>';
    $html .='<div><input type="number" value="'.$res[0]['guthaben'].'" id="" name="" class="form-control col-3"/></div>';
    $html .='<label>Stuerfreibetrag</label>';
    $html .='<div><input type="number" value="'.$res[0]['freibetrag'].'" id="" name="" class="form-control col-3"/></div>';
    $html .='<div><input type="submit" value="Speichern" id="" name="" style="margin-top:1em;float:left;" class="btn btn-primary"/></div>';
    $html .= '<button onclick="location.href=\'index.php?u='.$u.'\'" class="btn btn-secondary" style="margin-top:1em;float:left">Zurück</button>';
    $html .='</div>';
    $html .='</div>';
    $html .='</section>';
    echo $html;


?>