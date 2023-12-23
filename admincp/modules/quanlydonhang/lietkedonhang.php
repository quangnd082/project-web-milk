<?php
$sql_lietke_donhang = "SELECT * FROM tbl_donhang";
$query_lietke_donhang = mysqli_query($conn, $sql_lietke_donhang);
?>
<p>Liệt kê sản phẩm</p>
<center>
  <form method="post" action="modules/quanlysanpham/xuly.php">
    <table class="table table-bordered border-primary" style="text-align: center;">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Tên khách hàng</th>
          <th scope="col">Email</th>
          <th scope="col">Địa chỉ</th>
          <th scope="col">Thành phố</th>
          <th scope="col">Số điện thoại</th>
          <th scope="col">Tổng tiền</th>
          <th scope="col">Trạng thái</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php
          $i = 0;
          while ($row = mysqli_fetch_array($query_lietke_donhang)) {
            $i++;
          ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $row['ten_kh'] ?></td>
          <td><?php echo $row['email_kh'] ?></td>
          <td><?php echo $row['diachi_kh'] ?></td>
          <td><?php echo $row['thanhpho_kh'] ?></td>
          <td><?php echo $row['sdt_kh'] ?></td>
          <td><?php echo $row['tongtien_sanpham'] ?></td>
          <td><a href="?action=quanlydonhang&query=lietkesanpham&id_donhang=<?php echo $row['id_donhang'] ?>">Xem đơn hàng</a></td>

        </tr>
      <?php
          }
      ?>
      </tr>
      </tbody>
    </table>
  </form>
</center>