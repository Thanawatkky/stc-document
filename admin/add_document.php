<div class="card">
    <h2 class="add-title">เพิ่มเอกสาร</h2>
    <form action="api/ac_document.php?ac=add" id="frm_document" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <?php 
                $sql = $conn->query("SELECT * FROM tb_user WHERE user_id <> '".$_SESSION['user_id']."' ");
                $i=0;
               
            ?>
            <select name="owner" id="owner">
                <option disabled selected>เลือกผู้รับ</option>
                <option value="<?= null ?>">ทุกคน</option>
                <?php  while($fet = $sql->fetch_object()) {  ?>
                <option value="<?= $fet->user_id; ?>"><?= $fet->username; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <input type="file" name="document" id="document" class="form-control" required>
        </div>
        <button type="submit" class="btn-primary">Submit</button>
        <button type="reset" class="btn-danger">Cancel</button>
    </form>
</div>
<script>
            document.getElementById('frm_document').addEventListener('submit', (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);
            const http = new XMLHttpRequest();
            http.open(e.target.getAttribute('method'), e.target.getAttribute('action'),true);
            http.setRequestHeader('Accept','application/json');
            http.onload = () => {
                if(http.status === 200) {
                    const data = JSON.parse(http.responseText);
                   alert(data.msg);
                   window.location.reload();
                }else{
                    console.log(http.responseText);
                }
            }
            http.onerror = () => {
                console.log(http.status);
            }
            http.send(formData);
        });
</script>