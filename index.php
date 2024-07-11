<?php 
    session_start();
    include 'api/connect.php';
    include 'api/function.php';
    if(empty($_SESSION['user_id'])) {
        header("Location: login.php");
    }
    $sql_user = $conn->query("SELECT * FROM tb_user WHERE user_id='".$_SESSION['user_id']."' ");
    $fet_user = $sql_user->fetch_object();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแรก</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/grid.css">
</head>
<body>
   <?php 
        include 'header.php';
   ?>
    <div class="container">
       <?php 
        include 'sidebar.php';
       ?>
        <main class="content">
           <?php 
                if(isset($_REQUEST['p'])) {
                    include($_REQUEST['p'].".php");
                }else{
                    include 'dashboard.php';
                }
           ?>
        </main>
    </div>
    <?php 
        include 'footer.php';
    ?>
    <script src="js/function.js"></script>

</body>
</html>