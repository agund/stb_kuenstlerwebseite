<?php
    /*
    Profil abrufen oder verändern
    */

    include "../konfig.php";
    include "../Model/DBCon.php";
    $db = new MysqliDb($config);
    $res = $db->rawQuery("Call GetProfilById(?)",array());

    
?>