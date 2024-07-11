<?php
include 'connect.php'; 
    
    $sql = $conn->query("UPDATE tb_login SET login_status = 0 WHERE user_id='".$_SESSION['user_id']."' ");
    if($sql) {
        session_start();
        session_unset();
        session_destroy();
        header('Location: ../login.php');
    }else{
        $conn->error;
    }
?>