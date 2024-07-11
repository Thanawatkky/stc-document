<?php 
session_start();
    include 'connect.php';
    $sql = $conn->query("SELECT password FROM tb_login WHERE user_id='".$_SESSION['user_id']."' ");
    $fet = $sql->fetch_object();
    if(password_verify($_REQUEST['current_password'],$fet->password)) {
        if($_REQUEST['new_password'] != $_REQUEST['confirm_password']) {
            echo json_encode(['status'=>false, 'msg'=>'การยืนยันรหัสผ่านไม่ตรงกัน']);
        }else{
            $pass_hash = password_hash($_REQUEST['new_password'],PASSWORD_BCRYPT);
            $sql_update = $conn->query("UPDATE tb_login SET password='".$pass_hash."' WHERE user_id='".$_SESSION['user_id']."' ");
            if($sql_update) {
                echo json_encode(['status' => true, 'msg'=>"เปลี่ยนรหัสผ่านสำเร็จ"]);
            }else{
                echo $conn->error;
            }
        }
    }else{
        echo json_encode(['status'=>false, 'msg'=>'คุณกรอกรหัสผ่านปัจจุบันไม่ถูกต้อง']);
    }
?>