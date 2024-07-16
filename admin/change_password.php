<div class="card">
    <h2 class="add-title">เปลี่ยนรหัสผ่าน</h2>
    <form action="api/ac_password.php" id="frm_password" method="post" enctype="multipart/form-data" class="text-center">
                <div class="form-group">
                    <label for="current_password">รหัสผ่านปัจจุบัน: </label>
                    <input type="password" name="current_password" id="current_password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="new_password">รหัสผ่านใหม่: </label>
                    <input type="password" name="new_password" id="new_password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">ยืนยันรหัสผ่าน: </label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control"  required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn-primary">Submit</button>
                    <button type="reset" class="btn-danger">Cancel</button>
                </div>
            </form>
</div>
<script>
    document.getElementById('frm_password').addEventListener('submit',(e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        const xhr = new XMLHttpRequest();
        xhr.open(e.target.getAttribute('method'),e.target.getAttribute('action'),true);
        xhr.setRequestHeader('Accept','application/json');
        xhr.onload = () => {
            if(xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);
                if(data.status) {
                    alert(data.msg);
                    window.location.reload();
                }else{
                    alert(data.msg);
                    window.location.reload();
                }
            }else{
                console.log(xhr.status);
            }
        }
        xhr.onerror = () => {
            console.log(xhr.status);
        }
        xhr.send(formData);
    });
</script>