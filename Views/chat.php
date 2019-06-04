<?php
    /**
     * Login check
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
     $db = new MysqliDb($config);
     $res = $db->rawQuery("Call GetChats(?)",array($_SESSION['kid']));

     /**
     * Build the chat content
     */
     $html = '<div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 mb-3">
                    <ul class="list-group">
                        <li class="list-group-item '.(!isset($_GET['chatuserid']) || (int)$_GET['chatuserid'] === 0 ? "active" : "").'">
                            <a href="?chatuserid=0&alink=chat">
                                <i class="fa fa-address-book mr-2"></i>Neuer Chat
                            </a>
                        </li>';
                        foreach($res AS $chat) {
                            if(empty($chat['ID'])) {
                                continue;
                            };
                            $html .= '<li class="list-group-item '.(isset($_GET['chatuserid']) && (int)$_GET['chatuserid'] === $chat['ID'] ? "active" : "").'">
                                        <a href="?chatuserid='.$chat['ID'].'&alink=chat">
                                            <i class="fa fa-address-card mr-2"></i>'.$chat['NACHNAME'].' '.$chat['VORNAME'].'
                                        </a>
                                    </li>';
                        };
                    $html .= '</ul>
                </div>
                <hr class="w-100 mx-3 d-lg-none d-xl-none" style="border: 1px dotted #aaa"/>
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">';
                    if(!isset($_GET['chatuserid']) || (int)$_GET['chatuserid'] === 0) {
                        $kunden = $db->rawQuery("Call GetAllKunden()");
                        
                        $html .= '<div class="p-3">
                                    <form method="POST" action="./Controller/chat.php">
                                        <div class="row">
                                            <div class="col-12 mb-2">
                                                <select name="to" id="toSelect" class="custom-select w-100">
                                                    <option class="d-none" selected disabled>Namen auswählen</option>';
                                                    foreach($kunden AS $kunde) {
                                                        $html .= '<option value="'.$kunde['kunden_ID'].'">'.$kunde['nachname'].' '.$kunde['vorname'].'</option>';
                                                    };
                                                $html .= '</select>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-flex">
                                                    <input class="form-control mr-4 w-100" style="height:5em;" type="text" value="" placeholder="Nachricht" name="msg" />
                                                    <input class="btn btn-primary" style="height:5em;" type="submit" value="Senden" placeholder="" name="" />
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>';
                    } else {
                        $resUserChat = $db->rawQuery("Call GetChatsMessages(?,?)", array($_SESSION['kid'],$_GET['chatuserid']));

                        if(!empty($resUserChat)) {
                            foreach($resUserChat AS $num => $chat) {
                                $html .= '<div style="'.($num === (count($resUserChat) - 1) ? "" : "border-bottom:1px solid silver;").'">
                                            <div class="d-flex justify-content-between my-2">
                                                <b style="font-size: .7rem;">'.$chat['Zeit'].'</b>
                                                <i style="font-size: .7rem;">'.($chat['VON_ID'] == $_SESSION['kid'] ? 'ich' : $chat['VON_NACHNAME']).'</i>
                                            </div>
                                            <div class="d-flex justify-content-between my-2">
                                                <span>'.$chat['msg_text'].'</span>';
                                                if($chat['gelesen'] == 1 && $chat['VON_ID'] != $_SESSION['kid']) {
                                                    $html .= '<span class="text-success ml-2" style="font-size: .7rem;"><i class="fa fa-check mr-2"></i>Gelesen</span>';
                                                };
                                            $html .= '</div>
                                        </div>';
                            };
                        };
                        $html .= '<form method="POST" action="./Controller/chat.php">
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <div class="d-flex">
                                                <input type="hidden" value="'.$_GET['chatuserid'].'" name="to" />
                                                <input class="form-control mr-4 w-100" style="height:5em;" type="text" value="" placeholder="Nachricht" name="msg" />
                                                <input class="btn btn-primary" style="height:5em;" type="submit" value="Senden" placeholder="" name="" />
                                            </div>
                                        </div>
                                    </div>
                                </form>';
                    };
                $html .= '</div>
            </div>';
echo $html;

?>