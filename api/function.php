<?php 
   function userRole($r) {
    if($r == 1) {
        return 'ผู้ดูแลระบบ';
    }else{
        return 'ผู้ใช้งานทั่วไป';
    }
   }
?>