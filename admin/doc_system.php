<table>
        <thead>
            <tr>
                <th>#</th>
                <th>ผู้ส่ง</th>
                <th>เอกสาร</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = $conn->query("SELECT tb_user.username,tb_document.* FROM tb_document LEFT JOIN tb_user ON tb_document.sender = tb_user.user_id");
                
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