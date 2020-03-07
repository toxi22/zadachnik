<?php
include("header.php");
?>
<?php
include("header_body.php");
?>
<!--// Content Body //-->
<div class="container " id="main_container">
<div class="row">

<div class="col-md-8" style="width:100%;">
<div class="panel panel-primary">
<div class="panel-heading"><div class="panel-title">
</div></div>
<div class="panel-body">
<div <?php if(empty($_SESSION['messages'])){echo "style=\"display:none\"";} ?> class="alert alert-danger col-sm-12">
<?php
echo $_SESSION['messages']; $_SESSION['messages'] = "";
?>
</div>
<!-- Содержание страницы -->
<p><b><font color=red>Поля отмеченны звёздочкой ( * ), обязательны для заполнения</font></b>.</p>
<form name="add_edit_task" action="actions.php" method="post">
<?php
if(!isset($_GET['edit_task']))
{		$user_name_var = "";
		$user_email_var = "";
		$task_message_var = "";
?>
<input name="act_add_task" type="hidden" value="1">
<?php
}else{	// считываем данные из базы и подставляем в поля формы	$edit_task_id = intval($_GET['edit_task']);
	$query = $dbh->prepare("SELECT * FROM `".$dbtable2."` WHERE `id`=?");
	$query->execute(array($edit_task_id));
	while($row = $query->fetch(PDO::FETCH_ASSOC))
	{		$id_task_var = $row['id'];
		$user_name_var = $row['user_name'];
		$user_email_var = $row['user_email'];
		$task_message_var = $row['task_message'];
		if(empty($row['status']) OR $row['status'] == 0){$status_var = "";}else{$status_var = "checked";}
	}
?>
<input name="act_edit_task" type="hidden" value="1">
<input name="act_id_task" type="hidden" value="<?php echo $id_task_var; ?>">
<?php
}
?>
	<table>
        <tr>
            <td>Имя пользователя<b><font color=red>*</font></b>:</td>
            <td>
				<input name="fio" type="text" size="45" placeholder="имя пользователя" maxlength="50" value="<?php echo $user_name_var; ?>" autofocus required />
			</td>
        </tr>
        <tr>
            <td>E-Mail<b><font color=red>*</font></b>:</td>
            <td>
				<input name="email" type="email" size="45" placeholder="E-Mail" maxlength="50" value="<?php echo $user_email_var; ?>" required />
			</td>
        </tr>
        <tr>
            <td>Задача<b><font color=red>*</font></b>:</td>
            <td>
				<textarea name="task_text" type="text" placeholder="Текст задачи" rows="10" cols="45" style="resize: none;" required><?php echo $task_message_var; ?></textarea>
			</td>
        </tr>
<?php
if(isset($_GET['edit_task']))
{
?>
        <tr>
            <td>Выполнено<b><font color=red>*</font></b>:</td>
            <td>
				<input name="endcheck" type="checkbox" value="1" <?php echo $status_var; ?> >
			</td>
        </tr>
<?php
}
?>
        <tr>
            <td></td>
            <td>
            <br /><br />
            <div align="center">
            <input type="button" class="butnstyle butnred" onclick="window.history.go(-1); return false;" value="Отменить">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" class="butnstyle butngreen" value="Сохранить">
            </div>
            </td>
        </tr>
    </table>
</form>
<!-- Содержание страницы -->
</div>
</div>
</div>
<!-- /.blog-main -->
<!--// Content Body //-->
<?php
include("footer_body.php");
?>
<?php
include("footer.php");
?>