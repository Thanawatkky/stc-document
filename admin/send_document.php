
<h2 class="table-title">รายการเอกสารที่ส่งแล้ว</h2>

<table>
        <thead>
            <tr>
                <th>#</th>
                <th>ผู้รับ</th>
                <th>วันที่ส่ง</th>
                <th>เอกสาร</th>
                <th>สถานะ</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = $conn->query("SELECT tb_document.*,tb_user.username FROM tb_document LEFT JOIN tb_user ON tb_document.owner = tb_user.user_id WHERE sender='".$_SESSION['user_id']."' ");
                
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
            </tr>
                <?php } ?>
        </tbody>
    </table>
        <?php if($sql->num_rows <= 0) { ?>
            <h4 style="text-align: center; padding: 1rem;">Not Found!</h4>
        <?php  } ?>
</div>