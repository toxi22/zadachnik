<?php include("header.php");
?>

<div class="container">
<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<div class="panel panel-primary">

<div class="panel-heading">
	<div class="panel-title">Авторизация</div>
</div>

<div style="padding-top:30px" class="panel-body" >
<div <?php if(empty($_SESSION['messages'])){echo "style=\"display:none\"";} ?> id="login-alert" class="alert alert-danger col-sm-12">
<?php
echo $_SESSION['messages']; $_SESSION['messages'] = "";
?>
</div>

<form id="loginform" class="form-horizontal" role="form" name="auth" action="actions.php" method="post">
<input name="auth" type="hidden" value="1">

<div style="margin-bottom: 25px" class="input-group">
	<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	<input id="login-username" type="text" class="form-control" name="login" value="" placeholder="Логин" autofocus required>
</div>

<div style="margin-bottom: 25px" class="input-group">
	<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	<input id="login-password" type="password" class="form-control" name="pass" value="" placeholder="Пароль">
</div>

<div style="" class="form-group">
	<div class="col-sm-12 controls" style="float: inherit;">
		<input name="enter" class="btn btn-success" type="submit" value="Войти">
	</div>
</div>

</form>
</div>

</div>
</div>
</div>

<?php include("footer.php"); ?>