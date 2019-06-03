<?php
    session_start();
    include "../konfig.php";
    include "../Model/DBCon.php";

    $db = new MysqliDb($config);

    $res = $db->rawQuery("Call BildBuy(?,?,?)",array($_POST['bildid'],$_SERVER['REMOTE_ADDR'],$_SESSION['kid']));
    header('Location: ../index.php?bildid='.$_POST['bildid'].'&alink=kaufen');
?>