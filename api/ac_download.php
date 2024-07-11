<?php 
    include 'connect.php';
    $sql = $conn->query("SELECT * FROM tb_document WHERE doc_id='".$_REQUEST['doc_id']."' ");
    $fet = $sql->fetch_object();
    $filePath = '../file/document/'.$fet->doc_name;
    if(file_exists($filePath)) {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($filePath).'"');
        header('Content-Length: '.filesize($filePath));
        readfile($filePath);
        exit;
    }else{
        echo 'file not found.';
    }
?>