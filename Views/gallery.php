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
    $logedIn = !empty($_SESSION['kid']);
    $kategorie = empty($_GET['kategorie']) ? -1 : $_GET['kategorie'];
    $res = $dbc->rawQuery("Call GetAllKetegorien()");
    $selectedKategorieIndex = 0;
    if($kategorie == '') {
        $katPicture = $dbc->rawQuery("Call GetBilderByKetegorie(?)", array((int)$res[0]['kategorie_ID']));
    } else {
        $katPicture = $dbc->rawQuery("Call GetBilderByKetegorie(?)", array((int)$kategorie));
    };
    
    /**
     * Build the gallery content
     */
    $html = '<h2>Gallery</h2>
            <section class="bg-light big-padding">
                <div>
                    <form action="index.php" method="GET">
                        <div style="display: flex;">
                            <b class="mr-2" style="margin-top: 7px;">Kategorie:</b>
                            <input type="hidden" value="'.$_GET['alink'].'" name="alink"  />
                            <select name="kategorie" class="custom-select mr-2">';
                                if(!empty($res)) {
                                    foreach($res AS $num => $kat) {
                                        if($kat['kategorie_ID'] == $kategorie) {
                                            $selectedKategorieIndex = $num;
                                            $html .='<option selected="selected" value="'.$kat['kategorie_ID'].'">'.$kat['Bezeichung'].'</option>';  
                                        } else {
                                            $html .='<option value="'.$kat['kategorie_ID'].'">'.$kat['Bezeichung'].'</option>';     
                                        };
                                    };
                                };
                            $html .='</select>
                            <input type="submit" value="Filter" class="btn btn-primary" />
                        </div>
                    </form>
                </div>
                <div class="mt-3">
                    <h3>Kategorie '.$res[$selectedKategorieIndex]['Bezeichung'].'</h3>
                    <div class="mx-2">'.$res[$selectedKategorieIndex]['Beschreibung'].'</div>
                </div>
                <div class="mt-3">
                    <table class="table table-striped table-hover">
                        <thead>
                            <th>Bild</th>
                            <th>Titel</th>
                            <th class="d-none d-lg-table-cell d-xl-table-cell">Beschreibung</th>
                            <th class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">Jahr</th>';
                            if($logedIn) {
                                $html .='<th class="d-none d-lg-table-cell d-xl-table-cell">Preis</th>';
                            };
                            $html .='<th class="d-none d-lg-table-cell d-xl-table-cell"></th>
                            <th ></th>
                        </thead>
                        <tbody>';
                            foreach($katPicture AS $pic) {
                                $html .='<tr>
                                            <td style="width: 150px;"><img width="150" src="'.(file_exists("./Bilder/small/".$pic['bild']) ? "./Bilder/small/".$pic['bild'] : "./Bilder/no-img.png").'" alt=""/></td>
                                            <td>'.$pic['Titel'].'</td>
                                            <td class="d-none d-lg-table-cell d-xl-table-cell">'.$pic['Beschreibung'].'</td>
                                            <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">'.$pic['erscheinungsjahr'].'</td>';
                                            if($logedIn) {
                                                $html .='<td class="d-none d-lg-table-cell d-xl-table-cell">'.$pic['preis'].'</td>';
                                            };
                                            if(!empty($_SESSION['kid'])){
                                                $html .='<td class="d-none d-lg-table-cell d-xl-table-cell">
                                                            <form method="GET" action="index.php?alink=kaufen">
                                                                <input type="hidden" value="'.$pic['bild_ID'].'" name="bildid" />
                                                                <input type="hidden" value="kaufen" name="alink" /><input type="submit" value="kaufen" class="btn btn-success" />
                                                            </form>
                                                        </td>';
                                            };
                                            $html .='<td>
                                                        <form method="GET" action="index.php?alink=bilddetail">
                                                            <input type="hidden" value="bilddetail" name="alink" />
                                                            <input type="hidden" value="'.$pic['bild_ID'].'" name="bildid" />
                                                            <input type="submit" value="Details" class="btn btn-primary" />
                                                        </form>
                                                    </td>
                                        </tr>';
                            };
                        $html .='</tbody>
                    </table>
                </div>
            </section>';
    echo $html;
?>