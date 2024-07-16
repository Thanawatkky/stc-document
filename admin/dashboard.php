
<div class="wrapper" style="margin: 1.5rem 0;">
<h1>ยินดีต้อนรับเข้าสู่ ระบบส่งเอกสารออนไลน์</h1>
    <div class="text-end" style="margin-right: 1rem; margin-top: -1rem; color: gray;">
                <p>บทบาท: <?= userRole($fet_user->user_role); ?></p>
    </div>
</div>

<div class="col-4" style="margin: 1.5rem 0;">
    <div class="card col-6">
        <div class="card-header">
            <h4 class="card-title">เอกสารทั้งหมด</h4>
        </div>
        <div class="card-body">
            <?php 
                $sql_sumdoc = $conn->query("SELECT * FROM tb_document");
                $num_doc = $sql_sumdoc->num_rows;
            ?>
            <p><?= $num_doc; ?></p>
        </div>
    </div>
    <div class="card col-6">
        <div class="card-header">
            <h4 class="card-title">จำนวนผู้ใช้งาน</h4>
        </div>
        <div class="card-body">
            <?php 
                $sql_sumuser = $conn->query("SELECT * FROM tb_user WHERE user_role <> 1");
                $num_sumuser = $sql_sumuser->num_rows;
            ?>
            <p><?= $num_sumuser; ?></p>
        </div>
    </div>
    <div class="card col-6">
        <div class="card-header">
            <h4 class="card-title">กำลังใช้งาน</h4>
        </div>
        <div class="card-body">
            <?php 
                $sql_active = $conn->query("SELECT * FROM tb_login WHERE login_status=1 ");
                $num_active = $sql_active->num_rows;
            ?>
            <p><?= $num_active; ?></p>
        </div>
    </div>
</div>
    <hr>
    <h2 class="table-title">เอกสารทั้งหมด</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>ผู้รับ</th>
                <th>วันที่ส่ง</th>
                <th>เอกสาร</th>
                <th>สถานะ</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = $conn->query("SELECT tb_user.username,tb_document.* FROM tb_document LEFT JOIN tb_user ON tb_document.owner = tb_user.user_id WHERE `owner`='".$_SESSION['user_id']."' OR ISNULL(owner) AND doc_id LIMIT 6");
                
                $i=0;
                while ($fet = $sql->fetch_object()) {
                    $i++;
                
            ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $fet->username; ?></td>
                <td><?= date('d M Y',strtotime($fet->create_at)) ?></td>
                <td><?= $fet->doc_name; ?></td>
                <td><?= doc_status($fet->doc_status); ?></td>
                <td>
                <a href="../file/document/<?= $fet->doc_name; ?>" onclick="return readDoc(<?= $fet->doc_id; ?>)" target="_blank" id="read_doc" class="btn-primary">Read</a>
                <a href="api/ac_download.php?doc_id=<?= $fet->doc_id; ?>" class="btn-success">Download</a>
                    <button id="btn-del" onclick="delDoc(<?= $fet->doc_id; ?>);" class="btn-danger">Delete</button>
                </td>
            </tr>
                <?php } ?>
        </tbody>
    </table>
        <?php if($sql->num_rows <= 0) { ?>
            <h4 style="text-align: center; padding: 1rem;">Not Found!</h4>
        <?php  } ?>
</div>
