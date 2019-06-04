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
    $kuenstler = $dbc->rawQuery("Call GetKuenstlerDetails(?)", array($_GET['kuenstlerid']));
    $kb = $dbc->rawQuery("Call GetKuenstlerBilder(?)",array($_GET['kuenstlerid']));
    
    /**
     * Build the artist details
     */
    $html = '<h2> Künstler-Details: '.$kuenstler[0]['pseudonym'].'</h2>
            <div class="row">
                <div class="col-6 text-center">
                    <img style="width:100%" src="'.(empty($kuenstler[0]['avatar']) ? "./Bilder/no-img.png" : "data:image/jpeg;base64,".base64_encode($kuenstler[0]['avatar'])).'" alt="" title="" />
                </div>
            <div class="col-6">
                <b>Portrait</b>
                <div>'.$kuenstler[0]['portrait'].'</div>
                <b>Geburtstag</b>
                <div>'.$kuenstler[0]['geburtstag'].'</div>
                <b>Künstlername</b>
                <div>'.$kuenstler[0]['pseudonym'].'</div>
                <b>Registriert seit</b>
                <div>'.$kuenstler[0]['reg_datum'].'</div>
            </div>
            <h2 class="mt-3">Bilder vom Künstler</h2>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Vorschau</th>
                            <th>Beschreibung</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';
                        if(!empty($kb)) {
                            foreach($kb AS $pic) {
                                $html .= '<tr>
                                            <td><img src="Bilder/small/'.$pic['bild'].'" title="" alt="" /></td>
                                            <td>'.$pic['Beschreibung'].'</td>
                                            <td>
                                                <form method="GET" action="index.php?alink=bilddetail">
                                                    <input type="hidden" value="bilddetail" name="alink" />
                                                    <input type="hidden" value="'.$pic['bild_ID'].'" name="bildid" />
                                                    <input type="submit" value="Details" class="btn btn-primary" />
                                                </form>
                                            </td>
                                        </tr>';
                            };
                        } else {
                            $html .= '<tr>
                                        <td colspan="3">Künstler hat keine Bilder</td>
                                    </tr>';
                        };
                    $html .= '</tbody>
                </table>';
    echo $html;
?>