<?php

include '../common/db.php';

if(isset($_GET['cid']))
{
	$cid=$_GET['cid'];
	$result=DeleteCategory($cid);
}

header('location:categories.php');
?>