<?php
// Запрет прямого вызова файла
defined('_JEXEC') or die('Restricted access');

if($_POST['act_add_task'] == "1")
{
	// собираем в массив возникшие ошибки при регистрации
	$err = array();

    // проверям fio
    $fio = strip_tags($_POST['fio']);
    $fio = htmlspecialchars($fio);
  	if (empty($fio))
  	{
  		$err[] = "Вы не ввели ФИО";
  	}
	else
  	{
    	if(strlen($fio) < 4 or strlen($fio) > 50)
    	{
        	$err[] = "Длина ФИО должна быть от 4 до 50 символов";
    	}
    }

    // проверям email
    $email = strip_tags($_POST['email']);
    $email = htmlspecialchars($email);
  	if (empty($email))
  	{
  		$err[] = "Вы не ввели email";
  	}
  	else
  	{
    	if(strlen($email) < 5 or strlen($email) > 50)
    	{
        	$err[] = "Длина email должна быть от 5 до 50 символов";
    	}

    }

    // проверям текст задания
    $task_text = strip_tags($_POST['task_text']);
    $task_text = htmlspecialchars($task_text);
  	if (empty($task_text))
  	{
  		$err[] = "Вы не ввели текст задания";
  	}
  	else
  	{
    	if(strlen($task_text) < 5 or strlen($task_text) > 1000)
    	{
        	$err[] = "Длина текста задания должна быть от 5 до 1000 символов";
    	}

    }

	// проверяем, авторизирован ли пользователь
    if(isset($id_user) AND $id_user != 0)
    {    	$admin_edit = 1;
    	$header_location_ok = "admin_show.php";
    	$header_location_error = "add.php";
    	$header_location_auth = "admin_show.php";
    }
    else
    {    	$admin_edit = 0;
    	$header_location_ok = "index.php";
    	$header_location_error = "add.php";
    	$header_location_auth = "./";
    }

   $dt_create = $dtformat;
   $dt_update = $dtformat;

    // если нет ошибок, то выполняем код дальше
  	if (empty($err))
  	{
    	$query = $dbh->prepare("INSERT INTO `".$dbtable2."` SET `user_name`=?, `user_email`=?, `task_message`=?, `dt_create`=?, `dt_update`=?, `admin_edit`=?, `status`='0'");
		$query->execute(array($fio,$email,$task_text,$dt_create,$dt_update,$admin_edit));

		$_SESSION['messages'] = "<b><font color=green>Событие добавлено.</font></b>";
		header("Location: ".$header_location_ok); exit();
	}
}
else
{
	header("Location: ".$header_location_auth); exit(); // Если права доступа не разрешены, то перекидываем пользовтеля на гравную страницу
}

// Выводим ошибки, если они есть
if(!empty($err))
{
	print "<center><b><font color=black>Произошли следующие ошибки:</font></b></center><br>";
	foreach($err AS $error)
	{
    	$_SESSION['messages'] .= "<b><font color=red>".$error."</font></b><br>";
	}

	header("Location: ".$header_location_error); exit();
}
?>