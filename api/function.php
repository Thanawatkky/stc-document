<?php 
   function userRole($r) {
    if($r == 1) {
        return 'ผู้ดูแลระบบ';
    }else{
        return 'ผู้ใช้งานทั่วไป';
    }
   }
   function doc_status($s) {
    if($s == null) {
        return 'ยังไม่ได้อ่าน';
    }else{
        return 'อ่านแล้ว';
    }
   }
?>