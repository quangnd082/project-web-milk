<?php
$sql_tintuc = "SELECT * FROM tbl_tintuc ORDER BY id_tintuc DESC";
$query_tintuc = mysqli_query($conn, $sql_tintuc);
?>
<div class="container tintuc" id="tintuc">
    <div class="headline">
        <h3>Tin tức</h3>
    </div>
    <?php
    while ($row = mysqli_fetch_array($query_tintuc)) {
    ?>
        <div class="responsive">
            <div class="gallery">
                <a target="_blank" href="<?php echo $row['lienket_tintuc'] ?>">
                    <img src="admincp/modules/quanlytintuc/Upload/<?php echo $row['hinhanh_tintuc'] ?>" alt="">
                </a>
                <div class="desc"><?php echo $row['tieude_tintuc'] ?></div>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="clearfix"></div>
</div>