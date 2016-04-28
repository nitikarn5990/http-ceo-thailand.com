<?php
session_start();

if ($_SESSION['group'] == 'admin') {
    $redirect_url = ADDRESS_ADMIN;
}
if ($_SESSION['group'] == 'member') {
    $redirect_url = ADDRESS."home";
}

setcookie("user");  
session_destroy();

header("Location: ".$redirect_url); //ส่งไปยังหน้าที่ตอ้งการ  


?>