<?php
$sql_lietke_sanpham = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
$query_lietke_sanpham = mysqli_query($conn, $sql_lietke_sanpham);
?>
<p>Liệt kê sản phẩm</p>
<center>
  <form method="post" action="modules/quanlysanpham/xuly.php">
    <table class="table table-bordered border-primary" style="text-align: center;">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Tên sản phẩm</th>
          <th scope="col">Hình ảnh</th>
          <th scope="col">Giá</th>
          <th scope="col">Số lượng</th>
          <th scope="col">Danh mục</th>
          <th scope="col">Mã sản phẩm</th>
          <th scope="col">Tóm tắt</th>
          <th scope="col">Trạng thái</th>
          <th scope="col">Giảm giá</th>
          <th scope="col">Quản lý</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php
          $i = 0;
          while ($row = mysqli_fetch_array($query_lietke_sanpham)) {
            $i++;
          ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $row['ten_sanpham'] ?></td>
          <td><img src='modules/quanlysanpham/Upload/<?php echo $row['hinhanh_sanpham'] ?>' width=130px height=100px></td>
          <td><?php echo $row['gia_sanpham'] ?></td>
          <td><?php echo $row['soluong_sanpham'] ?></td>
          <td><?php echo $row['ten_danhmuc'] ?></td>
          <td><?php echo $row['ma_sanpham'] ?></td>
          <td><?php echo $row['tomtat_sanpham'] ?></td>
          <td><?php if ($row['tinhtrang_sanpham'] == 0) {
                echo 'Thường';
              } elseif ($row['tinhtrang_sanpham'] == 1) {
                echo 'Khuyến mãi';
              } else {
                echo 'Nổi bật';
              }
              ?></td>
          <td><?php echo $row['giamgia_sanpham'] ?></td>
          <td><a href="modules/quanlysanpham/xuly.php?id_sanpham=<?php echo $row['id_sanpham'] ?>">Xoá</a>|<a href="?action=quanlysanpham&query=sua&id_sanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a></td>

        </tr>
      <?php
          }
      ?>
      </tr>
      </tbody>
    </table>
  </form>
</center>