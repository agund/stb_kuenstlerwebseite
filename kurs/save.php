<?php
	error_reporting(E_ALL);
	$funktion = $_GET['funktion'];
	if($funktion == '')
		$funktion = $_POST['funktion'];


	include "konfig.php";
	require_once("db.php");
	$dbc = new MysqliDb($config);

	if($funktion == 'saveProfil')
	{

	}

	if($funktion =='gekauft')
	{
		$aktie=$_POST['aktie_name'];
		$eingekauftAm = $_POST['eingekauft_am'];
		$vk = $_POST['vk'];
		$ek=$_POST['ek'];
		$stueck=$_POST['stueck'];
		$verkauftAm =$_POST['verkauft_am'];
		$koCall = $_POST['ko_call'];
		$koPut = $_POST['ko_put'];

		$res = $dbc->rawQuery("Call addKurs(?,?,?,?,?,?,?,?,?,?)",array(
			$aktie
			,$vk
			,$ek
			, $stueck
			,$verkauftAm
			,$eingekauftAm
			,null
			,null
			,null
			,null
		));
		header('Location: index.php?u=1');
	}

	if($funktion =='changeTransaktion')
	{

	}

	if($funktion =='verkauft')
	{
		//var_dump($_POST);
		//exit;
		/*
		IN p_kurs_id int,
		IN p_vk decimal(9,3),
		IN p_vk_am datetime,
		IN p_user_id int
		*/ 
		//$dParts = explode("-",$_POST['vk_am']);
		$kursID=$_POST['kursID'];
		$verkauftAm = $_POST['verkauft_am'];
		$vk = $_POST['vk'];
		$userID=$_POST['userID'];
		$res = $dbc->rawQuery("Call endKurs(?,?,?,?)",array(
			$kursID,
			$vk,
			$verkauftAm,
			$userID
		));
		header('Location: index.php?u=1');
	}
	
?>