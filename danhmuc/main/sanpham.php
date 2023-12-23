<?php
include("../pages/menu.php");
$sql_chitiet = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc
    AND tbl_sanpham.id_sanpham = '$_GET[id]' LIMIT 1";
$query_chitiet = mysqli_query($conn, $sql_chitiet);
while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
?>
    <div class="container chitiet">
        <div class="hinhanh_sanpham">
            <img src="../admincp/modules/quanlysanpham/Upload/<?php echo $row_chitiet['hinhanh_sanpham'] ?>" alt="">
            <form method="POST" action="/TDQMilk/danhmuc/main/Giohang/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>">
                <div class="chitiet_sanpham">
                    <h3 style="font-size: 30px; font-weight: 600;">Tên sản phẩm: <?php echo $row_chitiet['ten_sanpham'] ?></h3>
                    <p>Số lượng sản phẩm: <?php echo $row_chitiet['soluong_sanpham'] ?></p>
                    <?php
                        if($row_chitiet['tinhtrang_sanpham'] ==1){
                        ?>
                        <p style="color: red;">Giá sản phẩm: <del><?php echo number_format($row_chitiet['gia_sanpham']) . 'VNĐ' ?></del> <?php echo number_format($row_chitiet['gia_sanpham']*(100-$row_chitiet['giamgia_sanpham'])/100) . 'VNĐ' ?></p>
                        <?php
                        }else{
                        ?>
                        <p>Giá sản phẩm: <?php echo number_format($row_chitiet['gia_sanpham']) . 'VNĐ' ?></p>
                        <?php
                        }
                        ?>
                    <p>Mã sản phẩm: <?php echo $row_chitiet['ma_sanpham'] ?></p>
                    <p>Danh mục sản phẩm: <?php echo $row_chitiet['ten_danhmuc'] ?></p>
                    <p>Tóm tắt: <?php echo $row_chitiet['tomtat_sanpham'] ?></p>
                    <?php if(isset($_SESSION['login'])){
                        if($row_chitiet['soluong_sanpham']>0){?>
                        <button type="submit" name="themgiohang" class="btn btn-danger">Thêm giỏ hàng</button>
                    <?php
                    }else{
                    ?>
                    <button type="submit" name="themgiohang" class="btn btn-danger" disabled>Sản phẩm hiện tại đã hết</button>
                    <?php
                    }
                }
                    ?>
                </div>
            </form>
        </div>
    </div>
<?php
}
?>