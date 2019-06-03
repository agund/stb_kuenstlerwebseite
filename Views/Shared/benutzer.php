<?php
include "./Model/check_fehler.php";
    $html = '';

    (!empty($_SESSION['fehler']))? $fehler = $_SESSION['fehler']:$fehler=null;
        
    $is_valide = '';
    $valide = '';
    $fehler_feld = '';
    $save_feld = '';    
   
    $html .='<section class="bg-light" style=padding:2em;">';
    $html .= '<h2> Registrierung </h2>';    
    $html .= '<form action="./Controller/register.php" method="POST" enctype="multipart/form-data">';
    //1.
    $html .= '<div class="form-row " style= "margin-bottom:10px; padding-bottom: 10px;">';
    $html .= '<div class="col-auto pb-2 mb-3 ml-5">';
    $html .= '<label>Anrede</label>';
    $html .= '<div><select name="anrede" class="custom-select form-control" >';
    $html .= '<option value="Herr">Herr</option>';
    $html .= '<option value="Frau">Frau</option>';
    $html .= '</select></div>';
    $html .= '</div>';

    $titel = new check_fehler();
    $titel->prüfen('titel', $fehler);
    $html .= '<div class="col-auto pb-2 mb-3 ml-5">';
    $html .= '<label for="titel">Titel</label>';
    $html .= '<input name="titel" type="text" class="form-control '.$titel->is_valide.'" id="titel" value="'.$titel->save_feld.'" />';
    $html .= '<div class="'.$titel->valide.'-feedback">'.$titel->fehler_feld.'</div>'; 
    $html .= '</div>';

    $login_name = new check_fehler();
    $login_name->prüfen('login_name', $fehler);
    $html .= '<div class="col-auto pb-2 mb-3 ml-5">';
    $html .= '<label for="login_name">Benutzername</label>';
    $html .= '<input name="login_name" type="text" class="form-control '.$login_name->is_valide.'" id="titel" value="'.$login_name->save_feld.'" />';
    $html .= '<div class="'.$login_name->valide.'-feedback">'.$login_name->fehler_feld.'</div>'; 
    $html .= '</div>';
    $html .= '</div>';
    
    //2.
    $html .= '<div class="form-row " style= "margin-bottom:10px; padding-bottom: 10px;">';
    $vorname = new check_fehler();
    $vorname->prüfen('vorname', $fehler);
    $html .= '<div class="col-auto pb-2 mb-3 ml-5">';
    $html .= '<label for="vorname">Vorname</label>';
    $html .= '<input name="vorname" type="text" class="form-control '.$vorname->is_valide.'" id="vorname" value="'.$vorname->save_feld.'"  />';
    $html .= '<div class="'.$vorname->valide.'-feedback">'.$vorname->fehler_feld.'</div>';    
    $html .= '</div>';
    
    $nachname = new check_fehler();
    $nachname->prüfen('nachname', $fehler);
    $html .= '<div class="col-auto pb-2 mb-3 ml-5">';
    $html .= '<label for="nachname">Nachname</label>';
    $html .= '<input name ="nachname" type="text" class="form-control '.$nachname->is_valide.'" id="nachname" value="'.$nachname->save_feld.'" />';
    $html .= '<div class="'.$nachname->valide.'-feedback">'.$nachname->fehler_feld.'</div>'; 
    $html .= '</div>';  

    
    $password = new check_fehler();
    $password->prüfen('password', $fehler);    
    $html .= '<div class="col-auto pb-2 mb-3 ml-5">';
    $html .= '<label for="password">Passwort</label>';
    $html .= '<input name ="password" type="password" class="form-control '.$password->is_valide.'" id="password" value="'.$password->save_feld.'"  />';
    $html .= '<div class="'.$password->valide.'-feedback">'.$password->fehler_feld.'</div>';
    $html .= '</div>';
    $html .= '</div>';

    //3.
    $plz = new check_fehler();
    $plz->prüfen('plz', $fehler);
    $html .= '<div class="form-row " style= "margin-bottom:10px; padding-bottom: 10px;">';
    $html .= '<div class="col-auto pb-2 mb-3 ml-5">';
    $html .= '<label for="plz">PLZ</label>';
    $html .= '<input name="plz" type="number" class="form-control '.$plz->is_valide.'" id="plz" value="'.$plz->save_feld.'" />';
    $html .= '<div class="'.$plz->valide.'-feedback">'.$plz->fehler_feld.'</div>';
    $html .= '</div>';

    $adresse = new check_fehler();
    $adresse->prüfen('adresse', $fehler);
    $html .= '<div class="col-auto pb-2 mb-3 ml-5">';
    $html .= '<label for="adresse">Adresse</label>';
    $html .= '<input name="adresse" type="text" class="form-control '.$adresse->is_valide.'" id="adresse" value="'.$adresse->save_feld.'" />';
    $html .= '<div class="'.$adresse->valide.'-feedback">'.$adresse->fehler_feld.'</div>';
    $html .= '</div>';

    $ort = new check_fehler();
    $ort->prüfen('ort', $fehler);
    $html .= '<div class="col-auto pb-2 mb-3 ml-5">';
    $html .= '<label>Ort</label>';
    $html .= '<input name="ort" type="text" class="form-control '.$ort->is_valide.'" id="" value="'.$ort->save_feld.'" />';
    $html .= '<div class="'.$ort->valide.'-feedback">'.$ort->fehler_feld.'</div>';
    $html .= '</div>';
    $html .= '</div>';

    //4.
    $geburtstag = new check_fehler();
    $geburtstag->prüfen('geburtstag', $fehler);
    $html .= '<div class="form-row " style= "margin-bottom:10px; padding-bottom: 10px;">';
    $html .= '<div class="col-auto pb-2 mb-3 ml-5">';
    $html .= '<label>Geburtsdatum</label>';
    $html .= '<input name="geburtstag" type="date" class="form-control '.$geburtstag->is_valide.'" id="" value="'.$geburtstag->save_feld.'" />';
    $html .= '<div class="'.$geburtstag->valide.'-feedback">'.$geburtstag->fehler_feld.'</div>';
    $html .= '</div>';

    $Email = new check_fehler();
    $Email->prüfen('email', $fehler);
    $html .= '<div class="col-auto pb-2 mb-3 ml-5">';
    $html .= '<label>Email</label>';
    $html .= '<input name="email" type="email" class="form-control '.$Email->is_valide.'" id="" value="'.$Email->save_feld.'" />';
    $html .= '<div class="'.$Email->valide.'-feedback">'.$Email->fehler_feld.'</div>';
    $html .= '</div>';

    $telefon = new check_fehler();
    $telefon->prüfen('telefon', $fehler);
    $html .= '<div class="col-auto pb-2 mb-3 ml-5">';
    $html .= '<label>Telefon</label>';
    $html .= '<input name="telefon" type="text" class="form-control '.$telefon->is_valide.'" id="" value="'.$telefon->save_feld.'" />';
    $html .= '<div class="'.$telefon->valide.'-feedback">'.$telefon->fehler_feld.'</div>';
    $html .= '</div>';
    $html .= '</div>';
    
    (($fehler['save_eingabe']['isKuenstler'])==1) ?$checked ="checked" :$checked ="";
    $html .= '<div class="col-auto pb-2 mb-3 ml-5">';   
    $html .= '<label>Ich bin Künstler</label>';
    $html .= '<input name="isKuenstler" type="checkbox" class="form-control col-1" id="isKuenstler" value="1" style="padding:0;" '.$checked.'/> '; 
    $html .= '</div>'; 

    //hidden
    $html .= '<div id="submenu" class="submenu_show" style= "margin-bottom:10px; padding-bottom: 10px;">';
    //5.
    $potrait = new check_fehler();
    $potrait->prüfen('potrait', $fehler);
    $html .= '<div class="form-row " style= "margin-bottom:10px; padding-bottom: 10px;">';
    $html .= '<div class="col-auto pb-2 mb-3 ml-5">';
    $html .= '<label>Potrait</label>';
    $html .= '<textarea name="potrait"  class="form-control " id="" value="'.$potrait->save_feld.'" ></textarea>'; //Künstlerbeschreibung
    $html .= '</div>';

    $pseudonym = new check_fehler();
    $pseudonym->prüfen('pseudonym', $fehler);
    $html .= '<div class="col-auto pb-2 mb-3 ml-5">';
    $html .= '<label>Pseudonym</label>';
    $html .= '<input name="pseudonym" type="text" class="form-control '.$pseudonym->is_valide.'" id="" value="'.$pseudonym->save_feld.'" />';
    $html .= '<div class="'.$pseudonym->valide.'-feedback">'.$pseudonym->fehler_feld.'</div>';
    $html .= '</div>';

    $avatar = new check_fehler();
    $avatar->prüfen('avatar', $fehler);
    $html .= '<div class="col-auto pb-2 mb-3 ml-5">';
    $html .= '<label>Avatar</label>';
    $html .= '<div class="custom-file">';
    $html .= '<input name="avatar" type="file" class="custom-file-input '.$avatar->is_valide.'" value="'.$avatar->save_feld.'" id="customFile">';
    $html .= '<label class="custom-file-label" for="customFile">Bitte hier ihr Bild hochladen.</label>';
    $html .= '<div class="'.$avatar->valide.'-feedback">'.$avatar->fehler_feld.'</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';

    //6.
    $iban = new check_fehler();
    $iban->prüfen('iban', $fehler);
    $html .= '<div class="form-row " style= "margin-bottom:10px; padding-bottom: 10px;">';
    $html .= '<div class="col-auto pb-2 mb-3 ml-5">';
    $html .= '<label>IBAN</label>';
    $html .= '<input name="iban" type="text" class="form-control '.$iban->is_valide.'" id="" value="'.$iban->save_feld.'" />';
    $html .= '<div class="'.$iban->valide.'-feedback">'.$iban->fehler_feld.'</div>';
    $html .= '</div>';

    $bic = new check_fehler();
    $bic->prüfen('bic', $fehler);
    $html .= '<div class="col-auto pb-2 mb-3 ml-5">';
    $html .= '<label>BIC</label>';
    $html .= '<input name="bic" type="text" class="form-control '.$bic->is_valide.'" id="" value="'.$bic->save_feld.'" />';
    $html .= '<div class="'.$bic->valide.'-feedback">'.$bic->fehler_feld.'</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';

    

    $html .= '<div class="col-auto pb-2 mb-3 ml-5">';
    $html .= '<input name ="" type="submit" class="btn btn-primary" id="" value="Speichern">';
    $html .= '</div>';
    
    $html .= '</form>';
    $html .= '</section>';
    

    echo $html;



    session_destroy();
?>