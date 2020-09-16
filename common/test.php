<?php

$userid='admin';
$email='admin';
$password='password';	

$con=new mysqli('localhost','root','','gadgetworld');

$stmt=$con->prepare("SELECT * FROM ADMIN WHERE (USERID=? OR EMAIL=?) AND PASSWORD=?");

$stmt->bind_param("sss",$userid,$email,$password);

$result=$stmt->execute();

var_dump($stmt);

?>