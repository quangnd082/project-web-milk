<?php
    $sql_sua_danhmucsp = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc = '$_GET[id_danhmuc]' ORDER BY id_danhmuc DESC LIMIT 1";
    $query_sua_danhmucsp = mysqli_query($conn, $sql_sua_danhmucsp);
?>
<p>Sửa danh mục sản phẩm</p>
<center>
    <form method="post" action = "modules/quanlydanhmucsanpham/xuly.php?id_danhmuc=<?php echo $_GET['id_danhmuc'] ?>">
    <table class="table table-bordered border-primary" style="width:50%; text-align: center;">
    <?php
        while($dong = mysqli_fetch_array($query_sua_danhmucsp)){
    ?>
    <thead>
    <tr>
      <th scope="col">Tên danh mục sản phẩm</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
      <div class="input-group flex-nowrap">
        <input type="text" class="form-control" name = "tendanhmuc" value = "<?php echo $dong['ten_danhmuc']?>">
        </div>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <div class="col-12">
    <button class="btn btn-primary" type="submit" name = "suadanhmuc">Sửa</button>
  </div>
</td>
    </tr>
  </tbody>
  <?php
        }
  ?>
</table>
</form>
</center>