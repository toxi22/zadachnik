<?php
if(empty($ORDER_BY1)){$ORDER_BY1 = "";}
if(empty($ORDER_BY2)){$ORDER_BY2 = "";}
if(empty($ORDER_BY3)){$ORDER_BY3 = "";}

$sortlinkgen1 = "index.php?page=".$_GET['page']."&sortbydown1";
$sortlinkgen2 = "index.php?page=".$_GET['page']."&sortbydown2";
$sortlinkgen3 = "index.php?page=".$_GET['page']."&sortbydown3";

if(isset($_GET['sortbyup1']))
{	$ORDER_BY = "ORDER BY `user_name` DESC"; $sortlinkgen1 = "index.php?page=".$_GET['page']."&sortbydown1"; $sortlinkgenX = "sortbyup1";
}
if(isset($_GET['sortbydown1']))
{	$ORDER_BY = "ORDER BY `user_name` ASC"; $sortlinkgen1 = "index.php?page=".$_GET['page']."&sortbyup1"; $sortlinkgenX = "sortbydown1";
}

if(isset($_GET['sortbyup2']))
{	$ORDER_BY = "ORDER BY `user_email` DESC"; $sortlinkgen2 = "index.php?page=".$_GET['page']."&sortbydown2"; $sortlinkgenX = "sortbyup2";
}
if(isset($_GET['sortbydown2']))
{	$ORDER_BY = "ORDER BY `user_email` ASC"; $sortlinkgen2 = "index.php?page=".$_GET['page']."&sortbyup2"; $sortlinkgenX = "sortbydown2";
}

if(isset($_GET['sortbyup3']))
{	$ORDER_BY = "ORDER BY `status` DESC"; $sortlinkgen3 = "index.php?page=".$_GET['page']."&sortbydown3"; $sortlinkgenX = "sortbyup3";
}
if(isset($_GET['sortbydown3']))
{	$ORDER_BY = "ORDER BY `status` ASC"; $sortlinkgen3 = "index.php?page=".$_GET['page']."&sortbyup3"; $sortlinkgenX = "sortbydown3";
}
?>
<table id="ghatable" class="sortable display table table-stripe dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="ghatable_info" style="width: 100%;">
<thead>
<tr role="row">
<th width="1%" class="nosort" tabindex="0" aria-controls="ghatable" rowspan="1" colspan="1" align="center">№</th>
<th width="1%" class="sorting" tabindex="0" aria-controls="ghatable" rowspan="1" colspan="1" align="center">Дата</th>
<th width="1%" class="sorting" tabindex="0" aria-controls="ghatable" rowspan="1" colspan="1" align="center"><a href="<?php echo $sortlinkgen1; ?>">Имя пользователя</a></th> <!--// width: 48px; //-->
<th width="1%" class="sorting" tabindex="0" aria-controls="ghatable" rowspan="1" colspan="1" align="center"><a href="<?php echo $sortlinkgen2; ?>">E-Mail</a></th>
<th width="15%" class="sorting" tabindex="0" aria-controls="ghatable" rowspan="1" colspan="1" align="center">Задача</th>
<th width="1%" class="sorting" tabindex="0" aria-controls="ghatable" rowspan="1" colspan="1" align="center"><a href="<?php echo $sortlinkgen3; ?>">Статус</a></th>
</tr>
</thead>
<tbody>

<?php
// количество записей, выводимых на странице
if(isset($_POST['reconpagesel'])){$per_page=$_POST['reconpagesel'];}else{$per_page=3;}
// получаем номер страницы
if(isset($_GET['page'])){$page=($_GET['page']-1);}else{$page=0;}
// вычисляем первый оператор для LIMIT
$start=abs($page*$per_page);
// составляем запрос и выводим записи
// переменную $start используем, как нумератор записей.

$query_pages = $dbh->prepare("SELECT count(*) FROM `".$dbtable2."`");
$query_pages->execute();
$rowses = $query_pages->fetch(PDO::FETCH_NUM);

$total_rows=$rowses[0];
$num_pages=ceil($total_rows/$per_page);

$query = $dbh->prepare("SELECT * FROM `".$dbtable2."` ".$ORDER_BY." LIMIT $start,$per_page"); //ORDER BY `data_id` DESC
$query->execute();
//echo $order_status_var;
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$id_var = $row['id'];
	$user_name_var = $row['user_name'];
	$user_email_var = $row['user_email'];
	$task_message_var = $row['task_message'];
	$dt_create_var = $row['dt_create'];
	$dt_update_var = $row['dt_update'];
	if($row['admin_edit'] == 1){$task_message_var = $task_message_var."<br /><i><b><font color=#ff0000>Отредактировано администратором</font></b></i>";}
	if($row['status'] == 1){$status_var = "<i><b><font color=green>Выполнено</font></b></i>";}else{$status_var = "<i><b><font color=red>Не выполнено</font></b></i>";}

	$dt_create_var = strtotime($dt_create_var);
	$dt_create_var = date("d-m-Y H:i:s", $dt_create_var);

	$dt_update_var = strtotime($dt_update_var);
	$dt_update_var = date("d-m-Y H:i:s", $dt_update_var);

	if(isset($id_user) AND $id_user != 0){$linkurledit = " onclick=\"location.href='add.php?edit_task=".$id_var."'\"";}else{$linkurledit = "";}
?>
<tr role="row" class="odd" style="cursor:pointer;">
<td align="center" <?php echo $linkurledit; ?>><?php echo $id_var; ?></td>
<td align="center" <?php echo $linkurledit; ?>><?php echo $dt_create_var; ?></td>
<td align="center" <?php echo $linkurledit; ?>><?php echo $user_name_var; ?></td>
<td align="center" <?php echo $linkurledit; ?>><?php echo $user_email_var; ?></td>
<td align="center" <?php echo $linkurledit; ?>><?php echo $task_message_var; ?></td>
<td align="center" <?php echo $linkurledit; ?>><?php echo $status_var; ?></td>
</tr>
<?php
}
?>

<?php
if($rowses[0] == 0)
{
?>
<tr role="row" class="even">
<td colspan="5" align="center"><div class="alert alert-danger col-sm-12"><p><strong>ОШИБКА: </strong>Нет запрашиваемых данных</p></div></td>
</tr>
<?php
}
?>
</tbody>
</table>