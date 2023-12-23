<?php
$sql_sua_tintuc = "SELECT * FROM tbl_tintuc WHERE id_tintuc = '$_GET[id_tintuc]' ORDER BY id_tintuc DESC LIMIT 1";
$query_sua_tintuc = mysqli_query($conn, $sql_sua_tintuc);
?>
<p>Sửa sản phẩm</p>
<center>
  <?php
  while ($row = mysqli_fetch_array($query_sua_tintuc)) {
  ?>
    <form method="post" action="modules/quanlytintuc/xuly.php?id_tintuc=<?php echo $row['id_tintuc'] ?>" enctype="multipart/form-data">
      <table class="table table-bordered border-primary" style="text-align: center;">
        <thead>
          <tr>
            <th scope="col">Tiêu đề tin tức</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Liên kết</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="input-group flex-nowrap">
                <input type="text" value="<?php echo $row['tieude_tintuc'] ?>" class="form-control" placeholder="Tiêu đề tin tức" aria-label="Tiêu đề tin tức" name="tieudetintuc" aria-describedby="addon-wrapping">
              </div>
            </td>
            <td>
              <div class="input-group flex-nowrap">
                <input type="file" class="form-control" placeholder="Hình ảnh" aria-label="Hình ảnh" name="hinhanh" aria-describedby="addon-wrapping">
                <img src='modules/quanlytintuc/Upload/<?php echo $row['hinhanh_tintuc'] ?>' width=130px height=100px>
              </div>
            </td>
          <td>
            <div class="input-group flex-nowrap">
              <input type="text" class="form-control" placeholder="Liên kết" aria-label="Liên kết" name="lienket" aria-describedby="addon-wrapping">
            </div>
          </td>
          </tr>
          <tr>
            <td colspan="4">
              <div class="col-12">
                <button class="btn btn-primary" type="submit" name="suatintuc">Submit form</button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  <?php
  }
  ?>
</center>