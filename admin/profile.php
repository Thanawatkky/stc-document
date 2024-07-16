
   <div class="col-8">
        <div>
            <h1 class="card-title">infomation</h1>
            <p class="user-profile"><b>Username:</b> <?= $fet_user->username; ?></p>
            <p class="user-profile"><b>ชื่อ-นามสกุล:</b> <?= $fet_user->fname." ".$fet_user->lname; ?></p>
            <p class="user-profile"><b>บทบาทการเข้าใช้งาน:</b> <?= userRole($fet_user->user_role); ?></p>
            <p class="user-profile"><b>วันที่สมัครสมาชิก: </b><?= date('d M Y',strtotime($fet_user->create_at)); ?></p>
            <p class="user-profile"><b>แก้ไขข้อมูลล่าสุด: </b><?= date('d M Y',strtotime($fet_user->update_at)); ?></p>
        </div>
        <div>
            <h2 class="card-title">แก้ไขข้อมูลส่วนตัว</h2>
            <form action="api/ac_profile.php" id="frm_profile"   method="post" enctype="multipart/form-data" class="text-center">
                <div class="form-group">
                    <label for="username">ชื่อผู้ใช้</label>
                    <input type="text" name="username" id="username"
                    value="<?= $fet_user->username; ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="fname">ชื่อ</label>
                    <input type="text" name="fname" value="<?= $fet_user->fname; ?>" id="fname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="lname">นามสกุล</label>
                    <input type="text" name="lname" id="lname" value="<?= $fet_user->lname; ?>" class="form-control" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn-primary">Submit</button>
                    <button type="reset" class="btn-danger">Cancel</button>
                </div>
            </form>
        </div>
   </div>
<script>
    document.getElementById('frm_profile').addEventListener('submit',(e) => {
        e.preventDefault();
    const formdata = new FormData(e.target);
    const xhr = new XMLHttpRequest();
    xhr.open(e.target.getAttribute('method'),e.target.getAttribute('action'),true)
    xhr.setRequestHeader('Accept','application/json')
    xhr.onload = () => {
        if(xhr.status === 200) {
            const data = JSON.parse(xhr.responseText);
            if(data.status) {
                alert(data.msg);
                window.location.reload();
            }else{
                console.log(data);
            }
        }else{
            console.log(xhr.status);
        }
    }
    xhr.onerror = () => {
        console.log(xhr.status);
    }


    xhr.send(formdata);
    })
</script>