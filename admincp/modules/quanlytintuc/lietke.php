<?php
    $sql_lietke_tintuc = "SELECT * FROM tbl_tintuc";
    $query_lietke_tintuc = mysqli_query($conn, $sql_lietke_tintuc);
?>
<p>Liệt kê tin tức</p>
<center>
    <form method="post" action = "modules/quanlytintuc/xuly.php">
    <table class="table table-bordered border-primary" style="text-align: center;">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tiêu đề</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Liên kết</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
        $i = 0;
        while($row = mysqli_fetch_array($query_lietke_tintuc)){
            $i++;
            ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tieude_tintuc'] ?></td>
        <td><img src = 'modules/quanlytintuc/Upload/<?php echo $row['hinhanh_tintuc']?>' width = 130px height = 100px></td>
        <td><?php echo $row['lienket_tintuc'] ?></td>

<td><a href="modules/quanlytintuc/xuly.php?id_tintuc=<?php echo $row['id_tintuc'] ?>">Xoá</a>|<a href="?action=quanlytintuc&query=sua&id_tintuc=<?php echo $row['id_tintuc'] ?>">Sửa</a></td>

      </tr>
      <?php
        }
      ?>
    </tr>
  </tbody>
</table>
</form>
</center>