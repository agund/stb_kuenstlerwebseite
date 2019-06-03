<?php
    /*
    Bild hoch & herunter laden.
    */
    $funktion = $_GET['function'];

    $name = $_FILES['userfile']['name'];
    $mime = $_FILES['userfile']['type'];
    $size = $_FILES['userfile']['size'];
    $tmp = $_FILES['userfile']['tmp_name'];
    $err = $_FILES['userfile']['error'];

    include "../konfig.php";
    include "Model/DBCon.php";
    include "Services/PictureService.php";

    /*
    Big Size: 100px x 100px
    Small Size: 50px x 50px
    */ 

    $db = new MysqliDb($config);
    if($funktion == 'upload')
    {
        $ps = new PictureService();
    
        /* ToDo: Bild neu erzeugen, einmal als Big und ein mal als small */ 
        /* Bild upload, übergabe an Prozedure */
        $res = $db->rawQuery("Call UploadPic(?)",array());

    } 

    if($funktion == 'download')
    {
        $res = $db->rawQuery("Call DownloadPic(?)",array());
    }


    
?>