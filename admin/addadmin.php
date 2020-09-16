<?php

include '../common/db.php';

$admindl=new AdminDL(GetConnection());
$admin=new Admin('abc','abc@mail.com','abc');

$admindl->AddAdmin($admin);

?>