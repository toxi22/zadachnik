<?php
// Старт сесии в каждом файле
session_start();
// Запрет прямого вызова файла
define( '_JEXEC', 1 );

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Подключаем файл конфига с настройками анкеты
include("config.php");

// Список функций
include("include/functions.php");

if(isset($_POST['auth']))
{
	include("include/act_auth.php");
}

if(isset($_POST['act_add_task']))
{
	include("include/act_add_task.php");
	//header("Location: index.php");
}

if(isset($_POST['act_edit_task']))
{
	include("include/act_edit_task.php");
	//header("Location: index.php");
}




















if(isset($_POST['edit_profile_staff']))
{
	include("include/act_edit_user.php");
	//header("Location: index.php");
}

if(isset($_POST['edit_profile_notification']))
{
	include("include/act_edit_user_notification.php");
	//header("Location: index.php");
}

if(isset($_GET['profile_id_del']))
{
	include("include/act_del_profile.php");
	//header("Location: index.php");
}

if(isset($_POST['add_news']))
{
	include("include/act_add_news.php");
	//header("Location: index.php");
}

if(isset($_POST['edit_news']))
{
	include("include/act_edit_news.php");
	//header("Location: index.php");
}

if(isset($_GET['hide_news']))
{
	include("include/act_hide_news.php");
	//header("Location: index.php");
}

if(isset($_POST['add_order']))
{
	include("include/act_add_order.php");
	//header("Location: index.php");
}

/*if(isset($_POST['add_comments_order']))
{
	include("include/act_add_comments_order.php");
	//header("Location: index.php");
}*/

if(isset($_POST['edit_order']))
{
	include("include/act_edit_order.php");
	//header("Location: index.php");
}

if(isset($_POST['edit_comments_order']))
{
	include("include/act_edit_comments_order.php");
	//header("Location: index.php");
}

if(isset($_POST['search_order']))
{
	include("include/act_search_order.php");
	//header("Location: index.php");
}

// ~~~ Действия с нарядами ~~~ //
if(isset($_GET['order_id_ok']))
{
	include("include/act_confirm_order.php");
	//header("Location: index.php");
}

if(isset($_GET['order_id_del']))
{
	include("include/act_del_order.php");
	//header("Location: index.php");
}

if(isset($_GET['duplicate_order_id']))
{
	include("include/act_duplicate_order.php");
	//header("Location: index.php");
}

if(isset($_GET['data_warranty_end_order_id']))
{
	include("include/act_duplicate_order.php");
	//header("Location: index.php");
}

if(isset($_GET['comment_id_del']))
{
	include("include/act_del_comment.php");
	//header("Location: index.php");
}

if(isset($_GET['order_id_archive']))
{
	include("include/act_archive_order.php");
	//header("Location: index.php");
}
// ~~~ Действия с нарядами ~~~ //

// ~~~ Биллинг ~~~ //
// Обработчик формы billing_info находится в том же файле
//if(isset($_POST['billing_info']))
//{
//	include("include/act_billing_info.php");
	//header("Location: index.php");
//}
// ~~~ Биллинг ~~~ //

// ~~~ Биллинг ~~~ //
if(isset($_POST['add_campaign']))
{
	include("include/act_add_campaign.php");
	//header("Location: index.php");
}

if(isset($_POST['edit_campaign']))
{
	include("include/act_edit_campaign.php");
	//header("Location: index.php");
}
// ~~~ Биллинг ~~~ //

// ~~~ Инвентаризация ~~~ //
if(isset($_POST['add_product']))
{
	include("include/act_add_inventory.php");
	//header("Location: index.php");
}

if(isset($_POST['edit_inventory']))
{
	include("include/act_edit_inventory.php");
	//header("Location: index.php");
}

if(isset($_GET['inventory_id_del']))
{
	include("include/act_del_inventory.php");
	//header("Location: index.php");
}
// ~~~ Инвентаризация ~~~ //

// ~~~ Запрос одноразового кода для входа в Биллинг Инфо ~~~ //
if(intval($_POST['billing_info']) == 1 AND intval($_POST['access_key']) == 1 AND $_POST['billing_info_step'] == "step1" AND $id_user_var_GLOBAL == intval($_POST['vcard_user_id_billing_info']))
{
	include("include/act_one_time_password.php");
	//header("Location: index.php");
}

if(intval($_POST['billing_info']) == 1 AND intval($_POST['access_key']) == 1 AND $_POST['billing_info_step'] == "step2" AND $id_user_var_GLOBAL == intval($_POST['vcard_user_id_billing_info']))
{
	include("include/act_one_time_password.php");
	//header("Location: index.php");
}
// ~~~ Запрос одноразового кода для входа в Биллинг Инфо ~~~ //

// ~~~ Скрыть выбранные наряды ~~~ //
if(isset($_GET['data_inventory_order_hide']))
{
	include("include/act_inventory_order_hide.php");
	//header("Location: index.php");
}

if(isset($_GET['data_inventory_order_hide_off']))
{
	include("include/act_inventory_order_hide_off.php");
	//header("Location: index.php");
}
// ~~~ Скрыть выбранные наряды ~~~ //


if(isset($_POST['registration']))
{
	include("include/act_reg_my_profile.php");
	//header("Location: index.php");
}

if(isset($_POST['add_profile_children']))
{
	include("include/act_reg_children.php");
	//header("Location: index.php");
}

if(isset($_POST['edit_event']))
{
	include("include/act_edit_event.php");
	//header("Location: index.php");
}

if(isset($_POST['add_children_event']))
{
	include("include/act_add_children_event.php");
	//header("Location: index.php");
}

if(isset($_POST['confirmation_code0']) OR !empty($_GET['activation']))
{
	include("include/act_confirmation_code.php");
	//header("Location: confirmation_code.php");
}

if(isset($_POST['pass_reminder']))
{
	include("include/act_pass_reminder.php");
	//header("Location: confirmation_code.php");
}

if(isset($_POST['profile']))
{
	include("include/act_profile_my.php");
	include("include/act_profile_children.php");
	include("include/act_profile_staff.php");
	//header("Location: profile.php");
}
?>