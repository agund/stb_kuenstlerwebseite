<?php

$suchTextGet =''; 
$suchTextPost ='';
$suchTextGet = ((!empty($_GET['suchtext']))?$_GET['suchtext']:'');
$suchTextPost = ((!empty($_POST['suchtext']))?$_POST['suchtext']:'');

//include "../konfig.php";
//include "Model/DBCon.php";
//$db = new MysqliDb($config);
//$res = $db->rawQuery("Call Suche(?)",array($_GET['suchtext']));

//echo $suchTextPost;
if($suchTextGet != "")
    header('Location: ../index.php?alink=bildsuche&suchtext='.$suchTextGet);
else
    header('Location: ../index.php?alink=bildsuche&suchtext='.$suchTextPost);





//$proc = $dbc->setProcedure("kategorien",'GetAllKetegorien()');
//$arr = $dbc->execute_Procedure("kategorien");
//var_dump($arr);



?>