<?php
    /**
     * Include and requirements
     */
     require_once("konfig.php");
     require_once('konst.php');

     /**
     * Headerinformations
     */
    $html = '<html>
                <head>
                    <title>'.$config['HomepageTitle'].'</title>

                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                    <meta name="author" content="A. Gundermann">

                    <link rel="stylesheet" href="Views/css/bootstrap.css"  crossorigin="anonymous">
                    <link rel="stylesheet" href="Views/css/style.css"  crossorigin="anonymous">
                    <link rel="stylesheet" href="Views/css/jquery-ui.min.css"  crossorigin="anonymous">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                    <script src="https://code.jquery.com/jquery-latest.js"></script>
                    <script src="Views/js/jquery-ui.min.js"></script>
                    <script src="Views/js/script.js" async></script>
                </head>
                <body>
                    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
                        <a class="navbar-brand" href="index.php">K&uuml;nstlerwebseite</a>
                        <div style="position:absolute; right:0.5em;top:0.5em;">
                            <form method="get" action="?ham=true'.'">
                                <input type="hidden" name="ham" value="'.(!empty($_GET['ham']) && $_GET['ham']=='true'?'false':'true').'" />
                                <input type="submit" value="" class=" navbar-toggler-icon navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" />
                            </form>
                        </div>';
                        if(!empty($_GET['ham'])&& $_GET['ham']=='true') {
                            $html .= '<div class="col-12">
                                        <ul class="navbar-nav mr-auto">
                                            <li class="nav-item '.(($alink=='')?'active':'').'">
                                                <a class="nav-link" href="index.php">Start <span class="sr-only">(current)</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link '.(($alink==$konst['gallery'])?'active':'').'" href="?alink=gallery">Gallery</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link '.(($alink==$konst['kunstler'])?'active':'').'" href="?alink=kunstler">Künstler</a>
                                            </li>
                                            <li>
                                                <a class="nav-link '.(($alink==$konst['bildsuche'])?'active':'').'" href="?alink=bildsuche">Bildsuche</a>
                                            </li>';

                                            if(!empty($_SESSION['kid']) && (!empty($_SESSION['kuenstler'])) && ((int)$_SESSION['kuenstler'] == 1)) {
                                                $html .= '<li class="nav-item">
                                                            <a class="nav-link '.(($alink==$konst['bildUpload'])?'active':'').'" href="?alink=bildUpload">Upload</a>
                                                        </li>';
                                            };

                                            if(empty($_SESSION['kid']))
                                            {
                                                $html .= '<li>
                                                <a class="nav-link '.(($alink==$konst['login'])?'active':'').'" href="?alink=login">Login</a>
                                                </li>';
                                            } else {
                                                $html .= '<li>
                                                <a class="nav-link '.(($alink==$konst['login'])?'active':'').'" href="?alink=logout">Logout</a>
                                                </li>';
                                            }
                                            
                                        $html .= '</ul>
                                    </div>';
                        };
                        $html .= '<div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item '.(($alink=='')?'active':'').'">
                                            <a class="nav-link" href="index.php">Start <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link '.(($alink==$konst['gallery'])?'active':'').'" href="?alink=gallery">Gallery</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link '.(($alink==$konst['kunstler'])?'active':'').'" href="?alink=kunstler">Künstler</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link '.(($alink==$konst['bildsuche'])?'active':'').'" href="?alink=bildsuche">Bildsuche</a>
                                        </li>';
                                        if(!empty($_SESSION['kid']) && (!empty($_SESSION['kuenstler'])) && ((int)$_SESSION['kuenstler'] == 1)) {
                                            $html .= '<li class="nav-item">
                                                        <a class="nav-link '.(($alink==$konst['bildUpload'])?'active':'').'" href="?alink=bildUpload">Upload</a>
                                                    </li>';
                                        };
                                        if(!empty($_SESSION['kid'])) {
                                            $html .= '<li class="nav-item">
                                                        <a class="nav-link '.(($alink==$konst['chat'])?'active':'').'" href="?alink=chat">Chats</a>
                                                    </li>';
                                        };
                                    $html .= '</ul>';
                                    if(empty($_SESSION)) {
                                        $html .= '<form class="form-inline my-2 my-lg-0" action="Controller/suche.php" method="POST">
                                                    <input class="form-control mr-sm-2" type="search" placeholder="Suche" name="suchtext" aria-label="Suche" />
                                                    <input class="btn btn-outline-success my-2 mr-sm-2 my-sm-0" name="btnSuche" type="submit" value="Suche" />
                                                    <a href="./index.php?alink=login" class="btn btn-secondary my-3  my-sm-2" name="">Login</a>
                                                </form>';
                                    };
                                    if(!empty($_SESSION['kid'])) {
                                        $html .= '<form class="form-inline my-2 my-lg-0" action="Controller/suche.php" method="POST">
                                                    <input class="form-control mr-sm-2" type="search" placeholder="Suche" name="suchtext" aria-label="Suche" />
                                                    <input class="btn btn-outline-success my-2 mr-sm-2 my-sm-0" name="btnSuche" type="submit" value="Suche" />
                                                    <a href="./index.php?alink=profil" class="btn btn-secondary my-3  my-sm-2" name="">Profil</a>
                                                    <a href="Controller/logout.php" class="btn btn-secondary my-3 my-sm-2 ml-3" name="">Logout </a>
                                                </form>';
                                    } else if(!empty($_SESSION)) {
                                        $html .= '<form class="form-inline my-2 my-lg-0" action="Controller/suche.php" method="POST">
                                                    <input class="form-control mr-sm-2" type="search" placeholder="Suche" name="suchtext" aria-label="Suche" />
                                                    <input class="btn btn-outline-success my-2 mr-sm-2 my-sm-0" name="btnSuche" type="submit" value="Suche" />
                                                    <a href="./index.php?alink=login" class="btn btn-secondary my-3  my-sm-2" name="">Login</a>
                                                </form>';
                                    };
                                $html .= '</div>
                    </nav>';
    echo $html;
?>