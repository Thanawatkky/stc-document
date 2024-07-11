<?php 
session_start();
    include 'connect.php';
    if($_POST['username'] == '' || $_POST['password'] == '') {
        echo json_encode(['status'=> false, 'msg'=>"กรุณากรอกข้อมูลให้ครบถ้วน"]);
    }else{
        $sql = $conn->query("SELECT * FROM tb_user WHERE username='".$_POST['username']."'");
        $num = $sql->num_rows;
        $fet = $sql->fetch_object();
        if($num <= 0) {
                echo json_encode(['status'=> false, 'msg'=>"เข้าสู่ระบบไม่สำเร็จ เนื่องจาก Username ไม่ถูกต้องกรุณาลองใหม่อีกครั้ง"]);
        }else{
            $sql_compare = $conn->query("SELECT password FROM tb_login WHERE user_id='".$fet->user_id."' ");
            $fet_password = $sql_compare->fetch_object();
            if(password_verify($_REQUEST['password'],$fet_password->password)) {
                $sql_update = $conn->query("UPDATE tb_login SET login_status = 1 WHERE user_id='".$fet->user_id."' ");
                if($sql_update) {
                    $_SESSION['sess_id'] = true;
                    $_SESSION['user_id'] = $fet->user_id;
                    $_SESSION['username'] = $fet->username;
                    echo json_encode(['status'=> true, 'msg'=>"ยินดีต้อนรับเข้าสู่ระบบ","role"=>$fet->user_role]);
                }else{
                    echo $conn->error;
                }
            }else{
                    echo json_encode(['status'=> false, 'msg'=>"เข้าสู่ระบบไม่สำเร็จ เนื่องจากรหัสผ่านไม่ถูกต้องกรุณาลองใหม่อีกครั้ง"]);
            }
        }    
    }
?>