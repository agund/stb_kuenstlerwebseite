<?php
include "Reg_Validierung.php";

/*
    Bekommt die Daten eines Kunden und legt diesen an. 
    Als R�ckgabe wird die ID des Kunden zur�ckgegeben.
*/ 
$fehlerfeld = array();
$save_eingabe = array();

$anrede=$_POST['anrede'];
$fehlerfeld['save_eingabe']['anrede']= $_POST['anrede'] ;
$titel = check_Eingabe($_POST['titel']);
($titel===true)?$fehlerfeld['save_eingabe']['titel']= $_POST['titel'] : $fehlerfeld['fehler']['titel'] = $titel;
$vorname = check_Eingabe($_POST['vorname']);
($vorname===true)?$fehlerfeld['save_eingabe']['vorname']= $_POST['vorname']: $fehlerfeld['fehler']['vorname'] = $vorname;
$login_name = check_Eingabe($_POST['login_name']);
($login_name===true)?$fehlerfeld['save_eingabe']['login_name']= $_POST['login_name']: $fehlerfeld['fehler']['login_name'] = $login_name;
$nachname = check_Eingabe($_POST['nachname']);
($nachname===true)? $fehlerfeld['save_eingabe']['nachname'] = $_POST['nachname']: $fehlerfeld['fehler']['nachname'] = $nachname;
$adresse = check_Eingabe($_POST['adresse']);
($adresse===true)? $fehlerfeld['save_eingabe']['adresse'] = $_POST['adresse']: $fehlerfeld['fehler']['adresse'] = $adresse;
$ort = check_Eingabe($_POST['ort']);
($ort===true)? $fehlerfeld['save_eingabe']['ort'] = $_POST['ort']: $fehlerfeld['fehler']['ort']=$ort;
$password = check_password($_POST['password']);
($password===true)? $password = password_hash($_POST['password'],PASSWORD_DEFAULT): $fehlerfeld['fehler']['password']=$password;
$plz = vallidate_Postleitzahl($_POST['plz']);
($plz===true)? $fehlerfeld['save_eingabe']['plz'] = $_POST['plz']: $fehlerfeld['fehler']['plz']=$plz;
$geburtstag = check_date($_POST['geburtstag']);
($geburtstag===true)? $fehlerfeld['save_eingabe']['geburtstag'] = $_POST['geburtstag']: $fehlerfeld['fehler']['geburtstag']=$geburtstag;
$email = check_Email($_POST['email']);
($email===true)? $fehlerfeld['save_eingabe']['email'] = $_POST['email']: $fehlerfeld['fehler']['email']=$email;
$telefon = vallidate_telefon($_POST['telefon']);
($telefon===true)? $fehlerfeld['save_eingabe']['telefon'] = $_POST['telefon']: $fehlerfeld['fehler']['telefon']=$telefon;

$reg_ip = GetHostByName(GetHostName());
$reg_datum = date("Y-n-j");
$status = "aktiv";

if(isset($_POST['isKuenstler']))
$isKuenstler = ($_POST['isKuenstler']) ? true : false;
else
$isKuenstler = false;
$fehlerfeld['save_eingabe']['isKuenstler'] = $isKuenstler;

if($isKuenstler)
{
    $pseudonym = check_Eingabe($_POST['pseudonym']);
    ($pseudonym===true)?$fehlerfeld['save_eingabe']['pseudonym'] = $_POST['pseudonym']: $fehlerfeld['fehler']['pseudonym']=$pseudonym;
    $potrait=htmlspecialchars($_POST['potrait']);
    $fehlerfeld['save_eingabe']['potrait'] = $potrait;    
    $bic = vallidate_bic($_POST['bic']);
    ($bic===true)?$fehlerfeld['save_eingabe']['bic'] = $_POST['bic']: $fehlerfeld['fehler']['bic']=$bic;
    $iban = vallidate_iban($_POST['iban']);
    ($iban===true)?$fehlerfeld['save_eingabe']['iban'] = $_POST['iban']: $fehlerfeld['fehler']['iban']=$iban;

    $avatar = check_avatar($_FILES['avatar']);
    if($avatar === true )
    {
        $fehlerfeld['save_eingabe']['avatar'] = $_FILES['avatar'];

        $fp = fopen($_FILES['avatar']["tmp_name"], "r");
        var_dump($fp);
        
        while(!feof($fp))
        {
            $avatar_pic = fgets($fp,1024*1024);
        }
    }else $fehlerfeld['fehler']['avatar'] = $avatar;
}

include "../konfig.php";
include "../Model/DBCon.php";

echo empty($fehlerfeld['fehler']);
var_dump($fehlerfeld);
//Pr�fen auf Fehler
if(empty($fehlerfeld['fehler']) == 1)
{
    $db = new MysqliDb($config);
    $res = false;
    if(!$isKuenstler){
        $res = $db->rawQuery("Call AddRegisterKunde(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",array(
            $anrede
            ,$fehlerfeld['save_eingabe']['titel']
            ,$fehlerfeld['save_eingabe']['vorname']
            ,$fehlerfeld['save_eingabe']['nachname']
            ,$fehlerfeld['save_eingabe']['adresse']
            ,$fehlerfeld['save_eingabe']['plz']
            ,$fehlerfeld['save_eingabe']['ort']
            ,$fehlerfeld['save_eingabe']['geburtstag']
            ,$fehlerfeld['save_eingabe']['email']
            ,$fehlerfeld['save_eingabe']['telefon'] 
            ,$reg_ip
            ,$reg_datum
            ,$status
            ,$fehlerfeld['save_eingabe']['login_name']
            ,$password
        ));   
        } else {
            $res = $db->rawQuery("Call AddRegisterKuenstler(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",array(
                $anrede
                ,$fehlerfeld['save_eingabe']['titel']
                ,$fehlerfeld['save_eingabe']['vorname']
                ,$fehlerfeld['save_eingabe']['nachname']
                ,$fehlerfeld['save_eingabe']['adresse']
                ,$fehlerfeld['save_eingabe']['plz']
                ,$fehlerfeld['save_eingabe']['ort']
                ,$fehlerfeld['save_eingabe']['geburtstag']
                ,$fehlerfeld['save_eingabe']['email']
                ,$fehlerfeld['save_eingabe']['telefon'] 
                ,$reg_ip
                ,$reg_datum
                ,$status
                ,$avatar_pic
                ,$potrait
                ,$fehlerfeld['save_eingabe']['pseudonym']
                ,$fehlerfeld['save_eingabe']['iban']
                ,$fehlerfeld['save_eingabe']['bic']
                ,$fehlerfeld['save_eingabe']['login_name']
                ,$password
            ));                        
        }

        session_start(); 
        $_SESSION['login'] = $fehlerfeld;
        header('Location: ../index.php?alink=login');           
        
}else
{
    //Wo Fehler
    session_start(); 
    $_SESSION['fehler'] = $fehlerfeld;
    //require_once('../Views/register.php');    
        $_SERVER['REQUEST_URI']; 
    //var_dump(empty($fehlerfeld['fehler']));
    header('Location: ../index.php?alink=register');    
   //var_dump($fehlerfeld);
}




//var_dump($res[0]["k_id"]);


//$dbc = new DBCon();
//$db = $dbc->getInstance();
//
//$proc = $dbc->setProcedure("register",'AddRegister');
//$dbc->bindProcedureParam('register','p_anrede',$anrede);
//$dbc->bindProcedureParam('register','p_titel',$titel);
//$dbc->bindProcedureParam('register','p_vorname',$vorname);
//$dbc->bindProcedureParam('register','p_nachname',$nachname);
//$dbc->bindProcedureParam('register','p_adresse',$adresse);
//$dbc->bindProcedureParam('register','p_plz',$plz);
//$dbc->bindProcedureParam('register','p_ort',$ort);
//$dbc->bindProcedureParam('register','p_geburtstag',$geburtstag);
//$dbc->bindProcedureParam('register','p_email',$email);
//$dbc->bindProcedureParam('register','p_telefon',$telefon);
//$dbc->bindProcedureParam('register','p_regid',$reg_ip);
//$dbc->bindProcedureParam('register','p_regdatum',$reg_datum);
//$dbc->bindProcedureParam('register','p_status',$status);
///*
//$dbc->bindProcedureParam('register','p_avatar',$avatar);
//$dbc->bindProcedureParam('register','p_potrait',$portrait);
//$dbc->bindProcedureParam('register','p_pseudonym',$pseudonym);
//$dbc->bindProcedureParam('register','p_iban',$iban);
//$dbc->bindProcedureParam('register','p_bic',$bic);
//*/
//$arr = $dbc->execute_Procedure("register");

//http://localhost/kunst/Controller/register.php?anrede=Herr&vorname=max&nachname=Mustermann&adresse=skstr&plz=12345&ort=berlin&geburtstag=2019-03-13&email=test@test.de&telefon=030&regip=123.123.123.123&regdatum=2019-03-13&status=aktiv&titel=


?>