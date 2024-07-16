<?php 
session_start();
    include 'connect.php';
    if(isset($_REQUEST['ac'])) {
        switch ($_REQUEST['ac']) {
            case 'add':
                if($_REQUEST['owner'] == '' || $_FILES['document']['name'] == '') {
                    echo json_encode(['status'=>true, 'msg'=>'กรุณากรอกข้อมูลให้ครบถ้วน']);
                }else{
                    if($_FILES['document']['name'] != '') {
                        move_uploaded_file($_FILES['document']['tmp_name'],'../file/document/'.$_FILES['document']['name']);
                    }
                    $sql = $conn->query("INSERT INTO tb_document(owner,doc_name,sender) VALUES('".$_REQUEST['owner']."','".$_FILES['document']['name']."','".$_SESSION['user_id']."')");
                    if($sql) {
                        echo json_encode(['msg'=>'ทำการเพิ่มเอกสารสำเร็จ']);
                    }else{
                        echo $conn->error;
                    }
                }
                break;
            case 'del' :
                $sql = $conn->query("DELETE FROM tb_document WHERE doc_id='".$_REQUEST['doc_id']."' ");
                if($sql) {
                    echo json_encode(['msg'=>'ลบเอกสารสำเร็จ']);
                }else{
                    echo $conn->error;
                }
                break;
            case 'read':
                $sql = $conn->query("UPDATE tb_document SET doc_status=1 WHERE doc_id='".$_REQUEST['doc_id']."' ");
                if($sql) {
                    echo json_encode(['status' => true,"msg"=>"อ่านแล้ว"]);
                }else{
                    echo $conn->error;
                }
                break;
        }
    }
?>