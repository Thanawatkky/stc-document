<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/form.css">

</head>
<body>
    <div class="container">
        <div class="col-6">
            <div class="bg-purple">
                <div id="txt_title">
                    <h1 >STC</h1>
                    <p> document</p>
                </div>
            </div>
           <div class="wrapper">
             <h1>Register</h1>
           <form action="./api/ac_register.php" id="frm_regis" method="post">
                    <div class="form-group">
                        <input type="text" name="username" id="username" class="form-control"  required>
                        <label for="username">ชื่อผู้ใช้</label>
                    </div>
                    <div class="form-group">
                        <input type="text" name="fname" id="fname" class="form-control"  required>
                        <label for="fname">ชื่อ</label>
                    </div>
                    <div class="form-group">
                        <input type="text" name="lname" id="lname" class="form-control"  required>
                        <label for="lname">นามสกุล</label>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" onchange="return checkPassword()" id="password" class="form-control"  required>
                        <label for="password">รหัสผ่าน</label>
                        <p id="alt_msg1"></p>
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirm_pass" onchange="return checkPassword()" id="confirm_pass" class="form-control"  required>
                        <label for="confirm_pass">ยืนยันรหัสผ่าน</label>
                        <p id="alt_msg2"></p>
                    </div>
                    <p>มีบัญชีอยู่แล้วใช่หรือไม่ <a href="login.php" style="text-decoration: none;">เข้าสู่ระบบ</a></p>
                    <div class="text-end">
                    <button type="submit" id="btn-submit" class="btn-primary">Sign up</button>

                    </div>
                </form>    
           </div>
        </div>
    </div>
    <script>
        document.getElementById('frm_regis').addEventListener('submit',(e) =>{
            e.preventDefault();
            const formData = new FormData(e.target);
            const xhr = new XMLHttpRequest();
            xhr.open(e.target.getAttribute('method'),e.target.getAttribute('action'),true)
            xhr.setRequestHeader('Accept',"application/json");
            xhr.onload= () => {
                if(xhr.status === 200) {
                    alert(xhr.responseText);
                    window.location.replace('login.php');
                }else{
                    console.log(xhr.status);
                }
            };
            xhr.onerror = () => {
                console.log(xhr.status);
            }
            xhr.send(formData);
        })
        function checkPassword() {
            if(document.getElementById('password').value !== document.getElementById('confirm_pass').value) {
                document.getElementById('alt_msg1').innerHTML = "รหัสผ่านไม่ตรงกัน";
                document.getElementById('alt_msg2').innerHTML = "รหัสผ่านไม่ตรงกัน";
                document.getElementById('btn-submit').disabled = true;
            }else{
                document.getElementById('alt_msg1').innerHTML = "";
                document.getElementById('alt_msg2').innerHTML = "";
                document.getElementById('btn-submit').disabled = false;
            }
        }
    </script>
</body>
</html>