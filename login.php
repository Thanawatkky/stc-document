<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div class="container-login">
        <div class="col-6">
            <div class="bg-purple">
                <div id="txt_title">
                    <h1 >STC</h1>
                    <p> document</p>
                </div>
            </div>
           <div class="wrapper">
             <h1>Login</h1>
           <form action="api/ac_login.php" method="post" id="frm_login">
                    <div class="form-group">
                        <input type="text" name="username" id="username" class="form-control"  required>
                        <label for="username">Username</label>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control"  required>
                        <label for="password">Password</label>
                    </div>
                    <p>ยังไม่มีสมัครชิกใช่หรือไม่ <a href="register.php" style="text-decoration: none;">สมัครสมาชิก</a></p>
                    <div class="text-end">
                    <button type="submit"  id="btn-submit" class="btn-primary">Login</button>

                    </div>
                </form>    
           </div>
        </div>
    </div>
    <script>
        document.getElementById("frm_login").addEventListener('submit',(e) => {
            e.preventDefault();
            const formData = new FormData(e.target);
            const xhr = new XMLHttpRequest();
            xhr.open(e.target.getAttribute('method'), e.target.getAttribute('action'),true);
            xhr.setRequestHeader('Accept','application/json');
            xhr.onload = () => {
                if(xhr.status === 200) {
                    let data = JSON.parse(xhr.responseText);
                    if(data.status) {
                        alert(data.msg);
                        if(data.role == 1) {
                            window.location.replace('admin/index.php');
                        }else{
                            window.location.replace('index.php');
                        }   
                    }else{
                        alert(data.msg);
                        window.location.reload(true);
                    }
                }else{
                    console.log(xhr.status);
                }
            }
            xhr.onerror = () => {
                console.log(xhr.status);
            }
            xhr.send(formData);
        })
    </script>
</body>
</html>