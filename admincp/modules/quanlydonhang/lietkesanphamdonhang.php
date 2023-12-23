<?php
$sql_lietke_sanphamdonhang = "SELECT * FROM tbl_giohang_dathanhtoan WHERE id_donhang = '$_GET[id_donhang]'";
$query_lietke_sanphamdonhang = mysqli_query($conn, $sql_lietke_sanphamdonhang);
?>
<p>Liệt kê sản phẩm</p>
<center>
  <form method="post">
    <table class="table table-bordered border-primary" style="text-align: center;">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Tên sản phẩm</th>
          <th scope="col">Hình ảnh</th>
          <th scope="col">Giá</th>
          <th scope="col">Số lượng</th>
          <th scope="col">Mã sản phẩm</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($query_lietke_sanphamdonhang)) {
          $i++;
        ?>
          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['ten_sanpham'] ?></td>
            <td><img src='modules/quanlysanpham/Upload/<?php echo $row['hinhanh_sanpham'] ?>' width=130px height=100px></td>
            <td><?php echo $row['gia_sanpham'] ?></td>
            <td><?php echo $row['soluong_dat'] ?></td>
            <td><?php echo $row['ma_sanpham'] ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </form>
</center>
