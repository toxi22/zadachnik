<?php
if(isset($_COOKIE['autologin']) AND $_COOKIE['autologin'] == 1)
{
	$id_user = intval($_COOKIE['id']);
		$id_user_var_GLOBAL = $id_user;
	$vcard_user_fio = $_COOKIE['fio'];
		$vcard_user_fio_var_GLOBAL = $vcard_user_fio;
	$vcard_user_login = $_COOKIE['login'];
		$vcard_user_login_var_GLOBAL = $vcard_user_login;
	$autologin = intval($_COOKIE['autologin']);
		$autologin_var_GLOBAL = $autologin;
}
else
{
    $id_user = intval($_SESSION['id']);
    	$id_user_var_GLOBAL = $id_user;
    $vcard_user_login = $_SESSION['login'];
    	$vcard_user_login_var_GLOBAL = $vcard_user_login;
    $vcard_user_fio = $_SESSION['fio'];
    	$vcard_user_fio_var_GLOBAL = $vcard_user_fio;
}
?>