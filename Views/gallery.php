
<h2>Gallery</h2>

<?php
    include "konfig.php";
    require_once("Model/DBCon.php");
    $dbc = new MysqliDb($config);
    
    $logedIn = (!empty($_SESSION['kid'])? true : false);

    $kategorie = -1;
    if(!empty($_GET['kategorie'])){
        $kategorie = $_GET['kategorie'];
    }

    $res = $dbc->rawQuery("Call GetAllKetegorien()");
    //var_dump($res);
    if($kategorie == '')
    $katPicture = $dbc->rawQuery("Call GetBilderByKetegorie(?)", array((int)$res[0]['kategorie_ID']));
    else
    $katPicture = $dbc->rawQuery("Call GetBilderByKetegorie(?)", array((int)$kategorie));
    
    //var_dump($katPicture);
    $selectedKategorieIndex = 0;

    $html ='';
    $html .='<section class="bg-light" style=padding:2em;>';
    $html .='<div>';
    $html .='<form action="index.php" method="GET">';

    $html .='<label class="col-1">Kategorie</label>';
    $html .='<input type="hidden" value="'.$_GET['alink'].'" name="alink"  />';
    $html .='<select name="kategorie" class="custom-select col-4">';
    for ($i=0; $i < count($res); $i++) { 
        if($res[$i]['kategorie_ID'] == $kategorie) {
            $selectedKategorieIndex = $i; // $res[$i]['kategorie_ID'];
            $html .='<option selected="selected" value="'.$res[$i]['kategorie_ID'].'">'.$res[$i]['Bezeichung'].'</option>';  
        } else {
            $html .='<option value="'.$res[$i]['kategorie_ID'].'">'.$res[$i]['Bezeichung'].'</option>';     
        }   
    }
    $html .='</select>';
    $html .='<input type="submit" value="Filter" class="btn btn-primary">';
    $html .='</form>';
    $html .='</div>';

    $html .='<div style="margin-top:1em;">';
    $html .='<h3>Kategorie '.$res[$selectedKategorieIndex]['Bezeichung'].'</h3>';
    $html .='<div style="width:90%;">'.$res[$selectedKategorieIndex]['Beschreibung'].'</div>';
    $html .='</div>';

    $html .='<div style="margin-top:1em;">';
    $html .='<table class="table table-striped">';
    $html .='<thead>';
    $html .='<th>Bild</th>';
    $html .='<th>Titel</th>';
    $html .='<th class=" d-md-none d-sm-none ">Beschreibung</th>';
    $html .='<th>Jahr</th>';
    if($logedIn)
        $html .='<th class=" d-md-none d-sm-none ">Preis</th>';
    $html .='<th class=" d-md-none d-sm-none "></th>'; 
    $html .='<th ></th>'; 
    
    $html .='</thead>';
    $html .='<tbody>';

    for ($i=0; $i < count($katPicture); $i++) {     
        $html .='<tr>';
        $html .='<td><img src="Bilder/small/'.$katPicture[$i]['bild'].'" alt=""/></td>';
        
        $html .='<td>'.$katPicture[$i]['Titel'].'</td>';
        $html .='<td class=" d-md-none d-sm-none ">'.$katPicture[$i]['Beschreibung'].'</td>';
        $html .='<td>'.$katPicture[$i]['erscheinungsjahr'].'</td>';
        if($logedIn)
            $html .='<td class=" d-md-none d-sm-none ">'.$katPicture[$i]['preis'].'</td>';
        
            //var_dump($katPicture);
        if(!empty($_SESSION['kid'])){
            $html .='<td class=" d-md-none d-sm-none " ><form method="GET" action="index.php?alink=kaufen"><input type="hidden" value="'.$katPicture[$i]['bild_ID'].'" name="bildid" />
            <input type="hidden" value="kaufen" name="alink" /><input type="submit" value="kaufen" class="btn btn-primary" /></form></td>';
        }
        $html .='<td ><form method="GET" action="index.php?alink=bilddetail"><input type="hidden" value="bilddetail" name="alink" />
        <input type="hidden" value="'.$katPicture[$i]['bild_ID'].'" name="bildid" /><input type="submit" value="Details" class="btn btn-primary" />
        </form></td>'; 
        
        $html .='</tr>';
    }

    $html .='</tbody>';
    $html .='</table>';
    $html .='</div>';
    $html .='</section>';

    $html .= '<script>

    $(document).ready(function()
    {
        
    });

    </script>
    ';

    //var_dump($res);
    echo $html;
?>