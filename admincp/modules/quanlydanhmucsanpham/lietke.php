<?php
$sql_lietke_danhmucsp = "SELECT * FROM tbl_danhmuc";
$query_lietke_danhmucsp = mysqli_query($conn, $sql_lietke_danhmucsp);
?>
<p>Liệt kê danh mục sản phẩm</p>
<center>
  <form method="post" action="modules/quanlydanhmucsanpham/xuly.php">
    <table class="table table-bordered border-primary" style="width:50%; text-align: center;">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Tên danh mục sản phẩm</th>
          <th scope="col">Quản lý</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php
          $i = 0;
          while ($row = mysqli_fetch_array($query_lietke_danhmucsp)) {
            $i++;
          ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $row['ten_danhmuc'] ?></td>
          <td><a href="modules/quanlydanhmucsanpham/xuly.php?id_danhmuc=<?php echo $row['id_danhmuc'] ?>">Xoá</a> | <a href="?action=quanlydanhmucsanpham&query=sua&id_danhmuc=<?php echo $row['id_danhmuc'] ?>">Sửa</a></td>
        </tr>
      <?php
          }
      ?>
      </tr>
      </tbody>
    </table>
  </form>
</center>