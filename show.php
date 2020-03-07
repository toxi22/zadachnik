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


<div id="ghatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
<div class="row">
<div class="col-sm-3 text-left">
</div>
<div class="col-sm-9 text-right">
</div>
</div>

<div class="row">
<div class="col-sm-12">

<?php
if(!empty($_SESSION['messages']))
{
?>
<div <?php if(empty($_SESSION['messages'])){echo "style=\"display:none\"";} ?> class="alert alert-danger col-sm-12">
<?php
echo $_SESSION['messages']; $_SESSION['messages'] = "";
?>
</div>
<?php
}
?>

<?php include("include/show_all_table.php"); ?>

</div>
</div>

<div class="row">
<div class="col-sm-3 text-left">
</div>
<div class="col-sm-9 text-right">
<div class="dataTables_paginate paging_simple_numbers" id="ghatable_paginate">
<ul class="pagination">
</ul>
</div>
</div>
<?php echo getnumpage($per_page,$num_pages,$page,$get_param_page,$get_param_page_ext,$sortlinkgenX); ?>
</div>
</div>


</div>
</div>
</div>
<!-- /.blog-main -->
<!--// Content Body //-->
