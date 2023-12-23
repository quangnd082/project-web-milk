<?php
if(isset($_POST['timkiem'])){
    $tukhoa = $_POST['tukhoa'];
}
$sql_pro = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc
     AND tbl_sanpham.ten_sanpham LIKE '%".$tukhoa."%'";
$query_pro = mysqli_query($conn, $sql_pro);
?>
<div class="container main">
    <div class="headline">
        <h3>Tìm kiếm: <?php echo $_POST['tukhoa']?></h3>
    </div>
    <ul class="products">
        <?php
        while ($row = mysqli_fetch_array($query_pro)) {
        ?>
            <li>
                <div class="product-item">
                    <div class="product-top">
                        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>" class="product-thump">
                            <img src="../admincp/modules/quanlysanpham/Upload/<?php echo $row['hinhanh_sanpham'] ?>" alt="">
                        </a>
                        <a href="/TDQMilk/danhmuc/index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>" class="buy-now">Chi tiết sản phẩm</a>
                    </div>
                    <div class="product-info">
                        <a href="/TDQMilk/danhmuc/index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc'] ?>" class="product-cat"><?php echo $row['ten_danhmuc'] ?></a>
                        <a href="/TDQMilk/danhmuc/index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>" class="product-name"><?php echo $row['ten_sanpham'] ?></a>
                        <?php
                        if($row['tinhtrang_sanpham'] ==1){
                        ?>
                        <div class="product-price" style="color: red;"><del><?php echo number_format($row['gia_sanpham']) . 'VNĐ' ?></del> <?php echo number_format($row['gia_sanpham']*(100-$row['giamgia_sanpham'])/100) . 'VNĐ' ?></div>
                        <?php
                        }else{
                        ?>
                        <div class="product-price"><?php echo number_format($row['gia_sanpham']) . 'VNĐ' ?></div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </li>
        <?php
        }
        ?>
    </ul>
</div>