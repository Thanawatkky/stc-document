<?php 
session_start();
    include 'connect.php';
    $sql = $conn->query("UPDATE tb_user SET fname='".$_REQUEST['fname']."',lname='".$_REQUEST['lname']."' WHERE user_id='".$_SESSION['user_id']."' ");
    if($sql) {
        echo json_encode(["status"=>true, 'msg'=>'แก้ไขข้อมูลส่วนตัวสำเร็จ']);
    }else{
        echo $conn->error;
    }
?>