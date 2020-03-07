<?php
if (isset($_GET['logout']))
{	session_start();
	// Unset все переменные сессии.
	session_unset();

	// удаляем сессию
	session_destroy();

	// удаляем куки
	setcookie('id', '', 0);
	setcookie('fio', '', 0);
	setcookie('login', '', 0);
	setcookie('autologin', '', 0);

	// и переносим его на главную
	header('Location: ./'); exit();
}
?>