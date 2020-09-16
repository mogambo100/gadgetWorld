<?php


require '../common/db.php';

$cid=$_GET['cid'];

$featuredl=new FeaturesLookupDL(GetConnection());
$features=$featuredl->GetFeatures($cid);

echo json_encode($features);

?>