<?php
if(isset($_GET['orders_all']) OR isset($_GET['order_status'])  OR isset($_GET['orders_archive']) OR isset($_GET['order_id']) OR isset($_GET['search_order']) OR isset($_GET['order_warranty']) OR isset($_GET['clients_card']))
{
$orders_my_archive_count = "-";
//echo $id_user;
if(isset($_GET['inventory_orders'])){$inventory_orders_link = "inventory_orders&";}
?>
<div class="panel panel-default">
<div class="panel-heading">
<div class="panel-title">Все наряды</div></div>
<ul class="nav nav-pills nav-stacked">
<!--//<li><a href="show.php?orders_all" class="menu"> Список активных нарядов <span class="badge pull-right"><?php echo data_job_status_all($dbh,$dbtable2); ?></span></a></li>//-->
<li><a href="show.php?<?php echo $inventory_orders_link; ?>orders_archive&page=<?php echo data_job_status_goto_page($dbh,$dbtable2,8) + data_job_status_goto_page($dbh,$dbtable2,9) + data_job_status_goto_page($dbh,$dbtable2,12); ?>"> Архив нарядов <span class="badge pull-right"><?php echo data_job_status($dbh,$dbtable2,8) + data_job_status($dbh,$dbtable2,9) + data_job_status($dbh,$dbtable2,12); ?></span></a></li>
<li><a href="show.php?<?php echo $inventory_orders_link; ?>order_status=3&page=<?php echo data_job_status_goto_page($dbh,$dbtable2,3); ?>">Ожидает обработки<span class="badge pull-right"><?php echo data_job_status($dbh,$dbtable2,3); ?></span></a></li>
<!--//<li><a href="show.php?<?php echo $inventory_orders_link; ?>order_status=2&page=<?php echo data_job_status_goto_page($dbh,$dbtable2,2); ?>">Срочный (оптовик)<span class="badge pull-right"><?php echo data_job_status($dbh,$dbtable2,2); ?></span></a></li>//-->
<li><a href="show.php?<?php echo $inventory_orders_link; ?>order_status=1&page=<?php echo data_job_status_goto_page($dbh,$dbtable2,1); ?>">Срочный ремонт<span class="badge pull-right"><?php echo data_job_status($dbh,$dbtable2,1); ?></span></a></li>
<li><a href="show.php?<?php echo $inventory_orders_link; ?>order_status=13&page=<?php echo data_job_status_goto_page($dbh,$dbtable2,13); ?>">Гарантийный<span class="badge pull-right"><?php echo data_job_status($dbh,$dbtable2,13); ?></span></a></li>
<li><a href="show.php?<?php echo $inventory_orders_link; ?>order_status=11&page=<?php echo data_job_status_goto_page($dbh,$dbtable2,11); ?>">Согласование<span class="badge pull-right"><?php echo data_job_status($dbh,$dbtable2,11); ?></span></a></li>
<li><a href="show.php?<?php echo $inventory_orders_link; ?>order_status=4&page=<?php echo data_job_status_goto_page($dbh,$dbtable2,4); ?>">Ремонт утвержден<span class="badge pull-right"><?php echo data_job_status($dbh,$dbtable2,4); ?></span></a></li>
<li><a href="show.php?<?php echo $inventory_orders_link; ?>order_status=6&page=<?php echo data_job_status_goto_page($dbh,$dbtable2,6); ?>">В работе<span class="badge pull-right"><?php echo data_job_status($dbh,$dbtable2,6); ?></span></a></li>
<li><a href="show.php?<?php echo $inventory_orders_link; ?>order_status=5&page=<?php echo data_job_status_goto_page($dbh,$dbtable2,5); ?>">Завершен<span class="badge pull-right"><?php echo data_job_status($dbh,$dbtable2,5); ?></span></a></li>
<li><a href="show.php?<?php echo $inventory_orders_link; ?>order_status=7&page=<?php echo data_job_status_goto_page($dbh,$dbtable2,7); ?>">Просроченный<span class="badge pull-right"><?php echo data_job_status($dbh,$dbtable2,7); ?></span></a></li>
<li><a href="show.php?<?php echo $inventory_orders_link; ?>order_warranty&page=<?php echo data_job_warranty_goto_page($dbh,$dbtable2); ?>">С гарантией<span class="badge pull-right"><?php echo data_job_warranty($dbh,$dbtable2); ?></span></a></li>
</ul>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<div class="panel-title">Мои наряды</div></div>
<ul class="nav nav-pills nav-stacked">
<li><a href="show.php?<?php echo $inventory_orders_link; ?>uid=<?php echo $id_user; ?>&orders_archive&page=<?php echo data_job_status_my_goto_page($dbh,$dbtable2,8,$id_user) + data_job_status_my_goto_page($dbh,$dbtable2,9,$id_user) + data_job_status_my_goto_page($dbh,$dbtable2,12,$id_user); ?>" class="menu"> Архив моих нарядов <span class="badge pull-right"><?php echo data_job_status_my($dbh,$dbtable2,8,$id_user) + data_job_status_my($dbh,$dbtable2,9,$id_user) + data_job_status_my($dbh,$dbtable2,12,$id_user); ?></span></a></li>
<li><a href="show.php?<?php echo $inventory_orders_link; ?>uid=<?php echo $id_user; ?>&order_status=3&page=<?php echo data_job_status_my_goto_page($dbh,$dbtable2,3,$id_user); ?>">Ожидает обработки<span class="badge pull-right"><?php echo data_job_status_my($dbh,$dbtable2,3,$id_user); ?></span></a></li>
<!--//<li><a href="show.php?<?php echo $inventory_orders_link; ?>uid=<?php echo $id_user; ?>&order_status=2&page=<?php echo data_job_status_my_goto_page($dbh,$dbtable2,2,$id_user); ?>">Срочный (оптовик)<span class="badge pull-right"><?php echo data_job_status_my($dbh,$dbtable2,2,$id_user); ?></span></a></li>//-->
<li><a href="show.php?<?php echo $inventory_orders_link; ?>uid=<?php echo $id_user; ?>&order_status=1&page=<?php echo data_job_status_my_goto_page($dbh,$dbtable2,1,$id_user); ?>">Срочный ремонт<span class="badge pull-right"><?php echo data_job_status_my($dbh,$dbtable2,1,$id_user); ?></span></a></li>
<li><a href="show.php?<?php echo $inventory_orders_link; ?>uid=<?php echo $id_user; ?>&order_status=13&page=<?php echo data_job_status_my_goto_page($dbh,$dbtable2,13,$id_user); ?>">Гарантийный<span class="badge pull-right"><?php echo data_job_status_my($dbh,$dbtable2,13,$id_user); ?></span></a></li>
<li><a href="show.php?<?php echo $inventory_orders_link; ?>uid=<?php echo $id_user; ?>&order_status=11&page=<?php echo data_job_status_my_goto_page($dbh,$dbtable2,11,$id_user); ?>">Согласование<span class="badge pull-right"><?php echo data_job_status_my($dbh,$dbtable2,11,$id_user); ?></span></a></li>
<li><a href="show.php?<?php echo $inventory_orders_link; ?>uid=<?php echo $id_user; ?>&order_status=4&page=<?php echo data_job_status_my_goto_page($dbh,$dbtable2,4,$id_user); ?>">Ремонт утвержден<span class="badge pull-right"><?php echo data_job_status_my($dbh,$dbtable2,4,$id_user); ?></span></a></li>
<li><a href="show.php?<?php echo $inventory_orders_link; ?>uid=<?php echo $id_user; ?>&order_status=6&page=<?php echo data_job_status_my_goto_page($dbh,$dbtable2,6,$id_user); ?>">В работе<span class="badge pull-right"><?php echo data_job_status_my($dbh,$dbtable2,6,$id_user); ?></span></a></li>
<li><a href="show.php?<?php echo $inventory_orders_link; ?>uid=<?php echo $id_user; ?>&order_status=5&page=<?php echo data_job_status_my_goto_page($dbh,$dbtable2,5,$id_user); ?>">Завершен<span class="badge pull-right"><?php echo data_job_status_my($dbh,$dbtable2,5,$id_user); ?></span></a></li>
<li><a href="show.php?<?php echo $inventory_orders_link; ?>uid=<?php echo $id_user; ?>&order_status=7&page=<?php echo data_job_status_my_goto_page($dbh,$dbtable2,7,$id_user); ?>">Просроченный<span class="badge pull-right"><?php echo data_job_status_my($dbh,$dbtable2,7,$id_user); ?></span></a></li>
<li><a href="show.php?<?php echo $inventory_orders_link; ?>uid=<?php echo $id_user; ?>&order_warranty&page=<?php echo data_job_warranty_my_goto_page($dbh,$dbtable2,0,$id_user); ?>">С гарантией<span class="badge pull-right"><?php echo data_job_warranty_my($dbh,$dbtable2,0,$id_user); ?></span></a></li>
</ul>
</div>

<?php
}
?>

<?php
if(isset($_GET['transition_archive']) OR isset($_GET['transition_status']) OR isset($_GET['transition_id']))
{
?>
<div class="panel panel-primary">
<div class="panel-heading"><div class="panel-title">Мои передвижения</div></div>
<ul class="nav nav-pills nav-stacked">
<li><a href="show.php?uid=1&transition_archive" class="menu"> Архив моих передвижений <span class="badge pull-right">20</span></a></li>
<li><a href="show.php?uid=1&transition_status=1">Ожидает обработки <span class="badge pull-right">0</span></a></li>
<li><a href="show.php?uid=1&transition_status=2">В дороге <span class="badge pull-right">0</span></a></li>
<li><a href="show.php?uid=1&transition_status=3">Доставлено (Пункт Б) <span class="badge pull-right">0</span></a></li>
<li><a href="show.php?uid=1&transition_status=4">Доставлено (Пункт А) <span class="badge pull-right">0</span></a></li>
<li><a href="show.php?uid=1&transition_status=5">Передано мне <span class="badge pull-right">0</span></a></li>
</ul>
</div>

<div class="panel panel-primary">
<div class="panel-heading"><div class="panel-title">Все передвижения</div></div>
<ul class="nav nav-pills nav-stacked">
<li><a href="show.php?transition_archive" class="menu"> Архив всех передвижений <span class="badge pull-right">20</span></a></li>
<li><a href="show.php?transition_status=1">Ожидает обработки <span class="badge pull-right">0</span></a></li>
<li><a href="show.php?transition_status=2">В дороге <span class="badge pull-right">0</span></a></li>
<li><a href="show.php?transition_status=3">Доставлено (Пункт Б) <span class="badge pull-right">0</span></a></li>
<li><a href="show.php?transition_status=4">Доставлено (Пункт А) <span class="badge pull-right">0</span></a></li>
<li><a href="show.php?transition_status=5">Передано нарядов <span class="badge pull-right">0</span></a></li>
</ul>
</div>
<?php
}
?>

<?php
if(isset($_GET['news_all']) OR isset($_GET['news_id']) OR isset($_GET['news']))
{
$query = $dbh->prepare("SELECT COUNT(*) AS ROW_NUM FROM `".$dbtable3."`");
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);
//$_SESSION['news_count'] = $row['ROW_NUM'];
if($row['ROW_NUM'] == 0){$news_count = "0";}else{$news_count = $row['ROW_NUM'];}

$query = $dbh->prepare("SELECT COUNT(*) AS ROW_NUM FROM `".$dbtable3."` WHERE `who_see_news`='staff'");
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);
//$_SESSION['news_count'] = $row['ROW_NUM'];
if($row['ROW_NUM'] == 0){$news_staff_count = "0";}else{$news_staff_count = $row['ROW_NUM'];}

$query = $dbh->prepare("SELECT COUNT(*) AS ROW_NUM FROM `".$dbtable3."` WHERE `who_see_news`='admin'");
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);
//$_SESSION['news_count'] = $row['ROW_NUM'];
if($row['ROW_NUM'] == 0){$news_admin_count = "0";}else{$news_admin_count = $row['ROW_NUM'];}
?>
<div class="panel panel-primary">
<div class="panel-heading"><div class="panel-title">Новости</div></div>
<ul class="nav nav-pills nav-stacked">
<li><a href="show.php?news&all" class="menu"> Все новости <span class="badge pull-right"><?php echo $news_count; ?></span></a></li>
<?php
	if($vcard_user_access == "staff" OR $vcard_user_access == "admin")
	{
?>
<li><a href="show.php?news&staff" class="menu"> Новости для сотрудников <span class="badge pull-right"><?php echo $news_staff_count; ?></span></a></li>
<?php
	}
?>
<?php
	if($vcard_user_access == "admin")
	{
?>
<li><a href="show.php?news&admin" class="menu"> Новости для администраторов <span class="badge pull-right"><?php echo $news_admin_count; ?></span></a></li>
<?php
	}
?>
</ul>
</div>
<?php
}
?>

<?php
if(isset($_GET['billing_info']) OR isset($_GET['billing_info_v2']) OR isset($_GET['billing_buy']) OR isset($_GET['billing_history']))
{
	if(isset($_GET['user_id']))
	{
		$profile_id = "&user_id=".intval($_GET['user_id']);
	}
	else
	{
		$profile_id = "";
	}
?>
<div class="panel panel-primary">
<div class="panel-heading"><div class="panel-title"> Личный счет </div></div>
<ul class="nav nav-pills nav-stacked">
<?php
if($vcard_user_access_var_GLOBAL == "suadmin" OR $vcard_user_access_var_GLOBAL == "admin")
{
?>
<li><a href="show.php?billing_info<?php echo $profile_id; ?>" class="menu"> Общая информация </a></li>
<?php
}
?>
<li><a href="show.php?billing_info_v2<?php echo $profile_id; ?>" class="menu"> Заработок исполнителя </a></li>

<!--//<li><a href="show.php?billing_buy<?php echo $profile_id; ?>"> Продлить подписку </a></li>
<li><a href="show.php?billing_history<?php echo $profile_id; ?>"> История платежей </a></li>//-->
</ul>
</div>
<?php
}
?>

<?php
if(isset($_GET['my']) OR isset($_GET['id']) OR isset($_GET['profiles_all']) OR isset($_GET['profile_all']) OR isset($_GET['profile_id']) OR isset($_GET['profile_my']) OR isset($_GET['notification']))
{
	if(isset($_GET['id']) OR isset($_GET['profile_id']))
	{
		$profile_id = "id=".intval($_GET['id']);
		$private_message = "id=".intval($_GET['id'])."&private_message";
		//$profile_id2 = "profile_id=".intval($_GET['profile_id']);
		//$private_message2 = "profile_id=".intval($_GET['profile_id'])."&private_message";
	}
	else
	{
		$profile_id = "my";
		$private_message = "private_message";
		$notification = "notification";
	}
?>
<div class="panel panel-primary">
<div class="panel-heading"><div class="panel-title"> Профиль </div></div>
<ul class="nav nav-pills nav-stacked">
<li><a href="profile.php?<?php echo $profile_id; ?>" class="menu"> Общая информация </a></li>
<li><a href="profile.php?<?php echo $private_message; ?>"> Личные сообщения </a></li>
<li><a href="profile.php?<?php echo $notification; ?>"> Уведомления </a></li>
</ul>
</div>
<?php
}
?>

<?php
if(isset($_GET['campaign']) OR isset($_GET['campaign_all']) OR isset($_GET['campaign_my']) OR isset($_GET['campaign_id']) OR isset($_GET['campaign_signed']))
{
	if(isset($_GET['id']) OR isset($_GET['profile_id']))
	{
		$profile_id = "&id=".intval($_GET['id']);
	}
	else
	{
		$profile_id = "";
	}
?>
<div class="panel panel-primary">
<div class="panel-heading"><div class="panel-title"> Кампании </div></div>
<ul class="nav nav-pills nav-stacked">
<li><a href="show.php?campaign_my<?php echo $profile_id; ?>" class="menu"> Мои кампании</a></li>
<li><a href="show.php?campaign_signed<?php echo $profile_id; ?>"> Кампании, в которых я нахожусь</a></li>
<li><a href="show.php?campaign_all<?php echo $profile_id; ?>"> Список всех кампаний</a></li>
<?php
	if($vcard_user_access == "staff" OR $vcard_user_access == "admin" OR $vcard_user_access == "suadmin")
	{
?>
<li><a href="add.php?campaign<?php echo $profile_id; ?>"> Добавить новую кампанию</a></li>
<?php
	}
?>
</ul>
</div>
<?php
}
?>

<?php
// Инвентаризация
if(isset($_GET['inventory']) OR isset($_GET['inventory_all']) OR isset($_GET['inventory_group']) OR isset($_GET['add_inventory']))
{
	if(isset($_GET['id']) OR isset($_GET['profile_id']))
	{
		$profile_id = "&id=".intval($_GET['id']);
	}
	else
	{
		$profile_id = "";
	}
?>
<div class="panel panel-primary">
<div class="panel-heading"><div class="panel-title"> Инвентаризация </div></div>
<ul class="nav nav-pills nav-stacked">
<li><a href="show.php?inventory" class="menu"> Товары </a></li>
<!--//<li><a href="show.php?inventory_group"> Группы </a></li>//-->
<li><a href="add.php?inventory"> Добавить товар </a></li>
<!--//<li><a href="add.php?inventory_group"> Добавить группу </a></li>//-->
</ul>
</div>
<?php
}
// Инвентаризация
?>