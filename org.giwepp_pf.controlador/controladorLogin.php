<?php
session_start();
require_once '../org.giwepp_pf.bd/bdLogin.php';
$dbLogin = new bdLogin();
if (!empty($_POST['txt_username']."")
    && !empty($_POST['txt_password']."")) {
    $uname = $_POST['txt_username']."";
    $upass = $_POST['txt_password']."";
    if (($dbLogin->login(trim($uname), trim($upass))) === true) {
        echo "success";
    } else {
        echo "error";
    }
}else{
    echo "error";
}
?>