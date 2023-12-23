<?php
$idkh = $_SESSION['id'];
$sql_lietke_giohang = "SELECT * FROM tbl_giohang WHERE tbl_giohang.id = '" . $idkh . "'";
$query_lietke_giohang = mysqli_query($conn, $sql_lietke_giohang);
?>

<div class="headline">
  <h3>Giỏ hàng</h3>
</div>
<div class="container" style="overflow-x:auto;">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <table style="width: 100%;text-align:center" border="2">
    <tr>
      <th>ID</th>
      <th>Mã sản phẩm</th>
      <th>Tên sản phẩm</th>
      <th>Hình ảnh</th>
      <th>Số lượng</th>
      <th>Giá sản phẩm</th>
      <th>Thành tiền</th>
      <th>Quản lý</th>
    </tr>
    <?php
    $i = 0;
    $tongtien = 0;
    while ($row = mysqli_fetch_array($query_lietke_giohang)) {
      $i++;
    ?>
      <tr>
        <?php
        // Lấy giá sản phẩm và số lượng từ cơ sở dữ liệu
        $sql_sanpham = "SELECT * FROM tbl_sanpham WHERE id_sanpham ='" . $row['id_sanpham'] . "' LIMIT 1";
        $query_sanpham = mysqli_query($conn, $sql_sanpham);
        $row_sanpham = mysqli_fetch_array($query_sanpham);
        $gia_sanpham = $row['gia_sanpham'];
        if($row['soluong_dat']>=$row_sanpham['soluong_sanpham']){
          $sql_update = "UPDATE tbl_giohang SET soluong_dat = '" . $row_sanpham['soluong_sanpham'] . "' WHERE id = '" . $idkh . "' AND id_sanpham = '" . $row['id_sanpham'] . "'";
          mysqli_query($conn, $sql_update);
          $soluong_dat = $row_sanpham['soluong_sanpham'];
          if($row_sanpham['soluong_sanpham'] <= 0){
            $sql_xoa = "DELETE FROM tbl_giohang WHERE tbl_giohang.id ='" . $idkh . "' AND tbl_giohang.id_sanpham = '" . $row['id_sanpham'] . "'";
            mysqli_query($conn, $sql_xoa);
          }
        }else{
          $soluong_dat = $row['soluong_dat'];
        }

        // Ép kiểu dữ liệu về kiểu số
        $gia_sanpham = floatval(str_replace(',', '', $gia_sanpham)); // Chuyển đổi giá sản phẩm về kiểu số
        $soluong_dat = intval($soluong_dat); // Chuyển đổi số lượng về kiểu số nguyên

        // Tính toán thành tiền
        $thanhtien = $gia_sanpham * $soluong_dat;
        $tongtien += $thanhtien;

        ?>
        <td><?php echo $i ?></td>
        <td><?php echo $row['ma_sanpham'] ?></td>
        <td><?php echo $row['ten_sanpham'] ?></td>
        <td><img src='../admincp/modules/quanlysanpham/Upload/<?php echo $row['hinhanh_sanpham'] ?>' width=130px height=100px></td>
        <td>
        <a href="/TDQMilk/danhmuc/main/Giohang/themgiohang.php?tru=<?php echo $row['id_sanpham'] ?>"><i class="fa-solid fa-minus"></i></a>
          <?php echo $row['soluong_dat'] ?>
          <a href="/TDQMilk/danhmuc/main/Giohang/themgiohang.php?cong=<?php echo $row['id_sanpham'] ?>"><i class="fa-solid fa-plus"></i></a>
        </td>
        <?php
        if ($row_sanpham['tinhtrang_sanpham'] == 1) {
        ?>
          <td style="color: red;"><del><?php echo number_format($row_sanpham['gia_sanpham']) . 'VNĐ' ?></del><br><?php echo number_format($row['gia_sanpham']) . 'VNĐ' ?></td>
        <?php
        } else {
        ?>
          <td><?php echo number_format($row_sanpham['gia_sanpham']) . 'VNĐ' ?></td>
        <?php
        }
        ?>

        <td><?php echo number_format($thanhtien) . 'VNĐ' ?></td>
        <td><a href="/TDQMilk/danhmuc/main/Giohang/themgiohang.php?xoa=<?php echo $row['id_sanpham'] ?>">Xóa</a></td>
      </tr>
    <?php
    }
    ?>

    </tr>
    <?php
    if ($i == 0) {
    ?>
      <tr>
        <td colspan="8">Hiện không có sản phẩm trong giỏ hàng</td>
      </tr>
    <?php
    }
    ?>
  </table>
</div>
<?php
    if ($i != 0) {
    ?>
<div class="container" style="text-align: right;">
  <p style="padding-top:10px;font-size: 15px; font-weight:600">Tổng tiền: <?php echo number_format($tongtien) . 'VNĐ' ?></p>
  <a href="/TDQMilk/danhmuc/index.php?quanly=thanhtoan"><button class="btnlogin" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Đến trang thanh toán</button></a>
</div>
<?php
    }
    ?>
<style>
  .btnlogin {
    background-color: #04AA6D;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
  }

  /* Add a hover effect for buttons */
  .btnlogin:hover {
    opacity: 0.8;
  }
</style>