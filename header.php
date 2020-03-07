<?php
// Старт сесии в каждом файле
session_start();

// Запрет прямого вызова файла
define( '_JEXEC', 1 );

// Отключаем кеширование на время разработки и тестирования
//header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
//header("Last-Modified: " . gmdate("D, d M Y H:i:s")." GMT");
//header("Cache-Control: no-cache, must-revalidate");
//header("Cache-Control: post-check=0,pre-check=0", false);
//header("Cache-Control: max-age=0", false);
//header("Pragma: no-cache");

include("config.php");

// Выводим версию системы
//include("include/config_system.php");

// Проверяем, залогинен ли пользователь
include("include/check_auth_user.php");

// Список функций
include("include/functions.php");
?>
<!--//<!DOCTYPE html>//-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ZT-Service Orders System</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

 <!-- Bootstrap -->
<link rel="icon" type="image/png" href="css/sixthsense.png">
<link rel="stylesheet" href="css/bootstrap.min.css">

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap.vertical-tabs.css">
<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/build.css">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/nf.css">

</head>

<body>
