<?php
    session_start();
    $msg = $_POST['msg'];
    $an = $_POST['to'];

    include "../konfig.php";
    include "../Model/DBCon.php";

    $db = new MysqliDb($config);

    //echo $msg;
    //echo $an;
    //echo $_SESSION['kid'];
    //exit;

    $res = $db->rawQuery("Call AddChatMessage(?,?,?)",array($msg,$an,$_SESSION['kid']));
    header('Location: ../index.php?alink=chat&chatuserid='.$an.'');
?>