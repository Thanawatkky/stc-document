<?php
   include 'connect.php';
   $sql = $conn->query("SELECT username FROM tb_user WHERE username='".$_POST['username']."' ");
   $num = $sql->num_rows;
   if($num <= 0) {
    $insertDB = $conn->query("INSERT INTO tb_user(username,fname,lname,user_role) VALUES('".$_POST['username']."','".$_POST['fname']."','".$_POST['lname']."',2) ");
    if($insertDB) {
        $getUser = $conn->query("SELECT user_id FROM tb_user WHERE username='".$_POST['username']."' AND fname='".$_POST['fname']."' AND lname='".$_POST['lname']."' ");
        $num_user = $getUser->num_rows;
        if($num_user <= 0) {
            echo $conn->error;
        }else{
            $fet = $getUser->fetch_object();
            $insert_login = $conn->query("INSERT INTO tb_login(user_id, password) VALUES('".$fet->user_id."','".password_hash($_POST['password'], PASSWORD_BCRYPT)."') ");
            if($insert_login) {
                echo "สมัครสมาชิกสำเร็จ กรุณาเข้าสู่ระบบก่อนเข้าใช้งาน";
            }else{

            }
        }
    }else{
        echo $conn->error;
    }


   }else{ 
    echo "Username นี้มีผู้ใช้งานแล้ว กรุณาลองใหม่อีกครั้ง";
   }
?>