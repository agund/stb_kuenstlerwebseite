<?php

	include "konfig.php";
	require_once("db.php");
	$dbc = new MysqliDb($config);

	$res = $dbc->rawQuery("Call getKurse()");
	$users = $dbc->rawQuery("Call getProfil()");
	//var_dump($res);

	$userGuthaben = 0.00;
	$u = '';
	if(!empty($_GET['u']))
		$u =$_GET['u'];

	$html ='';
	
	$html .='<link href="site.css" rel="stylesheet" type="text/css" />';
	$html .='<script src="jquery-3.4.0.min.js"></script>';
	$html .='<script src="https://unpkg.com/popper.js"></script>';

	$html .='<div class="btn-group float-right" style="margin:2em">';
	$html .='<div class="dropdown">
	<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  Dropdown button
	</button>
	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
	  <a class="dropdown-item" href="#">Action</a>
	  <a class="dropdown-item" href="#">Another action</a>
	  <a class="dropdown-item" href="#">Something else here</a>
	</div>
  </div>';
	$html .='</div>';
	$html .='<script src="tablesorter.js"></script>';
	$html .='<script src="site.js"></script>';
	$html .= '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">';
	//$html .='<iframe style="width:500px;height:500px;" src="https://"></iframe>';
	$html .= '<div style="margin:3em;">';	
	$html .='<h1>Finanzen von: </h1>';
	$html .='<div style="float-right"> <select id="selUser" class="custom-select col-2">';
	$html .= '<option></option>';
	for ($i=0; $i < count($users) ; $i++) { 
		if($users[$i]['ID'] == $u)
		{
			$userGuthaben = $users[$i]['guthaben'];
			$html .='<option selected="selected" value="'.$users[$i]['ID'].'">'.$users[$i]['name'].'</option>';
		} else {
			$html .='<option value="'.$users[$i]['ID'].'">'.$users[$i]['name'].'</option>';
		}
	}	
	$html .='</select></div>';
	$html .= '</div>';

	


	$html .='<div style="float:right;font-weight:bold;margin-right:1em;"><span id="guthabenWert">'.$userGuthaben.'</span> </div><div style="float:right;font-weight:bold;margin-right:1em;">Guthaben: </div>';
	$html .='<table class="table table-striped" >';
	$html .='<thead>';
	$html .='<tr>';
	$html .='<th>';
	$html .='Kaufdatum';
	$html .='</th>';
	$html .='<th>';
	$html .='Akie / OS Scheine';
	$html .='</th>';
	$html .='<th>';
	$html .='Stück';
	$html .='</th>';
	$html .='<th>';
	$html .='EK + Spesen';
	$html .='</th>';
	$html .='<th>';
	$html .='VK + Spesen';
	$html .='</th>';
	$html .='<th>';
	$html .='Gewinn / Verlust';
	$html .='</th>';
	$html .='<th>';
	$html .='Verkaufsdatum';
	$html .='</th>';
	$html .='<th>';
	$html .='KO Call';
	$html .='</th>';
	$html .='<th>';
	$html .='KO Put';
	$html .='</th>';
	$html .='<th>';
	$html .='';
	$html .='</th>';
	
	$html .='<th>';
	$html .='';
	$html .='</th>';
	$html .='</tr>';
	
	$html .='</thead>';
	$html .='<tbody>';
	$html .='<tr>';

	$html .= '<form method="POST" action="save.php?funktion=gekauft" >';
	$html .='<td>';
	$html .='<input type="date" id="eingekauft_am" name="eingekauft_am" placeholder="Date" onfocus="(this.type=\'date\')" class="form-control">';
	$html .='</td>';
	$html .='<td>';
	$html .='<input type="text" id="aktie_name" name="aktie_name" placeholder="" class="form-control">';
	$html .='</td>';
	$html .='<td>';
	$html .='<input type="number" id="stueck" name="stueck" placeholder="" class="form-control">';
	$html .='</td>';
	$html .='<td>';
	$html .='<input type="number" id="ek" step="0.001" name="ek" placeholder="" class="form-control">';
	$html .='</td>';
	$html .='<td>';
	$html .='<input type="number" id="vk" step="0.001" disabled="disabled" name="vk" placeholder="" class="form-control">';
	$html .='</td>';
	$html .='<td>';
	$html .='<input type="number" id="gewinn" step="0.001" name="gewinn" disabled="disabled" placeholder="" class="form-control">';
	$html .='</td>';	
	$html .='<td>';
	$html .='<input type="date" id="verkauft_am" disabled="disabled" name="verkauft_am" placeholder="" class="form-control">';
	$html .='</td>';
	$html .='<td>';
	$html .='<input type="text" id="ko_call" name="ko_call" placeholder="" class="form-control">';
	$html .='</td>';
	$html .='<td>';
	$html .='<input type="text" id="ko_put" name="ko_put" placeholder="" class="form-control">';
	$html .='</td>';
	$html .='<td>';
	$html .=  '<input type="submit" value="eingekauft" class="btn btn-secundary" />';
	$html .='</td>';
	$html .= '</form>';
	$html .='<td>';
	$html .=  '';
	$html .='</td>';
	$html .='</tr>';


	for ($i=0; $i < count($res); $i++) { 
	$html .='<tr>';
	$html .= '<form method="POST" action="save.php" >';

	$html .='<td>';
	$html .= date_format(date_create($res[$i]['gekauft_am']), 'd.m.Y H:i');
	$html .='</td>';
	$html .='<td>';
	$html .=$res[$i]['Name'].' / '.$res[$i]['ident'];
	$html .='</td>';
	$html .='<td>';
	$html .='<span id="stueck_'.$i.'">'.$res[$i]['stueck'].'</span>';
	$html .='</td>';
	$html .='<td>';
	$html .='<span id="ek_'.$i.'">'.$res[$i]['EK'].'</span>';
	$html .='</td>';
	$html .='<td>';
	if( $res[$i]['verkauft_am'] == '0000-00-00 00:00:00' || $res[$i]['verkauft_am'] == NULL)
		$html .= '<input type="number" value="" name="vk" step="0.001" onkeyup="changeGewinn('.$i.')" id="vk_'.$i.'" class="form-control" />';
	else
		$html .= $res[$i]['VK']; // '<input type="number" value="" name="" id="" class="form-control" />';
	
	$html .='</td>';
	$html .='<td>';
	$html .='<span id="gewinn_'.$i.'">'.$res[$i]['gewinn'].'</span>';
	$html .='</td>';
	$html .='<td>';
	if( $res[$i]['verkauft_am'] == '0000-00-00 00:00:00' || $res[$i]['verkauft_am'] == NULL)
		$html .= '<input type="date" value="" name="verkauft_am" id="" placeholder="" onfocus="" class="form-control" />';
	else
		$html .=  date_format(date_create($res[$i]['verkauft_am']), 'd.m.Y H:i');
	$html .='</td>';
	$html .='<td>';
	if( $res[$i]['ko_am_call'] == '0000-00-00 00:00:00'|| $res[$i]['ko_am_call'] == NULL)
		$html .= '';
	else
		$html .=  date_format(date_create($res[$i]['ko_am_call']), 'd.m.Y H:i');
	$html .='</td>';
	$html .='<td>';
	if( $res[$i]['ko_am_put'] == '0000-00-00 00:00:00'|| $res[$i]['ko_am_put'] == NULL)
		$html .= '';
	else
		$html .=  date_format(date_create($res[$i]['ko_am_put']), 'd.m.Y H:i');
	$html .='</td>';
	$html .='<td>';
	if( $res[$i]['verkauft_am'] == '0000-00-00 00:00:00' || $res[$i]['verkauft_am'] == NULL){
		$html .= '<input type="hidden" value="'.$res[$i]['ID'].'" name="kursID" id="" />';
		$html .= '<input type="hidden" value="'.$u.'" name="userID" id="" />';
		$html .=  '<input type="submit" name="funktion" value="verkauft" class="btn btn-secundary" /> 	';
	} else {
		$html .=  '';
	}
	$html .='</td>';


	
	$html .='<td>';
	$html .=  '<input type="submit" value="ändern" class="btn btn-secundary" /> 	';
	$html .='</td>';
	$html .= '</form>';

	$html .='</tr>';
	}

	


	$html .='</tbody>';
	$html .='</table>';
	
	
	echo $html;
?>