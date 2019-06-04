<?php
    /**
     * Include and requirements
     */
    require_once("konfig.php");
    require_once("Model/DBCon.php");

    /**
     * Constants
     */
    $dbc = new MysqliDb($config);
    $res = $dbc->rawQuery("Call GetStartPagePictures()");
    $logedIn = (!empty($_SESSION['kid'])? true : false); 
    $startby = (isset($_GET['start'])) ? intval($_GET['start']) : 0;
    
    /**
     * Build the picture content
     */
    $html = '<h2>K&uuml;nstlerdatenbank der AEDK8 im Sommersemester 2019</h2>
            <section class="bg-light" style="padding:2em;">
                <div>
                    <div class ="row mr-3 ml-3">';
                        for ($i=$startby; $i < ($startby + $config['MaxArtistEntrys']); $i++) {
                            if($i >= count($res)) { // Reached max entrys in database
                                continue;
                            };
                            
                            $myImg = (object)array(
                                "classes" => (file_exists("./Bilder/small/".$res[$i]['bild'])) ? "" : "card-no-img",
                                "link" => (file_exists("./Bilder/small/".$res[$i]['bild'])) ? "./Bilder/small/".$res[$i]['bild'] : "./Bilder/no-img.png"
                            );
                            
                            $html .= '<div class="card default-card">
                                        <img class="card-img-top height-10 '.$myImg->classes.'" src="'.$myImg->link.'" alt="Card image cap" />
                                        <div class="card-body">
                                            <h5 class="card-title">'.$res[$i]['Titel'].'</h5>
                                            <h6 class="card-title"> Erstellt am: '.$res[$i]['erscheinungsjahr'].'</h6>
                                            <h6 class="card-title"> Künstler: '.$res[$i]['nachname'].'</h6>
                                            <p class="card-text" style="">'.$res[$i]['Beschreibung'].'</p>
                                            <a href="index.php?alink=bilddetail&bildid='.$res[$i]['bild_ID'].'" class="btn btn-primary">Details</a>
                                            <div>Views: '.($res[$i]['views'] == ''?'0':$res[$i]['views']).'</div>';
                                            if($logedIn) {
                                                $html .= '<h6 class="price-link"> Preis: '. $res[$i]["preis"].' €'.'</h6>';
                                            };

                                        $html .= '</div>
                                    </div>';
                        };
                    $html .= '</div>
                    </div>';
    echo $html;

    /**
     * Build the pagination
     */
    if(count($res) > $config['MaxArtistEntrys']) {
        $pagination =   '<div class="row">
                            <div class="col text-center">
                                <div class="pagination">';
                                    for($num = 1;$num < (ceil(count($res) / $config['MaxArtistEntrys']) + 1);$num++) {
                                        $pagination .= '<a class="mx-2 '.(($startby / $config['MaxArtistEntrys']) + 1 === $num ? "active" : "").'" href="?start='.(($num - 1) * 10).'">'.$num.'</a>';
                                    };
                                $pagination .= '</div>
                            </div>
                        </div>
                    </section>';
        echo $pagination;
    } else {
        echo '</section>';
    };
?>