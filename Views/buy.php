<?php
    /**
     * Session check
     */
    if(empty($_SESSION['kid'])) {
        header('Location: index.php');
        exit;
    };

    /**
     * Include and requirements
     */
    require_once("konfig.php");
    require_once("Model/DBCon.php");

    /**
     * Constants
     */
    $dbc = new MysqliDb($config);
    $res = $dbc->rawQuery("Call BildKaufDetails(?)", array($_GET['bildid']));

    /**
     * Build the buy content
     */
    $html = '<h2>'.$res[0]['Titel'].'</h2>
            <section class="bg-light big-padding">
                <div class="row mb-3">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-2">
                        <img class="w-100" src="Bilder/big/'.$res[0]['bild'].'" alt="" title="" />
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <b>Titel</b>
                        <div class="mb-2">'.$res[0]['Titel'].'</div>
                        <b>Preis</b>
                        <div class="mb-2">'.$res[0]['preis'].'</div>
                        <b>Beschreibung</b>
                        <div class="mb-2">'.$res[0]['Beschreibung'].'</div>
                        <b>Autor</b>
                        <div class="mb-2">'.$res[0]['Titel'].'</div>
                        <b>Bild Höhe</b>
                        <div class="mb-2">'.$res[0]['bild_hoehe'].' cm</div>
                        <b>Bild Breite</b>
                        <div>'.$res[0]['bild_breite'].' cm</div>
                    </div>
                </div>
                <div class="col">';
                    if($res[0]['kauf_datum'] == null) {
                        $html .= '<div style="d-flex">
                                    <form method="post" action="Controller/buy.php">
                                        <input type="hidden" value="'.$res[0]['bild_ID'].'" name="bildid" />
                                        <input type="submit" value="Verbindlich kaufen" class="w-100 btn btn-success " />
                                    </form>
                                </div>';
                    } else {
                        $html .= '<div class="btn btn-danger disabled w-100" >Bild wurde bereits verkauft</div>';
                    };
                $html .= '</div>
            </section>';
    echo $html;
?>