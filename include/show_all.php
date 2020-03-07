<?php
if( $show_all_orders_chk_page != 1 ){exit();}
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
{?>
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
