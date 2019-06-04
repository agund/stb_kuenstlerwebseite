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
    $res = $dbc->rawQuery("Call GetAllKuenstler()");
    $startby = (isset($_GET['start'])) ? intval($_GET['start']) : 0;
    
    /**
     * Build the artist table
     */
    $html = '<div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="d-none d-lg-table-cell d-xl-table-cell">Künstler</th>
                            <th>Name</th>
                            <th class="d-none d-lg-table-cell d-xl-table-cell">Portrait</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';
                        if(!empty($res)) {
                            for($i=$startby; $i < ($startby + $config['MaxArtistEntrys']); $i++) {
                                if($i >= count($res)) { // Reached max entrys in database
                                    continue;
                                };

                                $html .= '<tr>
                                            <td class="d-none d-lg-table-cell d-xl-table-cell text-center"><img width="100" src="'.(empty($res[$i]['avatar']) || strpos($res[$i]['avatar'], ".png") !== false || strpos($res[$i]['avatar'], ".jpg") !== false ? "./Bilder/no-img.png" : "data:image/jpeg;base64,".base64_encode($res[$i]['avatar'])).'" alt="" /></td>
                                            <td>'.$res[$i]['pseudonym'].'</td>
                                            <td class="d-none d-lg-table-cell d-xl-table-cell">'.$res[$i]['portrait'].'</td>
                                            <td>
                                                <form method="GET" action="index.php?alink=bilddetail">
                                                    <input type="hidden" value="kunstlerDetails" name="alink" />
                                                    <input type="hidden" value="'.$res[$i]['kuenstler_ID'].'" name="kuenstlerid" />
                                                    <input type="submit" value="mehr über den Künstler" style="text-decoration: none;outline: 0;transition: all .3s ease-in-out;border: 0;cursor: pointer;" class="btn-link">
                                                </form>
                                            </td>
                                        </tr>';
                            };
                        };
                    $html .= '</tbody>
                </table>
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
                                        $pagination .= '<a class="mx-2 '.(($startby / $config['MaxArtistEntrys']) + 1 === $num ? "active" : "").'" href="?alink=kunstler&start='.(($num - 1) * 10).'">'.$num.'</a>';
                                    };
                                $pagination .= '</div>
                            </div>
                        </div>';
        echo $pagination;
    };
?>