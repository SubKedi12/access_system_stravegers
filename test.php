<?php
session_start();
$ctr=0;
foreach($_SESSION['tree'] as $variy){
echo $variy;
echo '<br>';
if($_SESSION['phone']==$variy)
	$ctr+=1;
//unset($variy);
}
if($ctr>=1)
	echo '<br>'.TRUE;
?>