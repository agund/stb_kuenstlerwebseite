<?php

function check_Eingabe($Eingabe)
{
	$is_valide = true;
	$rexSafety = "/^[^<,\@{}()*$%?=>:|;#]*$/i";

	if(strlen(trim($Eingabe)) >=3)
	{	
		if(!preg_match($rexSafety, $Eingabe))
		{
			$is_valide = "Ungültige Zeichen in der Eingabe!";
		}		
	}else 
	{
		$is_valide = "Eingabe zu kurz!";
	}
	return $is_valide;
}
function check_Email($Email)
{
	$is_valide = true;
		if(!filter_var($Email,FILTER_VALIDATE_EMAIL))
			{				
				$is_valide = "Ungültige E-Mail!";
			} 
			return $is_valide;
}
function check_password(string $password)
{	
	$is_valide = true;
	if(strlen(trim($password)) <=3)
	{		
		$is_valide = "Das Passwort muss mindestens 4 Zeichen haben!";
	}
	return $is_valide;
}


function vallidate_iban($iban)
{
$Countries = array('al'=>28,'ad'=>24,'at'=>20,'az'=>28,'bh'=>22,'be'=>16,'ba'=>20,'br'=>29,'bg'=>22,'cr'=>21,'hr'=>21,'cy'=>28,'cz'=>24,'dk'=>18,'do'=>28,'ee'=>20,'fo'=>18,'fi'=>18,'fr'=>27,'ge'=>22,'de'=>22,'gi'=>23,'gr'=>27,'gl'=>18,'gt'=>28,'hu'=>28,'is'=>26,'ie'=>22,'il'=>23,'it'=>27,'jo'=>30,'kz'=>20,'kw'=>30,'lv'=>21,'lb'=>28,'li'=>21,'lt'=>20,'lu'=>20,'mk'=>19,'mt'=>31,'mr'=>27,'mu'=>30,'mc'=>27,'md'=>24,'me'=>22,'nl'=>18,'no'=>15,'pk'=>24,'ps'=>29,'pl'=>28,'pt'=>25,'qa'=>29,'ro'=>24,'sm'=>27,'sa'=>24,'rs'=>22,'sk'=>24,'si'=>19,'es'=>24,'se'=>24,'ch'=>21,'tn'=>24,'tr'=>26,'ae'=>23,'gb'=>22,'vg'=>24);
$is_valide = true;
$iban = trim($iban);
if(strlen($iban) == 22)
{    
    $Länderkürzel = substr($iban,0,2);
    $Ländercode = substr($iban,2,2);
    $RestString = substr($iban,4);

    if($Countries[$Länderkürzel] != $Ländercode || preg_match('/^[0-9]{18}$/',$RestString) != 1)
    {
        $is_valide = "Die Angegebene IBAN ist ungültig!";
	}	
}else
{
	$is_valide = "Die Angegebene IBAN muss 22 Zechen lang sein!";
}

return $is_valide;
}

function vallidate_bic($bic)
{	
	$is_valide = true;
	if(!preg_match("/^([a-zA-Z]){4}([a-zA-Z]){2}([0-9a-zA-Z]){2}([0-9a-zA-Z]{3})?$/", $bic))
		$is_valide = "Die Angegebene BIC ist ungültig!";
	return $is_valide;
}

function vallidate_telefon($telefon)
{	
	$isvallide=true;
	if(is_string($telefon))
	{
   		if(!preg_match('/^(\+[0-9]{2,3}|[0-9]{2,5}).+[\d\s\/\(\)-]/',$telefon) == 1)
   		{		
			$isvallide= "Die angegebene Telefonnumer ist ungültig!";
   		}
	}	
	return $isvallide;
}

function vallidate_Postleitzahl(string $plz)
{	
	$isvallide=true;
	if(!preg_match('/^[0-9]{1}[0-9]{4}$/',$plz) == 1)
	{
		$isvallide= "Die angegebene Postleitzahl ist ungültig!";
	}
	 return $isvallide;
} 

function check_date($date)
{
	$isvallide=true;	
	if(strlen($date)!=0)
	{
		$bdate = new DateTime();
		$current_date = new DateTime("now");
		$bdate->setTimestamp(strtotime($date));
		if($bdate < $current_date)
		{
			
			$diff = date_diff($bdate,$current_date)->y;
			if( $diff < 16)
			{
				{				
					$isvallide= "Sie müssen mindesten 16Jahre alt sein!";
				}	
			}
		}
		else 
		{
			$isvallide= "Das angebene Geburtsdatum ist in der Zukunft!";
		}	
	}
	else 
	{
		$isvallide= "Sie müssen ein Geburtsdatum angeben!";
	}			
	return $isvallide;
}

function check_avatar($avatar)
{
	
	$isvallide=true;
	if(isset($avatar["tmp_name"]) && is_uploaded_file($avatar["tmp_name"]))
	{
    $filename = pathinfo($avatar['name'], PATHINFO_FILENAME);
    $extension = strtolower(pathinfo($avatar['name'], PATHINFO_EXTENSION));	
	//Überprüfung der Dateigröße
	$max_size = 500*1024; //500 KB
	if($avatar['size'] > $max_size) 
	{
		$isvallide = "Bitte keine Dateien größer 500kb hochladen";
	}
 
		//Überprüfung dass das Bild keine Fehler enthält
		if(function_exists('exif_imagetype')) 
		{ //Die exif_imagetype-Funktion erfordert die exif-Erweiterung auf dem Server
		$allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
		$detected_type = exif_imagetype($avatar["tmp_name"]);
			if(!in_array($detected_type, $allowed_types)) 
			{
				$isvallide ="Nur der Upload von Bilddateien ist gestattet";
			}
		}
	}else $isvallide = "Sie müssen ein Bild hochladen!";	
	
	return $isvallide;
}
?>

