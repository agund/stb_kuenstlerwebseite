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
    $pic = (empty($_GET['bildid'])) ? [] : $dbc->rawQuery("Call GetBildDetail(?)", array($_GET['bildid']));

    /**
     * Build the picture detials
     */
    $html ='<h2>Bild-Details: '.$pic[0]['Titel'].'</h2>
            <section class="bg-light p-3 picture-details">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-2">
                        <img src="Bilder/big/'.$pic[0]['bild'].'" alt="">
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div><b>Künstler: </b>'.$pic[0]['pseudonym'].'</div>
                        <div><b>Erscheinungsdatum: </b>'.$pic[0]['erscheinungsjahr'].'</div>
                        <div><b>Beschreibung:</b> '.$pic[0]['Beschreibung'].' </div>';
                        if($logedIn) {
                            $html .='<div style="float:right;padding:1em;" >';
                            $html .= '<form method="GET" action="index.php?alink=kaufen">
                            <input type="hidden" value="kaufen" name="alink" />
                            <input type="submit" value="kaufen" class="btn btn-success" />
                            <input type="hidden" value="'.$pic[0]['bild_ID'].'" name="bildid" />
                            </form>';
                            $html .= '</div>';
                        };
                    $html .='<div class="mt-4 mb-2"><b>Discussion:</b></div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nachricht</th>
                                    <th>Von</th>
                                    <th>Datum</th>
                                </tr>
                            </thead>
                            <tbody>';
                                $chats = $dbc->rawQuery("Call GetBildChat(?)", array($_GET['bildid']));
                                
                                if(!empty($chats)) {
                                    foreach($chats AS $chat) {
                                        $html .= '<tr>
                                                    <td>'.$chat['msg_text'].'</td>
                                                    <td>'.$chat['nachname'].'</td>
                                                    <td>'.$chat['zeit'].'</td>
                                                </tr>';    
                                    };
                                };
                                if($logedIn) {
                                    $html .= '<tr>
                                                <form method="post" action="Controller/bildChat.php">
                                                    <td colspan="3">
                                                        <div style="display: flex;">
                                                            <input type="text" placeholder="Nachricht" name="msg" class="form-control" />
                                                            <input type="hidden" value="'.$pic[0]['bild_ID'].'" name="bildid" />
                                                            <input type="submit" value="Senden" class="ml-2 btn btn-primary" />
                                                        </div>
                                                    </td>
                                                </form>
                                            </tr>';
                                };
                            $html .= '</tbody>
                        </table>
                    </div>
                </div>
            </section>';
    echo $html;
?>