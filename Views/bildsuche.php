<?php
    /**
     * Build the picture search
     */
    $html = '<h2>Bildsuche</h2>
            <div class="card bg-light">
                <div class="card-body">
                    <p class="card-text">In der Suche ist es möglich, schnell nach Bildern zu suchen, oder durch Filter die Suche einzugrenzen.</p>
                    <form action="index.php" method="GET">
                        <div style="display: flex;">
                            <input type="hidden" name="alink" value="bildsuche" />
                            <input type="text" class="mx-2 form-control" name="suchtext" placeholder="Suche" value="'.(!empty($_GET['suchtext'])? $_GET['suchtext']:'').'" />
                            <input type="submit" class="btn btn-primary" />
                        </div>
                    </form>
                </div>
            </div>';
            if(!empty($_GET['suchtext']) && $_GET['suchtext'] != '') {
                /**
                * Include and requirements
                */
                require_once("konfig.php");
                require_once('Model/DBCon.php');
                
                /**
                * Constants
                */
                $db = new MysqliDb($config);
                $res = $db->rawQuery("Call Suche(?)", array($_GET['suchtext']));

                $html .= '<table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Bild</th>
                                    <th>Titel</th>
                                    <th class="d-none d-lg-table-cell d-xl-table-cell">Beschreibung</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>';
                                foreach($res AS $pic) {
                                    $html .= '<tr>
                                                <td><img src="Bilder/small/'.$pic['bild'].'" alt="" /></td>
                                                <td>'.$pic['Titel'].'</td>
                                                <td class="d-none d-lg-table-cell d-xl-table-cell">'.$pic['Beschreibung'].'</td>
                                                <td>';
                                                    if(!empty($_SESSION['kid'])) {
                                                        $html .= '<form method="GET" action="index.php">
                                                                    <input type="hidden" value="kaufen" name="alink" />
                                                                    <input type="submit" value="kaufen" class="btn btn-success" />
                                                                </form>';
                                                    };
                                                $html .= '</td>
                                            </tr>';
                                };
                            $html .= '</tbody>
                        </table>';
            };
    echo $html;
?>