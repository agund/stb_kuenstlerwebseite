<?php

if(empty($_SESSION['kid']))
    {
        header('Location: index.php');
        exit;
    }

$html = '';

//$html .= '<div class="row">';

include "konfig.php";
include "Model/DBCon.php";
$db = new MysqliDb($config);
$res = $db->rawQuery("Call GetChats(?)",array($_SESSION['kid']));

// var_dump($res);
// echo 'SESSID:'.$_SESSION['kid'];
$html .= '<div style="float:left;" class="col-3">';

$html .= '<div class="bg-light col-12" style="border: 1px solid silver;" >';
$html .= '<div style="width:200%;padding:0.5em;">';
$html .= '<span><i class="fa fa-address-book" style="float:left;font-size:1.5em;color:silver;"></i><form style="margin:0;"> <input type="hidden" value="0" name="chatuserid" /><input type="hidden" value="chat" name="alink" />  <input type="submit" style="border:0;" class="bg-light" value="Neuer Chat" /> </form></span>';
$html .= '</div>';
$html .= '</div>';
for ($i=0; $i < count($res); $i++) { 
    if($res[$i]['ID'] != null){
        $html .= '<div class="bg-light col-12" style="border: 1px solid silver;" >';
        $html .= '<div style="width:200%;padding:0.5em;">';
        $html .= '<span>
        <i class="	fa fa-address-card" style="float:left;font-size:1.5em;color:silver;"></i>
        <form style="margin:0;"> <input type="hidden" value="'.$res[$i]['ID'].'" name="chatuserid" /><input type="hidden" value="chat" name="alink" /> <input type="submit" style="border:0;" class="bg-light" value="'.$res[$i]['NACHNAME'].' '.$res[$i]['VORNAME'].'" /> </form></span>';
        $html .= '</div>';
        $html .= '</div>';
    }
    
}

//$html .= '<div class="bg-light col-12" style="border: 1px solid silver;" >';
//$html .= '<div style="width:200%;padding:0.5em;">';
//$html .= '<span>MAyer</span>';
//$html .= '</div>';
//$html .= '</div>';


$html .= '</div>';

$html .= '<div class="bg-light offset-3 col-9" style="padding:0;">';
$html .= '<div style="width:100%;height:100%;">';

//var_dump($_GET['chatuserid']);
if(isset($_GET['chatuserid']))
{
    if($_GET['chatuserid']==0)
    {
        $html .= '<div style="padding:1em;">';
        $html .= '<form method="POST" action="./Controller/chat.php">';
       
        $html .= '<div class="col-12" style="padding:0;">';
        $html .= '<select name="to" id="toSelect" class="custom-select col-3" >';
        $html .= '<option></option>';

        $kunden = $db->rawQuery("Call GetAllKunden()");

        //var_dump($kunden);
        for ($i=0; $i <count($kunden) ; $i++) { 
                $html .= '<option value="'.$kunden[$i]['kunden_ID'].'">'.$kunden[$i]['nachname'].' '.$kunden[$i]['vorname'].'</option>';
        }
        $html .= '</select>';
        $html .= '</div>';

        //$html .= '<input type="hidden" value="'.$_GET['chatuserid'].'" name="to" />';
        $html .= '<input class="form-control mr-4" style="height:5em;width:88%;float:left;" type="text" value="" placeholder="Nachricht" name="msg" />';
        $html .= '<input class="btn btn-primary" style="height:5em;width:10%;float:right;" type="submit" value="Senden" placeholder="" name="" />';
        $html .= '</form>';
        $html .= '</div>';
    } 
    else
    {
        $resUserChat = $db->rawQuery("Call GetChatsMessages(?,?)",array($_SESSION['kid'],$_GET['chatuserid']));
        //var_dump($resUserChat);

        for ($i=0; $i < count($resUserChat); $i++) { 
            $html .= '<div style="border-bottom:1px solid silver;padding:0.5em;height:3.3em;">';
            $html .= '<span style="font-weight:bold; '.($resUserChat[$i]['VON_ID']==$_SESSION['kid']?'float:right;right:0;':'float:left;left:0;').' '.($resUserChat[$i]['gelesen']==0?'font-weight:bold;':'font-weight:normal;').' "> '.$resUserChat[$i]['msg_text'].'</span>';
            $html .= '<span style="font-weight:bold;font-size:0.65em;'.($resUserChat[$i]['VON_ID']==$_SESSION['kid']?'float:left;left:0;':'float:right;right:0;').'"> '.$resUserChat[$i]['Zeit'].' </span>';
            $html .= '<br />';
            if($resUserChat[$i]['gelesen']==1 && $resUserChat[$i]['VON_ID']!=$_SESSION['kid'])
            $html .= '<i class="fa fa-check" style="float:right;font-size:0.7em;padding:0.2em;color:green;"></i>';
            $html .= '<span style="font-weight:bold;font-size:0.65em;'.($resUserChat[$i]['VON_ID']==$_SESSION['kid']?'float:left;left:0;':'float:right;right:0;').'">  '.($resUserChat[$i]['VON_ID']==$_SESSION['kid']?'ich':$resUserChat[$i]['VON_NACHNAME']).'</span>';
            $html .= '</div>';    
        }

        $html .= '<div style="position:absolute;bottom:0;padding:1em;width:100%;" >';
        $html .= '<form method="POST" action="./Controller/chat.php">';
        $html .= '<input type="hidden" value="'.$_GET['chatuserid'].'" name="to" />';
        $html .= '<input class="form-control mr-4" style="height:5em;width:88%;float:left;" type="text" value="" placeholder="Nachricht" name="msg" />';
        $html .= '<input class="btn btn-primary" style="height:5em;width:10%;float:right;" type="submit" value="Senden" placeholder="" name="" />';
        $html .= '</form>';
        $html .= '</div>';
    }
}

$html .= '</div >';
$html .= '</div>';





//$html .= '</div>';

echo $html;

?>