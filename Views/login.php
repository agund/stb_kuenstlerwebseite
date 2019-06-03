<?php

$html = '';

$html .= '<section class="bg-light" style="padding:2em;">';
$html .= '<h2>Login</h2>';
if(!empty($_GET['Error']) && $_GET['Error'] =='true')
{
    $html .= '<p class="alert-danger" style="padding:1em;" > Login Fehlgeschlagen</p>';
}
$html .= '<form method="GET" action="Controller/login.php">';
$html .= '<label for="benutzername">Benutzername</label>';
$html .= '<input type="text" name="username" id="benutzername" class="form-control" placeholder="Benutzername"/>';
$html .= '<label for="passwort">Passwort</label>';
$html .= '<input type="password" name="password" id="passwort" class="form-control" placeholder=""/>';
$html .= '<input type="hidden" name="PHPSESSID" id="PHPSESSID" value="'.session_id().'"/>';
$html .= '<a href="index.php?alink=register" > Registrieren </a>';
$html .= '<div><input type="submit"  value="login" class="btn btn-primary" /> </div>';
$html .= '</form>';
$html .= '</section>';

echo $html;

?>