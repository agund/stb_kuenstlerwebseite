<?php
	/**
	 * Session will be started
	 */
	session_start();

	/**
	 * Get Link informations
	 */
	$alink = empty($_GET['alink']) ? "" : $_GET['alink'];
	
	/**
	 * Print out the body
	 */
	require_once('Views/Shared/header.php');
	echo '<main>
			<div class="big-padding">';
			switch($alink) {
				case $konst['gallery']:
					include_once('Views/gallery.php');
					break;
				case $konst['bildsuche']:
					include_once('Views/bildsuche.php');
					break;
				case $konst['register']:
					include_once('Views/register.php');
					break;
				case $konst['login']:
					include_once('Views/login.php');
					break;
				case $konst['kunstler']:
					include_once('Views/kunstler.php');
					break;
				case $konst['bilddetail']:
					include_once('Views/bildDetail.php');
					break;
				case $konst['profil']:
					include_once('Views/profil.php');
					break;
				case $konst['kaufen']:
					include_once('Views/buy.php');
					break;
				case $konst['kustlerdetails']:
					include_once('Views/kunstlerDetails.php');
					break;
				case $konst['bildUpload']:
					include_once('Views/bildUpload.php');
					break;
				case $konst['datenschutz']:
					include_once('Views/Datenschutz.php');
					break;
				case $konst['impressum']:
					include_once('Views/Impressum.php');
					break;
				case $konst['chat']:
					include_once('Views/chat.php');
					break;
				default:
					include_once('Views/startseite.php');
					break;
			};
		echo '</div>
	</main>
	<div class="d-sm-none d-md-block d-xl-none d-lg-none size-notify">
		md
	</div>

	<div class="d-xl-none d-sm-block d-md-none d-lg-none size-notify">
		sm
	</div>

	<div class="d-xl-none d-lg-block d-md-none d-sm-none size-notify">
		lg
	</div>
	<div class="d-md-none d-xl-block d-lg-none d-sm-none size-notify">
		xl
	</div>
	<div class="d-sm-none d-xl-none d-lg-none d-md-none size-notify">
		xs
	</div>';
	require_once('Views/Shared/footer.php');
?>