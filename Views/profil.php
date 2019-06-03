<?php
    if(empty($_SESSION['kid']))
    {
        header('Location: index.php');
        exit;
    }
    require_once("Views/Shared/benutzer.php");

?>