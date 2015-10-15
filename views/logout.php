<?php 
session_start();
$local = $_SESSION['u_name'];
session_unset();
session_destroy();

if($local != 'admin') header('location: copy_login.html');
else header('location: admin_login.html');
?>