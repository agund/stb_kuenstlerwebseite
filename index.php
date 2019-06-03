<?php
	session_start();
	//var_dump(session_id());	
	//var_dump($_SESSION);
	$alink = '';
	if(!empty($_GET['alink']))
		$alink = $_GET['alink'];
	
	//require_once("Model/DBCon.php");
	require_once('Views/Shared/header.php');
	
	echo '<main>';
	echo '<div style="padding:2em;">';


	switch($alink)
	{
		case $konst['gallery']:
			require_once('Views/gallery.php');
			break;
		 case $konst['bildsuche']:
			require_once('Views/bildsuche.php');
			break;
			case $konst['register']:
			require_once('Views/register.php');
			break;
			case $konst['login']:
			require_once('Views/login.php');
			break;
			case $konst['kunstler']:
			require_once('Views/kunstler.php');
			break;
			case $konst['bilddetail']:
			require_once('Views/bildDetail.php');
			break;
			case $konst['profil']:
			require_once('Views/profil.php');
			break;
			case $konst['kaufen']:
			require_once('Views/buy.php');
			break;
			case $konst['kustlerdetails']:
			require_once('Views/kunstlerDetails.php');
			break;
			case $konst['bildUpload']:
			require_once('Views/bildUpload.php');
			break;
			case $konst['datenschutz']:
			require_once('Views/Datenschutz.php');
			break;
			
			case $konst['impressum']:
			require_once('Views/Impressum.php');
			break;
			
			case $konst['chat']:
			require_once('Views/chat.php');
			break;
			
			default:
			require_once('Views/startseite.php');
			break;

	}
	echo '</div>';
	echo '</main>';


	$bootTag = '
	<div class="d-sm-none d-md-block d-xl-none d-lg-none" style="position: fixed; right: 0em; bottom: 0; z-index: 99999; font-weight: bold; padding: 2em; background-color: red; color: white">
            md
        </div>

        <div class="d-xl-none d-sm-block d-md-none d-lg-none" style="position: fixed; right: 0em; bottom: 0; z-index: 99998; font-weight: bold; padding: 2em; background-color: red; color: white">
            sm
        </div>

        <div class="d-xl-none d-lg-block d-md-none d-sm-none" style="position: fixed; right: 0em; bottom: 0; z-index: 99998; font-weight: bold; padding: 2em; background-color: red; color: white">
            lg
        </div>
        <div class="d-md-none d-xl-block d-lg-none d-sm-none" style="position: fixed; right: 0em; bottom: 0; z-index: 99998; font-weight: bold; padding: 2em; background-color: red; color: white">
            xl
        </div>
        <div class="d-sm-none d-xl-none d-lg-none d-md-none" style="position: fixed; right: 0em; bottom: 0; z-index: 99998; font-weight: bold; padding: 2em; background-color: red; color: white">
            xs
        </div>
	';

	echo $bootTag;
	
	require_once('Views/Shared/footer.php');
?>