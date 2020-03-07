<?php
// Запрет прямого вызова файла
defined('_JEXEC') or die('Restricted access');

	if (isset($_POST['login']) && isset($_POST['pass']))
	{		$email = mb_strtolower($_POST['login']);
		$pass = md5($_POST['pass'].$hash);
		$pass_nohash = $_POST['pass'];
		$query = $dbh->prepare("SELECT COUNT(*) AS ROW_NUM FROM `".$dbtable1."` WHERE `login`=? AND `pass`=? LIMIT 1");
    	$query->execute(array($email,$pass));
    	$row = $query->fetch(PDO::FETCH_ASSOC);
    	//$_SESSION['messages'] = "SQL: ".$email." | ".$pass;
    	if($row['ROW_NUM'] == 0)
    	{
    		$_SESSION['messages'] = "Неверный логин/пароль, либо такого пользователя не существует.";

    		header('Location: ./admin.php'); exit;
    	}
    	else
    	{			$query = $dbh->prepare("SELECT * FROM `".$dbtable1."` WHERE `login`=? AND `pass`=? LIMIT 1");
    		$query->execute(array($email,$pass));
    		while($row = $query->fetch(PDO::FETCH_ASSOC))
    		{
    				// Если пользователь поставил отметку "запомнить", то ставим куки пользователю без сессии.
    				if(!empty($_POST['autologin']))
    				{
						// продлеваем на год куки
						setcookie("id", $row['id'], time()+3600*24*365);
    					setcookie("fio", $row['fio'], time()+3600*24*365);
    					setcookie("login", $row['login'], time()+3600*24*365);
    					setcookie("autologin", "1", time()+3600*24*365);
    				}
    				else
    				{
        				$_SESSION['id'] = $row['id'];
        				$_SESSION['fio'] = $row['fio'];
        				$_SESSION['login'] = $row['login'];
    				}

					// если нет ошибок, то после авторизации перекидываем пользователя на закрытую страницу
    				header('Location: admin_show.php'); exit;
    		}
    	}
    }
    else
    {
    	$_SESSION['messages'] = "Вы не ввели e-mail/пароль";
    	header('Location: ./admin.php'); exit;
    }
?>