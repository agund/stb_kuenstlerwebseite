<?php
    session_start();
    //var_dump(session_id());	
    /*
    Prüft ob der Benutzer mit dem username und dem password existiert
    und gibt die kundenID zurück.
    */
    //$user = $_POST['username'];
    //$password = $_POST['password'];

    $user = $_GET['username'];
    $password = $_GET['password'];

    include "../konfig.php";
    include "../Model/DBCon.php";

    $db = new MysqliDb($config);
    $res = $db->rawQuery("Call Login(?,?)",array(
        $user
        ,$password    
    ));

    $kid = 0;
    $kunst = 0;
    $loggedIn = false;
    if(!$res == NULL)
    {
        if($res[0]['status'] == 'aktiv')
        {
            $kid = $res[0]['kunden_ID'];
            $kunst = $res[0]['kuenstler'];
            $loggedIn = true;
        }
    }
    //var_dump($res[0]['kunden_ID']);
    $_SESSION['kid'] = $kid;
    $_SESSION['kuenstler'] = $kunst;


    if($loggedIn)
    {
        header('Location: ../index.php');
    }
    else
    {
        header('Location: ../index.php?alink=login&Error=true');
    }
    //echo $kid;
    //var_dump($_SESSION);
?>