<?php

include '../common/db.php';

if(isset($_GET['bid']))
{
	$bid=$_GET['bid'];
	$result=DeleteBrand($bid);
}

header('location:brands.php');
?>