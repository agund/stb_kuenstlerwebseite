<?php
    session_start();
    include "../konfig.php";
    include "../Model/DBCon.php";

    $db = new MysqliDb($config);

    //echo $_POST['msg'];
    //echo $_POST['bildid'];
    //echo $_SESSION['kid'];
    //exit;

    $res = $db->rawQuery("Call AddBildChat(?,?,?)",array($_POST['msg'],$_POST['bildid'],$_SESSION['kid']));
    header('Location: ../index.php?bildid='.$_POST['bildid'].'&alink=bilddetail');
?>