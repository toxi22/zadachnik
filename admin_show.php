<?php
include("header.php");

// Проверяем, залогинен ли пользователь
if(isset($id_user) AND $id_user != 0)
{
?>
<?php
include("header_body.php");
?>
<!--// Content Body //-->
<div class="container " id="main_container">
<div class="row">

<!--// Left Bar Body //-->
<div class="col-md-3">
<?php
include("left-bar_body.php");
?>
</div>
<!--// Left Bar Body //-->

<div class="col-md-8" style="width:100%;">
<div class="panel panel-primary">
<div class="panel-heading"><div class="panel-title">
<?php echo "Список задач"; ?>
</div></div>
<div class="panel-body">
<?php
if($_SESSION['messages'] != "")
{
?>
<div class="alert alert-danger"><p><?php echo $_SESSION['messages']; ?></p></div>
<?php
$_SESSION['messages'] = "";
}
?>

<?php
$show_all_orders_chk_page = 1;
include("include/show_all.php");

?>
</div>
</div>
</div>
<!-- /.blog-main -->
<!--// Content Body //-->
<?php
include("footer_body.php");
?>
<?php
}
else
{
	$_SESSION['messages'] = "Вы не авторизированы. Авторизируйтесь, пожалуйста.";
	echo $_SESSION['messages']."<br /><a href=\"./admin.php\">Перейти на страницу входа</a>";
}

include("footer.php");
?>