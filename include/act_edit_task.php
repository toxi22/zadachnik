<?php
// Запрет прямого вызова файла
defined('_JEXEC') or die('Restricted access');

if($_POST['act_edit_task'] == "1")
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

    // проверям текст задания
    $act_id_task = intval($_POST['act_id_task']);
  	if (empty($act_id_task) OR $act_id_task == 0)
  	{
  		$err[] = "Ошибка получения ID задания";
  	}
  	else
  	{

    }

    // проверям галочку выполнения задания
  	if (empty($_POST['endcheck']) OR $_POST['endcheck'] == 0)
  	{
  		$endcheck = 0;
  		$status_task = $endcheck;
  	}
  	else
  	{
    	$endcheck = 1;
    	$status_task = $endcheck;
    }

    // проверяем, изменился ли тело задачи. Если изменилось, ставим отметку от админа. Если не изменилось, оставляем, как есть
	$query = $dbh->prepare("SELECT * FROM `".$dbtable2."` WHERE `id`=?");
	$query->execute(array($act_id_task));
	while($row = $query->fetch(PDO::FETCH_ASSOC))
	{
		$user_name_var = $row['user_name'];
		$user_email_var = $row['user_email'];
		$task_message_var = $row['task_message'];
		if($row['task_message'] != $task_text){$admin_edit = 1;}else{$admin_edit = 0;}
	}

    if(isset($id_user) AND $id_user != 0)
    {    	//$admin_edit = 1;
    	$header_location_ok = "admin_show.php";
    	$header_location_error = "add.php";
    	$header_location_auth = "admin_show.php";
    }
    else
    {    	//$admin_edit = 0;
    	$header_location_ok = "index.php";
    	$header_location_error = "add.php";
    	$header_location_auth = "./";
    }

   $dt_create = $dtformat;
   $dt_update = $dtformat;

    // если нет ошибок, то выполняем код дальше
  	if (empty($err))
  	{
    	$query = $dbh->prepare("UPDATE `".$dbtable2."` SET `user_name`=?, `user_email`=?, `task_message`=?, `dt_update`=?, `admin_edit`=?, `status`=? WHERE `id`=?");
		$query->execute(array($fio,$email,$task_text,$dt_update,$admin_edit,$status_task,$act_id_task));

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