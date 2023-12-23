<?php
$sql_sua_sp = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[id_sanpham]' ORDER BY id_sanpham DESC LIMIT 1";
$query_sua_sp = mysqli_query($conn, $sql_sua_sp);
?>
<p>Sửa sản phẩm</p>
<center>
  <?php
  while ($row = mysqli_fetch_array($query_sua_sp)) {
  ?>
    <form method="post" action="modules/quanlysanpham/xuly.php?id_sanpham=<?php echo $row['id_sanpham'] ?>" enctype="multipart/form-data">
      <table class="table table-bordered border-primary" style="text-align: center;">
        <thead>
          <tr>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Mã sản phẩm</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Giá sản phẩm</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Tóm tắt</th>
            <th scope="col">Nội dung</th>
            <th scope="col">Danh mục sản phẩm</th>
            <th scope="col">Tình trạng</th>
            <th scope="col">Giảm giá</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="input-group flex-nowrap">
                <input type="text" value="<?php echo $row['ten_sanpham'] ?>" class="form-control" placeholder="Tên sản phẩm" aria-label="Tên sản phẩm" name="tensanpham" aria-describedby="addon-wrapping">
              </div>
            </td>
            <td>
              <div class="input-group flex-nowrap">
                <input type="text" value="<?php echo $row['ma_sanpham'] ?>" class="form-control" placeholder="Mã sản phẩm" aria-label="Mã sản phẩm" name="masanpham" aria-describedby="addon-wrapping">
              </div>
            </td>
            <td>
              <div class="input-group flex-nowrap">
                <input type="file" class="form-control" placeholder="Hình ảnh" aria-label="Hình ảnh" name="hinhanh" aria-describedby="addon-wrapping">
                <img src='modules/quanlysanpham/Upload/<?php echo $row['hinhanh_sanpham'] ?>' width=130px height=100px>
              </div>
            </td>
            <td>
              <div class="input-group flex-nowrap">
                <input type="text" value="<?php echo $row['gia_sanpham'] ?>" class="form-control" placeholder="Giá sản phẩm" aria-label="Giá sản phẩm" name="giasanpham" aria-describedby="addon-wrapping">
              </div>
            </td>
            <td>
              <div class="input-group flex-nowrap">
                <input type="text" value="<?php echo $row['soluong_sanpham'] ?>" class="form-control" placeholder="Số lượng" aria-label="Số lượng" name="soluong" aria-describedby="addon-wrapping">
              </div>
            </td>
            <td>
              <textarea rows='5' name="tomtat" style="resize: none"> <?php echo $row['tomtat_sanpham'] ?></textarea>
            </td>
            <td>
              <textarea rows='5' name="noidung" style="resize: none"><?php echo $row['noidung_sanpham'] ?></textarea>
            </td>
            <td>
              <select name="danhmuc" id="">
                <?php
                $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                $query_danhmuc = mysqli_query($conn, $sql_danhmuc);
                while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                ?>
                  <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['ten_danhmuc'] ?></option>

                <?php

                }
                ?>
              </select>
            </td>
            <td>
              <select name="tinhtrang" id="">
                <?php
                if ($row['tinhtrang_sanpham'] == 0) {
                ?>
                  <option value="0" selected>Thường</option>
                  <option value="1">Khuyến mãi</option>
                  <option value="2">Nổi bật</option>
                <?php
                } elseif ($row['tinhtrang_sanpham'] == 1) {
                ?>
                  <option value="0">Thường</option>
                  <option value="1" selected>Khuyến mãi</option>
                  <option value="2">Nổi bật</option>
                <?php
                }else{
                ?>
                <option value="0">Thường</option>
                <option value="1">Khuyến mãi</option>
                <option value="2" selected>Nổi bật</option>
                <?php
                }
                ?>
              </select>
            </td>
            <td>
              <div class="input-group flex-nowrap">
                <input type="text" value="<?php echo $row['giamgia_sanpham'] ?>" class="form-control" placeholder="Giảm giá" aria-label="Giảm giá" name="giamgia" aria-describedby="addon-wrapping">
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="9">
              <div class="col-12">
                <button class="btn btn-primary" type="submit" name="suasanpham">Submit form</button>
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