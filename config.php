<?php
// Старт сесии в каждом файле
//session_start();

// Данные для mysql сервера
try
{
	$dbhost = "localhost"; // Хост базы данных
	$dbuser = "root"; // Логин пользователя базы данных
	$dbpassword = ""; // Пароль пользователя базы данных
	$dbname = "zadachnik"; // Имя базы данных
	$dbprefix = "zdchnk_"; // Префикс таблиц базы данных
	$opt = array(
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    );
	$dbh = new PDO ("mysql:host=$dbhost;dbname=$dbname;charset=utf8","$dbuser","$dbpassword",$opt);
	// $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	// Версия PHP 5.3.6 и ниже, а так же можно использовать и для версий выше
	$dbh->exec("set character_set_client='utf8'");
	$dbh->exec("set character_set_results='utf8'");
	$dbh->exec("set collation_connection='utf8_general_ci'");
	// Версия PHP 5.3.6 и ниже, а так же можно использовать и для версий выше
}
catch (PDOException $e)
{
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
}

	$dbtable1 = $dbprefix."vcard_users";
	$dbtable2 = $dbprefix."data";

	$dtformat = date("Y-m-d H:i:s"); // Дата и время для форм

	$hash = "7xjMj6sLjv30dXT260jT0D95JtE8CgHz"; // Используется для хеширования паролей. В случае смены хеша, пользователям придется восстанавливать пароли. Изменяйте его перед открытием регистрации. Длина 32 символа.

	$AdminEmail = "admin@localhost"; // Укажите e-mail администратора сайта, который будет подставляться в отправляемые письма.
	$siteurl = $_SERVER['SERVER_NAME'];
	//$scripturl = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	$scripturl = $siteurl."/";
	$sitename = "Задачник"; // Название анкеты/регистрации
?>