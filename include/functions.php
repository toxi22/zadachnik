<?php
/* Вывод количества страниц */
function getnumpage($per_page,$num_pages,$page,$get_param_page=null,$get_param_page_ext=null,$sortlinkgenX1=null)
{
	if($get_param_page == null){$get_param_page = "?";}else{$get_param_page = "?".$get_param_page."&";}
	if($get_param_page_ext == null){$get_param_page_ext = "";}else{$get_param_page_ext = "".$get_param_page_ext."&";}
	if($sortlinkgenX1 == null){$sortlinkgenX1 = "";}else{$sortlinkgenX1 = "".$sortlinkgenX1."&";}


echo '<center>Отображается до '.$per_page.' записей на страницу<br /> ';
/*for($i=1;$i<=$num_pages;$i++)
	{
  		if ($i-1 == $page)
  		{
    	echo "<span class=\"page_list\">".$i."</span>";
  		}
  		else
  		{
   	 	echo "<a href=\"".$_SERVER['PHP_SELF'].$get_param_page.$get_param_page_ext."page=".$i."\" class=\"page_list\"><b>".$i."</b></a>";
  		}
	}*/
for($i = $page - 5; $i <= $page + 5; $i++)
{
	if ($i < 1) {
		continue;
	} elseif ($i > $num_pages) {
		break;
	}
	if ($i-1 == $page)
	{
		echo "<span class=\"page_list\">".$i."</span>";
	}
	else
	{
		echo "<a href=\"".$_SERVER['PHP_SELF'].$get_param_page.$get_param_page_ext.$sortlinkgenX1."page=".$i."\" class=\"page_list\"><b>".$i."</b></a>";
	}
}
echo '</center>';
}
/* Вывод количества страниц */
?>