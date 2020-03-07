<!--// Header Body //-->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="main_container">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="brand" href="./">
<img data-toggle="tooltip" data-placement="bottom" title="" src="" style="max-width:30px;" data-original-title="Всевидящее око Саурона"> <?php echo $sitename; ?>
</a>
</div>
<div class="navbar-collapse collapse">

<style type="text/css">
th {
    text-align: center !important;
}
</style>

<ul class="nav navbar-nav navbar-right" style="font-size:24px;">
<li data-toggle="tooltip" data-placement="bottom" title="Добавить задание" data-original-title="Добавить задание">
<a href="add.php">
<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
</a>
</li>
<?php if(isset($id_user) AND $id_user != 0){ ?>
<li class="dropdown" data-toggle="tooltip" data-placement="bottom" title="Выход" data-original-title="Выход">
<a href="logout.php?logout" class="dropdown-toggle" data-toggle="dropdown">
<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
</a>
</li>
<?php }else{ ?>
<li class="dropdown" data-toggle="tooltip" data-placement="bottom" title="Выход" data-original-title="Вход">
<a href="admin.php" class="dropdown-toggle" data-toggle="dropdown">
<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
</a>
</li>
<?php } ?>
</ul>
        </div><!--/.nav-collapse -->
      </div>

    </div>
<!--// Header Body //-->